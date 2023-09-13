<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class RoundTripTime implements Rule
{
    protected $data;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pickUpDate = Carbon::createFromFormat('d/m/Y g:ia',
            $this->data['pick_up_date'] . ' ' . $this->data['pick_up_time']);

        $returnPickUpDate = Carbon::createFromFormat('d/m/Y g:ia',
            $this->data['return_pick_up_date'] . ' ' . $this->data['return_pick_up_time']);

        if ($returnPickUpDate->greaterThanOrEqualTo($pickUpDate->addHours(4))) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Return pick up must occur at least 4 hours after Pick up.';
    }
}
