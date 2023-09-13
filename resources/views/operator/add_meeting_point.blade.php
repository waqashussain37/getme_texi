@extends('layouts.default')

@section('title', 'Add Meeting Point')

@section('content')
    <!-- ================================
    START FORM AREA
================================= -->
    <section class="listing-form pt-5 pb-5">
        <div class="container">
            <nav aria-label="breadcrumb" class="pb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('operator.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('operator.meeting_points')}}">Meeting
                            Points</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </nav>
            <form action="{{route('operator.add_meeting_point_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title"><i class="la la-map-marker mr-2 text-gray"></i>Point</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content contact-form-action">
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Title</label>
                                        <div class="form-group">
                                            <span class="la la-info form-icon"></span>
                                            <input class="form-control" type="text" name="title" required>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Description</label>
                                        <div class="form-group">
                                            <span class="la la-info form-icon"></span>
                                            <textarea class="message-control form-control" id="editor" name="description" required></textarea>
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
                    <div class="col-lg-4">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title"><i class="la la-plane mr-2 text-gray"></i>Airport</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content contact-form-action">
                                    <div class="input-box">
                                        <div class="form-group mb-0">
                                            <div class="select-contain w-auto">
                                                <select name="airport_id" class="select-contain-select @error('airport_id') is-invalid @enderror" required>
                                                    @foreach($airports as $airport)
                                                        <option value="{{$airport->id}}">
                                                            ({{$airport->code}}) {{$airport->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title"><i class="la la-map mr-2 text-gray"></i>Location</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content contact-form-action">
                                <div class="input-box">
                                    <label class="label-text">Latitude</label>
                                    <div class="form-group">
                                        <span class="la la-info form-icon"></span>
                                        <input class="form-control" type="text" name="latitude" required>
                                    </div>
                                </div>
                                <div class="input-box">
                                    <label class="label-text">Longitude</label>
                                    <div class="form-group">
                                        <span class="la la-info form-icon"></span>
                                        <input class="form-control" type="text" name="longitude" required>
                                    </div>
                                </div>
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-4 -->
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
