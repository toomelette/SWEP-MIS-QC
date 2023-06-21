<?php


namespace App\Http\Requests\Budget;


use Illuminate\Foundation\Http\FormRequest;

class PapFormRequest extends FormRequest
{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'year' => 'required|int|min:2020',
            'resp_center' => 'required|string',
            'pap_code' => 'required|string|max:255',
            'pap_title' => 'required|string',
            'pap_desc' => 'required|string',
            'budget_type' => 'required|string',
        ];
    }

}