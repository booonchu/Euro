<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseDataRequest extends FormRequest
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
        echo $this->id;
        return [
         'usercode'=> 'required|unique:courses,usercode,'.$this->id,
         'name'=>'required|unique:courses,name,'.$this->id,
         'total_classes'=>'required|min: 1',
         'class_hours'=>'required',
         'standard_cost'=>'required',
         'standard_saleprice'=>'required',
         'listorder'=>'required',
        ];
    }
}
