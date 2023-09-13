const stripe = Stripe('pk_test_GgYzMGsz0evDsovUuvS4ZNZj', {
    locale: 'en-GB'
});
const elements = stripe.elements();
const style = {
    base: {
        iconColor: '#0d233e',
        color: '#0d233e',
        fontWeight: 400,
        fontFamily: 'Roboto',
        fontSize: '13px',
        height: '40px',
        invalid: {
            iconColor: '#e85746',
            color: '#e85746',
        },
        '::placeholder': {
            color: '#6c757d',
        },
    },
    classes: {
        focus: 'is-focused',
        empty: 'is-empty',
    },
};
const cardNumberElement = elements.create('cardNumber', {
    style: style
});
cardNumberElement.mount('#cardNumber');
const cardExpiryElement = elements.create('cardExpiry', {
    style: style
});
cardExpiryElement.mount('#cardExpiry');
const cardCvcElement = elements.create('cardCvc', {
    style: style
});
cardCvcElement.mount('#cardCvc');
const submitButton = document.getElementById('submitButton');
const cardHolderName = document.getElementById('cardHolderName');
submitButton.addEventListener('click', async (e) => {
    const {paymentMethod, error} = await stripe.createPaymentMethod({
        type: 'card',
        card: cardNumberElement,
        billing_details: {
            name: cardHolderName.value
        }
    });
    if (error) {
        $('#cardError').html(error.message);
        $('#cardError').show();
    } else {
        const submitButton = $('#submitButton');
        submitButton.html('Please wait...')
        const formData = new FormData(document.getElementById('bookingForm'));
        formData.append('payment_method_id', paymentMethod.id);
        $.ajax({
            type: "POST",
            url: submitButton.data('verify-url'),
            data: formData,
            processData: false,
            contentType: false,
        })
            .done(function () {
                location.reload();
            })
            .fail(function(xhr, status, error) {
                $('#cardError').html(xhr.responseJSON.message);
                $('#cardError').show();
            });
    }
});

$('.google-map')
    .gmap3({
        center: [51.509865, -0.118092],
        mapTypeId: google.maps.MapTypeId.ROADMAP
    })
    .route({
        origin: $('#pickUpLocation').text(),
        destination: $('#dropOffLocation').text(),
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    })
    .directionsrenderer(function (results) {
        if (results) {
            return {
                panel: "#box",
                directions: results
            }
        }
    })
    .then(function (map) {
        map.setZoom(15);
    });

function addExtra(bookingId, extraId) {
    $.ajax({
        type: "GET",
        url: '/booking/' + bookingId + '/add_extra/' + extraId,
    })
        .done(function (response) {
            $('#extras').html(response)
                .promise()
                .done(function () {
                    getPrices(bookingId);
                });
        })
}

function getPrices(bookingId) {
    $.ajax({
        type: "GET",
        url: '/booking/' + bookingId + '/get_prices'
    })
        .done(function (response) {
            $('#prices').html(response);
        })
}
