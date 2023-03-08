<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO : Modify this after tests.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // TODO : see if "has_options" must stay
        return [
            'checkin' => 'required|date_format:Y-m-d|after:yesterday',
            'checkout' => 'required|date_format:Y-m-d|after:checkin',
            'number_of_people' => 'required|integer|min:1',
            'has_options' => 'optional|in:0,1',
            'price' => 'required|float',
            'stay_type' => 'required|in:personal,pro',
            'rooms' => 'required'
        ];
    }
}
