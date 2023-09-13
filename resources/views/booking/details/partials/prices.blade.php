<ul class="list-items list-items-2 pt-3">
    <li><span>Fare:</span>£{{$booking->fare}}</li>
    <li><span>Extra(s):</span>£{{$booking->extras_total}}</li>
    <li><span>Total:</span><span class="crrnt-currency" data-crrnt-base="GBP" data-crrnt-currencies="USD,EUR,JPY,CAD,INR,PKR">£{{$booking->total}}</span></li>
</ul>
