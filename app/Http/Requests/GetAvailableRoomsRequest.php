<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetAvailableRoomsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO : Modify this.
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
            'checkin' => 'required|date_format:Y-m-d',
            'checkout' => 'required|date_format:Y-m-d|after:checkin'
        ];
    }
}
