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
use Magento\Shipping\Model\Config\Source\Allmethods;

class ShippingMethods implements ArrayInterface
{
    /**
     * @param Allmethods $allShippingMethods
     */
    public function __construct(
        private Allmethods $allShippingMethods
    ) {
    }

    /**
     * Give The Shipping Methods Options
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        $results = $this->allShippingMethods->toOptionArray(true);
        if (isset($results[0]) && isset($results[0]['label'])) {
            $results[0]['label'] = __('-- Please select --');
        }
        return $results;
    }
}
