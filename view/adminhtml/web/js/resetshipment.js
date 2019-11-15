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
define([
    "jquery",
    "prototype"
], function ($) {
        var shipmentSpan = $('#shipment_span');
        var urlShipment = $('#urlShipment').text();
        var storeIdShip = $('#storeIdShip').text();
        $('#resetnow_shipment').click(function () {
            var params = {storeId: storeIdShip};
            new Ajax.Request(urlShipment, {
                parameters:     params,
                loaderArea:     false,
                asynchronous:   true,
                onCreate: function() {
                    shipmentSpan.find('.success').hide();
                    shipmentSpan.find('.error').hide();
                    shipmentSpan.find('.processing').show();
                    $('#shipment_message').text('');
                },
                onSuccess: function(response) {
                    shipmentSpan.find('.processing').hide();
                    var resultText = '';
                    if (response.status > 200) {
                        resultText = 'Request Timeout';
                        shipmentSpan.find('.success').show();
                    } else {
                        resultText = 'Success';
                        shipmentSpan.find('.success').show();
                    }
                    $('#shipment_message').text(resultText);
                },
                onFailure: function(response) {
                    shipmentSpan.find('.processing').hide();          
                    var resultText = 'Not Allowed';
                    shipmentSpan.find('.error').show();
                    $('#shipment_message').text(resultText); 
                }
            });
        });
});
