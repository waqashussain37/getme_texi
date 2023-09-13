<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDriverSettingsRequest;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DriverController extends Controller
{
    public function bookings(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('home.index');
        }

        $bookings = Booking::query();

        if ($request->filled('pick_up_location')) {
            $bookings = $bookings->where('pick_up_location', $request->pick_up_location);
        }

        if ($request->has('filter')) {
            switch ($request->filter) {
                case 'applied':
                    $bookings = Booking::whereHas('applicants', function ($query) {
                        $query->where('user_id', auth()->user()->id);
                    });
                    break;
            }
        }

        if ($request->filled('pick_up_date') && $request->filled('pick_up_time')) {
            $time = explode(':', $request->pick_up_time);
            $pickUpDate = Carbon::createFromFormat('d/m/Y', $request->pick_up_date);
            $pickUpDate->setHours($time[0]);
            $pickUpDate->setMinutes(substr($time[1], 0, 2));
            $pickUpDate->setSeconds(0);
            $pickUpDate->format('Y-m-d H:i:s');

            $bookings = $bookings->whereBetween('pick_up_date', [(string) $pickUpDate->subHours(2), (string) $pickUpDate->addHours(4)]);
        }

        $bookings = $bookings->latest()->where('is_paid', true)->paginate(5);


        return view('driver.bookings', compact('bookings'));
    }

    public function settings()
    {
        if (!auth()->check()) {
            return redirect()->route('home.index');
        }

        $vehicle = auth()->user()->vehicle;

        return view('driver.settings', compact('vehicle'));
    }

    public function updateSettings(UpdateDriverSettingsRequest $request)
    {
        if (!auth()->check()) {
            return redirect()->route('home.index');
        }

        $data = $request->validated();

        $user = auth()->user();
//        $vehicle = $user->vehicle;
//        if (!$vehicle) {
//            $vehicle = new Vehicle;
//        }
//
//        $vehicle->fill($data['vehicle']);
//        if (isset($data['vehicle']['image'])) {
//            $vehicle->image = $request->vehicle['image']->store('vehicle', 'public');
//        }
//        $vehicle->save();

        $user->fill($data['user']);
        if (isset($data['user']['driver_license'])) {
            $user->driver_license = $request->user['driver_license']->store('user', 'public');
        }
//        $user->vehicle_id = $vehicle->id;
        $user->save();

        return back()->with('message', 'Successfully updated your settings.');
    }
}
