<?php

namespace App\Http\Requests;

use App\Rules\RoundTripTime;
use Illuminate\Foundation\Http\FormRequest;

class CreateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pick_up_location' => 'required|string',
            'pick_up_location_post_code' => 'required|string',
            'pick_up_date' => 'required|string',
            'pick_up_time' => 'required|string',
            'drop_off_location' => 'required|string',
            'drop_off_location_post_code' => 'required|string',
            'passengers' => 'required|numeric',
            'round_trip' => 'nullable',
            'luggage' => 'required|numeric',
            'return_pick_up_date' => $this->round_trip ? 'required_with:round_trip' : 'nullable',
            'return_pick_up_time' => $this->round_trip ? [
                'required_with:round_trip',
                'string',
                new RoundTripTime($this->all()),
            ] : 'nullable',
        ];
    }
}
