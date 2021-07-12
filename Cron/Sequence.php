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

namespace Magenuts\CustomOrderNumber\Cron;

use Magenuts\CustomOrderNumber\Model\Config\Source\Frequency;

class Sequence 
{
    /**
     * Sequence
     *
     * @var Sequence
     */
    protected $sequence;

    /**
     * StoreManagerInterface
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * Construct
     *
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magenuts\CustomOrderNumber\Model\ResourceModel\Sequence $sequence
     */
    public function __construct (
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magenuts\CustomOrderNumber\Model\ResourceModel\Sequence $sequence
    ) {
        $this->storeManager = $storeManager;
        $this->sequence = $sequence;
    }

    /**
     * Cron Daily
     *
     * @return $this
     */
    public function cronDaily() 
    {
        $stores = $this->storeManager->getStores();
        foreach ($stores as $store) {
            $storeId = $store->getStoreId();
            $this->sequence->setCron($storeId, Frequency::CRON_DAILY);
        }
        return $this;
    }

    /**
     * Cron Weekly
     *
     * @return $this
     */
    public function cronWeekly() 
    {
        $stores = $this->storeManager->getStores();
        foreach ($stores as $store) {
            $storeId = $store->getStoreId();
            $this->sequence->setCron($storeId, Frequency::CRON_WEEKLY);
        }
        return $this;
    }

    /**
     * Cron Monthly
     *
     * @return $this
     */
    public function cronMonthly() 
    {
        $stores = $this->storeManager->getStores();
        foreach ($stores as $store) {
            $storeId = $store->getStoreId();
            $this->sequence->setCron($storeId, Frequency::CRON_MONTHLY);
        }
        return $this;
    }

    /**
     * Cron Yearly
     *
     * @return $this
     */
    public function cronYearly() 
    {
        $stores = $this->storeManager->getStores();
        foreach ($stores as $store) {
            $storeId = $store->getStoreId();
            $this->sequence->setCron($storeId, Frequency::CRON_YEARLY);
        }
        return $this;
    }
}
