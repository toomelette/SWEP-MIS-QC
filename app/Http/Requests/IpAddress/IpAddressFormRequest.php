<?php


namespace App\Http\Requests\IpAddress;


use Illuminate\Foundation\Http\FormRequest;

class IpAddressFormRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'octet_1' => 'required|int|min:1|max:255',
            'octet_2' => 'required|int|min:1|max:255',
            'octet_3' => 'required|int|min:1|max:255',
            'octet_4' => 'required|int|min:1|max:255',
        ];
    }
}