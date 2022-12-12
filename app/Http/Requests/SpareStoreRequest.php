<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpareStoreRequest extends FormRequest
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
            'part_name' => ['required', 'string', 'max:255'],
            'part_condition' => ['required', 'string', 'max:255'],
            'part_id' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'price' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'workshop_name' => ['required', 'string', 'max:255'],
            //'img' => ['mimes:jpeg,jpg,png,gif'],
            'dealer_id'=>['required'],
            'id'=>['nullable']
        ];
    }
}
