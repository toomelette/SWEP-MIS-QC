<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeReportRequest extends FormRequest{
   




    public function authorize(){

        return true;
    
    }
    



    public function rules(){

        return [
            'r_type' => 'nullable|string|max:10',
        ];
    
    }




}
