<?php


namespace App\Http\Requests\Budget;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ORSFormRequest extends FormRequest
{
    public function authorize(){
        return true;
    }
    
    public function rules(){
        return [
            'ors_no' => [
                'required',
                'regex:/('.$this->request->get("funds").')-(\\d{2})-(\\d{2})-(\\d{4})$/',
                Rule::unique('budget_ors','ors_no')->ignore($this->route('or'),'slug'),
            ],
           'funds' => 'required|string',
            'ors_date' => 'required|date_format:Y-m-d',
            'payee' => 'required|string',
//            'applied_projects.*.resp_center' => 'required',
        ];
    }

    public function messages()
    {
       return [
           'ors_no.regex' => 'Valid format: [FUND]-XX-XX-XXXX',
           'ors_no.unique' => 'ORS No already taken',
           'ors_date.date_format' => 'Invalid date format.',
       ];

    }


}