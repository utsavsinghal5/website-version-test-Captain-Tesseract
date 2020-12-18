(function (document, $) {
    $(document).ready(function(){
        $('#filter_state').addClass('input-medium').removeClass('inputbox');
    });

    Joomla.submitbutton = function(pressbutton)
    {
        Joomla.submitform( pressbutton );

        if (pressbutton == 'export')
        {
            var form = document.adminForm;
            form.task.value = '';
        }
    }
})(document, jQuery);