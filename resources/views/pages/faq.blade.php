@extends('layouts.default')

@section('title', 'FAQ')

@section('content')
    <section class="faq-area section-bg padding-top-100px padding-bottom-60px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="sec__title">Frequently Asked Questions</h2>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row padding-top-60px">
                <div class="col-lg-12">
                    <div class="form-box">
                    <div class="faq-item">
                        <ul class="toggle-menu list-items list-items-flush pt-4 pl-4 pr-4">
                            <li>
                                <a href="#" class="toggle-menu-icon d-flex justify-content-between align-items-center">
                                    <b>How do I cancel my booking?</b>
                                    <i class="la la-angle-down"></i>
                                </a>
                                <ul class="toggle-drop-menu pt-2">
                                    <li class="line-height-26">
                                        Any cancellation of the contract must be made in writing by email or phone
                                        addressed to our Customer Service Centre.
                                        <br>
                                        Refunds will be paid within 30 days. <br>
                                        If the Client or Driver makes a complaint that includes a refund on a booking
                                        Getme.Taxi will start an investigation and search for information on both sides.
                                        This will give 48 hours to both parts to reply with an explanation.
                                        <br>
                                        If Getme.Taxi receives your cancellation request more than 48 hours before the
                                        scheduled pickup time of the transfer you wish to cancel, the total amount paid
                                        for this transfer will be refunded.
                                        <br>
                                        Your payment will not be refunded for cancellations received less than 24 hours
                                        from the scheduled time of the transfer you wish to cancel.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="toggle-menu-icon d-flex justify-content-between align-items-center">
                                    <b>What happens if my incoming flight is delayed?</b>
                                    <i class="la la-angle-down"></i>
                                </a>
                                <ul class="toggle-drop-menu pt-2">
                                    <li class="line-height-26">
                                        All flights are monitored. You do not need to contact the supplier if your
                                        flight is delayed as they will automatically amend your pick-up time
                                        accordingly.
                                        <br>
                                        If your outward flight is cancelled, please call the supplier on the telephone
                                        number shown on the booking voucher. The supplier will do their best to
                                        accommodate.
                                        <br>
                                        If you are travelling on a connecting flight, and the first sector is delayed or
                                        cancelled, subsequently causing a delay to your arrival in your destination
                                        where the transfer is booked, then you will, in all cases, need to advise
                                        Getme.Taxi of your new details. This is to ensure that the supplier is informed
                                        and able to reschedule your transport.
                                        <br>
                                        In some destinations, night charges may be applicable. Should your new arrival
                                        time fall within the period wherein night charges apply, then you will be liable
                                        for payment of these. Failure to advise of cancelled and rescheduled flights may
                                        result in transport being provided as per the original details on the booking.
                                        In this instance, the supplier cannot be held responsible, and no refund will be
                                        given.
                                        <br>
                                        Please note: In some cases, you may need to make a new booking and submit a
                                        complaint to your airline company / and or travel insurance company.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="toggle-menu-icon d-flex justify-content-between align-items-center">
                                    <b>How much luggage can we take?</b>
                                    <i class="la la-angle-down"></i>
                                </a>
                                <ul class="toggle-drop-menu pt-2">
                                    <li class="line-height-26">
                                        The allowance per person is one standard size suitcase (approximately 70cm high,
                                        47cm wide and 21cm deep), as well as one small piece of hand luggage (such as
                                        rucksack, handbag or tote bag not a small carry on suitcase).
                                        <br>
                                        Please note that
                                        your hand luggage will be transported in the vehicle with you, and so it should
                                        be an appropriate size for this as suggested above.
                                        <br>
                                        If you are travelling with excess luggage, such as large suitcases, additional
                                        suitcases outside of the luggage allowance, golf clubs, wheelchairs, skis,
                                        pushchairs, etc., it is imperative at the time of booking to make us aware
                                        either by telephone if you are traveling within 3 days or Email us at
                                        info@getme.taxi if you are traveling outside of 3 days.
                                        Failure to tell us may result in extra transport being required to
                                        accommodate the excess luggage, which will incur additional local charges.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="toggle-menu-icon d-flex justify-content-between align-items-center">
                                    <b>Am I insured ?</b>
                                    <i class="la la-angle-down"></i>
                                </a>
                                <ul class="toggle-drop-menu pt-2">
                                    <li class="line-height-26">
                                        All suppliers hold full public liability insurance. We do, however, recommend
                                        that you hold a valid travel insurance policy for the duration of your trip.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="toggle-menu-icon d-flex justify-content-between align-items-center">
                                    <b>Can we eat and drink in the vehicle?</b>
                                    <i class="la la-angle-down"></i>
                                </a>
                                <ul class="toggle-drop-menu pt-2">
                                    <li class="line-height-26">
                                        This comes down to the discretion of the driver and what circumstances are
                                        involved but mostly as a rule food and drink is not allowed.
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- end faq-item -->
                    </div>
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end faq-area -->
@endsection
