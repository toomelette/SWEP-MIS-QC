<?php


namespace App\Http\Requests\Budget;


use Illuminate\Foundation\Http\FormRequest;

class ORSFormRequest extends FormRequest
{
    public function authorize(){
        return true;
    }
    
    public function rules(){
        return [
           'funds' => 'required|string',
            'ors_date' => 'required',

//            'applied_projects.*.resp_center' => 'required',
        ];
    }


}