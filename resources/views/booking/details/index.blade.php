@extends('layouts.default')

@section('title', 'Booking #'. $booking->id)

@section('content')
    <section class="booking-area section-bg padding-top-100px padding-bottom-70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form id="bookingForm">
                        <div class="row">
                            <div class="col-lg-12 responsive-column">
                                <div class="google-map" style="height: 150px;"></div>
                                <span id="pickUpLocation" style="display:none;">{{$booking->pick_up_location}}</span>
                                <span id="dropOffLocation" style="display:none;">{{$booking->drop_off_location}}</span>
                            </div>
                        </div>
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title">Lead Passenger</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content">
                                <div class="contact-form-action">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">First Name</label>
                                                    <div class="form-group">
                                                        <span class="la la-user form-icon"></span>
                                                        <input class="form-control" type="text" name="first_name" placeholder="First name" required>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Last Name</label>
                                                    <div class="form-group">
                                                        <span class="la la-user form-icon"></span>
                                                        <input class="form-control" type="text" name="last_name" placeholder="Last name" required>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Email</label>
                                                    <div class="form-group">
                                                        <span class="la la-envelope-o form-icon"></span>
                                                        <input class="form-control" type="email" name="email" placeholder="Email" required>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Phone Number</label>
                                                    <div class="form-group">
                                                        <span class="la la-phone form-icon"></span>
                                                        <input class="form-control" type="text" name="phone_number" placeholder="Phone number" required>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Flight Number</label>
                                                    <div class="form-group">
                                                        <span class="la la-plane form-icon"></span>
                                                        <input class="form-control" type="text" name="flight_number" placeholder="Flight number" required>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                        </div>
                                    </form>
                                </div><!-- end contact-form-action -->
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                        <div id="extras">
                            @include('booking.details.partials.extras')
                        </div>
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title">Your Card Information
                                    <div class="float-right">
                                        <img src="{{asset('images/positive-ssl-logo.png')}}" height="28" width="116">
                                    </div>
                                </h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content">
                                <div class="section-tab check-mark-tab text-center pb-4">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="credit-card-tab" data-toggle="tab" href="#credit-card" role="tab" aria-controls="credit-card" aria-selected="false">
                                                <i class="la la-check icon-element"></i>
                                                <img src="/images/payment-img.png" alt="">
                                                <span class="d-block pt-2">Pay with Credit Card</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- end section-tab -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="credit-card" role="tabpanel" aria-labelledby="credit-card-tab">
                                        <div class="contact-form-action">
                                            <div class="row">
                                                <div class="col-lg-12 responsive-column">
                                                    <div id="cardError" class="alert alert-danger" role="alert" style="display: none;"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Card Holder Name</label>
                                                        <div class="form-group">
                                                            <input id="cardHolderName" class="form-control" type="text" name="text" placeholder="Card holder name" style="height: 40px" required>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Card Number</label>
                                                        <div class="form-group">
                                                            <div id="cardNumber" class="form-control"></div>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Card Expiry Date</label>
                                                        <div class="form-group">
                                                            <div id="cardExpiry" class="form-control"></div>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Card CVC</label>
                                                        <div class="form-group">
                                                            <div id="cardCvc" class="form-control"></div>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-12">
                                                    <div class="btn-box">
                                                        <button id="submitButton" class="theme-btn" type="button" data-verify-url="{{route('api.booking.verify_payment', $booking->id)}}">
                                                            Pay Now
                                                        </button>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                            </div>
                                        </div><!-- end contact-form-action -->
                                    </div><!-- end tab-pane-->
                                </div><!-- end tab-content -->
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="form-box booking-detail-form">
                        <div class="form-title-wrap">
                            <h3 class="title">Booking Details</h3>
                        </div><!-- end form-title-wrap -->
                        <div class="form-content">
                            <div class="card-item shadow-none radius-none mb-0">
                                <div class="card-img pb-4">
                                    <a href="car-single.html" class="d-block">
                                        <img src="/storage/{{$booking->vehicle->image}}" alt="car-img">
                                    </a>
                                </div>
                                <div class="card-body p-0">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3 class="card-title">{{$booking->vehicle->make}} {{$booking->vehicle->model}}</h3>
                                            <p class="card-meta">{{$booking->vehicle->description}}</p>
                                        </div>
                                        <div>
                                            <a href="{{route('booking.vehicle.index', $booking->id)}}" class="btn ml-1">
                                                <i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="section-block"></div>
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
                                    <div class="section-block"></div>
                                    <div id="prices">
                                        @include('booking.details.partials.prices')
                                    </div>
                                </div>
                            </div><!-- end card-item -->
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end booking-area -->
@endsection

@section('scripts')
    <script src="{{asset('js/booking/details.js')}}"></script>
@endsection
