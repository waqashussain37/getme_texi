<div class="form-box">
    <div class="form-title-wrap">
        <h3 class="title">Add Extra(s)</h3>
    </div>
    <div class="form-content">
        <div class="row">
            <div class="col-lg-12">
                @foreach($extras as $extra)
                    <div class="card-item car-card card-item-list">
                        <div class="card-img">
                            <div class="d-block">
                                <img src="/storage/{{$extra->image}}" class="h-100">
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">{{$extra->name}}</h3>
                            <div class="card-attributes padding-top-10px">
                                <ul class="d-flex align-items-center">
                                    <li class="d-flex align-items-center">{{$extra->description}}</li>
                                </ul>
                            </div>
                            <div class="card-price d-flex align-items-center justify-content-between">
                                <p>
                                    <span class="price__from">Price</span>
                                    <span class="price__num">£{{round($extra->price,2)}}</span>
                                </p>
                                <a href="javascript:void(0)" class="btn-text" onClick="addExtra({{$booking->id}},{{$extra->id}})">
                                    @if($booking->hasExtra($extra->id))
                                        Remove <i class="la la-minus"></i>
                                    @else
                                        Add <i class="la la-plus"></i>
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
