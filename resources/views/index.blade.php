@extends('layouts.default')

@section('title', config('app.name').' - Worldwide Transfers')

@section('content')
    <!-- ================================
    START HERO-WRAPPER AREA
================================= -->
    <section class="hero-wrapper">
        <div class="hero-box hero-bg-7">
            <span class="line-bg line-bg1"></span>
            <span class="line-bg line-bg2"></span>
            <span class="line-bg line-bg3"></span>
            <span class="line-bg line-bg4"></span>
            <span class="line-bg line-bg5"></span>
            <span class="line-bg line-bg6"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto responsive--column-l">
                        <div class="hero-content pb-5 text-center">
                            <div class="section-heading">
                                <h2 class="sec__title cd-headline zoom">
                                    Worldwide Transfers
                                </h2>
                            </div>
                        </div><!-- end hero-content -->
                        <div class="row text-right">
                            <div class="col-lg-10 mb-5 font-weight-semi-bold text-white font-size-15">
                                <i class="la la-check-circle text-success"></i>
                                Price match guarantee
                                <i class="la la-check-circle text-success"></i>
                                24/7 UK based customer service
                                <i class="la la-check-circle text-success"></i>
                                100% secure payment gateway
                            </div>
                        </div>
                        <form action="{{route('booking.create')}}" method="POST">
                            @csrf
                            <div class="contact-form-action">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @if($errors->any())
                                                    <div class="alert alert-danger">
                                                        @foreach($errors->all() as $error)
                                                            {{$error}} <br>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="input-box">
                                                            <div class="form-group">
                                                                <span class="la la-map-marker form-icon"></span>
                                                                <input class="form-control google-places-autocomplete @error('pick_up_location') is-invalid @enderror" name="pick_up_location" placeholder="Pick-up" type="text" required>
                                                                <input id="pick_up_location_post_code" name="pick_up_location_post_code" type="hidden">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <div class="form-group">
                                                        <span class="la la-map-marker form-icon"></span>
                                                        <input class="form-control google-places-autocomplete @error('drop_off_location') is-invalid @enderror" name="drop_off_location" placeholder="Drop-off" type="text" required>
                                                        <input id="drop_off_location_post_code" name="drop_off_location_post_code" type="hidden">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="input-box">
                                                            <div class="form-group">
                                                                <span class="la la-calendar form-icon"></span>
                                                                <input id="daterange-single1" class="date-range form-control @error('pick_up_date') is-invalid @enderror" name="pick_up_date" type="text" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="input-box">
                                                            <div class="form-group">
                                                                <div class="select-contain w-auto">
                                                                    <select name="pick_up_time" class="select-contain-select @error('pick_up_time') is-invalid @enderror" required>
                                                                        <option value="" disabled selected>Time</option>
                                                                        <option value="12:00 AM">12:00 AM</option>
                                                                        <option value="12:30 AM">12:30 AM</option>
                                                                        <option value="1:00 AM">1:00 AM</option>
                                                                        <option value="1:30 AM">1:30 AM</option>
                                                                        <option value="2:00 AM">2:00 AM</option>
                                                                        <option value="2:30 AM">2:30 AM</option>
                                                                        <option value="3:00 AM">3:00 AM</option>
                                                                        <option value="3:30 AM">3:30 AM</option>
                                                                        <option value="4:00 AM">4:00 AM</option>
                                                                        <option value="4:30 AM">4:30 AM</option>
                                                                        <option value="5:00 AM">5:00 AM</option>
                                                                        <option value="5:30 AM">5:30 AM</option>
                                                                        <option value="6:00 AM">6:00 AM</option>
                                                                        <option value="6:30 AM">6:30 AM</option>
                                                                        <option value="7:00 AM">7:00 AM</option>
                                                                        <option value="7:30 AM">7:30 AM</option>
                                                                        <option value="8:00 AM">8:00 AM</option>
                                                                        <option value="8:30 AM">8:30 AM</option>
                                                                        <option value="9:00 AM">9:00 AM</option>
                                                                        <option value="9:30 AM">9:30 AM</option>
                                                                        <option value="10:00 AM">10:00 AM</option>
                                                                        <option value="10:30 AM">10:30 AM</option>
                                                                        <option value="11:00 AM">11:00 AM</option>
                                                                        <option value="11:30 AM">11:30 AM</option>
                                                                        <option value="12:00 PM">12:00 PM</option>
                                                                        <option value="12:30 PM">12:30 PM</option>
                                                                        <option value="1:00 PM">1:00 PM</option>
                                                                        <option value="1:30 PM">1:30 PM</option>
                                                                        <option value="2:00 PM">2:00 PM</option>
                                                                        <option value="2:30 PM">2:30 PM</option>
                                                                        <option value="3:00 PM">3:00 PM</option>
                                                                        <option value="3:30 PM">3:30 PM</option>
                                                                        <option value="4:00 PM">4:00 PM</option>
                                                                        <option value="4:30 PM">4:30 PM</option>
                                                                        <option value="5:00 PM">5:00 PM</option>
                                                                        <option value="5:30 PM">5:30 PM</option>
                                                                        <option value="6:00 PM">6:00 PM</option>
                                                                        <option value="6:30 PM">6:30 PM</option>
                                                                        <option value="7:00 PM">7:00 PM</option>
                                                                        <option value="7:30 PM">7:30 PM</option>
                                                                        <option value="8:00 PM">8:00 PM</option>
                                                                        <option value="8:30 PM">8:30 PM</option>
                                                                        <option value="9:00 PM">9:00 PM</option>
                                                                        <option value="9:30 PM">9:30 PM</option>
                                                                        <option value="10:00 PM">10:00 PM</option>
                                                                        <option value="10:30 PM">10:30 PM</option>
                                                                        <option value="11:00 PM">11:00 PM</option>
                                                                        <option value="11:30 PM">11:30 PM</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="input-box">
                                                    <div class="form-group">
                                                        <div class="select-contain w-auto">
                                                            <select name="passengers" class="select-contain-select @error('passengers') is-invalid @enderror" required>
                                                                <option value="" disabled selected>Passengers</option>
                                                                @for($i = 1; $i <= 15; $i++)
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="input-box">
                                                    <div class="form-group">
                                                        <div class="select-contain w-auto">
                                                            <select name="luggage" class="select-contain-select @error('luggage') is-invalid @enderror" required>
                                                                <option value="" disabled selected>Luggage</option>
                                                                @for($i = 1; $i <= 4; $i++)
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="input-box">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="round_trip" class="form-check-input" data-toggle="collapse" href="#collapseSix" role="button" aria-expanded="false" aria-controls="collapseSix">
                                                            <label class="form-check-label text-white font-weight-bold">Round
                                                                trip</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form-action advanced-wrap">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="collapse" id="collapseSix">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <div class="form-group">
                                                            <span class="la la-calendar form-icon"></span>
                                                            <input id="daterange-single3" class="date-range form-control @error('return_pick_up_date') is-invalid @enderror" type="text" name="return_pick_up_date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <div class="form-group">
                                                            <div class="select-contain w-auto">
                                                                <select name="return_pick_up_time" class="select-contain-select @error('return_pick_up_time') is-invalid @enderror">
                                                                    <option value="" disabled selected>Time</option>
                                                                    <option value="12:00 AM">12:00 AM</option>
                                                                    <option value="12:30 AM">12:30 AM</option>
                                                                    <option value="1:00 AM">1:00 AM</option>
                                                                    <option value="1:30 AM">1:30 AM</option>
                                                                    <option value="2:00 AM">2:00 AM</option>
                                                                    <option value="2:30 AM">2:30 AM</option>
                                                                    <option value="3:00 AM">3:00 AM</option>
                                                                    <option value="3:30 AM">3:30 AM</option>
                                                                    <option value="4:00 AM">4:00 AM</option>
                                                                    <option value="4:30 AM">4:30 AM</option>
                                                                    <option value="5:00 AM">5:00 AM</option>
                                                                    <option value="5:30 AM">5:30 AM</option>
                                                                    <option value="6:00 AM">6:00 AM</option>
                                                                    <option value="6:30 AM">6:30 AM</option>
                                                                    <option value="7:00 AM">7:00 AM</option>
                                                                    <option value="7:30 AM">7:30 AM</option>
                                                                    <option value="8:00 AM">8:00 AM</option>
                                                                    <option value="8:30 AM">8:30 AM</option>
                                                                    <option value="9:00 AM">9:00 AM</option>
                                                                    <option value="9:30 AM">9:30 AM</option>
                                                                    <option value="10:00 AM">10:00 AM</option>
                                                                    <option value="10:30 AM">10:30 AM</option>
                                                                    <option value="11:00 AM">11:00 AM</option>
                                                                    <option value="11:30 AM">11:30 AM</option>
                                                                    <option value="1200 PM">12:00 PM</option>
                                                                    <option value="12:30 PM">12:30 PM</option>
                                                                    <option value="1:00 PM">1:00 PM</option>
                                                                    <option value="1:30 PM">1:30 PM</option>
                                                                    <option value="2:00 PM">2:00 PM</option>
                                                                    <option value="2:30 PM">2:30 PM</option>
                                                                    <option value="3:00 PM">3:00 PM</option>
                                                                    <option value="3:30 PM">3:30 PM</option>
                                                                    <option value="4:00 PM">4:00 PM</option>
                                                                    <option value="4:30 PM">4:30 PM</option>
                                                                    <option value="5:00 PM">5:00 PM</option>
                                                                    <option value="5:30 PM">5:30 PM</option>
                                                                    <option value="6:00 PM">6:00 PM</option>
                                                                    <option value="6:30 PM">6:30 PM</option>
                                                                    <option value="7:00 PM">7:00 PM</option>
                                                                    <option value="7:30 PM">7:30 PM</option>
                                                                    <option value="8:00 PM">8:00 PM</option>
                                                                    <option value="8:30 PM">8:30 PM</option>
                                                                    <option value="9:00 PM">9:00 PM</option>
                                                                    <option value="9:30 PM">9:30 PM</option>
                                                                    <option value="10:00 PM">10:00 PM</option>
                                                                    <option value="10:30 PM">10:30 PM</option>
                                                                    <option value="11:00 PM">11:00 PM</option>
                                                                    <option value="11:30 PM">11:30 PM</option>
                                                                </select>
                                                            </div>
                                                        </div><!-- end col-lg-3 -->
                                                    </div><!-- end row -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-10">
                                    <div class="btn-box">
                                        <button type="submit" class="theme-btn btn-block">Book Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-10">
                                    <div class="card mt-3" style="background: #f5f7fc;">
                                        <div class="card-body">
                                            <strong>Price guarantee!</strong> You will not find a better price
                                            than GetMe.Taxi. If you do - we will instantly refund or beat that
                                            price.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center align-items-center mt-3">
                                <img src="{{asset('images/positive-ssl-logo.png')}}" height="28" width="116" class="mr-3">
                                <img src="{{asset('images/payment-img.png')}}" height="21" width="100">
                            </div>
                        </form>
                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
        <svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
            <path d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path>
        </svg>
    </section><!-- end hero-wrapper -->
    <!-- ================================
    END HERO-WRAPPER AREA
================================= -->

    <!-- ================================
    START INFO AREA
================================= -->
    <section class="info-area2 info-bg padding-top-50px padding-bottom-50px text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="icon-box">
                        <div class="info-icon">
                            <i class="la la-mobile"></i>
                        </div><!-- end info-icon-->
                        <div class="info-content">
                            <h4 class="info__title">Click</h4>
                            <p class="info__desc">
                                Schedule your transfer in advance to or from the airport, station or harbour.
                            </p>
                        </div><!-- end info-content -->
                    </div><!-- end icon-box -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4">
                    <div class="icon-box margin-top-50px">
                        <div class="info-icon">
                            <i class="la la-car"></i>
                        </div><!-- end info-icon-->
                        <div class="info-content">
                            <h4 class="info__title">Book</h4>
                            <p class="info__desc">
                                Choose your car type and other options you need for the transfer, make payment through
                                our
                                256 Bit SSL encrypted payment gateway.
                            </p>
                        </div><!-- end info-content -->
                    </div><!-- end icon-box -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4">
                    <div class="icon-box">
                        <div class="info-icon">
                            <i class="la la-globe"></i>
                        </div><!-- end info-icon-->
                        <div class="info-content">
                            <h4 class="info__title">Go</h4>
                            <p class="info__desc">
                                Complete your order and enjoy the trip!
                            </p>
                        </div><!-- end info-content -->
                    </div><!-- end icon-box -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end info-area -->
    <!-- ================================
    END INFO AREA
================================= -->

    <section class="about-area section--padding overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content pr-5">
                        <div class="section-heading">
                            <h2 class="sec__title">About Us</h2>
                            <p class="sec__desc pt-4 pb-2">
                                Here at GetMe.Taxi we are aiming to be the #1 airport transfer company on the
                                planet.<br/>
                                <br/>
                                We aim to do this by obsessive customer service practices, we constantly monitor every
                                part of the business to evaluate anything we can improve on.<br/>
                                <br/>
                                After using us for the first time we hope that this will become clear to you and you
                                will continue to enjoy our service for many years to come.<br/>
                            </p>
                        </div><!-- end section-heading -->
                    </div>
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="image-box about-img-box">
                        <img src="/images/car-img2.png" alt="about-img" class="img__item img__item-1">
                    </div>
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <!-- ================================
    START CAR AREA
================================= -->
    <section class="car-area section-bg section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="sec__title">Our Vehicles</h2>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row padding-top-50px">
                <div class="col-lg-12">
                    <div class="car-wrap">
                        <div class="car-carousel carousel-action">
                            @foreach($vehicles as $vehicle)
                                <div class="card-item car-card mb-0">
                                    <div class="card-img">
                                        <div class="d-block">
                                            <img src="/storage/{{$vehicle->image}}" alt="{{$vehicle->name}}" class="h-100">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title">{{$vehicle->make}} {{$vehicle->model}}</h3>
                                        <div class="card-attributes">
                                            <ul class="d-flex align-items-center">
                                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Passengers">
                                                    <i class="la la-users"></i><span>{{$vehicle->max_passengers}}</span>
                                                </li>
                                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Luggage">
                                                    <i class="la la-suitcase"></i><span>{{$vehicle->max_luggage}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- end card-item -->
                            @endforeach
                        </div><!-- end car-carousel -->
                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end car-area -->
    <!-- ================================
    END CAR AREA
================================= -->
    <section class="info-bg section-padding padding-top-60px">
        <div class="elfsight-app-99a3d91f-c0c5-4372-8881-060342d25656"></div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('js/google-autocomplete.js')}}"></script>
    <script src="{{asset('js/home/datepicker.js')}}"></script>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <script>
        $(document).ready(function () {
            @if(request()->has('apply_to_booking_id'))
            @if(!auth()->check())
            $('#loginPopupForm').modal('show');
            @else
                window.location = "{{route('driver.bookings.apply', request()->apply_to_booking_id)}}";
            @endif
            @endif
        });
    </script>
    {!! htmlScriptTagJsApi([
     'action' => 'home_page_form',
 ]) !!}
@endsection
