<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreRequest extends FormRequest
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
        return [
            'vehicle_name' => ['required', 'string', 'max:255'],
            'vehicle_model' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255'],
            'fuel_average' => ['required', 'string', 'max:255'],
            'mileage' => ['required', 'string', 'max:30'],
            'features' => ['required', 'string', 'max:255'],
            'vehicle_description' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            //'image' => ['mimes:jpeg,jpg,png,gif',$imageValidation],
            'dealer_id'=>['required'],
            'id'=>['nullable']   
        ];
    }
}
