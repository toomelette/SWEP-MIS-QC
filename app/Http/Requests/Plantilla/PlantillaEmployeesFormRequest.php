<?php


namespace App\Http\Requests\Plantilla;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlantillaEmployeesFormRequest extends FormRequest
{
    public function authorize(){
        return true;
    }
    
    public function rules(){
        return [
           'employee_no' => [
               'required',
               'string',
               'max:225',
               Rule::exists('hr_employees','employee_no'),
           ],
            'appointment_date' => 'required|date_format:Y-m-d'
        ];
    }
}