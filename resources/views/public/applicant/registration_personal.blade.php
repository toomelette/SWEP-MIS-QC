
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SRA Web Portal - Applicant Information</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.css-plugins')
</head>
<body class="hold-transition register-page" style="padding: 30px 50px">
<div class="register-box" style="width: 100%;margin: 0px">

    @php
        $y = \App\Swep\Helpers\Arrays::years(60,0);
        $years = $y;
        $y['PRESENT'] = 'PRESENT';
        $yearsWithPresent = $y;
    @endphp
    <form id="form">
        <div class="register-box-body" style="color:black">
            <div class="clearfix" style="margin-bottom: 20px">
                <div style=" float: left;width: 5%">
                    <img src="{{asset('images/sra.png')}}" style="width: 100%">

                </div>
                <div style=" float: left;width: 94%; padding-left: 10px">
                    <p class="no-margin text-strong"> Sugar Regulatory Administration</p>
                    <p class="no-margin">Araneta St., Bacolod City</p>
                    <h4 class="no-margin">Applicant Information Form</h4>
                </div>



            </div>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Personal Information</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Educational Background</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Eligibility</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Experience</a></li>
                    <li><a href="#tab_5" data-toggle="tab">Trainings</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="row">
                            {!! \App\Swep\ViewHelpers\__form2::textbox('firstname',[
                                'label' => 'First Name:',
                                'cols' => 2,
                            ]) !!}
                            {!! \App\Swep\ViewHelpers\__form2::textbox('middlename',[
                                 'label' => 'Middle Name:',
                                 'cols' => 2,
                             ]) !!}
                            {!! \App\Swep\ViewHelpers\__form2::textbox('lastname',[
                                 'label' => 'Last Name:',
                                 'cols' => 2,
                             ]) !!}
                            {!! \App\Swep\ViewHelpers\__form2::select('name_ext',[
                                 'label' => 'Name Ext.:',
                                 'cols' => 1,
                                 'options' => \App\Swep\Helpers\Arrays::name_extensions(),
                             ]) !!}

                            {!! \App\Swep\ViewHelpers\__form2::select('gender',[
                                'label' => 'Sex.:',
                                'cols' => 1,
                                'options' => \App\Swep\Helpers\Arrays::sex(),
                            ]) !!}

                            {!! \App\Swep\ViewHelpers\__form2::textbox('date_of_birth',[
                                 'label' => 'Birthday:',
                                 'cols' => 2,
                                 'type' => 'date',
                             ]) !!}
                            {!! \App\Swep\ViewHelpers\__form2::select('civil_status',[
                                  'label' => 'Civil Stat:',
                                  'cols' => 2,
                                  'options' => \App\Swep\Helpers\Arrays::civil_status(),
                            ]) !!}
                        </div>
                        <div class="row">
                            {!! \App\Swep\ViewHelpers\__form2::textbox('citizenship',[
                                'label' => 'Citizenship:',
                                'cols' => 2,
                            ]) !!}

                            {!! \App\Swep\ViewHelpers\__form2::select('citizenship_type',[
                                'label' => 'Citizenship by:',
                                'cols' => 2,
                                'options' => ['BIRTH' => 'By Birth' , 'NATURALIZATION' => 'By Naturalization'],
                            ]) !!}

                            {!! \App\Swep\ViewHelpers\__form2::textbox('contact_no',[
                                'label' => 'Mobile No.:',
                                'cols' => 2,
                            ]) !!}
                            {!! \App\Swep\ViewHelpers\__form2::textbox('email',[
                                'label' => 'Email address:',
                                'cols' => 2,
                            ]) !!}
                            @php
                                $positionsPublished = \App\Models\HRU\PublicationDetails::query()
                                                        ->with('publication')
                                                        ->whereHas('publication',function ($q){
                                                            return $q->where('is_final','=','1');
                                                        })
                                                        ->orderBy('salary_grade','desc')
                                                        ->get()
                                                        ->mapWithKeys(function ($item,$key){
                                                            return [
                                                                $item->slug => $item->item_no.' - '.$item->position,
                                                                ];
                                                        })
                                                        ->toArray();
                            @endphp

                            <div class="col-md-4 dt_filter-parent-div">
                                <label>Position applied for:</label>
                                <select id="position_applied" name="position_applied[]" multiple="multiple"  class="form-control dt_filter filters ">
                                    @forelse($positionsPublished as $slug => $position)
                                        <option value="{{$slug}}">{{$position}}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        </div>



                        <p class="page-header-sm text-info text-strong" style="border-bottom: 1px solid #cedbe1">
                            Residential Address
                        </p>
                        <div class="row">
                            {!! \App\Swep\ViewHelpers\__form2::textbox('res_block',[
                                'label' => 'Block:',
                                'cols' => 1,
                            ]) !!}
                            {!! \App\Swep\ViewHelpers\__form2::textbox('res_street',[
                                'label' => 'Street:',
                                'cols' => 2,
                            ]) !!}
                            {!! \App\Swep\ViewHelpers\__form2::textbox('res_subdivision',[
                                'label' => 'Subdivision/Village:',
                                'cols' => 3,
                            ]) !!}
                            {!! \App\Swep\ViewHelpers\__form2::textbox('res_barangay',[
                                'label' => 'Barangay:',
                                'cols' => 2,
                            ]) !!}
                            {!! \App\Swep\ViewHelpers\__form2::textbox('res_city',[
                                'label' => 'City:',
                                'cols' => 2,
                            ]) !!}
                            {!! \App\Swep\ViewHelpers\__form2::textbox('res_province',[
                                'label' => 'Province:',
                                'cols' => 2,
                            ]) !!}
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button target="#tab_2" class="btn btn-primary pull-right btn-sm next-btn" type="button"><i class="fa fa-chevron-circle-right"></i> Next</button>
                            </div>
                        </div>
                    </div>
{{--                    EDUCATION--}}
                    <div class="tab-pane" id="tab_2">
                        <table class="table table-bordered table-condensed table-striped">
                            <thead>
                            <tr>

                                <td>Level</td>
                                <td>Name of School</td>
                                <td>Basic Education/Degree/Course</td>
                                <td>Period From</td>
                                <td>Period To</td>
                                <td>Highest Level/Units Earned (if not graduaated)</td>
                                <td>Year Graduated</td>
                                <td>Scholarship/Academic Honors Received</td>
                                <td>
                                    <button class="btn btn-success btn-xs add-btn" target="#educ_bg_template" type="button"><i class="fa fa-plus"></i> Add</button>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">
                                    {!! \App\Swep\ViewHelpers\__form2::selectOnly('educations[irA4w4][level]',[
                                        'class' => 'input-sm',
                                        'options' => \App\Swep\Helpers\Helper::educationalLevels(),
                                        'readonly' => 'readonly',
                                        'copyNameToClass' => 1,
                                        'container_class' => 'd-none'
                                    ],'ELEMENTARY')   !!}
                                    ELEMENTARY
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('educations[irA4w4][school]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('educations[irA4w4][course]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::selectOnly('educations[irA4w4][from]',[
                                        'class' => 'input-sm',
                                        'options' => $years,
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>

                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::selectOnly('educations[irA4w4][to]',[
                                        'class' => 'input-sm',
                                        'options' => $yearsWithPresent,
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('educations[irA4w4][highest_level_earned]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::selectOnly('educations[irA4w4][year_graduated]',[
                                        'class' => 'input-sm',
                                        'options' => $years,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('educations[irA4w4][scholarship]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    {!! \App\Swep\ViewHelpers\__form2::selectOnly('educations[331n90][level]',[
                                        'class' => 'input-sm',
                                        'options' => \App\Swep\Helpers\Helper::educationalLevels(),
                                        'readonly' => 'readonly',
                                        'copyNameToClass' => 1,
                                        'container_class' => 'd-none',
                                    ],'SECONDARY')   !!}
                                    SECONDARY
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('educations[331n90][school]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('educations[331n90][course]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::selectOnly('educations[331n90][from]',[
                                        'class' => 'input-sm',
                                        'options' => $years,
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>

                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::selectOnly('educations[331n90][to]',[
                                        'class' => 'input-sm',
                                        'options' => $yearsWithPresent,
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('educations[331n90][highest_level_earned]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::selectOnly('educations[331n90][year_graduated]',[
                                        'class' => 'input-sm',
                                        'options' => $years,
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('educations[331n90][scholarship]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td></td>
                            </tr>


                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <button target="#tab_1" class="btn btn-primary pull-left btn-sm next-btn" type="button"> <i class="fa fa-chevron-circle-left"></i> Prev</button>
                                <button target="#tab_3" class="btn btn-primary pull-right btn-sm next-btn" type="button"> <i class="fa fa-chevron-circle-right"></i> Next</button>
                            </div>
                        </div>
                    </div>
                    <!--ELIGIBILITY-->
                    <div class="tab-pane" id="tab_3">
                        <table class="table table-bordered table-condensed table-striped">
                            <thead>
                            <tr>

                                <td>Eligibility</td>
                                <td>Rating</td>
                                <td>Date of Examination</td>
                                <td>Place of Examination/ Conferment</td>
                                <td>License No.</td>
                                <td>Date of Validity</td>
                                <td>
                                    <button class="btn btn-success btn-xs add-btn" target="#eligibility_template" type="button"><i class="fa fa-plus"></i> Add</button>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('eligibilities[slug][eligibility]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('eligibilities[slug][rating]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('eligibilities[slug][date]',[
                                        'class' => 'input-sm',
                                        'type' => 'date',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('eligibilities[slug][place]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('eligibilities[slug][license_no]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('eligibilities[slug][license_validity]',[
                                        'class' => 'input-sm',
                                        'type' => 'date',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    <button class="remove_row_btn btn btn-sm btn-danger" type="button"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <button target="#tab_2" class="btn btn-primary pull-left btn-sm next-btn" type="button"> <i class="fa fa-chevron-circle-left"></i> Prev</button>
                                <button target="#tab_4" class="btn btn-primary pull-right btn-sm next-btn" type="button"> <i class="fa fa-chevron-circle-right"></i> Next</button>
                            </div>
                        </div>
                    </div>

                    <!--Work Experience-->
                    <div class="tab-pane" id="tab_4">
                        <table class="table table-bordered table-condensed table-striped">
                            <thead>
                            <tr>

                                <td>From</td>
                                <td>To</td>
                                <td>Position</td>
                                <td>Company</td>
                                <td>Monthly Salary</td>
                                <td>SG/JG/PG</td>
                                <td>Status of Apptmnt</td>
                                <td>Gov't Service</td>
                                <td>
                                    <button class="btn btn-success btn-xs add-btn" target="#experience_template" type="button"><i class="fa fa-plus"></i> Add</button>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][from]',[
                                        'class' => 'input-sm',
                                        'type' => 'date',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][to]',[
                                        'class' => 'input-sm',
                                        'type' => 'date',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][position]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][company]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][monthly_salary]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][sg_si]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][status]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::selectOnly('work_experiences[slug][is_govt]',[
                                        'class' => 'input-sm',
                                        'options' => ['1' => 'YES','0' => 'NO'],
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    <button class="remove_row_btn btn btn-sm btn-danger" type="button"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <button target="#tab_2" class="btn btn-primary pull-left btn-sm next-btn" type="button"> <i class="fa fa-chevron-circle-left"></i> Prev</button>
                                <button target="#tab_5" class="btn btn-primary pull-right btn-sm next-btn" type="button"> <i class="fa fa-chevron-circle-right"></i> Next</button>
                            </div>
                        </div>
                    </div>

                    <!--TRAININGS-->
                    <div class="tab-pane" id="tab_5">
                        <table class="table table-bordered table-condensed table-striped">
                            <thead>
                            <tr>

                                <td>Name of Training</td>
                                <td>From</td>
                                <td>To</td>
                                <td>Number of Hours</td>
                                <td>Type of LD</td>
                                <td>Conducted by</td>
                                <td>
                                    <button class="btn btn-success btn-xs add-btn" target="#training_template" type="button"><i class="fa fa-plus"></i> Add</button>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('trainings[slug][training]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,

                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('trainings[slug][from]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                        'type' => 'date',
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('trainings[slug][to]',[
                                        'class' => 'input-sm',
                                             'type' => 'date',
                                             'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('trainings[slug][number_of_hours]',[
                                        'class' => 'input-sm',
                                        'type' => 'number',
                                        'step' => '0.01',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('trainings[slug][type]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>
                                <td>
                                    {!! \App\Swep\ViewHelpers\__form2::textboxOnly('trainings[slug][conducted_by]',[
                                        'class' => 'input-sm',
                                        'copyNameToClass' => 1,
                                    ])   !!}
                                </td>

                                <td>
                                    <button class="remove_row_btn btn btn-sm btn-danger" type="button"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <button target="#tab_4" class="btn btn-primary pull-left btn-sm next-btn" type="button"> <i class="fa fa-chevron-circle-left"></i> Prev</button>
                                <button type="submit" class="btn btn-success pull-right btn-sm" type="button"> <i class="fa fa-check"></i> Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="qs_container">

            </div>
        </div>
    </form>

</div>

<div>
    <table style="display: none">
        <tr id="educ_bg_template">
            <td>
                {!! \App\Swep\ViewHelpers\__form2::selectOnly('educations[slug][level]',[
                    'class' => 'input-sm',
                    'options' => \App\Swep\Helpers\Arrays::educationalLevelsLimited(),
                    'copyNameToClass' => 1,

                ],'ELEMENTARY')   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('educations[slug][school]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('educations[slug][course]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::selectOnly('educations[slug][from]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                    'options' => $years,
                ])   !!}
            </td>

            <td>
                {!! \App\Swep\ViewHelpers\__form2::selectOnly('educations[slug][to]',[
                    'class' => 'input-sm',
                    'options' => $yearsWithPresent,
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('educations[slug][highest_level_earned]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::selectOnly('educations[slug][year_graduated]',[
                    'class' => 'input-sm',
                    'options' => $years,
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('educations[slug][scholarship]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                <button class="remove_row_btn btn btn-sm btn-danger" type="button"><i class="fa fa-times"></i></button>
            </td>
        </tr>
        <tr id="eligibility_template">
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('eligibilities[slug][eligibility]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('eligibilities[slug][rating]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('eligibilities[slug][date]',[
                    'class' => 'input-sm',
                    'type' => 'date',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('eligibilities[slug][place]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('eligibilities[slug][license_no]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('eligibilities[slug][license_validity]',[
                    'class' => 'input-sm',
                    'type' => 'date',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                <button class="remove_row_btn btn btn-sm btn-danger" type="button"><i class="fa fa-times"></i></button>
            </td>
        </tr>
        <tr id="experience_template">
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][from]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                    'type' => 'date',
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][to]',[
                    'class' => 'input-sm',
                    'type' => 'date',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][position]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][company]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][monthly_salary]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][sg_si]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('work_experiences[slug][status]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::selectOnly('work_experiences[slug][is_govt]',[
                    'class' => 'input-sm',
                    'options' => ['1' => 'YES','0' => 'NO'],
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                <button class="remove_row_btn btn btn-sm btn-danger" type="button"><i class="fa fa-times"></i></button>
            </td>
        </tr>
        <tr id="training_template">
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('trainings[slug][training]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('trainings[slug][from]',[
                    'class' => 'input-sm',
                    'type' => 'date',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('trainings[slug][to]',[
                    'class' => 'input-sm',
                     'type' => 'date',
                     'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('trainings[slug][number_of_hours]',[
                    'class' => 'input-sm',
                    'type' => 'number',
                    'step' => '0.01',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('trainings[slug][type]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>
            <td>
                {!! \App\Swep\ViewHelpers\__form2::textboxOnly('trainings[slug][conducted_by]',[
                    'class' => 'input-sm',
                    'copyNameToClass' => 1,
                ])   !!}
            </td>

            <td>
                <button class="remove_row_btn btn btn-sm btn-danger" type="button"><i class="fa fa-times"></i></button>
            </td>
        </tr>
    </table>
</div>
@include('layouts.js-plugins')

<script type="text/javascript">
    $(".next-btn").click(function (){
        let btn = $(this);
        $("a[href='"+btn.attr('target')+"']").trigger('click');
    })

    $(".add-btn").click(function (){
        let tbl = $(this).parents('table');
        let id = 'a'+makeId(8);
        let html = $($(this).attr('target')).html();
        tbl.find('tbody').append('<tr>'+html.replaceAll('slug',id)+'</tr>');
    })

    $("#form").submit(function (e) {
        e.preventDefault()
        let form = $(this);
        loading_btn(form);
        $.ajax({
            url : '{{route("public.applicant_form.submit")}}',
            data : form.serialize(),
            type: 'POST',
            headers: {
                {!! __html::token_header() !!}
            },
            success: function (res) {
                 console.log(res);
                 succeed(form,false,false);
                 markTabs(form);
            },
            error: function (res) {
                errored(form,res);
                markTabs(form);
            }
        })
    })
    $("#position_applied").select2({
        multiple : true,
        maximumSelectionLength : 5,
    })

    $('#position_applied').on('change', function (e) {
        $.ajax({
            url : '{{route("public.applicant_form.get_qs")}}',
            data : {positions: $(this).val()},
            type: 'GET',
            headers: {
                {!! __html::token_header() !!}
            },
            success: function (res) {
                $("#qs_container").html(res);
            },
            error: function (res) {
                console.log(res);
            }
        })
    });

</script>
</body>
</html>
