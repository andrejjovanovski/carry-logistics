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
        //        $rules = [];
        //
        //        foreach ($this->all() as $key => $value) {
        //            if (preg_match('/^description\d+$/', $key, $matches)) {
        //                $index = str_replace('description', '', $key);
        //
        //                // Define rules for each dynamic field
        //                $rules["description{$index}"] = 'required|string|max:255';
        //                $rules["weight{$index}"] = 'required|numeric|min:0';
        //                $rules["length{$index}"] = 'required|numeric|min:0';
        //                $rules["width{$index}"] = 'required|numeric|min:0';
        //                $rules["height{$index}"] = 'required|numeric|min:0';
        //            }
        //        }

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

    //    public function messages()
    //    {
    //        $messages = [];
    //
    //        foreach ($this->all() as $key => $value) {
    //            if (preg_match('/^description\d+$/', $key)) {
    //                $index = str_replace('description', '', $key);
    //
    //                $messages["description{$index}"] = "Description for package #$index is required.";
    //                $messages["weight{$index}"] = "Weight for package #$index is required.";
    //                $messages["length{$index}"] = "Length for package #$index is required.";
    //                $messages["width{$index}"] = "Width for package #$index is required.";
    //                $messages["height{$index}"] = "Height for package #$index is required.";
    //            }
    //        }
    //
    //        return $messages;
    //    }
}
