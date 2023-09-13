@component('mail::message')
# Booking Confirmation & Instructions

Here are the details regarding your latest booking:

@component('mail::panel')
**Meeting Point Title:** {{$booking->meetingPoint->title}} <br>
**Meeting Point Description:** {{$booking->meetingPoint->description}} <br>
@if(isset($booking->meetingPoint->latitude) && isset($booking->meetingPoint->longitude))
    **Meeting Point Directions:**  <a href="https://www.google.com/maps/dir/?api=1&travelmode=walking&destination={{$booking->meetingPoint->latitude}},{{$booking->meetingPoint->longitude}}">view</a> <br>
@endif
**Driver:** {{$booking->driver->name}} ({{$booking->driver->phone_number}} )<br>
**Car:** {{$booking->car->make}} {{$booking->car->model}} <br>
@endcomponent

@component('mail::panel')
**ID:** {{$booking->id}} <br>
**Drop Off Location:** {{$booking->drop_off_location}} <br>
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
