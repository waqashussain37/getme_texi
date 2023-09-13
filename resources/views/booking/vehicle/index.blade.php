@extends('layouts.default')

@section('title', 'Booking #'. $booking->id)

@section('content')
    <section class="card-area section-bg section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="align-items-center justify-content-between pb-4">
                        <div class="row">
                            <div class="col-lg-12 responsive-column">
                                <div class="google-map" style="height: 100px;"></div>
                                <span id="pickUpLocation" style="display:none;">{{$booking->pick_up_location}}</span>
                                <span id="dropOffLocation" style="display:none;">{{$booking->drop_off_location}}</span>
                            </div>
                        </div>
                    </div><!-- end filter-wrap -->
                </div>
            </div>
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
                    <div class="row">
                        @foreach($vehicles as $vehicle)
                            @if($booking->getFareForVehicle($vehicle->id) > 0)
                            <div class="col-lg-4 responsive-column">
                                <div class="card-item car-card">
                                    <div class="card-img">
                                        <a href="{{route('booking.vehicle.select', ['id' => $booking->id, 'vehicle_id' => $vehicle->id])}}" class="d-block">
                                            <img src="/storage/{{$vehicle->image}}" alt="{{$vehicle->name}}" class="h-100">
                                        </a>
                                        <span class="badge">Best seller</span>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            <a href="{{route('booking.vehicle.select', ['id' => $booking->id, 'vehicle_id' => $vehicle->id])}}">
                                                {{$vehicle->make}} {{$vehicle->model}}
                                            </a>
                                        </h3>
                                        <p class="show-read-more">{{$vehicle->description}}</p>
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
                                        <div class="card-price d-flex align-items-center justify-content-between">
                                            <p>
                                                <span class="price__num">£{{$booking->getFareForVehicle($vehicle->id)}}</span>
                                                <span class="price__text">Price</span>
                                            </p>
                                            <a href="{{route('booking.vehicle.select', ['id' => $booking->id, 'vehicle_id' => $vehicle->id])}}" class="btn-text">
                                                Select
                                                <i class="la la-angle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div><!-- end card-item -->
                            </div><!-- end col-lg-4 -->
                            @endif
                        @endforeach
                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end card-area -->
@endsection

@section('scripts')
    <script src="{{asset('js/booking/vehicle.js')}}"></script>
@endsection
