@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')
    <!-- ================================
    START CARD AREA
================================= -->
    <section class="card-area pt-5 pb-5">
        <div class="container">
            <nav aria-label="breadcrumb" class="pb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-4 responsive-column">
                    <div class="card mb-3">
                        <div class="card-header">
                            Bookings
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-3">Accept bookings.</p>
                            <a href="{{route('operator.bookings')}}" class="theme-btn theme-btn-small theme-btn-gray btn-block text-center">Go
                                to
                                Bookings</a>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column">
                    <div class="card mb-3">
                        <div class="card-header">
                            Cars
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-3">Manage cars.</p>
                            <a href="{{route('operator.cars')}}" class="theme-btn theme-btn-small theme-btn-gray  btn-block text-center">Go
                                to Cars</a>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column">
                    <div class="card mb-3">
                        <div class="card-header">
                            Drivers
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-3">Manage drivers.</p>
                            <a href="{{route('operator.drivers')}}" class="theme-btn theme-btn-small theme-btn-gray  btn-block text-center">Go
                                to Drivers</a>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column">
                    <div class="card mb-3">
                        <div class="card-header">
                            Settings
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-3">Configure settings and default values.</p>
                            <a href="{{route('operator.settings')}}" class="theme-btn theme-btn-small theme-btn-gray btn-block text-center">Go to
                                Settings</a>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
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
