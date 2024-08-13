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

class Position implements ArrayInterface
{
    /**
     * Payment Shipping Methods Position
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            [
                'label' => __('None'),
                'value' => 'none'
            ],
            [
                'label' => __('Last Method'),
                'value' => 'last'
            ],
            [
                'label' => __('First Method'),
                'value' => 'first'
            ]
        ];
    }
}
