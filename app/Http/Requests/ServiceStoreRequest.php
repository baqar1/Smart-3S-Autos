<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
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
            'service_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'service_date' => ['required', 'string', 'max:255'],
            'service_time' => ['required', 'string', 'max:255'],
            'vehicle_type' => ['required', 'string', 'max:255'],
            'vehicle_name' => ['required', 'string', 'max:255'],
            'vehicle_number' => ['required', 'string', 'max:255'],
            'dealer_id'=>['required'],
            'vehicle_model'=>['nullable'],
            'service_detail'=>['nullable'],
            'id'=>['nullable']
        ];
    }
}
