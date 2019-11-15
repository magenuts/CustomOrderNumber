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

namespace Magenuts\CustomOrderNumber\Controller\Adminhtml\System\Config;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magenuts\CustomOrderNumber\Model\ResourceModel\Sequence;

class ResetShipment extends Action
{
    /**
     * JsonFactory
     *
     * @var JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * Sequence
     *
     * @var \Magenuts\CustomOrderNumber\Model\ResourceModel\Sequence
     */
    protected $sequence;

    /**
     * Construct
     *
     * @param Context $context
     * @param JsonFactory $resultJsonFactory
     * @param Sequence $sequence
     */
    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        Sequence $sequence
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->sequence = $sequence;
        parent::__construct($context);
    }

    /**
     * Truncate Table
     *
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute()
    {
        $entityType = 'shipment';
        $storeId = $this->getRequest()->getParam('storeId');
        if ($storeId == 1) {
            $storeId = 0;
        }
        $this->sequence->resetSequence($entityType, $storeId);
        /* @var \Magento\Framework\Controller\Result\Json $result */
        $result = $this->resultJsonFactory->create();
        
        return $result->setData(['success' => true]);
    }

    /**
     * Allowed
     *
     * @return string
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenuts_CustomOrderNumber::resetshipment');
    }
}
