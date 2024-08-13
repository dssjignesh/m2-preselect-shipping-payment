/**
 * Digit Software Solutions.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 *
 * @category  Dss
 * @package   Dss_PreSelectShippingPayment
 * @author    Extension Team
 * @copyright Copyright (c) 2024 Digit Software Solutions. ( https://digitsoftsol.com )
 */

define([
    'jquery'
], function ($) {
    'use strict';
    $.widget('dss.dss_checkout_process', {
        _create: function () {


            var options = this.options;

            var defaultShipping = options.defaultShipping;
            var defaultPayment = options.defaultPayment;

            var positionPayment = options.positionPayment;
            var positionShipping = options.positionShipping;

            $(document).ready(function() {


                $(".box-shipping-method .methods-shipping").each(function(index) {

                    var checkRadioShipping = false;
                    var countObjectShipping = 0;
                    var countShipping = 0;
                    $(this).find("input[type=radio]").each(function(index){

                        var shippingCode = $(this).attr("value");
                        if (shippingCode == defaultShipping) {
                            $(this).attr('checked', true);
                            checkRadioShipping = true;
                        }
                        countObjectShipping = index;

                    });

                    $(this).find("input[type=radio]").each(function(index, value){
                        var self = this;
                        if(index == countObjectShipping && positionShipping == 'last' && checkRadioShipping === false) {
                            $(this).attr('checked', true);
                            return false;
                        }
                        if(index == 0 && positionShipping == 'first' && checkRadioShipping === false) {
                            countShipping++;
                            if (countShipping == 1) {
                                $(self).prop("checked", true);
                            }
                        }
                    });
                });

                $(".box-billing-method .checkout-payment-method").each(function(index) {
                    var checkRadioPayment = false;
                    var countObjectPayment = 0;
                    var countPayment = 0;
                    $(this).find("input[type=radio]").each(function(index){

                        var paymentCode = $(this).attr("value");
                        if (paymentCode == defaultPayment) {
                            $(this).attr('checked', true);

                            checkRadioPayment = true;
                        }
                        countObjectPayment = index;

                    });

                    $(this).find("input[type=radio]").each(function(index, value){
                        var self = this;
                        if(index == countObjectPayment && positionPayment == 'last' && checkRadioPayment === false) {
                            $(this).attr('checked', true);
                            return false;
                        }

                        if(index == 0 && positionPayment == 'first' && checkRadioPayment === false) {
                            countPayment++;
                            if (countPayment == 1) {
                                $(self).prop("checked", true);
                            }
                        }
                    });
                });
            });
        }
    });

    return $.dss.dss_checkout_process;
});
