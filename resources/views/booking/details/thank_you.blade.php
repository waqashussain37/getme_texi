@extends('layouts.default')

@section('title', 'Thank You')

@section('content')
    <section class="payment-area section-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar mt-0">
                        <div class="sidebar-widget">
                            <h3 class="title stroke-shape">Booking Details</h3>
                            <div class="sidebar-widget-item">
                                <ul class="list-items list-items-2 list-items-flush py-2">
                                    <li class="font-size-15">
                                            <span class="w-auto d-block mb-n1">
                                                <i class="la la-map-marker mr-1 font-size-17"></i>Pick-up Location
                                            </span>
                                        {{$booking->pick_up_location}}
                                    </li>
                                    <li class="font-size-15">
                                            <span class="w-auto d-block mb-n1">
                                                <i class="la la-calendar mr-1 font-size-17"></i>
                                                Pick-up Date
                                            </span>
                                        {{$booking->pick_up_date}}
                                    </li>
                                    <li class="font-size-15">
                                            <span class="w-auto d-block mb-n1">
                                                <i class="la la-clock mr-1 font-size-17"></i>
                                                Pick-up Time
                                            </span>
                                        {{$booking->pick_up_time}}
                                    </li>
                                    <li class="font-size-15">
                                            <span class="w-auto d-block mb-n1">
                                                <i class="la la-map-marker mr-1 font-size-17"></i>Drop-off Location
                                            </span>
                                        {{$booking->drop_off_location}}
                                    </li>
                                    @if(!empty($booking->return_pick_up_location))
                                        <li class="font-size-15">
                                            <span class="w-auto d-block mb-n1">
                                                <i class="la la-calendar mr-1 font-size-17"></i>
                                                Return Pick-up Date
                                            </span>
                                            {{$booking->return_pick_up_date}}
                                        </li>
                                        <li class="font-size-15">
                                            <span class="w-auto d-block mb-n1">
                                                <i class="la la-clock mr-1 font-size-17"></i>
                                                Return Pick-up Time
                                            </span>
                                            {{$booking->return_pick_up_time}}
                                        </li>
                                    @endif
                                </ul>
                                <div class="section-block"></div>
                                <ul class="list-items list-items-2 list-items-flush py-2">
                                    <li class="font-size-15">
                                            <span class="w-auto d-block mb-n1">
                                               <i class="la la-user mr-1 font-size-17"></i>
                                                Passengers:
                                            </span>
                                        {{$booking->passengers}}
                                    </li>
                                    <li class="font-size-15">
                                            <span class="w-auto d-block mb-n1">
                                                <i class="la la-suitcase mr-1 font-size-17"></i>
                                                Luggage:
                                            </span>
                                        {{$booking->luggage}}
                                    </li>
                                </ul>
                            </div><!-- end sidebar-widget-item -->
                        </div><!-- end sidebar-widget -->
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="form-box payment-received-wrap mb-0">
                        <div class="form-content">
                            <div class="payment-received-list">
                                <div class="d-flex align-items-center">
                                    <i class="la la-check icon-element flex-shrink-0 mr-3 ml-0"></i>
                                    <div>
                                        <h3 class="title pb-1">Thank you, {{$booking->first_name}}!</h3>
                                    </div>
                                </div>
                                <ul class="list-items py-4">
                                    <li>
                                        Your payment for Booking #{{$booking->id}} has been proceeded successfully. <br>
                                    </li>
                                    <li>
                                        We’ll send you a confirmation email shortly.
                                    </li>
                                </ul>
                            </div><!-- end card-item -->
                        </div>
                    </div><!-- end payment-card -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
