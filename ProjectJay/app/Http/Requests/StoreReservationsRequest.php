<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'start' => 'required|unique:hotels',
            'end' => 'required',
            'price' => 'required|numeric',
            'number_of_persons' => 'required',
            'user_id' => 'required',
            'room_id' => 'required',
            'hotel_id' => 'required',
        ];
    }
}
