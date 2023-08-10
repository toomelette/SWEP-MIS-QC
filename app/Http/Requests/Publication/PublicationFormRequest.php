<?php

namespace App\Http\Requests\Publication;

use Illuminate\Foundation\Http\FormRequest;

class PublicationFormRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'date' => 'required|date_format:Y-m-d',
            'deadline' => 'required|date_format:Y-m-d',
            'send_to' => 'required|string',
            'send_to_position' => 'required|string',
            'send_to_address' => 'required|string',
            'send_to_email' => 'required|string',
        ];
    }
}