@extends('layouts.default')

@section('title', 'Meeting Points')

@section('content')
    <section class="card-area pt-5 pb-5">
        <div class="container">
            <nav aria-label="breadcrumb" class="pb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('operator.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Meeting Points</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-12">
                    <div class="filter-wrap margin-bottom-30px">
                        <div class="filter-top d-flex align-items-center justify-content-between pb-4">
                            <div>
                                <h3 class="title font-size-30">Meeting Points</h3>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="{{route('operator.add_meeting_point')}}" data-toggle="tooltip" data-placement="top" title="Add Meeting Point" class="theme-btn theme-btn-small">
                                    <i class="la la-plus la-2x p-1" style="vertical-align: middle;"></i>
                                </a>
                            </div>
                        </div><!-- end filter-top -->
                    </div><!-- end filter-wrap -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">Airport</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Description</th>
                                <th scope="col" class="text-center">Map Image</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($meetingPoints as $meetingPoint)
                                <tr>
                                    <td class="text-center">({{$meetingPoint->airport->code}}
                                        ) {{$meetingPoint->airport->name}}</td>
                                    <td class="text-center">{{$meetingPoint->title}}</td>
                                    <td class="text-center">{{$meetingPoint->description}}</td>
                                    <td class="text-center">
                                        @if(isset($meetingPoint->map_image))
                                            <a href="{{asset('storage/'.$meetingPoint->map_image)}}" target="_blank"> View </a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('operator.edit_meeting_point', $meetingPoint->id)}}">
                                            <i class="la la-pencil text-primary mr-1"></i>
                                        </a>
                                        <a href="{{route('operator.delete_meeting_point', $meetingPoint->id)}}">
                                            <i class="la la-trash text-danger ml-1"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
