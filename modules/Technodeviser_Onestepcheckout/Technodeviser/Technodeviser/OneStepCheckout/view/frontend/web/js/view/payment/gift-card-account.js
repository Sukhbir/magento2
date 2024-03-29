/*
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *  
 */
/*jshint browser:true jquery:true*/
/*global alert*/
define(
    [
        'jquery',
        'ko',
        'Magento_GiftCardAccount/js/view/payment/gift-card-account',
        'Technodeviser_OneStepCheckout/js/action/set-gift-card-information'
    ],
    function (
        $,
        ko,
        GiftCardAccount,
        setGiftCardAction
    ) {
        "use strict";
        return GiftCardAccount.extend({
            defaults: {
                template: 'Technodeviser_OneStepCheckout/payment/gift-card-account',
                giftCartCode: ''
            },
            initialize: function () {
                this._super();
            },
            setGiftCard: function () {
                if (this.validate()) {
                    setGiftCardAction([this.giftCartCode()])
                }
            }
        })
    }
);
