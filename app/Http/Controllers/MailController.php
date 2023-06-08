<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Mail\ReservationDetails;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(int $id) : Void
    {
        $reservation = Reservation::findOrFail($id);

        if ($reservation) {
            Mail::to($reservation->user->email)->send(new ReservationDetails($reservation));
        }
    }
}
