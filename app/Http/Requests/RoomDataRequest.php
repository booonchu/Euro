<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomDataRequest extends FormRequest
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
         'branch_id'=>'required',
         'name'=>'required',
         'capacity'=>'required',
         ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    /*public function messages()
    {
        return [
            'branch_id.required' => 'A Branch is required',
            'name.required'  => 'ชื่อ เป็น สิ่งต้องการ',
        ];
    }*/
}
