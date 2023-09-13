@extends('layouts.default')

@section('title', 'Settings')

@section('content')
    <section class="listing-form section-bg section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="listing-header pb-4">
                        <h3 class="title font-size-28 pb-2">Settings</h3>
                    </div>
                    @if (\Session::has('message'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('message') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{route('driver.updateSettings')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title"><i class="la la-user mr-2 text-gray"></i>Profile</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content contact-form-action">
                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Name</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control @error('user.name') is-invalid @enderror" type="text" name="user[name]" placeholder="Name" value="{{auth()->user()->name}}">
                                                @error('user.name')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Email</label>
                                            <div class="form-group">
                                                <span class="la la-envelope-o form-icon"></span>
                                                <input class="form-control @error('user.email') is-invalid @enderror" type="email" name="user[email]" placeholder="Email" value="{{auth()->user()->email}}">
                                                @error('user.email')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Phone Number</label>
                                            <div class="form-group">
                                                <span class="la la-phone form-icon"></span>
                                                <input class="form-control @error('user.phone_number') is-invalid @enderror" type="text" name="user[phone_number]" placeholder="Phone number" value="{{auth()->user()->phone_number}}">
                                                @error('user.phone_number')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <label class="label-text">Driver License</label>
                                        <div class="form-group">
                                            @if(!empty(auth()->user()->driver_license))
                                                <p class="text-success">Uploaded.</p>
                                            @else
                                                <p class="text-danger">Not uploded.</p>
                                            @endif
                                            <input class="@error('user.driver_license') is-invalid @enderror" type="file" name="user[driver_license]">
                                            @error('user.driver_license')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                </div>
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                        {{--                        <div class="form-box">--}}
                        {{--                            <div class="form-title-wrap">--}}
                        {{--                                <h3 class="title"><i class="la la-car mr-2 text-gray"></i>Vehicle</h3>--}}
                        {{--                            </div><!-- form-title-wrap -->--}}
                        {{--                            <div class="form-content contact-form-action">--}}
                        {{--                                <div class="row">--}}
                        {{--                                    <div class="col-lg-6 responsive-column">--}}
                        {{--                                        <div class="input-box">--}}
                        {{--                                            <label class="label-text">Image</label>--}}
                        {{--                                            <div class="form-group">--}}
                        {{--                                                <input type="file" name="vehicle[image]">--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div><!-- end col-lg-6 -->--}}
                        {{--                                    <div class="col-lg-6 responsive-column">--}}
                        {{--                                        <div class="input-box">--}}
                        {{--                                            <label class="label-text">Name</label>--}}
                        {{--                                            <div class="form-group">--}}
                        {{--                                                <span class="la la-car form-icon"></span>--}}
                        {{--                                                <input class="form-control @error('vehicle.name') is-invalid @enderror" type="text" name="vehicle[name]" placeholder="Name" @if(!empty($vehicle)) value="{{$vehicle->name}}" @endif>--}}
                        {{--                                                @error('vehicle.name')--}}
                        {{--                                                <div class="invalid-feedback">--}}
                        {{--                                                    {{$message}}--}}
                        {{--                                                </div>--}}
                        {{--                                                @enderror--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div><!-- end col-lg-6 -->--}}
                        {{--                                    <div class="col-lg-6 responsive-column">--}}
                        {{--                                        <div class="input-box">--}}
                        {{--                                            <label class="label-text">Price Per Mile (0-10)</label>--}}
                        {{--                                            <div class="form-group">--}}
                        {{--                                                <span class="la la-pound-sign form-icon"></span>--}}
                        {{--                                                <input class="form-control @error('vehicle.price_per_mile') is-invalid @enderror" type="text" name="vehicle[price_per_mile]" @if(!empty($vehicle)) value="{{round($vehicle->price_per_mile,2)}}" @endif>--}}
                        {{--                                                @error('vehicle.price_per_mile')--}}
                        {{--                                                <div class="invalid-feedback">--}}
                        {{--                                                    {{$message}}--}}
                        {{--                                                </div>--}}
                        {{--                                                @enderror--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div><!-- end col-lg-6 -->--}}
                        {{--                                    <div class="col-lg-6 responsive-column">--}}
                        {{--                                        <div class="input-box">--}}
                        {{--                                            <label class="label-text">Price Per Mile (10-20)</label>--}}
                        {{--                                            <div class="form-group">--}}
                        {{--                                                <span class="la la-pound-sign form-icon"></span>--}}
                        {{--                                                <input class="form-control @error('vehicle.price_per_mile_10_plus') is-invalid @enderror" type="text" name="vehicle[price_per_mile_10_plus]" @if(!empty($vehicle)) value="{{round($vehicle->price_per_mile_10_plus, 2)}}" @endif>--}}
                        {{--                                                @error('vehicle.price_per_mile_10_plus')--}}
                        {{--                                                <div class="invalid-feedback">--}}
                        {{--                                                    {{$message}}--}}
                        {{--                                                </div>--}}
                        {{--                                                @enderror--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div><!-- end col-lg-6 -->--}}
                        {{--                                    <div class="col-lg-6 responsive-column">--}}
                        {{--                                        <div class="input-box">--}}
                        {{--                                            <label class="label-text">Price Per Mile (20+)</label>--}}
                        {{--                                            <div class="form-group">--}}
                        {{--                                                <span class="la la-pound-sign form-icon"></span>--}}
                        {{--                                                <input class="form-control @error('vehicle.price_per_mile_20_plus') is-invalid @enderror" type="text" name="vehicle[price_per_mile_20_plus]" @if(!empty($vehicle)) value="{{round($vehicle->price_per_mile_20_plus,2)}}" @endif>--}}
                        {{--                                                @error('vehicle.price_per_mile_20_plus')--}}
                        {{--                                                <div class="invalid-feedback">--}}
                        {{--                                                    {{$message}}--}}
                        {{--                                                </div>--}}
                        {{--                                                @enderror--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div><!-- end col-lg-6 -->--}}
                        {{--                                    <div class="col-lg-6 responsive-column">--}}
                        {{--                                        <div class="input-box">--}}
                        {{--                                            <label class="label-text">Passengers</label>--}}
                        {{--                                            <div class="form-group">--}}
                        {{--                                                <span class="la la-user form-icon"></span>--}}
                        {{--                                                <input class="form-control @error('vehicle.passengers') is-invalid @enderror" type="text" name="vehicle[passengers]" placeholder="Passengers" @if(!empty($vehicle)) value="{{$vehicle->max_passengers}}" @endif>--}}
                        {{--                                                @error('vehicle.passengers')--}}
                        {{--                                                <div class="invalid-feedback">--}}
                        {{--                                                    {{$message}}--}}
                        {{--                                                </div>--}}
                        {{--                                                @enderror--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div><!-- end col-lg-12 -->--}}
                        {{--                                    <div class="col-lg-6 responsive-column">--}}
                        {{--                                        <div class="input-box">--}}
                        {{--                                            <label class="label-text">Luggage</label>--}}
                        {{--                                            <div class="form-group">--}}
                        {{--                                                <span class="la la-briefcase form-icon"></span>--}}
                        {{--                                                <input class="form-control @error('vehicle.luggage') is-invalid @enderror" type="text" name="vehicle[luggage]" placeholder="Luggage" @if(!empty($vehicle)) value="{{$vehicle->max_luggage}}" @endif>--}}
                        {{--                                                @error('vehicle.luggage')--}}
                        {{--                                                <div class="invalid-feedback">--}}
                        {{--                                                    {{$message}}--}}
                        {{--                                                </div>--}}
                        {{--                                                @enderror--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div><!-- end col-lg-12 -->--}}
                        {{--                                    <div class="col-lg-12 responsive-column">--}}
                        {{--                                        <div class="input-box">--}}
                        {{--                                            <label class="label-text">Description</label>--}}
                        {{--                                            <div class="form-group">--}}
                        {{--                                                <span class="la la-pen form-icon"></span>--}}
                        {{--                                                <textarea class="form-control @error('vehicle.description') is-invalid @enderror" name="vehicle[description]" placeholder="Description">@if(!empty($vehicle)){{$vehicle->description}} @endif </textarea>--}}
                        {{--                                                @error('vehicle.description')--}}
                        {{--                                                <div class="invalid-feedback">--}}
                        {{--                                                    {{$message}}--}}
                        {{--                                                </div>--}}
                        {{--                                                @enderror--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div><!-- end col-lg-6 -->--}}
                        {{--                                </div>--}}
                        {{--                            </div><!-- end form-content -->--}}
                        {{--                        </div><!-- end form-box -->--}}
                        <div class="submit-box">
                            <div class="btn-box">
                                <button type="submit" class="theme-btn">
                                    Submit
                                    <i class="la la-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </div><!-- end submit-box -->
                    </form>
                </div><!-- end col-lg-9 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
