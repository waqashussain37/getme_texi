<?php

namespace App\Support;

use Illuminate\Support\Facades\Http;

class DistanceMatrix
{
    const URL = 'https://maps.googleapis.com/maps/api/distancematrix/json';
    const METER_TO_MILE_RATIO = 0.000621;
    const METER_TO_KM_RATIO = 0.001;

    private $origins;
    private $destinations;

    public function __construct($origins, $destinations)
    {
        $this->origins = $origins;
        $this->destinations = $destinations;
    }

    /**
     * @return array|mixed
     */
    public function createRequest(): array
    {
        return Http::get(self::URL . '?origins=' . $this->origins . '&destinations=' . $this->destinations .
            '&language=en-GB&units=imperial&key=' . config('services.google_distance_matrix_key'))
            ->json();
    }

    /**
     * @return float|int
     */
    public function miles()
    {
        $response = $this->createRequest();

        /**
         * Convert meters to miles
         */
        return ($response['rows'][0]['elements'][0]['distance']['value'] * self::METER_TO_MILE_RATIO);
    }

    /**
     * @return float|int
     */
    public function kilometers()
    {
        $response = $this->createRequest();

        /**
         * Convert meters to kilometers
         */
        return ($response['rows'][0]['elements'][0]['distance']['value'] * self::METER_TO_KM_RATIO);
    }
}
