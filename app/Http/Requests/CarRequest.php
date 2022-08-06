<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
        $id = optional($this->route("car"))->id;
        $validation = [
            'reg_no' => 'required|string|max:15|unique:cars,reg_no,' . $id . ',id',
            'model' => 'required|string',
            'year' => 'required|integer|digits:4',
            'color' => 'required|string',
            'mileage' => 'required|integer',
        ];

        if ($this->isMethod("POST")) {
            $validation["car_image"] = 'required|image|max:5000';
        }

        if ($this->isMethod("PUT")) {
            $validation["car_image"] = 'nullable|image|max:5000';
        }

        return $validation;
    }
}
