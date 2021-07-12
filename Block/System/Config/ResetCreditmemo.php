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

namespace Magenuts\CustomOrderNumber\Block\System\Config;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magenuts\CustomOrderNumber\Helper\Data;
use Magento\Framework\Data\Form\Element\AbstractElement;

class ResetCreditmemo extends Field
{
    /**
     * Path Template
     *
     * @var string
     */
    protected $_template = 'Magenuts_CustomOrderNumber::system/config/resetcreditmemo.phtml';

    /**
     * Helper
     *
     * @var Data
     */
    protected $helper;

    /**
     * Construct
     *
     * @param Context $context
     * @param Data $helper
     * @param array $data
     */
    public function __construct(
        Context $context,
        Data $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    /**
     * Remove scope label
     *
     * @param  AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element)
    {
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();
        return parent::render($element);
    }

    /**
     * Return element html
     *
     * @param  AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        return $this->_toHtml();
    }

    /**
     * Return ajax url for collect button
     *
     * @return string
     */
    public function getAjaxUrl()
    {
        return $this->getUrl('bss_customordernumber/system_config/resetcreditmemo');
    }

    /**
     * Generate collect button html
     *
     * @return string
     */
    public function getButtonHtml()
    {
        $button = $this->getLayout()->createBlock(
            'Magento\Backend\Block\Widget\Button'
        )->setData(
            [
                'id' => 'resetnow_creditmemo',
                'label' => __('Reset Now'),
            ]
        );

        return $button->toHtml();
    }

    /**
     * Retrieve Creditmemo Enable
     *
     * @param int $storeId
     * @return bool
     */
    public function isCreditmemoEnable($storeId)
    {
        return $this->helper->isCreditmemoEnable($storeId);
    }
}
