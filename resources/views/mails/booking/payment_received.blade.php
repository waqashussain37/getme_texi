@component('mail::message')
# Payment Confirmation

Hi, {{$booking->first_name}}

We're sending you this message to confirm we have received your payment of **£{{$booking->total}}** for Booking #{{$booking->id}}. <br>
You will soon receive a confirmation email regarding the processing of your booking. <br><br>

@component('mail::panel')
**ID:** {{$booking->id}} <br>
**Pick Up Location:** {{$booking->pick_up_location}} <br>
**Pick Up Date:** {{$booking->pick_up_date}} <br>
**Pick Up Time:** {{$booking->pick_up_time}} <br>
**Drop Off Location:** {{$booking->drop_off_location}} <br>
@if(!empty($booking->return_pick_up_location))
**Return Pick Up Location:** {{$booking->return_pick_up_location}} <br>
**Return Pick Up Date:** {{$booking->return_pick_up_date}} <br>
**Return Pick Up Time:** {{$booking->return_pick_up_time}} <br>
@endif
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
