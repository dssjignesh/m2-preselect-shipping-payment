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

namespace Dss\PreSelectShippingPayment\Helper;

use Magento\Store\Model\Store;

/**
 * Payment module base helper
 */
class Data extends \Magento\Payment\Helper\Data
{
    /**
     * Retrieve all payment methods list as an array
     *
     * @param bool $sorted
     * @param bool $asLabelValue
     * @param bool $withGroups
     * @param Store|null $store
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getPaymentMethodList(
        $sorted = true,
        $asLabelValue = false,
        $withGroups = false,
        $store = null
    ): array {
        $methods = [];
        $groups = [];
        $groupRelations = [];

        foreach ($this->getPaymentMethods() as $code => $data) {
            if (isset($data['title'])) {
                $methods[$code] = $data['title'];
            } else {
                try {
                    $methods[$code] = $this->getMethodInstance($code)->getConfigData('title', $store);
                } catch (\Exception $e) {
                    continue;
                }
            }
            if ($asLabelValue && $withGroups && isset($data['group'])) {
                $groupRelations[$code] = $data['group'];
            }
        }
        if ($asLabelValue && $withGroups) {
            $groups = $this->_paymentConfig->getGroups();
            foreach ($groups as $code => $title) {
                $methods[$code] = $title;
            }
        }
        if ($sorted) {
            asort($methods);
        }
        if ($asLabelValue) {
            $labelValues = [];
            foreach ($methods as $code => $title) {
                $labelValues[$code] = [];
            }
            foreach ($methods as $code => $title) {
                if (isset($groups[$code])) {
                    $labelValues[$code]['label'] = $title;
                    if (!isset($labelValues[$code]['value'])) {
                        $labelValues[$code]['value'] = null;
                    }
                } elseif (isset($groupRelations[$code])) {
                    unset($labelValues[$code]);
                    $labelValues[$groupRelations[$code]]['value'][$code] = ['value' => $code, 'label' => $title];
                } else {
                    $labelValues[$code] = ['value' => $code, 'label' => $title];
                }
            }
            return $labelValues;
        }

        return $methods;
    }
}
