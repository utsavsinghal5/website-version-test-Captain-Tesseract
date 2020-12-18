(function (document, $) {
    $(document).ready(function () {
        var step = window.location.hash.substr(1);

        if (!step) {
            step = Joomla.getOptions('defaultStep');
        }

        var eventId = Joomla.getOptions('eventId');
        var Itemid = Joomla.getOptions('Itemid');

        if (step === 'group_billing') {
            $.ajax({
                url: siteUrl + 'index.php?option=com_eventbooking&view=register&layout=group_billing&event_id=' + eventId + '&Itemid=' + Itemid + '&format=raw' + langLinkForAjax,
                dataType: 'html',
                success: function (html) {
                    var $billingFormContainer = $('#eb-group-billing .eb-form-content');
                    $billingFormContainer.html(html);
                    $billingFormContainer.slideDown('slow');

                    if ($('#email').val()) {
                        $('#email').validationEngine('validate');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        } else if (step === 'group_members') {
            $.ajax({
                url: siteUrl + 'index.php?option=com_eventbooking&view=register&layout=group_members&event_id=' + eventId + '&Itemid=' + Itemid + '&format=raw' + langLinkForAjax,
                dataType: 'html',
                success: function (html) {
                    var $groupMembersFormContainer = $('#eb-group-members-information .eb-form-content');
                    $groupMembersFormContainer.html(html);
                    $groupMembersFormContainer.slideDown('slow');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        } else {
            $.ajax({
                url: siteUrl + 'index.php?option=com_eventbooking&view=register&layout=number_members&&event_id=' + eventId + '&Itemid=' + Itemid + '&format=raw' + langLinkForAjax,
                dataType: 'html',
                success: function (html) {
                    var $numberMembersFormContainer = $('#eb-number-group-members .eb-form-content');
                    $numberMembersFormContainer.html(html);
                    $numberMembersFormContainer.slideDown('slow');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    });
})(document, Eb.jQuery);