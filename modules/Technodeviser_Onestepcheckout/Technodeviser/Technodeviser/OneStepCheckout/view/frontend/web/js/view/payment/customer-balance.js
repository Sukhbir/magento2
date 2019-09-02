/*
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *  
 */
/*jshint browser:true*/
/*global define*/
/**
 * Customer balance view model
 */
define(
    [
        'ko',
        'Magento_CustomerBalance/js/view/payment/customer-balance',
        'Technodeviser_OneStepCheckout/js/action/use-balance'
    ],
    function (ko, CustomerBalance, useBalanceAction) {
        var amountSubstracted = ko.observable(window.checkoutConfig.payment.customerBalance.amountSubstracted);

        return CustomerBalance.extend({
            defaults: {
                template: 'Technodeviser_OneStepCheckout/payment/customer-balance',
                isEnabled: true
            },
            initialize: function () {
                this._super();
            },
            /**
             * Send request to use balance
             */
            sendRequest: function() {
                amountSubstracted(true);
                useBalanceAction();
            }
        });
    }
);
