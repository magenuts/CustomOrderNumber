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
        var creditmemoSpan = $('#creditmemo_span');
        var urlCreditmemo = $('#urlCreditmemo').text();
        var storeIdCre = $("#storeIdCre").text();
        $('#resetnow_creditmemo').click(function () {
            var params = {storeId: storeIdCre};
            new Ajax.Request(urlCreditmemo, {
                parameters:     params,
                loaderArea:     false,
                asynchronous:   true,
                onCreate: function() {
                    creditmemoSpan.find('.success').hide();
                    creditmemoSpan.find('.error').hide();
                    creditmemoSpan.find('.processing').show();
                    $('#creditmemo_message').text('');
                },
                onSuccess: function(response) {
                    creditmemoSpan.find('.processing').hide();
                    var resultText = '';
                    if (response.status > 200) {
                        resultText = 'Request Timeout';
                        creditmemoSpan.find('.success').show();
                    } else {
                        resultText = 'Success';
                        creditmemoSpan.find('.success').show();
                    }
                    $('#creditmemo_message').text(resultText);
                },
                onFailure: function(response) {
                    creditmemoSpan.find('.processing').hide();
                    var resultText = 'Not Allowed';
                    creditmemoSpan.find('.error').show();
                    $('#creditmemo_message').text(resultText);
                }
            });
        });
});
