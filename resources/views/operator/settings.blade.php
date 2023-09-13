@extends('layouts.default')

@section('title', 'Settings')

@section('content')
    <!-- ================================
    START FORM AREA
================================= -->
    <section class="listing-form pt-5 pb-5">
        <div class="container">
            <nav aria-label="breadcrumb" class="pb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('operator.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </nav>
            <form action="{{route('operator.settings_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title"><i class="la la-plane mr-2 text-gray"></i>Airports</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content contact-form-action">
                                <div class="col-lg-12">
                                    Here you can set the airports at which your operate, this information is used for internal categorization. <br><br>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <div class="form-group">
                                            <span class="la la-info form-icon"></span>
                                            <div class="form-group mb-0">
                                                <div class="select-contain w-auto">
                                                    <select name="airport_ids[]" class="select-contain-select @error('airport_ids') is-invalid @enderror" multiple required>
                                                        @foreach($airports as $airport)
                                                            <option value="{{$airport->id}}" @if(auth()->user()->airports->contains($airport->id)) selected @endif>
                                                               ({{$airport->code}}) {{$airport->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title"><i class="la la-gear mr-2 text-gray"></i>One-click acceptation</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content contact-form-action">
                                <div class="col-lg-12">
                                    Here you can set the default settings used when accepting bookings. <br><br>
                                    <div class="input-box">
                                        <label class="label-text">Meeting Point</label>
                                        <div class="form-group mb-0">
                                            <div class="select-contain w-auto">
                                                <select name="meeting_point_id" class="select-contain-select @error('meeting_point_id') is-invalid @enderror" required>
                                                    @foreach($meetingPoints as $meetingPoint)
                                                        <option value="{{$meetingPoint->id}}"
                                                                @if($meetingPoint->id == setting()->get('default_meeting_point_id')) selected @endif>
                                                            {{$meetingPoint->title}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Driver</label>
                                        <div class="form-group">
                                            <span class="la la-info form-icon"></span>
                                            <div class="form-group mb-0">
                                                <div class="select-contain w-auto">
                                                    <select name="driver_id" class="select-contain-select @error('driver_id') is-invalid @enderror" required>
                                                        @foreach($drivers as $driver)
                                                            <option value="{{$driver->id}}" @if($driver->id == setting()->get('default_driver_id')) selected @endif>
                                                                {{$driver->name}} ({{$driver->phone_number}})
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
                                        <label class="label-text">Car</label>
                                        <div class="form-group">
                                            <span class="la la-info form-icon"></span>
                                            <div class="form-group mb-0">
                                                <div class="select-contain w-auto">
                                                    <select name="car_id" class="select-contain-select @error('car_id') is-invalid @enderror" required>
                                                        @foreach($cars as $car)
                                                            <option value="{{$car->id}}" @if($car->id == setting()->get('default_car_id')) selected @endif>
                                                                {{$car->make}} {{$car->model}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                        <div class="submit-box">
                            <div class="btn-box pt-3">
                                <button type="submit" class="theme-btn @if(!empty($booking->driver_id)) theme-btn-gray @endif" @if(!empty($booking->driver_id)) disabled @endif>
                                    Accept<i class="la la-arrow-right ml-1"></i>
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
