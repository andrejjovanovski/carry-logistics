<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'pickup_date' => 'bail|required|date',
            'pickup_time_one' => 'bail|required',
            'pickup_time_two' => 'bail|required',
            'delivery_name' => 'bail|required',
            'delivery_email' => 'email',
            'delivery_phone_number' => 'bail|numeric',
            'delivery_address' => 'bail|required|string',
            'shipment_type_id' => 'bail|required',
            'payment_method_id' => 'bail|required',
        ];
    }
}
