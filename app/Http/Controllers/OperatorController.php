<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmation;
use App\Models\Airport;
use App\Models\Booking;
use App\Models\Car;
use App\Models\CarMake;
use App\Models\CarModel;
use App\Models\Driver;
use App\Models\MeetingPoint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use anlutro\LaravelSettings\Facade as Setting;

class OperatorController extends Controller
{
    public function dashboard(Request $request)
    {
        if (Auth::user()->hasRole('Admin')) {
            return redirect('/admin');
        }

        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        return view('operator.dashboard');
    }

    public function bookings(Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $bookings = Booking::where('is_paid', true)->whereNull('driver_id')->get();

        if ($request->has('filter')) {
            switch ($request->filter) {
                case 'applied':
                    $bookings = Booking::where('is_paid', true)
                        ->whereHas('driver', function ($query) {
                            $query->where('operator_id', Auth::user()->id);
                        })
                        ->get();
                    break;
            }
        }

        return view('operator.bookings', compact('bookings'));
    }

    public function editBooking($id, Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $booking = Booking::where('id', $id)
            ->first();

        if (!$booking) {
            return back();
        }

        return view('operator.edit_booking', compact('booking'));
    }

    public function editBookingPost($id, Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $booking = Booking::where('id', $id)
            ->first();

        if (!$booking) {
            return back();
        }

        $booking->fill($request->input());
        $booking->save();

        return redirect()->route('operator.bookings');
    }

    public function meetingPoints(Request $request)
    {
        $meetingPoints = MeetingPoint::whereOperatorId(Auth::user()->id)->get();

        return view('operator.meeting_points', compact('meetingPoints'));
    }

    public function addMeetingPoint(Request $request)
    {
        $airports = Airport::all();

        return view('operator.add_meeting_point', compact('airports'));
    }

    public function addMeetingPointPost(Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $meetingPoint = new MeetingPoint;
        $meetingPoint->operator_id = Auth::user()->id;
        $meetingPoint->fill($request->input());
        if (isset($request->map_image)) {
            $meetingPoint->map_image = $request->map_image->store('map_images', 'public');
        }
        $meetingPoint->save();

        return redirect()->route('operator.meeting_points');
    }

    public function editMeetingPoint($id, Request $request)
    {
        $meetingPoint = MeetingPoint::whereOperatorId(Auth::user()->id)
            ->where('id', $id)
            ->first();
        $airports = Airport::all();

        if (!$meetingPoint) {
            return back();
        }

        return view('operator.edit_meeting_point', compact('airports', 'meetingPoint'));
    }

    public function editMeetingPointPost($id, Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $meetingPoint = MeetingPoint::whereOperatorId(Auth::user()->id)
            ->where('id', $id)
            ->first();

        if (!$meetingPoint) {
            return back();
        }

        $meetingPoint->fill($request->input());
        if (isset($request->map_image)) {
            $meetingPoint->map_image = $request->map_image->store('map_images', 'public');
        }
        $meetingPoint->save();

        return redirect()->route('operator.meeting_points');
    }

    public function deleteMeetingPoint($id, Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $meetingPoint = MeetingPoint::whereOperatorId(Auth::user()->id)
            ->where('id', $id)
            ->first();

        if (!$meetingPoint) {
            return back();
        }

        $meetingPoint->delete();

        return redirect()->route('operator.meeting_points');
    }

    public function cars(Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $cars = Car::whereOperatorId(Auth::user()->id)->get();

        if (!auth()->check()) {
            return redirect()->route('home.index');
        }

        return view('operator.cars', compact('cars'));
    }

    public function addCar(Request $request)
    {
        $types = config('car_types');
        $makes = CarMake::all();
        $models = CarModel::all();

        return view('operator.add_car', compact('types', 'makes', 'models'));
    }

    public function addCarPost(Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $car = new Car;
        $car->operator_id = Auth::user()->id;
        $car->fill($request->input());
        if (isset($request->image)) {
            $car->image = $request->image->store('car_image', 'public');
        }
        $car->save();

        return redirect()->route('operator.cars');
    }

    public function editCar($id, Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $car = Car::whereOperatorId(Auth::user()->id)
            ->where('id', $id)
            ->first();
        $types = config('car_types');
        $makes = CarMake::all();
        $models = CarModel::all();

        if (!$car) {
            return back();
        }

        return view('operator.edit_car', compact('types', 'car', 'makes', 'models'));
    }

    public function editCarPost($id, Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $car = Car::whereOperatorId(Auth::user()->id)
            ->where('id', $id)
            ->first();

        if (!$car) {
            return back();
        }

        $car->fill($request->input());
        if (isset($request->image)) {
            $car->image = $request->image->store('car_image', 'public');
        }
        $car->save();

        return redirect()->route('operator.cars');
    }

    public function deleteCar($id, Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $car = Car::whereOperatorId(Auth::user()->id)
            ->where('id', $id)
            ->first();

        if (!$car) {
            return back();
        }

        $car->delete();

        return redirect()->route('operator.cars');
    }

    public function drivers(Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $drivers = Driver::whereOperatorId(Auth::user()->id)->get();

        return view('operator.drivers', compact('drivers'));
    }

    public function addDriver(Request $request)
    {
        return view('operator.add_driver');
    }

    public function addDriverPost(Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $driver = new Driver;
        $driver->operator_id = Auth::user()->id;
        $driver->fill($request->input());
        if (isset($request->image)) {
            $driver->image = $request->image->store('driver_image', 'public');
        }
        $driver->save();

        return redirect()->route('operator.drivers');
    }

    public function editDriver($id, Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $driver = Driver::whereOperatorId(Auth::user()->id)
            ->where('id', $id)
            ->first();

        if (!$driver) {
            return back();
        }

        return view('operator.edit_driver', compact('driver'));
    }

    public function editDriverPost($id, Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $driver = Driver::whereOperatorId(Auth::user()->id)
            ->where('id', $id)
            ->first();

        if (!$driver) {
            return back();
        }

        $driver->fill($request->input());
        if (isset($request->image)) {
            $driver->image = $request->image->store('driver_image', 'public');
        }
        $driver->save();

        return redirect()->route('operator.drivers');
    }

    public function deleteDriver($id, Request $request)
    {
        $driver = MeetingPoint::whereOperatorId(Auth::user()->id)
            ->where('id', $id)
            ->first();

        if (!$driver) {
            return back();
        }

        $driver->delete();

        return redirect()->route('operator.drivers');
    }

    public function acceptBooking($id, Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $exception) {
            return back();
        }

        $booking = Booking::where('id', $id)
            ->first();
        $meetingPoints = MeetingPoint::whereOperatorId(Auth::user()->id)->get();
        $drivers = Driver::whereOperatorId(Auth::user()->id)->get();
        $cars = Car::whereOperatorId(Auth::user()->id)->get();

        if (!$booking) {
            return back();
        }

        return view('operator.accept_booking', compact('booking', 'meetingPoints', 'drivers', 'cars'));
    }

    public function acceptBookingPost($id, Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        $booking = Booking::where('id', $id)
            ->first();

        if (!$booking || !empty($booking->driver_id)) {
            return back();
        }

        $booking->driver_id = $request->driver_id;
        $booking->meeting_point_id = $request->meeting_point_id;
        $booking->car_id = $request->car_id;
        $booking->save();

        Mail::to($booking->email)->send(new BookingConfirmation($booking));

        return redirect()->route('operator.accept_booking', $booking->id);
    }

    public function settings(Request $request)
    {
        $meetingPoints = MeetingPoint::whereOperatorId(Auth::user()->id)->get();
        $drivers = Driver::whereOperatorId(Auth::user()->id)->get();
        $cars = Car::whereOperatorId(Auth::user()->id)->get();
        $airports = Airport::all();

        return view('operator.settings', compact('meetingPoints', 'drivers', 'cars', 'airports'));
    }

    public function settingsPost(Request $request)
    {
        if (!Auth::user()->hasRole('Operator')) {
            return back();
        }

        Auth::user()->airports()->sync($request->airport_ids);

        Setting::set('default_meeting_point_id', $request->meeting_point_id);
        Setting::set('default_driver_id', $request->driver_id);
        Setting::set('default_car_id', $request->car_id);
        Setting::save();

        return back();
    }

    public function priceImport(Request $request)
    {
        if (!Auth::user()->hasRole('Admin')) {
            return back();
        }

        $airports = Airport::all();
        $operators = User::role('Operator')->get();

        return view('operator.price_import', compact('airports', 'operators'));
    }

    public function priceImportPost(Request $request)
    {
        try {
            \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\PriceImport($request->airport_code, $request->operator_id),
                $request->file('price_file'));
            return back()->with('success', 'Successfully imported prices.');
        } catch (\Exception $exception) {
            return back()->withErrors('Invalid file format.');
        }
    }
}
