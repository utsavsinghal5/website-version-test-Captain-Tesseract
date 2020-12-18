(function (document, $) {
    Joomla.submitbutton = function (pressbutton) {
        var form = document.adminForm;
        if (pressbutton === 'cancel') {
            Joomla.submitform(pressbutton);
        } else {
            //Should validate the information here
            if (form.name.value === '') {
                alert(Joomla.JText._('EB_ENTER_LOCATION_NAME'));
                form.name.focus();
                return;
            }
            Joomla.submitform(pressbutton);
        }
    };



    $(document).ready(function () {
        var centerCoordinates = Joomla.getOptions('coordinates');
        var zoomLevel = Joomla.getOptions('zoomLevel');
        var baseUri = Joomla.getOptions('baseUri');

        var mymap = L.map('map-canvas', {
            center: [centerCoordinates[0], centerCoordinates[1]],
            zoom: zoomLevel,
            zoomControl: true,
            attributionControl: false,
            scrollWheelZoom: false
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            id: 'mapbox.streets',
        }).addTo(mymap);

        var marker = L.marker([centerCoordinates[0], centerCoordinates[1]], {draggable: false}).addTo(mymap);

        $('#address').autocomplete({
            serviceUrl: baseUri + '/index.php?option=com_eventbooking&task=location.search',
            minChars: 3,
            onSelect: function (suggestion) {
                var form = document.adminForm;

                if (suggestion.name && form.name.value === '') {
                    form.name.value = suggestion.name;
                }

                if (suggestion.coordinates) {
                    form.coordinates.value = suggestion.coordinates;
                }

                if (suggestion.city) {
                    $('#city').val(suggestion.city);
                }

                if (suggestion.state) {
                    $('#state').val(suggestion.state);
                }

                var newPosition = L.latLng(suggestion.lat, suggestion.long);

                marker.setLatLng(newPosition);
                mymap.panTo(newPosition);
            }
        });


        $('#btn-save-location').on('click', function () {
            Joomla.submitbutton('save');
        });

        $('#btn-cancel').on('click', function () {
            Joomla.submitbutton('cancel');
        });

        $('#btn-delete-location').on('click', function () {
            if (confirm(Joomla.JText._('EB_DELETE_LOCATION_CONFIRM'))) {
                Joomla.submitform('delete');
            }
        });

    });

})(document, jQuery);