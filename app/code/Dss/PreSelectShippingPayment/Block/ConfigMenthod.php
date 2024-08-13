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

namespace Dss\PreSelectShippingPayment\Block;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\View\Element\Template;
use Dss\PreSelectShippingPayment\Model\CompositeConfigProvider;
use Magento\Framework\View\Element\Template\Context;

class ConfigMenthod extends Template
{
    /**
     * Constructor
     *
     * @param Context $context
     * @param CompositeConfigProvider $shippingPayment
     * @param array $data
     */
    public function __construct(
        Context $context,
        protected CompositeConfigProvider $shippingPayment,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Get shipping default
     *
     * @return mixed|string
     */
    public function getShippingDefault()
    {
        $isEnabledShipping =  $this->_scopeConfig->isSetFlag(
            'preselectshippingpayment/shipping/enable',
            ScopeInterface::SCOPE_STORE
        );
        if (!$isEnabledShipping) {
            return '';
        }
        return $this->shippingPayment->getShipingConfig('default');
    }

    /**
     * Get payment default
     *
     * @return mixed|string
     */
    public function getPaymentDefault()
    {
        $isEnabledPayment =  $this->_scopeConfig->isSetFlag(
            'preselectshippingpayment/payment/enable',
            ScopeInterface::SCOPE_STORE
        );
        if (!$isEnabledPayment) {
            return '';
        }
        return $this->shippingPayment->getPaymentConfig('default');
    }

    /**
     * Get payment position
     *
     * @return mixed|string
     */
    public function getPaymentPosition()
    {
        $isEnabledPayment =  $this->_scopeConfig->isSetFlag(
            'preselectshippingpayment/payment/enable',
            ScopeInterface::SCOPE_STORE
        );
        if (!$isEnabledPayment) {
            return '';
        }
        return $this->shippingPayment->getPaymentConfig('position');
    }

    /**
     * Get shipping position
     *
     * @return mixed|string
     */
    public function getShippingPosition()
    {
        $isEnabledPayment =  $this->_scopeConfig->isSetFlag(
            'preselectshippingpayment/shipping/enable',
            ScopeInterface::SCOPE_STORE
        );
        if (!$isEnabledPayment) {
            return '';
        }
        return $this->shippingPayment->getShipingConfig('position');
    }
}
