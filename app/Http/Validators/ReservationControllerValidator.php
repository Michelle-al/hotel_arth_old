<?php

namespace App\Http\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ReservationControllerValidator
{

    static function getAvailableRoomsValidator(Request $request): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($request->all(), [
            'checkin' => 'required|date_format:Y-m-d|after:yesterday',
            'checkout' => 'required|date_format:Y-m-d|after:checkin'

        ], [
            'required' => 'The :attribute field is required.',
            'date_format' => 'The :attribute field is required.',
        ]);
    }

    static function createReservationValidator(Request $request) : \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($request->post(), [
            'checkin' => 'required|date_format:Y-m-d|after:yesterday',
            'checkout' => 'required|date_format:Y-m-d|after:checkin',
            'numberOfPeople' => 'required|integer|min:1',
            'isTravelForWork' => 'required|in:personal,pro',
            'rooms' => 'required|string',
            'options' => 'string',
            'user_id' => 'int',
            'status' => ""
        ], [
            'required' => 'The :attribute field is required.',
            'array' => 'The :attribute must be an array'
        ]);
    }

}
