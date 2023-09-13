@extends('layouts.default')

@section('title', 'Cars')

@section('content')
    <section class="card-area pt-5 pb-5">
        <div class="container">
            <nav aria-label="breadcrumb" class="pb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('operator.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cars</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-12">
                    <div class="filter-wrap margin-bottom-30px">
                        <div class="filter-top d-flex align-items-center justify-content-between pb-4">
                            <div>
                                <h3 class="title font-size-30">Cars</h3>
                            </div>
                            <a href="{{route('operator.add_car')}}" data-toggle="tooltip" data-placement="top" title="Add Car" class="theme-btn theme-btn-small">
                                <i class="la la-plus la-2x p-1" style="vertical-align: middle;"></i>
                            </a>
                        </div><!-- end filter-top -->
                    </div><!-- end filter-wrap -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">Type</th>
                            <th scope="col" class="text-center">Brand</th>
                            <th scope="col" class="text-center">Model</th>
                            <th scope="col" class="text-center">License plate</th>
                            <th scope="col" class="text-center">Max passengers</th>
                            <th scope="col" class="text-center">Image</th>
                            <th scope="col" class="text-center">Bookings</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <td class="text-center">{{config('car_types.'.$car->type)}}</td>
                                <td class="text-center">{{$car->make}}</td>
                                <td class="text-center">{{$car->model}}</td>
                                <td class="text-center">{{$car->license_plate}}</td>
                                <td class="text-center">{{$car->max_passengers}}</td>
                                <td class="text-center">
                                    @if(isset($car->image))
                                        <a href="{{asset('storage/'.$car->image)}}" target="_blank"> View </a>
                                    @endif
                                </td>
                                <td class="text-center">{{$car->bookings_count}}</td>
                                <td class="text-center">
                                    <a href="{{route('operator.edit_car', $car->id)}}">
                                        <i class="la la-pencil text-primary mr-1"></i>
                                    </a>
                                    <a href="{{route('operator.delete_car', $car->id)}}">
                                        <i class="la la-trash text-danger ml-1"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
