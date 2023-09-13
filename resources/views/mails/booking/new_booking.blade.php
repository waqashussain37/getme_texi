@component('mail::message')
# New Booking

A new booking has been created.

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
