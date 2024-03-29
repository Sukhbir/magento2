// Copyright © Cryozonic Ltd. All rights reserved.
//
// @package    Cryozonic_StripePayments
// @copyright  Copyright © Cryozonic Ltd (http://cryozonic.com)
// @version    1.8.8
// @build      RC5974
// @license    Commercial (See http://cryozonic.com/licenses/stripe.html for details)

var stripeTokens = {};

var initStripe = function(apiKey, securityMethod, callback)
{
    if (typeof callback == "undefined")
        callback = function() {};

    cryozonic.securityMethod = securityMethod;
    cryozonic.apiKey = apiKey;

    // Load Stripe.js dynamically
    if (!cryozonic.stripeJsV2 && !cryozonic.stripeJsV3)
    {
        cryozonic.loadStripeJsV2(function()
        {
            if (cryozonic.securityMethod == 2 || cryozonic.isApplePayEnabled())
                cryozonic.loadStripeJsV3();
        });
    }
    else
    {
        if (cryozonic.stripeJsV2)
            cryozonic.onLoadStripeJsV2();

        if (cryozonic.stripeJsV3)
            cryozonic.onLoadStripeJsV3();
    }

    // Disable server side card validation when Stripe.js is enabled
    if (typeof AdminOrder != 'undefined' && AdminOrder.prototype.loadArea && typeof AdminOrder.prototype._loadArea == 'undefined')
    {
        AdminOrder.prototype._loadArea = AdminOrder.prototype.loadArea;
        AdminOrder.prototype.loadArea = function(area, indicator, params)
        {
            if (typeof area == "object" && area.indexOf('card_validation') >= 0)
                area = area.splice(area.indexOf('card_validation'), 0);

            if (area.length > 0)
                this._loadArea(area, indicator, params);
        };
    }
};

// Global Namespace
var cryozonic =
{
    // Properties
    quote: null, // Comes from the checkout js
    customer: null, // Comes from the checkout js
    checkoutPaymentForm: null, // Comes from the checkout js
    paramsApplePay: null, // Comes from the checkout js
    params3DSecure: null, // Comes from the checkout js
    multiShippingFormInitialized: false,
    applePayButton: null,
    applePaySuccess: false,
    applePayResponse: null,
    securityMethod: 0,
    card: null,
    stripeJsV2: null,
    stripeJsV3: null,
    apiKey: null,
    avsFields: null,
    isCreatingToken: false,
    multiShippingForm: null,
    multiShippingFormSubmitButton: null,
    token: null,
    response: null,
    iconsContainer: null,

    // Methods
    shouldLoadStripeJsV2: function()
    {
        return (cryozonic.securityMethod == 1 || (cryozonic.securityMethod == 2 && cryozonic.isApplePayEnabled()));
    },
    loadStripeJsV2: function(callback)
    {
        if (!cryozonic.shouldLoadStripeJsV2())
            return callback();

        var script = document.getElementsByTagName('script')[0];
        var stripeJsV2 = document.createElement('script');
        stripeJsV2.src = "https://js.stripe.com/v2/";
        stripeJsV2.onload = function()
        {
            cryozonic.onLoadStripeJsV2();
            callback();
        };
        stripeJsV2.onerror = function(evt) {
            console.warn("Stripe.js v2 could not be loaded");
            console.error(evt);
            callback();
        };
        script.parentNode.insertBefore(stripeJsV2, script);
    },
    loadStripeJsV3: function(callback)
    {
        var script = document.getElementsByTagName('script')[0];
        var stripeJsV3 = document.createElement('script');
        stripeJsV3.src = "https://js.stripe.com/v3/";
        stripeJsV3.onload = cryozonic.onLoadStripeJsV3;
        stripeJsV3.onerror = function(evt) {
            console.warn("Stripe.js v3 could not be loaded");
            console.error(evt);
        };
        // Do this on the next cycle so that cryozonic.onLoadStripeJsV2() finishes first
        script.parentNode.insertBefore(stripeJsV3, script);
    },
    onLoadStripeJsV2: function()
    {
        if (!cryozonic.stripeJsV2)
        {
            Stripe.setPublishableKey(cryozonic.apiKey);
            cryozonic.stripeJsV2 = Stripe;
        }
    },
    onLoadStripeJsV3: function()
    {
        if (!cryozonic.stripeJsV3)
        {
            cryozonic.stripeJsV3 = Stripe(cryozonic.apiKey);
        }

        cryozonic.initLoadedStripeJsV3();
    },
    initLoadedStripeJsV3: function()
    {
        cryozonic.initStripeElements();
        cryozonic.onWindowLoaded(cryozonic.initStripeElements);

        cryozonic.initPaymentRequestButton();
        cryozonic.onWindowLoaded(cryozonic.initPaymentRequestButton);
    },
    onWindowLoaded: function(callback)
    {
        if (window.attachEvent)
            window.attachEvent("onload", callback); // IE
        else
            window.addEventListener("load", callback); // Other browsers
    },
    getStripeElementsStyle: function()
    {
        // Custom styling can be passed to options when creating an Element.
        return {
            base: {
                // Add your base input styles here. For example:
                fontSize: '16px',
                // lineHeight: '24px'
                // iconColor: '#c4f0ff',
                // color: '#31325F'
        //         fontWeight: 300,
        //         fontFamily: '"Helvetica Neue", Helvetica, sans-serif',

        //         '::placeholder': {
        //             color: '#CFD7E0'
        //         }
            }
        };
    },
    getStripeElementCardNumberOptions: function()
    {
        return {
            // iconStyle: 'solid',
            style: cryozonic.getStripeElementsStyle(),
            hideIcon: false
        };
    },
    getStripeElementCardExpiryOptions: function()
    {
        return {
            style: cryozonic.getStripeElementsStyle()
        };
    },
    getStripeElementCardCvcOptions: function()
    {
        return {
            style: cryozonic.getStripeElementsStyle()
        };
    },
    getStripeElementsOptions: function()
    {
        return {
            locale: 'auto'
        };
    },
    initStripeElements: function()
    {
        if (cryozonic.securityMethod != 2)
            return;

        if (document.getElementById('cryozonic-stripe-card-number') === null)
            return;

        var elements = cryozonic.stripeJsV3.elements(cryozonic.getStripeElementsOptions());

        var cardNumber = cryozonic.card = elements.create('cardNumber', cryozonic.getStripeElementCardNumberOptions());
        cardNumber.mount('#cryozonic-stripe-card-number');
        cardNumber.addEventListener('change', cryozonic.stripeElementsOnChange);

        var cardExpiry = cryozonic.card = elements.create('cardExpiry', cryozonic.getStripeElementCardExpiryOptions());
        cardExpiry.mount('#cryozonic-stripe-card-expiry');
        cardExpiry.addEventListener('change', cryozonic.stripeElementsOnChange);

        var cardCvc = cryozonic.card = elements.create('cardCvc', cryozonic.getStripeElementCardCvcOptions());
        cardCvc.mount('#cryozonic-stripe-card-cvc');
        cardCvc.addEventListener('change', cryozonic.stripeElementsOnChange);
    },
    stripeElementsOnChange: function(event)
    {
        if (typeof event.brand != 'undefined')
            cryozonic.onCardNumberChanged(event.brand);

        if (event.error)
            cryozonic.displayCardError(event.error.message, true);
        else
            cryozonic.clearCardErrors();
    },
    onCardNumberChanged: function(cardType)
    {
        cryozonic.onCardNumberChangedFade(cardType);
        cryozonic.onCardNumberChangedSwapIcon(cardType);
    },
    resetIconsFade: function()
    {
        cryozonic.iconsContainer.className = 'input-box';
        var children = cryozonic.iconsContainer.getElementsByTagName('img');
        for (var i = 0; i < children.length; i++)
            children[i].className = '';
    },
    onCardNumberChangedFade: function(cardType)
    {
        if (!cryozonic.iconsContainer)
            cryozonic.iconsContainer = document.getElementById('cryozonic-stripe-accepted-cards');

        if (!cryozonic.iconsContainer)
            return;

        cryozonic.resetIconsFade();

        if (!cardType || cardType == "unknown") return;

        var img = document.getElementById('cryozonic_stripe_' + cardType + '_type');
        if (!img) return;

        img.className = 'active';
        cryozonic.iconsContainer.className = 'input-box cryozonic-stripe-detected';
    },
    cardBrandToPfClass: {
        'visa': 'pf-visa',
        'mastercard': 'pf-mastercard',
        'amex': 'pf-american-express',
        'discover': 'pf-discover',
        'diners': 'pf-diners',
        'jcb': 'pf-jcb',
        'unknown': 'pf-credit-card',
    },
    onCardNumberChangedSwapIcon: function(cardType)
    {
        var brandIconElement = document.getElementById('cryozonic-stripe-brand-icon');
        var pfClass = 'pf-credit-card';
        if (cardType in cryozonic.cardBrandToPfClass)
            pfClass = cryozonic.cardBrandToPfClass[cardType];

        for (var i = brandIconElement.classList.length - 1; i >= 0; i--)
            brandIconElement.classList.remove(brandIconElement.classList[i]);

        brandIconElement.classList.add('pf');
        brandIconElement.classList.add(pfClass);
    },
    initPaymentRequestButton: function()
    {
        if (!cryozonic.isApplePayEnabled())
            return;

        if (cryozonic.hasNoCountryCode())
            cryozonic.paramsApplePay.country = cryozonic.getCountryCode();

        if (cryozonic.hasNoCountryCode())
            return;

        var paymentRequest;
        try
        {
            paymentRequest = cryozonic.stripeJsV3.paymentRequest(cryozonic.paramsApplePay);
            var elements = cryozonic.stripeJsV3.elements();
            var prButton = elements.create('paymentRequestButton', {
                paymentRequest: paymentRequest,
            });
        }
        catch (e)
        {
            console.warn(e.message);
            return;
        }

        // Check the availability of the Payment Request API first.
        paymentRequest.canMakePayment().then(function(result)
        {
            if (result)
            {
                prButton.mount('#payment-request-button');
                cryozonic.checkoutPaymentForm.isPaymentRequestAPISupported(true);
                cryozonic.checkoutPaymentForm.cryozonicStripeShowApplePaySection(true);
            }
        });

        paymentRequest.on('token', function(result)
        {
            try
            {
                setStripeToken(result.token.id, result.token);
                cryozonic.setApplePayToken(result.token);
                cryozonic.checkoutPaymentForm.cryozonicStripeJsToken(result.token.id + ':' + result.token.card.brand + ':' + result.token.card.last4);
                result.complete('success');
            }
            catch (e)
            {
                result.complete('fail');
            }
        });
    },
    is3DSecureEnabled: function()
    {
        return (typeof cryozonic.params3DSecure != 'undefined' && cryozonic.params3DSecure && !isNaN(cryozonic.params3DSecure.amount));
    },
    isApplePayEnabled: function()
    {
        if (!cryozonic.paramsApplePay)
            return false;

        return true;
    },
    hasNoCountryCode: function()
    {
        return (typeof cryozonic.paramsApplePay.country == "undefined" || !cryozonic.paramsApplePay.country || cryozonic.paramsApplePay.country.length === 0);
    },
    getCountryElement: function()
    {
        var element = document.getElementById('billing:country_id');

        if (!element)
            element = document.getElementById('billing_country_id');

        if (!element)
        {
            var selects = document.getElementsByName('billing[country_id]');
            if (selects.length > 0)
                element = selects[0];
        }

        return element;
    },
    getCountryCode: function()
    {
        var element = cryozonic.getCountryElement();

        if (!element)
            return null;

        if (element.value && element.value.length > 0)
            return element.value;

        return null;
    },
    shouldUse3DSecure: function(response)
    {
        return (cryozonic.is3DSecureEnabled() &&
            typeof response.card.three_d_secure != 'undefined' &&
            ['optional', 'required'].indexOf(response.card.three_d_secure) >= 0);
    },
    toggleSubscription: function(subscriptionId, edit)
    {
        var section = document.getElementById(subscriptionId);
        if (!section) return;

        if (cryozonic.hasClass(section, 'show'))
        {
            cryozonic.removeClass(section, 'show');
            if (edit) cryozonic.removeClass(section, 'edit');
        }
        else
        {
            cryozonic.addClass(section, 'show');
            if (edit) cryozonic.addClass(section, 'edit');
        }

        return false;
    },

    editSubscription: function(subscriptionId)
    {
        var section = document.getElementById(subscriptionId);
        if (!section) return;

        if (!cryozonic.hasClass(section, 'edit'))
            cryozonic.addClass(section, 'edit');
    },

    cancelEditSubscription: function(subscriptionId)
    {
        var section = document.getElementById(subscriptionId);
        if (!section) return;

        cryozonic.removeClass(section, 'edit');
    },

    hasClass: function(element, className)
    {
        return (' ' + element.className + ' ').indexOf(' ' + className + ' ') > -1;
    },

    removeClass: function (element, className)
    {
        if (element.classList)
            element.classList.remove(className);
        else
        {
            var classes = element.className.split(" ");
            classes.splice(classes.indexOf(className), 1);
            element.className = classes.join(" ");
        }
    },

    addClass: function (element, className)
    {
        if (element.classList)
            element.classList.add(className);
        else
            element.className += (' ' + className);
    },

    // Admin

    initRadioButtons: function()
    {
        // Switching between saved cards and new card
        var i, inputs = document.querySelectorAll('#saved-cards input');

        for (i = 0; i < inputs.length; i++)
            inputs[i].onclick = cryozonic.useCard;

        // Switching between new subscription and switch subsctiption
        inputs = document.querySelectorAll('#payment_form_cryozonic_stripe_subscription input.select.switch');

        for (i = 0; i < inputs.length; i++)
            inputs[i].onclick = cryozonic.switchSubscription;

        // Selecting a subscription from the dropdown
        var input = $('cryozonic_stripe_select_subscription');
        if (input)
            input.onchange = cryozonic.switchSubscriptionSelected;
    },

    disableStripeInputValidation: function()
    {
        var i, inputs = document.querySelectorAll(".stripe-input");
        for (i = 0; i < inputs.length; i++)
            $(inputs[i]).removeClassName('required-entry');
    },

    enableStripeInputValidation: function()
    {
        var i, inputs = document.querySelectorAll(".stripe-input");
        for (i = 0; i < inputs.length; i++)
            $(inputs[i]).addClassName('required-entry');
    },

    // Triggered when the user clicks a saved card radio button
    useCard: function(evt)
    {
        var parentId = 'payment_form_cryozonic_stripe_payment';

        // User wants to use a new card
        if (this.value == 'new_card')
        {
            $(parentId).addClassName("stripe-new");
            cryozonic.enableStripeInputValidation();
        }
        // User wants to use a saved card
        else
        {
            $(parentId).removeClassName("stripe-new");
            cryozonic.disableStripeInputValidation();
        }
    },

    switchSubscription: function(evt)
    {
        var newSubscriptionSection = 'payment_form_cryozonic_stripe_payment';
        var existingSubscriptionSection = 'select_subscription';
        var elements = $(existingSubscriptionSection).select( 'select', 'input');

        if (this.value == 'switch')
        {
            $(newSubscriptionSection).addClassName("hide");
            $(existingSubscriptionSection).removeClassName("hide");
            for (var i = 0; i < elements.length; i++)
            {
                if (!cryozonic.hasClass(elements[i], 'hide'))
                    elements[i].disabled = false;
            }
            cryozonic.disableStripeInputValidation();
        }
        else
        {
            $(newSubscriptionSection).removeClassName("hide");
            $(existingSubscriptionSection).addClassName("hide");
            cryozonic.enableStripeInputValidation();
        }
    },

    switchSubscriptionSelected: function(evt)
    {
        var id = 'switch_subscription_date_' + this.value;
        var inputs = $('cryozonic_stripe_subscription_start_date_control').select('input');
        for (var i = 0; i < inputs.length; i++)
        {
            if (inputs[i].id == id)
            {
                $(inputs[i]).removeClassName("hide");
                inputs[i].disabled = false;
            }
            else
            {
                $(inputs[i]).addClassName("hide");
                inputs[i].disabled = true;
            }
        }
    },

    initPaymentFormValidation: function()
    {
        // Adjust validation if necessary
        var hasSavedCards = document.getElementById('new_card');

        if (hasSavedCards)
        {
            var paymentMethods = document.getElementsByName('payment[method]');
            for (var j = 0; j < paymentMethods.length; j++)
                paymentMethods[j].addEventListener("click", cryozonic.toggleValidation);
        }
    },

    toggleValidation: function(evt)
    {
        $('new_card').removeClassName('validate-one-required-by-name');
        if (evt.target.value == 'cryozonic_stripe')
            $('new_card').addClassName('validate-one-required-by-name');
    },

    initMultiplePaymentMethods: function(selector)
    {
        var wrappers = document.querySelectorAll(selector);
        var countPaymentMethods = wrappers.length;
        if (countPaymentMethods < 2) return;

        var methods = document.querySelectorAll('.indent-target');
        if (methods.length > 0)
        {
            for (var i = 0; i < methods.length; i++)
                this.addClass(methods[i], 'indent');
        }
    },

    placeAdminOrder: function()
    {
        var radioButton = document.getElementById('p_method_cryozonic_stripe');
        if (radioButton && !radioButton.checked)
            return order.submit();

        createStripeToken(function(err)
        {
            if (err)
                alert(err);
            else
                order.submit();
        });
    },

    initAdminStripeJs: function()
    {
        // Stripe.js intercept when placing a new order
        var btn = document.getElementById('order-totals');
        if (btn) btn = btn.getElementsByTagName('button');
        if (btn && btn[0]) btn = btn[0];
        if (btn) btn.onclick = cryozonic.placeAdminOrder;

        var topBtn = document.getElementById('submit_order_top_button');
        if (topBtn) topBtn.onclick = cryozonic.placeAdminOrder;
    },

    setAVSFieldsFrom: function(quote, customer)
    {
        cryozonic.quote = quote;
        cryozonic.customer = customer;

        if (!quote || !quote.billingAddress)
            return;

        var street = [];
        var billingAddress = quote.billingAddress();

        // Mageplaza OSC delays to set the street because of Google autocomplete,
        // but it does set the postcode correctly, so we temporarily ignore the street
        if (billingAddress.street && billingAddress.street.length > 0)
            street = billingAddress.street;

        cryozonic.avsFields = {
            address_line1: (street.length > 0 ? street[0] : null),
            address_line2: (street.length > 1 ? street[1] : null),
            address_city: billingAddress.city || null,
            address_state: billingAddress.region || null,
            address_zip: billingAddress.postcode || null,
            address_country: billingAddress.countryId || null
        };
    },

    addAVSFieldsTo: function(cardDetails)
    {
        if (cryozonic.avsFields)
            jQuery.extend(cardDetails, cryozonic.avsFields);

        return cardDetails;
    },

    getSourceOwner: function()
    {
        var owner = {
            name: null,
            email: null,
            phone: null,
            address: {
                city: null,
                country: null,
                line1: null,
                line2: null,
                postal_code: null,
                state: null
            }
        };

        if (cryozonic.quote)
        {
            var billingAddress = cryozonic.quote.billingAddress();
            var name = billingAddress.firstname + ' ' + billingAddress.lastname;
            owner.name = name;
            owner.email = cryozonic.customer.customerData.email;
            owner.phone = billingAddress.telephone;
        }

        if (cryozonic.avsFields)
        {
            owner.address.city = cryozonic.avsFields.address_city;
            owner.address.country = cryozonic.avsFields.address_country;
            owner.address.line1 = cryozonic.avsFields.address_line1;
            owner.address.line2 = cryozonic.avsFields.address_line2;
            owner.address.postal_code = cryozonic.avsFields.address_zip;
            owner.address.state = cryozonic.avsFields.address_state;
        }

        return owner;
    },

    // Triggered from the My Saved Cards section
    saveCard: function(saveButton)
    {
        saveButton.disabled = true;

        createStripeToken(function(err)
        {
            if (err)
            {
                alert(err);
                saveButton.disabled = false;
            }
            else
                document.getElementById('payment_form_cryozonic_stripe_payment').submit();
        });

        return false;
    },

    getCardDetails: function()
    {
        // Validate the card
        var cardName = document.getElementById('cryozonic_stripe_cc_owner');
        var cardNumber = document.getElementById('cryozonic_stripe_cc_number');
        var cardCvc = document.getElementById('cryozonic_stripe_cc_cid');
        var cardExpMonth = document.getElementById('cryozonic_stripe_expiration_mo');
        var cardExpYear = document.getElementById('cryozonic_stripe_expiration_yr');

        var isValid = cardName && cardName.value && cardNumber && cardNumber.value && cardCvc && cardCvc.value && cardExpMonth && cardExpMonth.value && cardExpYear && cardExpYear.value;

        if (!isValid) return null;

        var cardDetails = {
            name: cardName.value,
            number: cardNumber.value,
            cvc: cardCvc.value,
            exp_month: cardExpMonth.value,
            exp_year: cardExpYear.value
        };

        cardDetails = cryozonic.addAVSFieldsTo(cardDetails);

        return cardDetails;
    },

    initAdminEvents: function()
    {
        cryozonic.initRadioButtons();
        cryozonic.initPaymentFormValidation();
        cryozonic.initMultiplePaymentMethods('.admin__payment-method-wapper');
    },

    initMultiShippingEvents: function()
    {
        cryozonic.initRadioButtons();
        cryozonic.initMultiplePaymentMethods('.methods-payment .item-title');
        cryozonic.initMultiShippingForm();
    },

    // Multi-shipping form support for Stripe.js
    submitMultiShippingForm: function(e)
    {
        var el = document.getElementById('p_method_cryozonic_stripe');
        if (el && !el.checked)
            return true;

        if (e.preventDefault) e.preventDefault();

        cryozonic.multiShippingFormSubmitButton = document.getElementById('payment-continue');

        if (cryozonic.multiShippingFormSubmitButton)
            cryozonic.multiShippingFormSubmitButton.disabled = true;

        createStripeToken(function(err)
        {
            if (err)
                alert(err);
            else
            {
                if (cryozonic.multiShippingFormSubmitButton)
                    cryozonic.multiShippingFormSubmitButton.disabled = false;

                cryozonic.multiShippingForm.submit();
            }
        });

        return false;
    },

    initMultiShippingForm: function()
    {
        if (cryozonic.multiShippingFormInitialized) return;

        cryozonic.multiShippingForm = document.getElementById('multishipping-billing-form');
        if (!cryozonic.multiShippingForm) return;

        cryozonic.multiShippingForm.onsubmit = cryozonic.submitMultiShippingForm;

        cryozonic.multiShippingFormInitialized = true;
    },

    clearCardErrors: function()
    {
        // Dummy method from M1
    },

    validatePaymentForm: function()
    {
        // Dummy method from M1
        return true;
    },

    setLoadWaiting: function(section)
    {
        // Dummy method from M1
    },

    setApplePayToken: function(token)
    {
        cryozonic.checkoutPaymentForm.setApplePayToken(token);
    },

    displayCardError: function(message)
    {
        message = cryozonic.maskError(message);

        // When we use a saved card, display the message as an alert
        var newCardRadio = document.getElementById('new_card');
        if (newCardRadio && !newCardRadio.checked)
        {
            alert(message);
            return;
        }

        var box = document.getElementById('cryozonic-stripe-card-errors');

        if (box)
        {
            box.innerHTML = message;
            box.classList.add('populated');
        }
        else
            alert(message);
    },

    maskError: function(err)
    {
        var errLowercase = err.toLowerCase();
        var pos1 = errLowercase.indexOf("Invalid API key provided".toLowerCase());
        var pos2 = errLowercase.indexOf("No API key provided".toLowerCase());
        if (pos1 === 0 || pos2 === 0)
            return 'Invalid Stripe API key provided.';

        return err;
    }
};

var createStripeToken = function(callback)
{
    cryozonic.clearCardErrors();

    if (!cryozonic.validatePaymentForm())
        return;

    cryozonic.setLoadWaiting('payment');
    var done = function(err)
    {
        cryozonic.setLoadWaiting(false);
        return callback(err, cryozonic.token, cryozonic.response);
    };

    if (cryozonic.applePaySuccess)
        return done();

    // First check if the "Use new card" radio is selected, return if not
    var cardDetails, newCardRadio = document.getElementById('new_card');
    if (newCardRadio && !newCardRadio.checked)
        return done();

    // Check if we are switching from another subscription, return if we are
    var switchSubscription = document.getElementById('switch_subscription');
    if (switchSubscription && switchSubscription.checked) return done();

    // Stripe.js v3 + Stripe Elements
    if (cryozonic.securityMethod == 2)
    {
        try
        {
            cryozonic.stripeJsV3.createSource(cryozonic.card, { owner: cryozonic.getSourceOwner() }).then(function(result)
            {
                if (result.error)
                    return done(result.error.message);

                var cardKey = result.source.id;
                var token = result.source.id + ':' + result.source.card.brand + ':' + result.source.card.last4;
                stripeTokens[cardKey] = token;
                setStripeToken(token, result.source);

                return done();
            });
        }
        catch (e)
        {
            return done(e.message);
        }
    }
    // Stripe.js v2
    else
    {
        cardDetails = cryozonic.getCardDetails();

        if (!cardDetails)
            return done('Invalid card details');

        var cardKey = JSON.stringify(cardDetails);

        if (stripeTokens[cardKey])
        {
            setStripeToken(stripeTokens[cardKey], null);
            return done();
        }
        else
            deleteStripeToken();

        try
        {
            Stripe.card.createToken(cardDetails, function (status, response)
            {
                if (response.error)
                    return done(response.error.message);

                var token = response.id + ':' + response.card.brand + ':' + response.card.last4;
                stripeTokens[cardKey] = token;
                setStripeToken(token, response);
                return done();
            });
        }
        catch (e)
        {
            return done(e.message);
        }
    }
};

function setStripeToken(token, response)
{
    cryozonic.token = token;
    if (response)
        cryozonic.response = response;
    try
    {
        var input, inputs = document.getElementsByClassName('cryozonic-stripejs-token');
        if (inputs && inputs[0]) input = inputs[0];
        else input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "payment[cc_stripejs_token]");
        input.setAttribute("class", 'cryozonic-stripejs-token');
        input.setAttribute("value", token);
        input.disabled = false; // Gets disabled when the user navigates back to shipping method
        var form = document.getElementById('payment_form_cryozonic_stripe_payment');
        if (!form) form = document.getElementById('co-payment-form');
        if (!form) form = document.getElementById('order-billing_method_form');
        if (!form) form = document.getElementById('onestepcheckout-form');
        if (!form && typeof payment != 'undefined') form = document.getElementById(payment.formId);
        if (!form)
        {
            form = document.getElementById('new-card');
            input.setAttribute("name", "newcard[cc_stripejs_token]");
        }
        form.appendChild(input);
    } catch (e) {}
}

function deleteStripeToken()
{
    cryozonic.token = null;
    cryozonic.response = null;

    var input, inputs = document.getElementsByClassName('cryozonic-stripejs-token');
    if (inputs && inputs[0]) input = inputs[0];
    if (input && input.parentNode) input.parentNode.removeChild(input);
}


