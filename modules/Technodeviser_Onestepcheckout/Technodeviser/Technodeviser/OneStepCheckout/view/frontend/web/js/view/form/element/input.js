/*
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *  
 */
/*browser:true*/
/*global define*/
define([
    'jquery',
    'Magento_Ui/js/form/element/abstract',
    'Technodeviser_OneStepCheckout/js/action/validate-shipping-info',
    'Technodeviser_OneStepCheckout/js/action/save-shipping-address'
], function ($, abstract,ValidateShippingInfo,SaveAddressBeforePlaceOrder) {
    'use strict';

    return abstract.extend({
        saveShippingAddress: function(){
            if(ValidateShippingInfo()){
                SaveAddressBeforePlaceOrder();
            }
        }
    });
});
