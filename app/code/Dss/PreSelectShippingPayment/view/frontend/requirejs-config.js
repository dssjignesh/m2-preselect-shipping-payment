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

var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/model/checkout-data-resolver': {
                'Dss_PreSelectShippingPayment/js/model/checkout-data-resolver-mixin': true
            }
        }
    }
};
