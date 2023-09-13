<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Text;

class Booking extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Booking::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'pick_up_location',
        'drop_off_location',
        'pick_up_date',
        'pick_up_time',
        'phone_number',
        'first_name',
        'last_name',
        'email',
        'payment_id'
    ];

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make('ID', 'id')->sortable(),
            Place::make('Pick-up Location',
                'pick_up_location')->rules('required')->city('London')->countries(['GB'])->sortable(),
            Text::make('Pick-up Location Post Code',
                'pick_up_location_post_code')->rules('required')->sortable()->hideFromIndex(),
            Text::make('Pick-up Date', 'pick_up_date')->rules('required')->sortable(),
            Text::make('Pick-up Time', 'pick_up_time')->rules('required')->sortable(),
            Place::make('Return Pick-up Location',
                'return_pick_up_location')->city('London')->countries(['GB'])->sortable()->hideFromIndex(),
            Text::make('Return Pick-up Date', 'return_pick_up_date')->sortable()->hideFromIndex(),
            Text::make('Return Pick-up Time', 'return_pick_up_time')->sortable()->hideFromIndex(),
            Place::make('Drop-off Location',
                'drop_off_location')->rules('required')->city('London')->countries(['GB'])->sortable(),
            Text::make('Drop-off Location Post Code',
                'drop_off_location_post_code')->rules('required')->sortable()->hideFromIndex(),
            Text::make('Flight Number', 'flight_number')->sortable()->hideFromIndex(),
            Currency::make('Fare Cost', 'fare')->readonly()->currency('GBP')->step(0.01)->sortable()->nullable()->hideFromIndex(),
            Currency::make('Extras Cost',
                'extras_total')->readonly()->currency('GBP')->step(0.01)->sortable()->nullable()->hideFromIndex(),
            Currency::make('Total', 'total')->readonly()->currency('GBP')->step(0.01)->nullable()->sortable()->hideFromIndex(),
            Number::make('Passengers', 'passengers')->rules('required')->sortable()->hideFromIndex(),
            Number::make('Luggage', 'luggage')->rules('required')->sortable()->hideFromIndex(),
            BelongsTo::make('Vehicle', 'vehicle', Car::class)->sortable()->hideFromIndex(),
            BelongsTo::make('Driver', 'driver', User::class)->sortable()->hideFromIndex(),
            Text::make('First Name', 'first_name')->rules('required')->hideFromIndex(),
            Text::make('Last Name', 'last_name')->rules('required')->hideFromIndex(),
            Text::make('Phone Number', 'phone_number')->rules('required')->hideFromIndex(),
            Text::make('Email', 'email')->rules('required')->hideFromIndex(),
            Text::make('Payment ID', 'payment_id')->hideFromIndex()->readonly(),
            Date::make('Created At', 'created_at')->readonly()->sortable(),
            Boolean::make('Paid', 'is_paid')
                ->rules('required')
                ->trueValue(true)
                ->falseValue(false)
                ->sortable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new Actions\ApplyToBooking())->canSee(function ($request) {
                $booking = \App\Models\Booking::find($request->viaResourceId);
                if (empty($booking->driver_id)) {
                    return true;
                }
            }),
        ];
    }
}
