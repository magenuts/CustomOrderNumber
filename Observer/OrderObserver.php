<?php
/**
 * Magenuts Pvt Ltd.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://magenuts.com/Magenuts-Commerce-License.txt
 *
 * @category   Magenuts
 * @package    Magenuts_CustomOrderNumber
 * @author     Magenuts Extension Team
 * @copyright  Copyright (c) 2019 Magenuts Pvt Ltd. ( https://magenuts.com )
 * @license    https://magenuts.com/Magenuts-Commerce-License.txt
 */

namespace Magenuts\CustomOrderNumber\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class OrderObserver implements ObserverInterface
{
    /**
     * Helper
     *
     * @var \Magenuts\CustomOrderNumber\Helper\Data
     */
    protected $helper;

    /**
     * StoreManager Interface
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * Quote
     *
     * @var \Magento\Backend\Model\Session\Quote
     */
    protected $session;

    /**
     * Sequence
     *
     * @var \Magenuts\CustomOrderNumber\Model\ResourceModel\Sequence
     */
    protected $sequence;

    /**
     * Construct
     *
     * @param \Magenuts\CustomOrderNumber\Helper\Data $helper
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Backend\Model\Session\Quote $session
     * @param \Magento\Sales\Api\Data\OrderInterface $order 
     * @param \Magenuts\CustomOrderNumber\Model\ResourceModel\Sequence $sequence
     */
    public function __construct(
        \Magenuts\CustomOrderNumber\Helper\Data $helper,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Backend\Model\Session\Quote $session,
        \Magenuts\CustomOrderNumber\Model\ResourceModel\Sequence $sequence
    ) {
            $this->helper = $helper;
            $this->storeManager = $storeManager;
            $this->session = $session;
            $this->sequence = $sequence;
    }

    /**
     * Set Increment Id
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {   
        if ($this->helper->isOrderEnable()) {
            $storeId = $this->storeManager->getStore()->getStoreId();
            $sessionId = $this->session->getStoreId();
            if (isset($sessionId)) {
                $storeId = $sessionId;
            }
            $format = $this->helper->getOrderFormat($storeId);
            $startValue = $this->helper->getOrderStart($storeId);
            $step = $this->helper->getOrderIncrement($storeId);
            $padding = $this->helper->getOrderPadding($storeId);
            $pattern = "%0".$padding."d";
            $entityType = 'order';
            if ($this->helper->isIndividualOrderEnable($storeId)) {
                if ($storeId == 1) {
                    $table = $this->sequence->getSequenceTable($entityType, '0');
                } else {
                    $table = $this->sequence->getSequenceTable($entityType, $storeId);
                }
            } else {
                $table = $this->sequence->getSequenceTable($entityType, '0');
            }

            $counter = $this->sequence->counter($table, $startValue, $step, $pattern);
            $result = $this->sequence->replace($format, $storeId, $counter);
            $unique = $this->sequence->checkUnique($result);
            if ($unique == 0) {
                $i = 1;
                $check = $result;
                do {
                    $unique = $this->sequence->checkUnique($check);
                    if ($unique == '0') {
                        $check = $result.'-'.$i;
                        $i++;
                    }
                    if ($unique == '1') {
                        $result = $check;
                    }
                } while ($unique == '0');
            }
            $orderInstance = $observer->getOrder();
            $orderInstance->setIncrementId($result);
        }           
    }
}
