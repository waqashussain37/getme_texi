@extends('layouts.default')

@section('title', 'Meeting Points')

@section('content')
    <section class="card-area pt-5 pb-5">
        <div class="container">
            <nav aria-label="breadcrumb" class="pb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('operator.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Bookings</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-12">
                    <div class="filter-wrap margin-bottom-30px">
                        <div class="filter-top d-flex align-items-center justify-content-between pb-4">
                            <div>
                                <h3 class="title font-size-30">Bookings</h3>
                            </div>
                        </div><!-- end filter-top -->
                    </div><!-- end filter-wrap -->
                    <div class="section-tab section-tab-3 pt-4 pb-5">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a href="{{route('operator.bookings')}}" class="nav-link @if(!request()->has('filter')) active @endif">
                                    Not Accepted
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?filter=applied" class="nav-link @if(request()->has('filter') && request()->filter === 'applied') active @endif">
                                    Accepted
                                </a>
                            </li>
                        </ul>
                    </div><!-- end section-tab -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">Pick-up Location</th>
                                <th scope="col" class="text-center">Pick-up Date</th>
                                <th scope="col" class="text-center">Pick-up Time</th>
                                <th scope="col" class="text-center">Drop-off Location</th>
                                <th scope="col" class="text-center">Return Pick-up Location</th>
                                <th scope="col" class="text-center">Return Pick-up Date</th>
                                <th scope="col" class="text-center">Return Pick-up Time</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td class="show-read-more text-center">{{$booking->pick_up_location}}</td>
                                    <td class="text-center">{{$booking->pick_up_date}}</td>
                                    <td class="text-center">{{$booking->pick_up_time}}</td>
                                    <td class="show-read-more text-center">{{$booking->drop_off_location}}</td>
                                    <td class="show-read-more text-center">{{$booking->return_pick_up_location ?? '-'}}</td>
                                    <td class="text-center">{{$booking->return_pick_up_date ?? '-'}}</td>
                                    <td class="text-center">{{$booking->return_pick_up_time ?? '-'}}</td>
                                    <td class="text-center">{{$booking->status}}</td>
                                    <td class="text-center">
                                        @if(!request()->has('filter'))
                                            <a href="{{route('operator.accept_booking', \Illuminate\Support\Facades\Crypt::encryptString($booking->id))}}">
                                                Accept
                                            </a>
                                        @endif
                                        <a href="{{route('operator.edit_booking', $booking->id)}}">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end card-area -->
    <!-- ================================
        END CARD AREA
    ================================= -->
@endsection
@section('scripts')
    <script src="{{asset('js/google-autocomplete.js')}}"></script>
    <script src="{{asset('js/home/datepicker.js')}}"></script>
@endsection
