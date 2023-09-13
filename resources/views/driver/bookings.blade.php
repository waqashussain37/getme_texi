@extends('layouts.default')

@section('title', 'Bookings')

@section('content')
    <section class="user-area section-bg padding-top-100px padding-bottom-60px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="title font-size-28">Bookings</h3>
                    <div class="section-tab section-tab-3 pt-4 pb-5">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a href="{{route('driver.bookings')}}" class="nav-link @if(!request()->has('filter')) active @endif">
                                    All
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?filter=applied" class="nav-link @if(request()->has('filter') && request()->filter === 'applied') active @endif">
                                    Applied
                                </a>
                            </li>
                        </ul>
                    </div><!-- end section-tab -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-item card-item-list" style="z-index: 2">
                        <div class="card-body contact-form-action">
                            <form action="{{request()->fullUrl()}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <span class="la la-map-marker form-icon"></span>
                                                <input class="form-control google-places-autocomplete @error('pick_up_location') is-invalid @enderror" name="pick_up_location" placeholder="Pick-up Location" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input id="daterange-single1" class="date-range form-control @error('pick_up_date') is-invalid @enderror" name="pick_up_date" type="text" value="@if(request()->filled('pick_up_time')) {{request()->pick_up_date}} @endif">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                    <select name="pick_up_time" class="select-contain-select @error('pick_up_time') is-invalid @enderror">
                                                        <option value="12:00 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '12:00 AM') selected @endif>12:00 AM</option>
                                                        <option value="12:30 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '12:30 AM') selected @endif>12:30 AM</option>
                                                        <option value="1:00 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '1:00 AM') selected @endif>1:00 AM</option>
                                                        <option value="1:30 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '1:00 AM') selected @endif>1:30 AM</option>
                                                        <option value="2:00 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '2:00 AM') selected @endif>2:00 AM</option>
                                                        <option value="2:30 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '2:30 AM') selected @endif>2:30 AM</option>
                                                        <option value="3:00 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '3:00 AM') selected @endif>3:00 AM</option>
                                                        <option value="3:30 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '3:30 AM') selected @endif>3:30 AM</option>
                                                        <option value="4:00 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '4:00 AM') selected @endif>4:00 AM</option>
                                                        <option value="4:30 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '4:30 AM') selected @endif>4:30 AM</option>
                                                        <option value="5:00 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '5:00 AM') selected @endif>5:00 AM</option>
                                                        <option value="5:30 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '5:30 AM') selected @endif>5:30 AM</option>
                                                        <option value="6:00 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '6:00 AM') selected @endif>6:00 AM</option>
                                                        <option value="6:30 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '6:30 AM') selected @endif>6:30 AM</option>
                                                        <option value="7:00 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '7:00 AM') selected @endif>7:00 AM</option>
                                                        <option value="7:30 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '7:30 AM') selected @endif>7:30 AM</option>
                                                        <option value="8:00 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '8:00 AM') selected @endif>8:00 AM</option>
                                                        <option value="8:30 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '8:30 AM') selected @endif>8:30 AM</option>
                                                        <option value="9:00 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '9:00 AM') selected @endif>9:00 AM</option>
                                                        <option value="9:30 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '9:30 AM') selected @endif>9:30 AM</option>
                                                        <option value="10:00 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '10:00 AM') selected @endif>10:00 AM</option>
                                                        <option value="10:30 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '10:30 AM') selected @endif>10:30 AM</option>
                                                        <option value="11:00 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '11:00 AM') selected @endif>11:00 AM</option>
                                                        <option value="11:30 AM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '11:30 AM') selected @endif>11:30 AM</option>
                                                        <option value="12:00 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '12:00 PM') selected @endif>12:00 PM</option>
                                                        <option value="12:30 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '12:30 PM') selected @endif>12:30 PM</option>
                                                        <option value="1:00 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '1:00 PM') selected @endif>1:00 PM</option>
                                                        <option value="1:30 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '1:30 PM') selected @endif>1:30 PM</option>
                                                        <option value="2:00 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '2:00 PM') selected @endif>2:00 PM</option>
                                                        <option value="2:30 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '2:30 PM') selected @endif>2:30 PM</option>
                                                        <option value="3:00 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '3:00 PM') selected @endif>3:00 PM</option>
                                                        <option value="3:30 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '3:30 PM') selected @endif>3:30 PM</option>
                                                        <option value="4:00 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '4:00 PM') selected @endif>4:00 PM</option>
                                                        <option value="4:30 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '4:30 PM') selected @endif>4:30 PM</option>
                                                        <option value="5:00 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '5:00 PM') selected @endif>5:00 PM</option>
                                                        <option value="5:30 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '5:30 PM') selected @endif>5:30 PM</option>
                                                        <option value="6:00 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '6:00 PM') selected @endif>6:00 PM</option>
                                                        <option value="6:30 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '6:30 PM') selected @endif>6:30 PM</option>
                                                        <option value="7:00 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '7:00 PM') selected @endif>7:00 PM</option>
                                                        <option value="7:30 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '7:30 PM') selected @endif>7:30 PM</option>
                                                        <option value="8:00 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '8:00 PM') selected @endif>8:00 PM</option>
                                                        <option value="8:30 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '8:30 PM') selected @endif>8:30 PM</option>
                                                        <option value="9:00 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '9:00 PM') selected @endif>9:00 PM</option>
                                                        <option value="9:30 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '9:30 PM') selected @endif>9:30 PM</option>
                                                        <option value="10:00 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '10:00 PM') selected @endif>10:00 PM</option>
                                                        <option value="10:30 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '10:30 PM') selected @endif>10:30 PM</option>
                                                        <option value="11:00 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '11:00 PM') selected @endif>11:00 PM</option>
                                                        <option value="11:30 PM" @if(request()->filled('pick_up_time') && request()->pick_up_time === '11:30 PM') selected @endif>11:30 PM</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="btn-box">
                                            <button type="submit" class="theme-btn btn-block">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content margin-bottom-40px" id="all">
                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="my-hotel-tab">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{{session('message')}}</li>
                                    </ul>
                                </div>
                            @endif
                            <div class="my-service-list">
                                @foreach($bookings as $booking)
                                    <div class="card-item card-item-list">
                                        <div class="card-body">
                                            <h3 class="card-title mb-2">#{{$booking->id}}</h3>
                                            <table class="table table-responsive">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Pick-up Location</th>
                                                    <th scope="col">Pick-up Date</th>
                                                    <th scope="col">Pick-up Time</th>
                                                    <th scope="col">Drop-off Location</th>
                                                    <th scope="col">Return Pick-up Location</th>
                                                    <th scope="col">Return Pick-up Date</th>
                                                    <th scope="col">Return Pick-up Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="show-read-more">{{$booking->pick_up_location}}</td>
                                                    <td>{{$booking->pick_up_date}}</td>
                                                    <td>{{$booking->pick_up_time}}</td>
                                                    <td class="show-read-more">{{$booking->drop_off_location}}</td>
                                                    <td class="show-read-more">{{$booking->return_pick_up_location ?? '-'}}</td>
                                                    <td>{{$booking->return_pick_up_date ?? '-'}}</td>
                                                    <td>{{$booking->return_pick_up_time ?? '-'}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="card-price d-flex align-items-center justify-content-between">
                                                <p>
                                                    <span class="price__from">Distance:</span>
                                                    <span class="price__num">{{$booking->distance}}</span>
                                                </p>
                                                <p>
                                                    <span class="price__from">Extra(s):</span>
                                                    <span class="price__num">
                                                        @foreach($booking->extras as $bookingExtra)
                                                            {{$bookingExtra->extra->name}}
                                                            @if(!$loop->last) , @endif
                                                        @endforeach
                                                    </span>
                                                </p>
                                                @if(!$booking->applicants->contains('user_id', auth()->user()->id))
                                                    <div class="col-md-2">
                                                        <form action="{{route('driver.bookings.apply', $booking->id)}}" method="POST">
                                                            @csrf
                                                            <input type="text" name="price" class="form-control mb-2" placeholder="Price" required>
                                                            <button type="submit" class="theme-btn theme-btn-small">
                                                                Apply
                                                            </button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <p>
                                                        <span class="price__from">Applied For</span>
                                                        <span class="price__num">£{{$booking->applicants->where('user_id', auth()->user()->id)->last()->price}}</span>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div><!-- end my-service-list -->
                            {{ $bookings->appends(request()->query())->links() }}
                        </div><!-- end tab-pane -->
                    </div>
                </div>
            </div><!-- end col-lg-9 -->
        </div><!-- end row -->
    </section><!-- end user-area -->
@endsection
@section('scripts')
    <script src="{{asset('js/google-autocomplete.js')}}"></script>
    <script src="{{asset('js/home/datepicker.js')}}"></script>
    <script src="{{asset('js/booking/read-more.js')}}"></script>
@endsection
