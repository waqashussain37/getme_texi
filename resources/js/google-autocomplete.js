const autocompletes = document.getElementsByClassName('google-places-autocomplete');

Array.from(autocompletes)
    .forEach(input => {
        let autocomplete = new google.maps.places.Autocomplete(
            input,
            {
                fields: ["address_components", "geometry"],
                types: ["geocode"],
                // componentRestrictions: {country: 'uk'}
            }
        );
        autocomplete.addListener("place_changed", fillInAddress);

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            const place = autocomplete.getPlace();
            const codeField = document.querySelector('#' + input.name + '_post_code');
            let postcode = "";

            // Get each component of the address from the place details,
            // and then fill-in the corresponding field on the form.
            // place.address_components are google.maps.GeocoderAddressComponent objects
            // which are documented at http://goo.gle/3l5i5Mr
            for (const component of place.address_components) {
                const componentType = component.types[0];
                switch (componentType) {
                    case "postal_code": {
                        postcode = `${component.long_name}${postcode}`;
                        break;
                    }
                    case "postal_code_prefix": {
                        postcode = `${component.long_name}${postcode}`;
                        break;
                    }
                    case "postal_code_suffix": {
                        postcode = `${component.long_name}${postcode}`;
                        break;
                    }
                }
                codeField.value = postcode;
            }
        }
    });
