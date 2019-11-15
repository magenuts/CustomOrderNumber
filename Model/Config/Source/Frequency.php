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

namespace Magenuts\CustomOrderNumber\Model\Config\Source;

class Frequency implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @const Frequency
     */
    const CRON_NEVER = '0';
    const CRON_DAILY = '1';
    const CRON_WEEKLY = '2';
    const CRON_MONTHLY = '3';
    const CRON_YEARLY = '4';

    /**
     * Return array of options as value-label pairs, eg. value => label
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::CRON_NEVER, 'label' => __('Never')],
            ['value' => self::CRON_DAILY, 'label' => __('By Day')],
            ['value' => self::CRON_WEEKLY, 'label' => __('By Week')],
            ['value' => self::CRON_MONTHLY, 'label' => __('By Month')],
            ['value' => self::CRON_YEARLY, 'label' => __('By Year')],
        ];
    }
}
