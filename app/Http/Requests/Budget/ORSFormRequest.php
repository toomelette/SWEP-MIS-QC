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
            'amount' => 'required|string|min:2',

            'account_entries.*.type' => 'required',
            'account_entries.*.account_code' => 'required',
            'account_entries.*.account_title' => 'required',
            'account_entries.*.resp_center' => 'required_with:account_entries.*.debit,null|nullable',
            'account_entries.*.debit' => 'required_without:account_entries.*.credit|prohibited_unless:account_entries.*.credit,null',
            'account_entries.*.credit' => 'required_without:account_entries.*.debit|prohibited_unless:account_entries.*.debit,null',

            //'applied_projects.*.resp_center' => ($this->request->get('funds') == '02' || $this->request->get('funds') == '06' || $this->request->get('funds') == '69') ? 'required' : '',
            //'applied_projects.*.pap_code' => ($this->request->get('funds') == '02' || $this->request->get('funds') == '06' || $this->request->get('funds') == '69') ? 'required' : '',
            //'applied_projects.*.mooe' => ($this->request->get('funds') == '02' || $this->request->get('funds') == '06' || $this->request->get('funds') == '69') ? 'required_without:applied_projects.*.co|prohibited_unless:applied_projects.*.co,null' : '',
            //'applied_projects.*.co' => ($this->request->get('funds') == '02' || $this->request->get('funds') == '06' || $this->request->get('funds') == '69') ? 'required_without:applied_projects.*.mooe|prohibited_unless:applied_projects.*.mooe,null' : '',
        ];
    }

    public function messages()
    {
       return [
           'ors_no.regex' => 'Valid format: [FUND]-XX-XX-XXXX',
           'ors_no.unique' => 'ORS No already taken',
           'ors_date.date_format' => 'Invalid date format.',

           'account_entries.*.debit.required_without' => 'Debit is required if Credit is empty.',
           'account_entries.*.credit.required_without' => 'Credit is required if Debit is empty.',
           'account_entries.*.debit.prohibited_unless' => 'Only either of Debit or Credit must be filled.',
           'account_entries.*.credit.prohibited_unless' => 'Only either of Debit or Credit must be filled.',

           'applied_projects.*.mooe.required_without' => 'MOOE is required if CO is empty.',
           'applied_projects.*.co.required_without' => 'CO is required if MOOE is empty.',
           'applied_projects.*.mooe.prohibited_unless' => 'Only either of MOOE or CO must be filled.',
           'applied_projects.*.co.prohibited_unless' => 'Only either of MOOE or CO must be filled.',

       ];

    }


}