@extends('layouts.default')

@section('title', $page->title)

@section('content')
    <section class="about-area section-bg padding-top-40px overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading margin-bottom-40px">
                        <h2 class="sec__title">{{$page->title}}</h2>
                        <p class="sec__desc font-size-16 pb-3">{!!$page->content!!}</p>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
