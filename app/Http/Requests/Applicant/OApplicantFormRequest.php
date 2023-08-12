<?php

namespace App\Http\Requests\Applicant;

use App\Swep\Helpers\Arrays;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OApplicantFormRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'gender' => [
                'required',
                Rule::in(Arrays::sex()),
            ],
            'date_of_birth' => 'required|date_format:Y-m-d',
            'civil_status' => [
                'required',
                Rule::in(Arrays::civil_status()),
            ],
            'position_applied.*' => 'required|string',
            'citizenship' => 'required|string|max:255',
            'citizenship_type' => 'required|string|max:255',
            'contact_no' => 'required|string|max:255',
            'email' => 'required|email|max:255',

            'res_barangay' => 'required|string|max:255',
            'res_city' => 'required|string|max:255',
            'res_province' => 'required|string|max:255',

            'educations.*.level' => 'required|string|max:255',
            'educations.*.school' => 'required|string|max:255',
            'educations.*.from' => 'required|string|max:255',

            'eligibilities.*.eligibility' => 'required|string|max:255',
            'eligibilities.*.date' => 'required|date_format:Y-m-d',
            'eligibilities.*.place' => 'required|string|max:255',

            'work_experiences.*.from' => 'required|date_format:Y-m-d',
            'work_experiences.*.to' => 'nullable|date_format:Y-m-d',
            'work_experiences.*.position' => 'required|string|max:255',
            'work_experiences.*.company' => 'required|string|max:255',
            'work_experiences.*.is_govt' => 'required|string|max:255',

            'trainings.*.training' => 'required|string|max:255',
            'trainings.*.from' => 'required|date_format:Y-m-d',
            'trainings.*.to' => 'required|date_format:Y-m-d',
            'trainings.*.conducted_by' => 'required|string|max:255',
            'trainings.*.number_of_hours' => 'required|decimal:0,2|max:255',
        ];
        //Require course if not elementary and secondary
        foreach($this->educations as $key => $education){
            $rules['educations.'.$key.'.course'] = [
                Rule::requiredIf(function () use($key,$education){
                    if(in_array($this->educations[$key]['level'],Arrays::educationalLevelsLimited())){
                        return true;
                    }else{
                        return false;
                    }
                })
            ];
            $rules['educations.'.$key.'.to'] = [
                Rule::requiredIf(function () use($key,$education){
                    if(!in_array($this->educations[$key]['level'],Arrays::educationalLevelsLimited())){
                        return true;
                    }else{
                        return false;
                    }
                })
            ];
            $rules['educations.'.$key.'.highest_level_earned'] = [
                Rule::requiredIf(function () use($key,$education){
                    if($this->educations[$key]['year_graduated'] == null){
                        return true;
                    }else{
                        return false;
                    }
                })
            ];
        }

        return $rules;
    }

    public function messages(){
        return [
            'work_experiences.*.to' => [
                'date_format' => 'Must be in mm/dd/yyyy format.',
            ],
            'work_experiences.*.from' => [
                'required' => 'The field is required.',
                'date_format' => 'Must be in mm/dd/yyyy format.',
            ],

            'trainings.*.to' => [
                'required' => 'The field is required.',
                'date_format' => 'Must be in mm/dd/yyyy format.',
            ],

            'trainings.*.from' => [
                'required' => 'The field is required.',
                'date_format' => 'Must be in mm/dd/yyyy format.',
            ],
        ];
    }
}