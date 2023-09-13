<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookingRequest;
use App\Http\Requests\VerifyPaymentRequest;
use App\Mail\NewBooking;
use App\Mail\NewBookingOperator;
use App\Mail\PaymentReceived;
use App\Models\Airport;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Extra;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    /**
     * @param CreateBookingRequest $request
     * @return RedirectResponse
     */
    public function create(CreateBookingRequest $request): RedirectResponse
    {
        $booking = new Booking;
        $booking->fill($request->validated());
        $time = explode(':', $request->pick_up_time);
        $pickUpDate = Carbon::createFromFormat('d/m/Y', $request->pick_up_date);
        $pickUpDate->setHours($time[0]);
        $pickUpDate->setMinutes(substr($time[1], 0, 2));
        $pickUpDate->setSeconds(0);
        $pickUpDate->format('Y-m-d H:i:s');
        $booking->pick_up_date = $pickUpDate;
        $pickUpPostCode = explode(' ', $request->pick_up_location_post_code);
        $dropOffPostCode = explode(' ', $request->drop_off_location_post_code);
        $booking->pick_up_location_post_code = $pickUpPostCode[0];
        $request->session()->put('pick_up_location_post_code', $request->pick_up_location_post_code);
        $request->session()->put('drop_off_location_post_code', $request->drop_off_location_post_code);
        $booking->drop_off_location_post_code = $dropOffPostCode[0];
        $hasAirport = Airport::where('code', $pickUpPostCode[0])->orWhere('code', $dropOffPostCode[0])->first();
        if (!$hasAirport) {
            return back()->withErrors(['airport' => 'Pick up or Drop off has to be an airport.']);
        }
        if ($request->filled('round_trip') && $request->round_trip === "on") {
            $time = explode(':', $request->return_pick_up_time);
            $returnPickUpDate = Carbon::createFromFormat('d/m/Y', $request->return_pick_up_date);
            $returnPickUpDate->setHours($time[0]);
            $returnPickUpDate->setMinutes(substr($time[1], 0, 2));
            $returnPickUpDate->setSeconds(0);
            $returnPickUpDate->format('Y-m-d H:i:s');

            $booking->return_pick_up_location = $request->drop_off_location;
            $booking->return_pick_up_date = $returnPickUpDate;
        } else {
            $booking->return_pick_up_date = null;
        }
        $booking->save();

        return redirect()->route('booking.vehicle.index', $booking->id);
    }

    public function vehicle($id, Request $request)
    {
        $booking = Booking::find($id);
        $vehicles = Car::whereHas('operator', function ($query) use ($request) {
            $query->whereHas('prices', function ($query) use ($request) {
                $query->where('post_code', $request->session()->get('pick_up_location_post_code'))
                    ->orWhere('post_code', $request->session()->get('drop_off_location_post_code'));
            });
            $query->whereHas('airports', function ($query) use ($request) {
                $query->where('code', $request->session()->get('pick_up_location_post_code'))
                    ->orWhere('code', $request->session()->get('drop_off_location_post_code'));
            });
        })->get();

        return view('booking.vehicle.index', compact('booking', 'vehicles'));
    }

    public function details($id)
    {
        $booking = Booking::find($id);
        $extras = Extra::active()->get();

        if ($booking->has_failed) {
            return view('booking.details.failed', compact('booking'));
        }

        if ($booking->is_paid) {
            return view('booking.details.thank_you', compact('booking'));
        }

        return view('booking.details.index', compact('booking', 'extras'));
    }

    public function selectVehicle($id, $vehicleId)
    {
        $booking = Booking::find($id);
        $booking->vehicle_id = $vehicleId;
        $booking->save();

        return redirect()->route('booking.details.index', $booking->id);
    }

    /**
     * @param $id
     * @param VerifyPaymentRequest $request
     * @return JsonResponse
     */
    public function verifyPayment($id, VerifyPaymentRequest $request): JsonResponse
    {
        $booking = Booking::find($id);
        $booking->fill($request->validated());

        $paymentMethodId = $request->payment_method_id;

        try {
            $payment = (new User)->charge($booking->total * 100, $paymentMethodId);

            $booking->payment_id = $payment->id;
            $booking->is_paid = true;
            $booking->save();

            $vehicle = Car::where('id', $booking->vehicle_id)->first();

            Mail::to($vehicle->operator->email)->send(new NewBookingOperator($booking));

            Mail::to('info@getme.taxi')->send(new NewBooking($booking));

            Mail::to($booking->email)->send(new PaymentReceived($booking));

            return response()->json([
                'success' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'There was an error processing your payment. Please, try again later.'
            ], 422);
        }
    }

    public function addExtra($id, $extraId)
    {
        $booking = Booking::find($id);
        $extras = Extra::active()->get();
        $extra = Extra::find($extraId);

        if (!$booking->extras->where('extra_id', $extra->id)->first()) {
            $booking->extras()->create([
                'booking_id' => $booking->id,
                'extra_id' => $extra->id
            ]);
        } else {
            $booking->extras()->where('extra_id', $extra->id)->first()->delete();
        }

        return view('booking.details.partials.extras', compact('booking', 'extras'));
    }

    public function getPrices($id)
    {
        $booking = Booking::find($id);

        return view('booking.details.partials.prices', compact('booking'));
    }
}
