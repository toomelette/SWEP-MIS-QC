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
            'ors_no' => 'required|regex:/(\\d{2})-(\\d{2})-(\\d{2})-(\\d{4})$/',
           'funds' => 'required|string',
            'ors_date' => 'required|date_format:Y-m-d',
            'payee' => 'required|string',
//            'applied_projects.*.resp_center' => 'required',
        ];
    }

    public function messages()
    {
       return [
           'ors_no.regex' => 'Valid format: XX-XX-XX-XXXX',
           'ors_date.date_format' => 'Invalid date format.',
       ];

    }


}