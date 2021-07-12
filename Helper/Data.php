<?php
/**
 * Magenuts Pvt Ltd.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://magenuts.com/Magenuts-IT-Solutions-License.txt
 *
 * @category   Magenuts
 * @package    Magenuts_CustomOrderNumber
 * @author     Magenuts Ijaz Ali & Magenuts Extension Team
 * @copyright  Copyright (c) 2018-2020 Magenuts IT Solutions Pvt Ltd. ( https://magenuts.com )
 * @license    https://magenuts.com/Magenuts-IT-Solutions-License.txt
 */

namespace Magenuts\CustomOrderNumber\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Construct
     *
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Get timezone
     *
     * @param int $storeId
     * @return string
     */
    public function timezone($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'general/locale/timezone',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Retrieve Module Enable
     *
     * @param int $storeId
     * @return bool
     */
    public function isOrderEnable($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            'ordernumber/order/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Order Format
     *
     * @param int $storeId
     * @return string
     */
    public function getOrderFormat($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/order/format',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Order Format
     *
     * @param int $storeId
     * @return int
     */
    public function getOrderStart($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/order/start',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Order Increment
     *
     * @param int $storeId
     * @return int
     */
    public function getOrderIncrement($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/order/increment',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Order Padding
     *
     * @param int $storeId
     * @return int
     */
    public function getOrderPadding($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/order/padding',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Order Reset
     *
     * @param int $storeId
     * @return int
     */
    public function getOrderReset($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/order/reset',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId 
        );
    }

    /**
     * Retrieve Individual Order Enable
     *
     * @param int $storeId
     * @return bool
     */
    public function isIndividualOrderEnable($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            'ordernumber/order/individual',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Retrieve Invoice Enable
     *
     * @param int $storeId
     * @return bool
     */
    public function isInvoiceEnable($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            'ordernumber/invoice/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Retrieve Invoice Same Order
     *
     * @param int $storeId
     * @return bool
     */
    public function isInvoiceSameOrder($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            'ordernumber/invoice/same_order',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Invoice Format
     *
     * @param int $storeId
     * @return string
     */
    public function getInvoiceFormat($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/invoice/format',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Invoice Start
     *
     * @param int $storeId
     * @return int
     */
    public function getInvoiceStart($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/invoice/start',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Invoice Increment
     *
     * @param int $storeId
     * @return int
     */
    public function getInvoiceIncrement($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/invoice/increment',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Invoice Padding
     *
     * @param int $storeId
     * @return int
     */
    public function getInvoicePadding($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/invoice/padding',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Retrieve Individual Invoice Enable
     *
     * @param int $storeId
     * @return bool
     */
    public function isIndividualInvoiceEnable($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            'ordernumber/invoice/individual',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Invoice Reset
     *
     * @param int $storeId
     * @return int
     */
    public function getInvoiceReset($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/invoice/reset',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Invoice Replace
     *
     * @param int $storeId
     * @return string
     */
    public function getInvoiceReplace($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/invoice/replace',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Invoice Replace With
     *
     * @param int $storeId
     * @return string
     */
    public function getInvoiceReplaceWith($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/invoice/replace_with',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Retrieve Shipment Enable
     *
     * @param int $storeId
     * @return bool
     */
    public function isShipmentEnable($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            'ordernumber/shipment/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Retrieve Shipment SameOrder
     *
     * @param int $storeId
     * @return bool
     */
    public function isShipmentSameOrder($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            'ordernumber/shipment/same_order',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Shipment Format
     *
     * @param int $storeId
     * @return string
     */
    public function getShipmentFormat($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/shipment/format',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Shipment Start
     *
     * @param int $storeId
     * @return int
     */
    public function getShipmentStart($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/shipment/start',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Shipment Increment
     *
     * @param int $storeId
     * @return int
     */
    public function getShipmentIncrement($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/shipment/increment',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Shipment Padding
     *
     * @param int $storeId
     * @return int
     */
    public function getShipmentPadding($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/shipment/padding',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Retrieve Individual Shipment Enable
     *
     * @param int $storeId
     * @return bool
     */
    public function isIndividualShipmentEnable($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            'ordernumber/shipment/individual',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Shipment Reset
     *
     * @param int $storeId
     * @return int
     */
    public function getShipmentReset($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/shipment/reset',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Shipment Replace
     *
     * @param int $storeId
     * @return string
     */
    public function getShipmentReplace($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/shipment/replace',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Shipment Replace With
     *
     * @param int $storeId
     * @return string
     */
    public function getShipmentReplaceWith($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/shipment/replace_with',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Retrieve Creditmemo Enable
     *
     * @param int $storeId
     * @return bool
     */
    public function isCreditmemoEnable($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            'ordernumber/creditmemo/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Retrieve Creditmemo Same Order
     *
     * @param int $storeId
     * @return bool
     */
    public function isCreditmemoSameOrder($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            'ordernumber/creditmemo/same_order',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Creditmemo Format
     *
     * @param int $storeId
     * @return string
     */
    public function getCreditmemoFormat($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/creditmemo/format',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Creditmemo Start
     *
     * @param int $storeId
     * @return int
     */
    public function getCreditmemoStart($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/creditmemo/start',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Creditmemo Increment
     *
     * @param int $storeId
     * @return int
     */
    public function getCreditmemoIncrement($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/creditmemo/increment',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get Creditmemo Padding
     *
     * @param int $storeId
     * @return int
     */
    public function getCreditmemoPadding($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/creditmemo/padding',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Retrieve Individual Creditmemo Enable
     *
     * @param int $storeId
     * @return bool
     */
    public function isIndividualCreditmemoEnable($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            'ordernumber/creditmemo/individual',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Retrieve Creditmemo Reset
     *
     * @param int $storeId
     * @return int
     */
    public function getCreditmemoReset($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/creditmemo/reset',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Retrieve Creditmemo Replace
     *
     * @param int $storeId
     * @return string
     */
    public function getCreditmemoReplace($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/creditmemo/replace',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Retrieve Creditmemo Replace With
     *
     * @param int $storeId
     * @return string
     */
    public function getCreditmemoReplaceWith($storeId = null)
    {
        return $this->scopeConfig->getValue(
            'ordernumber/creditmemo/replace_with',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId
        );
    }
}
