@extends('layouts.default')

@section('title', 'Add Car')

@section('content')
    <!-- ================================
    START FORM AREA
================================= -->
    <section class="listing-form pt-5 pb-5">
        <div class="container">
            <nav aria-label="breadcrumb" class="pb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('operator.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('operator.cars')}}">Cars</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </nav>
            <form action="{{route('operator.add_car_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title"><i class="la la-gear mr-2 text-gray"></i>Information</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content contact-form-action">
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Type</label>
                                        <div class="form-group mb-0">
                                            <div class="select-contain w-auto">
                                                <select name="type" class="select-contain-select @error('type') is-invalid @enderror" required>
                                                    @foreach($types as $key => $value)
                                                        <option value="{{$key}}">
                                                            {{$value}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Make</label>
                                        <div class="form-group">
                                            <span class="la la-info form-icon"></span>
                                            <div class="form-group mb-0">
                                                <div class="select-contain w-auto" >
                                                    <select name="make" class="select-contain-select @error('make') is-invalid @enderror" required>
                                                        @foreach($makes as $make)
                                                            <option value="{{$make->name}}">
                                                                {{\Illuminate\Support\Str::title($make->name)}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Model</label>
                                        <div class="form-group">
                                            <span class="la la-info form-icon"></span>
                                            <input class="form-control" type="text" name="model" required>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">License plate</label>
                                        <div class="form-group">
                                            <span class="la la-info form-icon"></span>
                                            <input class="form-control" type="text" name="license_plate" required>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Max passengers</label>
                                        <div class="form-group">
                                            <span class="la la-info form-icon"></span>
                                            <input class="form-control" type="number" name="max_passengers" required>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Max luggage</label>
                                        <div class="form-group">
                                            <span class="la la-info form-icon"></span>
                                            <input class="form-control" type="number" name="max_luggage" required>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                        <div class="submit-box">
                            <div class="btn-box pt-3">
                                <button type="submit" class="theme-btn">Add<i class="la la-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </div><!-- end submit-box -->
                    </div><!-- end col-lg-8 -->
                </div><!-- end row -->
            </form>
        </div><!-- end container -->
    </section><!-- end listing-form -->
    <!-- ================================
        END FORM AREA
    ================================= -->
@endsection
@section('scripts')
    <script src="{{asset('js/google-autocomplete.js')}}"></script>
    <script src="{{asset('js/home/datepicker.js')}}"></script>
@endsection
