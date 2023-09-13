@extends('layouts.default')

@section('title', 'Edit Booking')

@section('content')
    <!-- ================================
    START FORM AREA
================================= -->
    <section class="listing-form pt-5 pb-5">
        <div class="container">
            <nav aria-label="breadcrumb" class="pb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('operator.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('operator.bookings')}}">Bookings</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
            <form action="{{route('operator.edit_booking_post', $booking->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title"><i class="la la-gear mr-2 text-gray"></i>Status</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content contact-form-action">
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <div class="form-group mb-0">
                                            <div class="select-contain w-auto">
                                                <select name="status" class="select-contain-select @error('status') is-invalid @enderror" required>
                                                    <option value="Pending" @if($booking->status === 'Pending') selected @endif> Pending</option>
                                                    <option value="Canceled" @if($booking->status === 'Canceled') selected @endif>Canceled</option>
                                                    <option value="On the way" @if($booking->status === 'On the way') selected @endif>On the way</option>
                                                    <option value="Late" @if($booking->status === 'Late') selected @endif>Late</option>
                                                    <option value="Re-schedule" @if($booking->status === 'Re-schedule') selected @endif>Re-schedule</option>
                                                    <option value="Completed" @if($booking->status === 'Completed') selected @endif>Completed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                        <div class="submit-box">
                            <div class="btn-box pt-3">
                                <button type="submit" class="theme-btn">Save<i class="la la-arrow-right ml-1"></i>
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
