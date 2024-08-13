<?php

declare(strict_types= 1);

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

namespace Dss\PreSelectShippingPayment\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use Dss\PreSelectShippingPayment\Helper\Data;

class PaymentMethods implements ArrayInterface
{

    /**
     * @param Data $helper
     */
    public function __construct(
        private Data $helper
    ) {
    }

    /**
     * Give The Payment Methods Options
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        $paymentMethods = $this->helper->getPaymentMethodList();
        $results = [['value' => '', 'label' => __('-- Please select --')]];
        foreach ($paymentMethods as $methodCode => $methodTitle) {
            $results[] = [
                'value' => $methodCode,
                'label' => $methodTitle
            ];
        }
        return $results;
    }
}
