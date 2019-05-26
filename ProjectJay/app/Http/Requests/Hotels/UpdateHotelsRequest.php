<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $hotel = $this->route('hotel');

        return [
            //
            'name_hotel' => 'required' . $hotel->id,
            'address' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone_number' => 'required'
        ];
    }
}
