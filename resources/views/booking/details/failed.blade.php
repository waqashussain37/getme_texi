@extends('layouts.default')

@section('content')
    <section class="payment-area section-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-box payment-received-wrap mb-0">
                        <div class="form-content">
                            <div class="payment-received-list">
                                <div class="d-flex align-items-center">
                                    <i class="la la-times icon-element flex-shrink-0 mr-3 ml-0" style="background-color: #f44336;"></i>
                                    <div>
                                        <h3 class="title pb-1">Payment Failed!</h3>
                                    </div>
                                </div>
                                <ul class="list-items py-4">
                                    <li>
                                        There was an error with your payment for Booking #{{$booking->id}}. <br>
                                    </li>
                                    <li>
                                        Please, contact support or try again later.
                                    </li>
                                </ul>
                            </div><!-- end card-item -->
                        </div>
                    </div><!-- end payment-card -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
