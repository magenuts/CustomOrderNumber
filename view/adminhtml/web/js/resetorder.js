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
define([
    "jquery",
    "prototype"
], function ($) {
        var orderSpan = $('#order_span');
        var urlOrder = $('#urlOrder').text();
        var storeIdOrd = $('#storeIdOrd').text();
        $('#resetnow_order').click(function () {
            var params = {storeId: storeIdOrd};
            new Ajax.Request(urlOrder, {
                parameters:     params,
                loaderArea:     false,
                asynchronous:   true,
                onCreate: function() {
                    orderSpan.find('.success').hide();
                    orderSpan.find('.error').hide();
                    orderSpan.find('.processing').show();
                    $('#order_message').text('');
                },
                onSuccess: function(response) {
                    orderSpan.find('.processing').hide();
                    var resultText = '';
                    if (response.status > 200) {
                        resultText = 'Request Timeout';
                        orderSpan.find('.success').show();
                    } else {
                        resultText = 'Success';
                        orderSpan.find('.success').show();
                    }
                    $('#order_message').text(resultText);
                },
                onFailure: function(response) {
                    orderSpan.find('.processing').hide();               
                    var resultText = 'Not Allowed';
                    orderSpan.find('.error').show();
                    $('#order_message').text(resultText);
                }
            });
        });
});
