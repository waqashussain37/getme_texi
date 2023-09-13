@extends('layouts.default')

@section('title', 'Price Import')

@section('content')
    <!-- ================================
    START FORM AREA
================================= -->
    <section class="listing-form pt-5 pb-5">
        <div class="container">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! $error !!}</li>
                    </ul>
                </div>
            @endforeach
            <form action="{{route('operator.price_import_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title"><i class="la la-gear mr-2 text-gray"></i>Details</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content contact-form-action">
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Operator</label>
                                        <div class="form-group mb-0">
                                            <div class="select-contain w-auto">
                                                <select name="operator_id" class="select-contain-select @error('operator_id') is-invalid @enderror" required>
                                                    @foreach($operators as $operator)
                                                        <option value="{{$operator->id}}">
                                                            {{$operator->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Airport</label>
                                        <div class="form-group mb-0">
                                            <div class="select-contain w-auto">
                                                <select name="airport_code" class="select-contain-select @error('airport_code') is-invalid @enderror" required>
                                                    @foreach($airports as $airport)
                                                        <option value="{{$airport->code}}">
                                                            ({{$airport->code}}) {{$airport->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                        <div class="submit-box">
                            <div class="btn-box pt-3">
                                <button type="submit" class="theme-btn">
                                    Import<i class="la la-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </div><!-- end submit-box -->
                    </div><!-- end col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title"><i class="la la-photo mr-2 text-gray"></i>File</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content">
                                <div class="file-upload-wrap file-upload-wrap-3">
                                    <input type="file" name="price_file" class="multi file-upload-input with-preview @error('price_file') is-invalid @enderror" required>
                                    <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload file</span>
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
