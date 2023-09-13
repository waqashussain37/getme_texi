<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDriverSettingsRequest extends FormRequest
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
            'user.name' => 'required|string',
            'user.email' => 'required|string',
            'user.phone_number' => 'required|string',
            'user.driver_license' => 'nullable|file',
//            'vehicle.image' => 'nullable',
//            'vehicle.name' => 'required|string',
//            'vehicle.price_per_mile' => 'required|numeric',
//            'vehicle.price_per_mile_10_plus' => 'required|numeric',
//            'vehicle.price_per_mile_20_plus' => 'required|numeric',
//            'vehicle.passengers' => 'required|numeric',
//            'vehicle.luggage' => 'required|numeric',
//            'vehicle.description' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'user.name' => 'Name',
            'user.email' => 'Email',
            'user.phone_number' => 'Phone Number',

            'vehicle.image' => 'Image',
            'vehicle.name' => 'Name',
            'vehicle.price_per_mile' => 'Price Per Mile (0-10)',
            'vehicle.price_per_mile_10_plus' => 'Price Per Mile (10-20)',
            'vehicle.price_per_mile_20_plus' => 'Price Per Mile (20+)',
            'vehicle.passengers' => 'Passengers',
            'vehicle.luggage' => 'Luggage',
            'vehicle.description' => 'Description',
        ];
    }
}
