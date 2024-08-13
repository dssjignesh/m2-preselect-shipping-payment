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

namespace Dss\PreSelectShippingPayment\Model;

use Magento\Store\Model\ScopeInterface;
use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class CompositeConfigProvider implements ConfigProviderInterface
{
    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        private ScopeConfigInterface $scopeConfig
    ) {
    }

    /**
     * Get the Shipping and Payment Config
     *
     * @return array
     */
    public function getConfig(): array
    {
        $isEnabledShipping =  $this->scopeConfig->isSetFlag(
            'preselectshippingpayment/shipping/enable',
            ScopeInterface::SCOPE_STORE
        );
        $isEnabledPayment =  $this->scopeConfig->isSetFlag(
            'preselectshippingpayment/payment/enable',
            ScopeInterface::SCOPE_STORE
        );
        $output = [];
        if ($isEnabledShipping) {
            $output['dssAspConfig']['shipping'] = [
                'default' => $this->getShipingConfig('default'),
                'position' => $this->getShipingConfig('position')
            ];
        }
        if ($isEnabledPayment) {
            $output['dssAspConfig']['payment'] = [
                'default' => $this->getPaymentConfig('default'),
                'position' => $this->getPaymentConfig('position')
            ];
        }
        return $output;
    }

    /**
     * Get auto shipping config
     *
     * @param string $field
     * @return mixed
     */
    public function getShipingConfig($field)
    {
        return $this->scopeConfig->getValue(
            'preselectshippingpayment/shipping/' . $field,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get auto payment config
     *
     * @param string $field
     * @return mixed
     */
    public function getPaymentConfig($field)
    {
        return $this->scopeConfig->getValue(
            'preselectshippingpayment/payment/' . $field,
            ScopeInterface::SCOPE_STORE
        );
    }
}
