<?php
  $medical_history_options = [
    'Hypertension' ,
    'Vertigo/Chronic Headache',
    'Diabetes',
    'High Cholesterol',
    'Asthma',
    'Tuberculosis',
    'EENT Disorder',
    'Chronic Obstructive Pulmonary Disease (COPD)',
    'Heart Disorder',
    'Kidney Disease',
    'Liver/Gallbladder Disease',
    'Peptic Ulcer',
    'UTI',
    'Allergies',
    'Infectious Disease',
    'Stress Disorder',
    'Measles',
    'Chicken Pox',
    'Depression/Anxiety Disorder',
    'Hepatitis',
    'Anemia',
    'Epilepsy'
  ];

?>
@extends('layouts.admin-master')

@section('content')
  <section class="content-header">
      <h1>Edit Employee</h1>
      <div class="pull-right" style="margin-top: -25px;">
       {!! __html::back_button(['dashboard.employee.index', 'dashboard.employee.show']) !!}
      </div>
  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
        <div class="pull-right">
            <code>Fields with asterisks(*) are required</code>
        </div>
      </div>


      <form id="edit_employee_form" autocomplete="off">

        @csrf
        <input name="slug" value="{{$employee->slug}}" type="hidden">
        <div class="box-body">


          @if($errors->all())
            {!! __html::alert('danger', '<i class="icon fa fa-ban"></i> Oops!', 'Please check if there are errors on other fields.') !!}
          @endif


          {{-- Navigation --}}
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#pi" data-toggle="tab">Personal Info</a></li>
              <li><a href="#fi" data-toggle="tab">Family Information</a></li>
              <li><a href="#ad" data-toggle="tab">Appointment Details</a></li>
{{--              <li><a href="#cre" data-toggle="tab">Credentials</a></li>--}}
              <li><a href="#or" data-toggle="tab">Other Records</a></li>
              <li><a href="#oq" data-toggle="tab">Other Questions</a></li>
{{--              <li><a href="#health_declaration" data-toggle="tab">201 File <span class="label label-success">NEW</span></a></li>--}}
            </ul>

            <div class="tab-content">

              {{-- Personal Info --}}
              <div class="tab-pane active" id="pi">
                <div class="row">





                  {{-- Personal Info --}}
                  <div class="col-md-12">
                    <div class="box">

                      <div class="box-header with-border">
                        <h3 class="box-title">Personal Information</h3>
                      </div>

                      <div class="box-body">

                        {!! __form::textbox(
                           '3 lastname', 'lastname', 'text', 'Lastname *', 'Lastname', old('lastname') ? old('lastname') : $employee->lastname, $errors->has('lastname'), $errors->first('lastname'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 firstname', 'firstname', 'text', 'Firstname *', 'Firstname', old('firstname') ? old('firstname') : $employee->firstname, $errors->has('firstname'), $errors->first('firstname'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 middlename', 'middlename', 'text', 'Middlename *', 'Middlename', old('middlename') ? old('middlename') : $employee->middlename, $errors->has('middlename'), $errors->first('middlename'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 name_ext', 'name_ext', 'text', 'Name Extension', 'Name Extension', old('name_ext') ? old('name_ext') : $employee->name_ext, $errors->has('name_ext'), $errors->first('name_ext'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::datepicker(
                          '3 date_of_birth', 'date_of_birth',  'Date of Birth *', old('date_of_birth') ? old('date_of_birth') : $employee->date_of_birth, $errors->has('date_of_birth'), $errors->first('date_of_birth')
                        ) !!}

                        {!! __form::textbox(
                           '6 place_of_birth', 'place_of_birth', 'text', 'Place of Birth *', 'Place of Birth', old('place_of_birth') ? old('place_of_birth') : $employee->place_of_birth, $errors->has('place_of_birth'), $errors->first('place_of_birth'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::select_static(
                          '3 sex', 'sex', 'Sex *', old('sex') ? old('sex') : $employee->sex, ['MALE' => 'MALE', 'FEMALE' => 'FEMALE'], $errors->has('sex'), $errors->first('sex'), '', ''
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::select_static(
                          '3 civil_status', 'civil_status', 'Civil Status *', old('civil_status') ? old('civil_status') : $employee->civil_status, __static::civil_status(), $errors->has('civil_status'), $errors->first('civil_status'), '', ''
                        ) !!}

                        {!! __form::textbox(
                           '3 height', 'height', 'text', 'Height', 'Height', old('height') ? old('height') : $employee->height, $errors->has('height'), $errors->first('height'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 weight', 'weight', 'text', 'Weight', 'Weight', old('weight') ? old('weight') : $employee->weight, $errors->has('weight'), $errors->first('weight'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 blood_type', 'blood_type', 'text', 'Blood Type *', 'Blood Type', old('blood_type') ? old('blood_type') : $employee->blood_type, $errors->has('blood_type'), $errors->first('blood_type'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '3 tel_no', 'tel_no', 'text', 'Telephone No.', 'Telephone No.', old('tel_no') ? old('tel_no') : $employee->tel_no, $errors->has('tel_no'), $errors->first('tel_no'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 cell_no', 'cell_no', 'text', 'Cellphone No. *', 'Cellphone No.', old('cell_no') ? old('cell_no') : $employee->cell_no, $errors->has('cell_no'), $errors->first('cell_no'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 email', 'email', 'text', 'Email Address', 'Email Address', old('email') ? old('email') : $employee->email, $errors->has('email'), $errors->first('email'), ''
                        ) !!}

                        {!! __form::select_static(
                          '3 citizenship', 'citizenship', 'Citizenship *', old('citizenship') ? old('citizenship') : $employee->citizenship, ['Filipino' => 'Filipino', 'Dual Citizenship' => 'Dual Citizenship'], $errors->has('citizenship'), $errors->first('citizenship'), '', ''
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::select_static(
                          '3 citizenship_type', 'citizenship_type', 'Citizenship Type *', old('citizenship_type') ? old('citizenship_type') : $employee->citizenship_type, ['by birth' => 'BB', 'by naturalization' => 'BN'], $errors->has('citizenship_type'), $errors->first('citizenship_type'), '', ''
                        ) !!}

                        {!! __form::textbox(
                           '3 dual_citizenship_country', 'dual_citizenship_country', 'text', 'If (Dual Citizenship) Pls. Indicate Country', 'Specify', old('dual_citizenship_country') ? old('dual_citizenship_country') : $employee->dual_citizenship_country, $errors->has('dual_citizenship_country'), $errors->first('dual_citizenship_country'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 agency_no', 'agency_no', 'text', 'Agency Employee No.', 'Agency Employee No.', old('agency_no') ? old('agency_no') : $employee->agency_no, $errors->has('agency_no'), $errors->first('agency_no'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 gov_id', 'gov_id', 'text', 'Government Issued ID', '(i.e. Passport, GSIS, SSS, PRC, etc.)', old('gov_id') ? old('gov_id') : $employee->gov_id, $errors->has('gov_id'), $errors->first('gov_id'), ''
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '3 license_passport_no', 'license_passport_no', 'text', 'ID / License / Passport No.:', 'PLEASE INDICATE ID Number', old('license_passport_no') ? old('license_passport_no') : $employee->license_passport_no, $errors->has('license_passport_no'), $errors->first('license_passport_no'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 id_date_issue', 'id_date_issue', 'text', 'Date / Place of Issuance', 'Date / Place of Issuance', old('id_date_issue') ? old('id_date_issue') : $employee->id_date_issue, $errors->has('id_date_issue'), $errors->first('id_date_issue'), ''
                        ) !!}

                      </div>
                    </div>
                  </div>

                  <div class="col-md-12"></div>





                  {{-- Address --}}
                  <div class="col-md-6" style="padding-top: 30px;">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Residential Address</h3>
                      </div>
                      <div class="box-body">

                        {!! __form::textbox(
                           '6 res_address_block', 'res_address_block', 'text', 'Block', 'Block', old('res_address_block') ? old('res_address_block') : optional($employee->employeeAddress)->res_address_block , $errors->has('res_address_block'), $errors->first('res_address_block'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 res_address_street', 'res_address_street', 'text', 'Street', 'Street', old('res_address_street') ? old('res_address_street') : optional($employee->employeeAddress)->res_address_street, $errors->has('res_address_street'), $errors->first('res_address_street'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 res_address_village', 'res_address_village', 'text', 'Village', 'Village', old('res_address_village') ? old('res_address_village') : optional($employee->employeeAddress)->res_address_village, $errors->has('res_address_village'), $errors->first('res_address_village'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 res_address_barangay', 'res_address_barangay', 'text', 'Barangay *', 'Barangay', old('res_address_barangay') ? old('res_address_barangay') : optional($employee->employeeAddress)->res_address_barangay, $errors->has('res_address_barangay'), $errors->first('res_address_barangay'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 res_address_city', 'res_address_city', 'text', 'City *', 'City', old('res_address_city') ? old('res_address_city') : optional($employee->employeeAddress)->res_address_city, $errors->has('res_address_city'), $errors->first('res_address_city'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 res_address_province', 'res_address_province', 'text', 'Province *', 'Province', old('res_address_province') ? old('res_address_province') : optional($employee->employeeAddress)->res_address_province, $errors->has('res_address_province'), $errors->first('res_address_province'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 res_address_zipcode', 'res_address_zipcode', 'text', 'Zipcode *', 'Zipcode', old('res_address_zipcode') ? old('res_address_zipcode') : optional($employee->employeeAddress)->res_address_zipcode, $errors->has('res_address_zipcode'), $errors->first('res_address_zipcode'), 'data-transform="uppercase"'
                        ) !!}

                      </div>
                    </div>
                  </div>


                  <div class="col-md-6" style="padding-top: 30px;">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Permanent Address</h3>
                        <div class="box-tools">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" id="fill_perm" value=""> the same as Residential Address
                              </label>
                            </div>
                        </div>

                      </div>
                      <div class="box-body">

                        {!! __form::textbox(
                           '6 perm_address_block', 'perm_address_block', 'text', 'Block', 'Block', old('perm_address_block') ? old('perm_address_block') : optional($employee->employeeAddress)->perm_address_block, $errors->has('perm_address_block'), $errors->first('perm_address_block'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 perm_address_street', 'perm_address_street', 'text', 'Street', 'Street', old('perm_address_street') ? old('perm_address_street') : optional($employee->employeeAddress)->perm_address_street, $errors->has('perm_address_street'), $errors->first('perm_address_street'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 perm_address_village', 'perm_address_village', 'text', 'Village', 'Village', old('perm_address_village') ? old('perm_address_village') : optional($employee->employeeAddress)->perm_address_village, $errors->has('perm_address_village'), $errors->first('perm_address_village'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 perm_address_barangay', 'perm_address_barangay', 'text', 'Barangay *', 'Barangay', old('perm_address_barangay') ? old('perm_address_barangay') : optional($employee->employeeAddress)->perm_address_barangay, $errors->has('perm_address_barangay'), $errors->first('perm_address_barangay'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 perm_address_city', 'perm_address_city', 'text', 'City *', 'City', old('perm_address_city') ? old('perm_address_city') : optional($employee->employeeAddress)->perm_address_city, $errors->has('perm_address_city'), $errors->first('perm_address_city'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 perm_address_province', 'perm_address_province', 'text', 'Province *', 'Province', old('perm_address_province') ? old('perm_address_province') : optional($employee->employeeAddress)->perm_address_province, $errors->has('perm_address_province'), $errors->first('perm_address_province'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 perm_address_zipcode', 'perm_address_zipcode', 'text', 'Zipcode *', 'Zipcode', old('perm_address_zipcode') ? old('perm_address_zipcode') : optional($employee->employeeAddress)->perm_address_zipcode, $errors->has('perm_address_zipcode'), $errors->first('perm_address_zipcode'), 'data-transform="uppercase"'
                        ) !!}

                      </div>
                    </div>
                  </div>

                </div>
              </div>


              {{-- Family Info --}}
              <div class="tab-pane" id="fi">
                <div class="row">

                  <div class="col-md-6">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Father's Info</h3>
                      </div>
                      <div class="box-body">

                        {!! __form::textbox(
                           '6 father_lastname', 'father_lastname', 'text', 'Lastname *', 'Lastname', old('father_lastname') ? old('father_lastname') : optional($employee->employeeFamilyDetail)->father_lastname, $errors->has('father_lastname'), $errors->first('father_lastname'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 father_firstname', 'father_firstname', 'text', 'Firstname *', 'Firstname', old('father_firstname') ? old('father_firstname') : optional($employee->employeeFamilyDetail)->father_firstname, $errors->has('father_firstname'), $errors->first('father_firstname'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 father_middlename', 'father_middlename', 'text', 'Middlename *', 'Middlename', old('father_middlename') ? old('father_middlename') : optional($employee->employeeFamilyDetail)->father_middlename, $errors->has('father_middlename'), $errors->first('father_middlename'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 father_name_ext', 'father_name_ext', 'text', 'Name Extension', 'Name Extension', old('father_name_ext') ? old('father_name_ext') : optional($employee->employeeFamilyDetail)->father_name_ext, $errors->has('father_name_ext'), $errors->first('father_name_ext'), 'data-transform="uppercase"'
                        ) !!}

                      </div>
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Mother's Info</h3>
                      </div>
                      <div class="box-body">

                        {!! __form::textbox(
                           '6 mother_lastname', 'mother_lastname', 'text', 'Lastname *', 'Lastname', old('mother_lastname') ? old('mother_lastname') : optional($employee->employeeFamilyDetail)->mother_lastname, $errors->has('mother_lastname'), $errors->first('mother_lastname'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 mother_firstname', 'mother_firstname', 'text', 'Firstname *', 'Firstname', old('mother_firstname') ? old('mother_firstname') : optional($employee->employeeFamilyDetail)->mother_firstname, $errors->has('mother_firstname'), $errors->first('mother_firstname'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 mother_middlename', 'mother_middlename', 'text', 'Middlename *', 'Middlename', old('mother_middlename') ? old('mother_middlename') : optional($employee->employeeFamilyDetail)->mother_middlename, $errors->has('mother_middlename'), $errors->first('mother_middlename'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 mother_name_ext', 'mother_name_ext', 'text', 'Name Extension', 'Name Extension', old('mother_name_ext') ? old('mother_name_ext') : optional($employee->employeeFamilyDetail)->mother_name_ext, $errors->has('mother_name_ext'), $errors->first('mother_name_ext'), 'data-transform="uppercase"'
                        ) !!}

                      </div>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Spouse's Info</h3>
                      </div>
                      <div class="box-body">

                        {!! __form::textbox(
                           '3 spouse_lastname', 'spouse_lastname', 'text', 'Lastname', 'Lastname', old('spouse_lastname') ? old('spouse_lastname') : optional($employee->employeeFamilyDetail)->spouse_lastname, $errors->has('spouse_lastname'), $errors->first('spouse_lastname'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 spouse_firstname', 'spouse_firstname', 'text', 'Firstname', 'Firstname', old('spouse_firstname') ? old('spouse_firstname') : optional($employee->employeeFamilyDetail)->spouse_firstname, $errors->has('spouse_firstname'), $errors->first('spouse_firstname'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 spouse_middlename', 'spouse_middlename', 'text', 'Middlename', 'Middlename', old('spouse_middlename') ? old('spouse_middlename') : optional($employee->employeeFamilyDetail)->spouse_middlename, $errors->has('spouse_middlename'), $errors->first('spouse_middlename'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 spouse_name_ext', 'spouse_name_ext', 'text', 'Name Extension', 'Name Extension', old('spouse_name_ext') ? old('spouse_name_ext') : optional($employee->employeeFamilyDetail)->spouse_name_ext, $errors->has('spouse_name_ext'), $errors->first('spouse_name_ext'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '3 spouse_occupation', 'spouse_occupation', 'text', 'Occupation', 'Occupation', old('spouse_occupation') ? old('spouse_occupation') : optional($employee->employeeFamilyDetail)->spouse_occupation, $errors->has('spouse_occupation'), $errors->first('spouse_occupation'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 spouse_employer', 'spouse_employer', 'text', 'Employer / Business Name', 'Employer / Business Name', old('spouse_employer') ? old('spouse_employer') : optional($employee->employeeFamilyDetail)->spouse_employer, $errors->has('spouse_employer'), $errors->first('spouse_employer'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 spouse_business_address', 'spouse_business_address', 'text', 'Business Address', 'Business Address', old('spouse_business_address') ? old('spouse_business_address') : optional($employee->employeeFamilyDetail)->spouse_business_address, $errors->has('spouse_business_address'), $errors->first('spouse_business_address'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 spouse_tel_no', 'spouse_tel_no', 'text', 'Telephone No.', 'Telephone No.', old('spouse_tel_no') ? old('spouse_tel_no') : optional($employee->employeeFamilyDetail)->spouse_tel_no, $errors->has('spouse_tel_no'), $errors->first('spouse_tel_no'), 'data-transform="uppercase"'
                        ) !!}

                      </div>
                    </div>
                  </div>




                  {{-- Children --}}
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Children</h3>
                        <button id="children_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
                      </div>

                      <div class="box-body no-padding">

                        <table class="table table-bordered">

                          <tr>
                            <th>Fullname *</th>
                            <th>Date of Birth *</th>
                            <th style="width: 40px"></th>
                          </tr>

                          <tbody id="children_table_body">

                            @if(old('row_children'))

                              @foreach(old('row_children') as $key => $value)

                                <tr>

                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_children['. $key .'][fullname]', 'Fullname', $value['fullname'], $errors->first('row_children.'. $key .'.fullname')
                                    ) !!}
                                  </td>

                                  <td>
                                    {!! __form::datepicker_for_dt(
                                      'row_children['. $key .'][date_of_birth]', $value['date_of_birth'], $errors->first('row_children.'. $key .'.date_of_birth')
                                    ) !!}
                                  </td>

                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>

                              @endforeach

                            @else

                              @foreach($employee->employeeChildren as $key => $data)
                                <tr>

                                  <td>
                                    {!! __form::textbox_for_dt('row_children['. $key .'][fullname]', 'Fullname', $data->fullname, '') !!}
                                  </td>

                                  <td>
                                    {!! __form::datepicker_for_dt('row_children['. $key .'][date_of_birth]', $data->date_of_birth, '') !!}
                                  </td>

                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>
                              @endforeach

                            @endif

                            </tbody>

                        </table>

                      </div>
                    </div>
                  </div>


                </div>
              </div>


              {{-- Appointment Details --}}
              <div class="tab-pane" id="ad">
                <div class="row">

                  <div class="col-md-12">
                    <div class="box">

                      <div class="box-header with-border">
                        <h3 class="box-title">Appointment Details</h3>
                      </div>

                      <div class="box-body">

                        {!! __form::textbox(
                          '3 employee_no', 'employee_no', 'text', 'Employee No. *', 'Employee No.', old('employee_no') ? old('employee_no') : $employee->employee_no, $errors->has('employee_no'), $errors->first('employee_no'), ''
                        ) !!}

                        {!! __form::textbox(
                          '3 position', 'position', 'text', 'Position *', 'Position', old('position') ? old('position') : $employee->position, $errors->has('position'), $errors->first('position'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                          '3 item_no', 'item_no', 'text', 'Item No.', 'Item No.', old('item_no') ? old('item_no') : $employee->item_no, $errors->has('item_no'), $errors->first('item_no'), ''
                        ) !!}

                        {!! __form::select_static(
                          '3 appointment_status', 'appointment_status', 'Appointment Status *', old('appointment_status') ? old('appointment_status') : $employee->appointment_status, \App\Swep\Helpers\Helper::populateOptionsFromObjectAsArray(\App\Models\SuOptions::employeeApptStatus(),'option','value'), $errors->has('appointment_status'), $errors->first('appointment_status'), '', ''
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                          '3 salary_grade', 'salary_grade', 'text', 'Salary Grade', 'Salary Grade', old('salary_grade') ? old('salary_grade') : $employee->salary_grade, $errors->has('salary_grade'), $errors->first('salary_grade'), ''
                        ) !!}

                        {!! __form::textbox(
                          '3 step_inc', 'step_inc', 'text', 'Step Increment', 'Step Increment', old('step_inc') ? old('step_inc') : $employee->step_inc, $errors->has('step_inc'), $errors->first('step_inc'), ''
                        ) !!}

                        {!! __form::select_dynamic(
                          '3 department_id', 'department_id', 'Department *', old('department_id') ? old('department_id') : $employee->department_id, $global_departments_all, 'department_id', 'name', $errors->has('department_id'), $errors->first('department_id'), '', ''
                        ) !!}

                        {!! __form::select_dynamic(
                          '3 department_unit_id', 'department_unit_id', 'Unit *', old('department_unit_id') ? old('department_unit_id') : $employee->department_unit_id, $global_department_units_all, 'department_unit_id', 'description', $errors->has('department_unit_id'), $errors->first('department_unit_id'), '', ''
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox_numeric(
                          '3 monthly_basic', 'monthly_basic', 'text', 'Monthly Basic *', 'Monthly Basic', old('monthly_basic') ? old('monthly_basic') : $employee->monthly_basic, $errors->has('monthly_basic'), $errors->first('monthly_basic'), ''
                        ) !!}

{{--                        {!! __form::textbox_numeric(--}}
{{--                          '3 aca', 'aca', 'text', 'ACA', 'ACA', old('aca') ? old('aca') : $employee->aca, $errors->has('aca'), $errors->first('aca'), ''--}}
{{--                        ) !!}--}}

{{--                        {!! __form::textbox_numeric(--}}
{{--                          '3 pera', 'pera', 'text', 'PERA', 'PERA', old('pera') ? old('pera') : $employee->pera, $errors->has('pera'), $errors->first('pera'), ''--}}
{{--                        ) !!}--}}

                        {!! __form::textbox_numeric(
                          '3 food_subsidy', 'food_subsidy', 'text', 'Fixed basic:', 'Fixed basic', old('food_subsidy') ? old('food_subsidy') : $employee->food_subsidy, $errors->has('food_subsidy'), $errors->first('food_subsidy'), ''
                        ) !!}
                        {!! __form::datepicker(
                          '3 firstday_gov', 'firstday_gov',  'First Day to serve Government *', old('firstday_gov') ? old('firstday_gov') : $employee->firstday_gov, $errors->has('firstday_gov'), $errors->first('firstday_gov')
                        ) !!}

                        {!! __form::datepicker(
                          '3 firstday_sra', 'firstday_sra',  'First Day in SRA *', old('firstday_sra') ? old('firstday_sra') : $employee->firstday_sra, $errors->has('firstday_sra'), $errors->first('firstday_sra')
                        ) !!}


                        <div class="col-md-12"></div>

{{--                        {!! __form::textbox_numeric(--}}
{{--                          '3 ra', 'ra', 'text', 'RA', 'RA', old('ra') ? old('ra') : $employee->ra, $errors->has('ra'), $errors->first('ra'), ''--}}
{{--                        ) !!}--}}

{{--                        {!! __form::textbox_numeric(--}}
{{--                          '3 ta', 'ta', 'text', 'TA', 'TA', old('ta') ? old('ta') : $employee->ta, $errors->has('ta'), $errors->first('ta'), ''--}}
{{--                        ) !!}--}}

                        <div class="col-md-12"></div>


                        {!! __form::datepicker(
                          '3 appointment_date', 'appointment_date',  'Appointment Date', old('appointment_date') ? old('appointment_date') : $employee->appointment_date, $errors->has('appointment_date'), $errors->first('appointment_date')
                        ) !!}

                        {!! __form::datepicker(
                          '3 adjustment_date', 'adjustment_date',  'Date of Last Promotion', old('adjustment_date') ? old('adjustment_date') : $employee->adjustment_date, $errors->has('adjustment_date'), $errors->first('adjustment_date')
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::select_dynamic(
                          '2 project_id', 'project_id', 'Station *', old('project_id') ? old('project_id') : $employee->project_id, $global_projects_all, 'project_id', 'project_address', $errors->has('project_id'), $errors->first('project_id'), '', ''
                        ) !!}

                        {!! __form::select_static(
                          '2 is_active', 'is_active', 'Status *', old('is_active') ? old('is_active') : $employee->is_active, \App\Swep\Helpers\Helper::populateOptionsFromObjectAsArray(\App\Models\SuOptions::employeeStatus(),'option','value'), $errors->has('is_active'), $errors->first('is_active'), '', ''
                        ) !!}

                        {!! __form::select_static(
                          '3 locations', 'locations', 'Groupings *', old('locations') ? old('locations') : $employee->locations, \App\Swep\Helpers\Helper::populateOptionsFromObjectAsArray(\App\Models\SuOptions::employeeGroupings(),'option','value'), $errors->has('locations'), $errors->first('locations'), '', ''
                        ) !!}

                        {!! \App\Swep\ViewHelpers\__form2::select('assignment',[
                          'label' => 'Assignment:',
                          'cols' => 2,
                          'options' => [
                            'OFFICE-BASED' => 'OFFICE-BASED',
                            'FIELD' => 'FIELD',
                          ]
                        ], $employee ?? null) !!}
                        {!! \App\Swep\ViewHelpers\__form2::textbox('assignment_details',[
                          'label' => 'Assignment Details:',
                          'cols' => 3,

                        ], $employee ?? null) !!}
                      </div>
                    </div>
                  </div>




                  {{-- Personal ID's --}}
                  <div class="col-md-12">
                    <div class="box">

                      <div class="box-header with-border">
                        <h3 class="box-title">Personal ID's</h3>
                      </div>

                      <div class="box-body">


                        {!! __form::textbox(
                           '3 gsis', 'gsis', 'text', 'GSIS', 'GSIS', old('gsis') ? old('gsis') : $employee->gsis, $errors->has('gsis'), $errors->first('gsis'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 philhealth', 'philhealth', 'text', 'PHILHEALTH', 'PHILHEALTH', old('philhealth') ? old('philhealth') : $employee->philhealth, $errors->has('philhealth'), $errors->first('philhealth'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 tin', 'tin', 'text', 'TIN', 'TIN', old('tin') ? old('tin') : $employee->tin, $errors->has('tin'), $errors->first('tin'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 sss', 'sss', 'text', 'SSS', 'SSS', old('sss') ? old('sss') : $employee->sss, $errors->has('sss'), $errors->first('sss'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 hdmf', 'hdmf', 'text', 'HDMF', 'HDMF', old('hdmf') ? old('hdmf') : $employee->hdmf, $errors->has('hdmf'), $errors->first('hdmf'), ''
                        ) !!}

                        {!! __form::textbox_numeric(
                          '3 hdmfpremiums', 'hdmfpremiums', 'text', 'HDMF Premiums', 'HDMF Premiums', old('hdmfpremiums') ? old('hdmfpremiums') : $employee->hdmfpremiums, $errors->has('hdmfpremiums'), $errors->first('hdmfpremiums'), ''
                        ) !!}


                      </div>
                    </div>
                  </div>

                </div>
              </div>



              {{-- Credentials --}}
              <div class="tab-pane" id="cre">
                <div class="row">


                  <div class="col-md-12">
                    <div class="box">

                      <div class="box-header with-border">
                        <h3 class="box-title">Educational Background</h3>
                        <button id="eb_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
                      </div>

                      <div class="box-body">

                        <table class="table table-bordered">

                          <tr>
                            <th>Level *</th>
                            <th style="width:20em;">Name of School *</th>
                            <th style="width:15em;">Course</th>
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Units</th>
                            <th>Graduate Year *</th>
                            <th style="width:15em;">Scholarship</th>
                            <th style="width: 40px"></th>
                          </tr>

                          <tbody id="eb_table_body">

                            @if(old('row_eb'))

                              @foreach(old('row_eb') as $key => $value)

                                <tr>

                                  <td>
                                    {!! __form::select_static_for_dt(
                                      'row_eb['. $key .'][level]', __static::educ_level(), $value['level'], $errors->first('row_eb.'. $key .'.level')
                                    ) !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_eb['. $key .'][school_name]', 'Name of School', $value['school_name'], $errors->first('row_eb.'. $key .'.school_name')
                                    ) !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_eb['. $key .'][course]', 'Course', $value['course'], $errors->first('row_eb.'. $key .'.course')
                                    ) !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_eb['. $key .'][date_from]', 'Date From', $value['date_from'], $errors->first('row_eb.'. $key .'.date_from')
                                    ) !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_eb['. $key .'][date_to]', 'Date To', $value['date_to'], $errors->first('row_eb.'. $key .'.date_to')
                                    ) !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_eb['. $key .'][units]', 'Units', $value['units'], $errors->first('row_eb.'. $key .'.units')
                                    ) !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_eb['. $key .'][graduate_year]', 'Year', $value['graduate_year'], $errors->first('row_eb.'. $key .'.graduate_year')
                                    ) !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_eb['. $key .'][scholarship]', 'Scholarship', $value['scholarship'], $errors->first('row_eb.'. $key .'.scholarship')
                                    ) !!}
                                  </td>

                                  <td>
                                    <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>

                              @endforeach

                            @else

                              @foreach($employee->employeeEducationalBackground as $key => $data)
                                <tr>

                                  <td>
                                    {!! __form::select_static_for_dt('row_eb['. $key .'][level]', __static::educ_level(), $data->level, '') !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt('row_eb['. $key .'][school_name]', 'Name of School', $data->school_name, '') !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt('row_eb['. $key .'][course]', 'Course', $data->course, '') !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt('row_eb['. $key .'][date_from]', 'Date From', $data->date_from, '') !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt('row_eb['. $key .'][date_to]', 'Date To', $data->date_to, '') !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt('row_eb['. $key .'][units]', 'Units', $data->units, '') !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt('row_eb['. $key .'][graduate_year]', 'Year', $data->graduate_year, '') !!}
                                  </td>

                                  <td>
                                    {!! __form::textbox_for_dt('row_eb['. $key .'][scholarship]', 'Scholarship', $data->scholarship, '') !!}
                                  </td>

                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>
                              @endforeach

                            @endif

                            </tbody>

                        </table>
                      </div>
                    </div>
                  </div>




                  {{-- Eligibilities --}}
                  <div class="col-md-12" style="padding-top: 30px;">
                    <div class="box">

                      <div class="box-header with-border">
                        <h3 class="box-title">Eligibilities</h3>
                        <button id="eligibility_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
                      </div>

                      <div class="box-body">

                        <table class="table table-bordered">

                          <tr>
                            <th>Eligibility *</th>
                            <th>Level *</th>
                            <th>Rating</th>
                            <th>Place of Examination *</th>
                            <th>Date of Examination *</th>
                            <th>License No.</th>
                            <th>License Validity</th>
                            <th style="width: 40px"></th>
                          </tr>

                          <tbody id="eligibility_table_body">

                            @if(old('row_eligibility'))

                              @foreach(old('row_eligibility') as $key => $value)

                                <tr>

                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_eligibility['. $key .'][eligibility]', 'Eligibility', $value['eligibility'], $errors->first('row_eligibility.'. $key .'.eligibility')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_eligibility['. $key .'][level]', 'Level', $value['level'], $errors->first('row_eligibility.'. $key .'.level')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_eligibility['. $key .'][rating]', 'Rating', $value['rating'], $errors->first('row_eligibility.'. $key .'.rating')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_eligibility['. $key .'][exam_place]', 'Place of Examination', $value['exam_place'], $errors->first('row_eligibility.'. $key .'.exam_place')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::datepicker_for_dt(
                                      'row_eligibility['. $key .'][exam_date]', $value['exam_date'], $errors->first('row_eligibility.'. $key .'.exam_date')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_eligibility['. $key .'][license_no]', 'License No.', $value['license_no'], $errors->first('row_eligibility.'. $key .'.license_no')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::datepicker_for_dt(
                                      'row_eligibility['. $key .'][license_validity]', $value['license_validity'], $errors->first('row_eligibility.'. $key .'.license_validity')
                                    ) !!}
                                  </td>


                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>

                              @endforeach

                            @else

                              @foreach($employee->employeeEligibility as $key => $data)
                                <tr>

                                  <td>
                                    {!! __form::textbox_for_dt('row_eligibility['. $key .'][eligibility]', 'Eligibility', $data->eligibility, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt('row_eligibility['. $key .'][level]', 'Level', $data->level, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt('row_eligibility['. $key .'][rating]', 'Rating', $data->rating, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt('row_eligibility['. $key .'][exam_place]', 'Place of Examination', $data->exam_place, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::datepicker_for_dt('row_eligibility['. $key .'][exam_date]', $data->exam_date, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt('row_eligibility['. $key .'][license_no]', 'License No.', $data->license_no, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::datepicker_for_dt('row_eligibility['. $key .'][license_validity]', $data->license_validity, '') !!}
                                  </td>


                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>
                              @endforeach

                            @endif

                            </tbody>

                        </table>


                      </div>
                    </div>
                  </div>


                  {{-- Work Experience --}}
                  <div class="col-md-12" style="padding-top: 30px;">
                    <div class="box">

                      <div class="box-header with-border">
                        <h3 class="box-title">Work Experience</h3>
                        <button id="we_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
                      </div>

                      <div class="box-body">

                        <table class="table table-bordered">

                          <tr>
                            <th>Date From *</th>
                            <th>Date to *</th>
                            <th style="width:20em;">Company *</th>
                            <th>Position *</th>
                            <th>Salary *</th>
                            <th>Salary Grade</th>
                            <th>Appointment Status *</th>
                            <th>Gov Service (Y/N) *</th>
                            <th style="width: 40px"></th>
                          </tr>

                          <tbody id="we_table_body">

                            @if(old('row_we'))

                              @foreach(old('row_we') as $key => $value)

                                <tr>

                                  <td>
                                    {!! __form::datepicker_for_dt(
                                      'row_we['. $key .'][date_from]', $value['date_from'], $errors->first('row_we.'. $key .'.date_from')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::datepicker_for_dt(
                                      'row_we['. $key .'][date_to]', $value['date_to'], $errors->first('row_we.'. $key .'.date_to')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_we['. $key .'][company]', 'Company', $value['company'], $errors->first('row_we.'. $key .'.company')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_we['. $key .'][position]', 'Position', $value['position'], $errors->first('row_we.'. $key .'.position')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_numeric_for_dt(
                                      'row_we['. $key .'][salary]', 'Salary', $value['salary'], $errors->first('row_we.'. $key .'.salary')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_we['. $key .'][salary_grade]', 'Salary Grade', $value['salary_grade'], $errors->first('row_we.'. $key .'.salary_grade')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_we['. $key .'][appointment_status]', 'Appointment Status', $value['appointment_status'], $errors->first('row_we.'. $key .'.appointment_status')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::select_static_for_dt(
                                      'row_we['. $key .'][is_gov_service]', ['YES' => 'true', 'NO' => 'false'], $value['is_gov_service'], $errors->first('row_we.'. $key .'.is_gov_service')
                                    ) !!}
                                  </td>


                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>

                              @endforeach

                            @else

                              @foreach($employee->employeeExperience as $key => $data)
                                <tr>

                                  <td>
                                    {!! __form::datepicker_for_dt('row_we['. $key .'][date_from]', $data->date_from, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::datepicker_for_dt('row_we['. $key .'][date_to]', $data->date_to, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt('row_we['. $key .'][company]', 'Company', $data->company, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt('row_we['. $key .'][position]', 'Position', $data->position, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_numeric_for_dt('row_we['. $key .'][salary]', 'Salary', $data->salary, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt('row_we['. $key .'][salary_grade]', 'Salary Grade', $data->salary_grade, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt('row_we['. $key .'][appointment_status]', 'Appointment Status', $data->appointment_status, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::select_static_for_dt('row_we['. $key .'][is_gov_service]', ['YES' => 'true', 'NO' => 'false'], __dataType::boolean_to_string($data->is_gov_service), '') !!}
                                  </td>


                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>
                              @endforeach

                            @endif

                            </tbody>

                        </table>



                      </div>
                    </div>
                  </div>


                </div>
              </div>



              {{-- Other Records --}}
              <div class="tab-pane" id="or">
                <div class="row">


                  {{-- Voluntary Work --}}
                  <div class="col-md-12">

                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Voluntary Work</h3>
                        <button id="vw_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
                      </div>

                      <div class="box-body no-padding">

                        <table class="table table-bordered">

                          <tr>
                            <th>Name of Organization *</th>
                            <th>Address</th>
                            <th>Date from *</th>
                            <th>Date to *</th>
                            <th>Hours</th>
                            <th>Position</th>
                            <th style="width: 40px"></th>
                          </tr>

                          <tbody id="vw_table_body">

                            @if(old('row_vw'))

                              @foreach(old('row_vw') as $key => $value)

                                <tr>

                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_vw['. $key .'][name]', 'Name of Organization', $value['name'], $errors->first('row_vw.'. $key .'.name')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_vw['. $key .'][address]', 'Address of Organization', $value['address'], $errors->first('row_vw.'. $key .'.address')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::datepicker_for_dt(
                                      'row_vw['. $key .'][date_from]', $value['date_from'], $errors->first('row_vw.'. $key .'.date_from')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::datepicker_for_dt(
                                      'row_vw['. $key .'][date_to]', $value['date_to'], $errors->first('row_vw.'. $key .'.date_to')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_vw['. $key .'][hours]', 'Hours', $value['hours'], $errors->first('row_vw.'. $key .'.hours')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_vw['. $key .'][position]', 'Position', $value['position'], $errors->first('row_vw.'. $key .'.position')
                                    ) !!}
                                  </td>


                                  <td>
                                    <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>

                              @endforeach

                            @else

                              @foreach($employee->employeeVoluntaryWork as $key => $data)
                                <tr>

                                  <td>
                                    {!! __form::textbox_for_dt('row_vw['. $key .'][name]', 'Name of Organization', $data->name, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt('row_vw['. $key .'][address]', 'Address of Organization', $data->address,'') !!}
                                  </td>


                                  <td>
                                    {!! __form::datepicker_for_dt('row_vw['. $key .'][date_from]', $data->date_from,'') !!}
                                  </td>


                                  <td>
                                    {!! __form::datepicker_for_dt('row_vw['. $key .'][date_to]', $data->date_to,'') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt('row_vw['. $key .'][hours]', 'Hours', $data->hours,'') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt('row_vw['. $key .'][position]', 'Position', $data->position,'') !!}
                                  </td>


                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>
                              @endforeach

                            @endif

                            </tbody>

                        </table>

                      </div>
                    </div>
                  </div>



                  {{-- Recognitions --}}
                  <div class="col-md-12" style="padding-top: 30px;">

                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Recognitions</h3>
                        <button id="recognition_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
                      </div>

                      <div class="box-body no-padding">

                        <table class="table table-bordered">

                          <tr>
                            <th>Title *</th>
                            <th style="width: 40px"></th>
                          </tr>

                          <tbody id="recognition_table_body">

                            @if(old('row_recognition'))

                              @foreach(old('row_recognition') as $key => $value)

                                <tr>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_recognition['. $key .'][title]', 'Title', $value['title'], $errors->first('row_recognition.'. $key .'.title')
                                    ) !!}
                                  </td>


                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>


                                </tr>

                              @endforeach

                            @else

                              @foreach($employee->employeeRecognition as $key => $data)
                                <tr>

                                  <td>
                                    {!! __form::textbox_for_dt('row_recognition['. $key .'][title]', 'Title', $data->title, '') !!}
                                  </td>


                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>
                              @endforeach

                            @endif

                            </tbody>

                        </table>

                      </div>
                    </div>
                  </div>


                  {{-- Organizations --}}
                  <div class="col-md-12" style="padding-top: 30px;">

                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Organizations</h3>
                        <button id="org_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
                      </div>

                      <div class="box-body no-padding">

                        <table class="table table-bordered">

                          <tr>
                            <th>Name of Organization *</th>
                            <th style="width: 40px"></th>
                          </tr>

                          <tbody id="org_table_body">

                            @if(old('row_org'))

                              @foreach(old('row_org') as $key => $value)

                                <tr>

                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_org['. $key .'][name]', 'Name of Organization', $value['name'], $errors->first('row_org.'. $key .'.name')
                                    ) !!}
                                  </td>


                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>

                              @endforeach

                            @else

                              @foreach($employee->employeeOrganization as $key => $data)
                                <tr>

                                  <td>
                                    {!! __form::textbox_for_dt('row_org['. $key .'][name]', 'Name of Organization', $data->name, '') !!}
                                  </td>


                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>
                              @endforeach

                            @endif

                            </tbody>

                        </table>

                      </div>
                    </div>
                  </div>



                  {{-- Special Skills --}}
                  <div class="col-md-12" style="padding-top: 30px;">

                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Special Skills</h3>
                        <button id="ss_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
                      </div>

                      <div class="box-body no-padding">

                        <table class="table table-bordered">

                          <tr>
                            <th>Special Skills or Hobies *</th>
                            <th style="width: 40px"></th>
                          </tr>

                          <tbody id="ss_table_body">

                            @if(old('row_ss'))

                              @foreach(old('row_ss') as $key => $value)

                                <tr>

                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_ss['. $key .'][description]', 'Special Skills or Hobies', $value['description'], $errors->first('row_ss.'. $key .'.description')
                                    ) !!}
                                  </td>


                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>

                              @endforeach

                            @else

                              @foreach($employee->employeeSpecialSkill as $key => $data)
                                <tr>

                                  <td>
                                    {!! __form::textbox_for_dt('row_ss['. $key .'][description]', 'Special Skills or Hobies', $data->description, '') !!}
                                  </td>


                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>
                              @endforeach

                            @endif

                            </tbody>

                        </table>

                      </div>
                    </div>
                  </div>


                  {{-- References --}}
                  <div class="col-md-12" style="padding-top:30px;">

                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">References</h3>
                        <button id="reference_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
                      </div>

                      <div class="box-body no-padding">

                        <table class="table table-bordered">

                          <tr>
                            <th>Fullname *</th>
                            <th>Address *</th>
                            <th>Tel No. *</th>
                            <th style="width: 40px"></th>
                          </tr>

                          <tbody id="reference_table_body">

                            @if(old('row_reference'))

                              @foreach(old('row_reference') as $key => $value)

                                <tr>

                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_reference['. $key .'][fullname]', 'Fullname', $value['fullname'], $errors->first('row_reference.'. $key .'.fullname')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_reference['. $key .'][address]', 'Address', $value['address'], $errors->first('row_reference.'. $key .'.address')
                                    ) !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt(
                                      'row_reference['. $key .'][tel_no]', 'Telephone No.', $value['tel_no'], $errors->first('row_reference.'. $key .'.tel_no')
                                    ) !!}
                                  </td>


                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>

                              @endforeach

                            @else

                              @foreach($employee->employeeReference as $key => $data)
                                <tr>

                                  <td>
                                    {!! __form::textbox_for_dt('row_reference['. $key .'][fullname]', 'Fullname', $data->fullname, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt('row_reference['. $key .'][address]', 'Address', $data->address, '') !!}
                                  </td>


                                  <td>
                                    {!! __form::textbox_for_dt('row_reference['. $key .'][tel_no]', 'Telephone No.', $data->tel_no, '') !!}
                                  </td>


                                  <td>
                                      <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                                  </td>

                                </tr>
                              @endforeach

                            @endif

                            </tbody>

                        </table>

                      </div>
                    </div>
                  </div>



                </div>
              </div>


              {{-- Questions --}}
              <div class="tab-pane" id="oq">
                <div class="row">

                  <div class="col-md-12" style="padding-bottom: 10px;">
                    <h3>Please answer the following questions:</h3>
                  </div>


                  <div class="col-md-12">

                    <div class="col-md-12">
                      <p class="text-muted well well-sm no-shadow">
                        Are you related by consanguinity or affinity to the appointing or recommending authority, or to the
                        chief of bureau or office or to the person who has immediate supervision over you in the Office,
                        Bureau or Department where you will be apppointed,
                      </p>
                    </div>

                    <div class="col-md-12">
                      <p style="margin-bottom:-10px; font-weight: bold;">a. within the third degree?</p>
                      {!! __form::select_static(
                      '3', 'q_34_a', '', old('q_34_a') ? old('q_34_a') : __dataType::boolean_to_string(optional($employee->employeeOtherQuestion)->q_34_a), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_34_a'), $errors->first('q_34_a'), '', ''
                      ) !!}

                    </div>

                    <div class="col-md-12"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">b. within the fourth degree (for Local Government Unit - Career Employees)?</p>
                      {!! __form::select_static(
                        '6', 'q_34_b', '', old('q_34_b') ? old('q_34_b') : __dataType::boolean_to_string(optional($employee->employeeOtherQuestion)->q_34_b), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_34_b'), $errors->first('q_34_b'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details: </p>
                      {!! __form::textbox(
                       '12', 'q_34_b_yes_details', 'text', '', '', old('q_34_b_yes_details') ? old('q_34_b_yes_details') : optional($employee->employeeOtherQuestion)->q_34_b_yes_details, $errors->has('q_34_b_yes_details'), $errors->first('q_34_b_yes_details'), ''
                    ) !!}
                    </div>

                    <div class="col-md-12" style="border-top:solid 2px; padding-bottom:15px; color:gray;"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">a. Have you ever been found guilty of any administrative offense?</p>
                      {!! __form::select_static(
                        '6', 'q_35_a', '', old('q_35_a') ? old('q_35_a') : __dataType::boolean_to_string(optional($employee->employeeOtherQuestion)->q_35_a), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_35_a'), $errors->first('q_35_a'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details: </p>
                      {!! __form::textbox(
                       '12', 'q_35_a_yes_details', 'text', '', '', old('q_35_a_yes_details') ? old('q_35_a_yes_details') : optional($employee->employeeOtherQuestion)->q_35_a_yes_details, $errors->has('q_35_a_yes_details'), $errors->first('q_35_a_yes_details'), ''
                    ) !!}
                    </div>

                    <div class="col-md-12"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">b. Have you been criminally charged before any court?</p>
                      {!! __form::select_static(
                        '6', 'q_35_b', '', old('q_35_b') ? old('q_35_b') : __dataType::boolean_to_string(optional($employee->employeeOtherQuestion)->q_35_b), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_35_b'), $errors->first('q_35_b'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-3">
                      <p style="margin-bottom:-10px;">If YES, give details (Date Filed):</p>
                      {!! __form::textbox(
                       '12', 'q_35_b_yes_details_1', 'text', '', '', old('q_35_b_yes_details_1') ? old('q_35_b_yes_details_1') : optional($employee->employeeOtherQuestion)->q_35_b_yes_details_1, $errors->has('q_35_b_yes_details_1'), $errors->first('q_35_b_yes_details_1'), ''
                      ) !!}
                    </div>

                    <div class="col-md-3">
                      <p style="margin-bottom:-10px;">(Status of Case/s):</p>
                      {!! __form::textbox(
                       '12', 'q_35_b_yes_details_2', 'text', '', '', old('q_35_b_yes_details_2') ? old('q_35_b_yes_details_2') : optional($employee->employeeOtherQuestion)->q_35_b_yes_details_2, $errors->has('q_35_b_yes_details_2'), $errors->first('q_35_b_yes_details_2'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12" style="border-top:solid 2px; padding-bottom:15px; color:gray;"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">a. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</p>
                      {!! __form::select_static(
                        '6', 'q_36', '', old('q_36') ? old('q_36') : __dataType::boolean_to_string(optional($employee->employeeOtherQuestion)->q_36), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_36'), $errors->first('q_36'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details:</p>
                      {!! __form::textbox(
                       '12', 'q_36_yes_details', 'text', '', '', old('q_36_yes_details') ? old('q_36_yes_details') : optional($employee->employeeOtherQuestion)->q_36_yes_details, $errors->has('q_36_yes_details'), $errors->first('q_36_yes_details'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12" style="border-top:solid 2px; padding-bottom:15px; color:gray;"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">a. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</p>
                      {!! __form::select_static(
                        '6', 'q_37', '', old('q_37') ? old('q_37') : __dataType::boolean_to_string(optional($employee->employeeOtherQuestion)->q_37), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_37'), $errors->first('q_37'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details:</p>
                      {!! __form::textbox(
                       '12', 'q_37_yes_details', 'text', '', '', old('q_37_yes_details') ? old('q_37_yes_details') : optional($employee->employeeOtherQuestion)->q_37_yes_details, $errors->has('q_37_yes_details'), $errors->first('q_37_yes_details'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12" style="border-top:solid 2px; padding-bottom:15px; color:gray;"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</p>
                      {!! __form::select_static(
                        '6', 'q_38_a', '', old('q_38_a') ? old('q_38_a') : __dataType::boolean_to_string(optional($employee->employeeOtherQuestion)->q_38_a), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_38_a'), $errors->first('q_38_a'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details:</p>
                      {!! __form::textbox(
                       '12', 'q_38_a_yes_details', 'text', '', '', old('q_38_a_yes_details') ? old('q_38_a_yes_details') : optional($employee->employeeOtherQuestion)->q_38_a_yes_details, $errors->has('q_38_a_yes_details'), $errors->first('q_38_a_yes_details'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</p>
                      {!! __form::select_static(
                        '6', 'q_38_b', '', old('q_38_b') ? old('q_38_b') : __dataType::boolean_to_string(optional($employee->employeeOtherQuestion)->q_38_b), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_38_b'), $errors->first('q_38_b'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details:</p>
                      {!! __form::textbox(
                       '12', 'q_38_b_yes_details', 'text', '', '', old('q_38_b_yes_details') ? old('q_38_b_yes_details') : optional($employee->employeeOtherQuestion)->q_38_b_yes_details, $errors->has('q_38_b_yes_details'), $errors->first('q_38_b_yes_details'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12" style="border-top:solid 2px; padding-bottom:15px; color:gray;"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">a. Have you acquired the status of an immigrant or permanent resident of another country?</p>
                      {!! __form::select_static(
                        '6', 'q_39', '', old('q_39') ? old('q_39') : __dataType::boolean_to_string(optional($employee->employeeOtherQuestion)->q_39), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_39'), $errors->first('q_39'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details (Country):</p>
                      {!! __form::textbox(
                       '12', 'q_39_yes_details', 'text', '', '', old('q_39_yes_details') ? old('q_39_yes_details') : optional($employee->employeeOtherQuestion)->q_39_yes_details, $errors->has('q_39_yes_details'), $errors->first('q_39_yes_details'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12" style="border-top:solid 2px; padding-bottom:15px; color:gray;"></div>

                    <div class="col-md-12">
                      <p class="text-muted well well-sm no-shadow">
                        Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:
                      </p>
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">a. Are you a member of any indigenous group?</p>
                      {!! __form::select_static(
                        '6', 'q_40_a', '', old('q_40_a') ? old('q_40_a') : __dataType::boolean_to_string(optional($employee->employeeOtherQuestion)->q_40_a), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_40_a'), $errors->first('q_40_a'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details:</p>
                      {!! __form::textbox(
                       '12', 'q_40_a_yes_details', 'text', '', '', old('q_40_a_yes_details') ? old('q_40_a_yes_details') : optional($employee->employeeOtherQuestion)->q_40_a_yes_details, $errors->has('q_40_a_yes_details'), $errors->first('q_40_a_yes_details'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">b. Are you a person with disability?</p>
                      {!! __form::select_static(
                        '6', 'q_40_b', '', old('q_40_b') ? old('q_40_b') : __dataType::boolean_to_string(optional($employee->employeeOtherQuestion)->q_40_b), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_40_b'), $errors->first('q_40_b'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details (ID No.):</p>
                      {!! __form::textbox(
                       '12', 'q_40_b_yes_details', 'text', '', '', old('q_40_b_yes_details') ? old('q_40_b_yes_details') : optional($employee->employeeOtherQuestion)->q_40_b_yes_details, $errors->has('q_40_b_yes_details'), $errors->first('q_40_b_yes_details'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">c. Are you a solo parent?</p>
                      {!! __form::select_static(
                        '6', 'q_40_c', '', old('q_40_c') ? old('q_40_c') : __dataType::boolean_to_string(optional($employee->employeeOtherQuestion)->q_40_c), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_40_c'), $errors->first('q_40_c'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details (ID No.):</p>
                      {!! __form::textbox(
                       '12', 'q_40_c_yes_details', 'text', '', '', old('q_40_c_yes_details') ? old('q_40_c_yes_details') : optional($employee->employeeOtherQuestion)->q_40_c_yes_details, $errors->has('q_40_c_yes_details'), $errors->first('q_40_c_yes_details'), ''
                      ) !!}
                    </div>

                  </div>


                </div>
              </div>


              {{-- Health Declaration --}}
              <div class="tab-pane" id="health_declaration">
                <div class="row">

                  <div class="col-md-12" style="padding-bottom: 10px;">
                    <div class="col-md-12">

                      <p class="text-primary well well-sm no-shadow">
                        <i class="fa fa-info-circle"></i>
                        Please be advised that the information below shall only be used in relation to COVID-19 and other medical internal protocols in accordance with Data Privacy Act.
                      </p>
                    </div>
                  </div>


                  <div class="col-md-12">

                    <div class="row">
                      <div class="col-md-12">
                        {!! __form::textbox(
                           '3', 'family_doctor', 'text', 'Family Doctor, if any', 'Family Doctor, if any', old('family_doctor') ? old('family_doctor') : optional($employee->employeeHealthDeclaration)->family_doctor, $errors->has('family_doctor'), $errors->first('family_doctor'), ''
                        ) !!}

                        {!! __form::textbox(
                           '2', 'contact_person', 'text', 'Contact person in case of emergency', 'Contact Person in case of emergency', old('contact_person') ? old('contact_person') : optional($employee->employeeHealthDeclaration)->contact_person, $errors->has('contact_person'), $errors->first('contact_person'), ''
                        ) !!}

                        {!! __form::textbox(
                           '2', 'contact_person_phone', 'text', "Contact person's phone", "Contact person's phone", old('contact_person_phone') ? old('contact_person_phone') : optional($employee->employeeHealthDeclaration)->contact_person_phone, $errors->has('contact_person_phone'), $errors->first('contact_person_phone'), ''
                        ) !!}

                        {!! __form::textbox(
                           '5', 'cities_ecq', 'text', "Cities in the Philippines you have worked, visited, transited in the past 14 days/ECQ period", "Cities in the Philippines you have worked, visited, transited in the past 14 days/ECQ period", old('cities_ecq') ? old('cities_ecq') : optional($employee->employeeHealthDeclaration)->cities_ecq , $errors->has('cities_ecq'), $errors->first('cities_ecq'), ''
                        ) !!}

                        <div class="col-md-12" style="border-top:solid 1px; padding-bottom:15px; color:gray;"></div>

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="col-md-6">
                          <p style="margin-bottom:-10px; font-weight: bold;">Have you been sick in the past 30 days? Hospital visited if any?</p>
                          {!! __form::select_static(
                            '6', 'been_sick', '', old('been_sick') ? old('been_sick') : optional($employee->employeeHealthDeclaration)->been_sick, ['YES' => 'true', 'NO' => 'false'], $errors->has('been_sick'), $errors->first('been_sick'), '', ''
                          ) !!}
                        </div>

                        <div class="col-md-6">
                          <p style="margin-bottom:-10px;">If YES, pls. describe condition: </p>
                          {!! __form::textbox(
                           '12', 'been_sick_yes_details', 'text', '', '', old('been_sick_yes_details') ? old('been_sick_yes_details') : optional($employee->employeeHealthDeclaration)->been_sick_yes_details, $errors->has('been_sick_yes_details'), $errors->first('been_sick_yes_details'), ''
                        ) !!}
                        </div>

                        <div class="col-md-6">
                          <p style="margin-bottom:-10px; font-weight: bold;">In the last 14 days, did you have any of the following: fever, colds, cough, sore throat or difficulty in breating, diarrhea?</p>
                          {!! __form::select_static2(
                            '6', 'fever_colds', '', old('fever_colds') ? old('fever_colds') : optional($employee->employeeHealthDeclaration)->fever_colds , ['YES' => 'true', 'NO' => 'false'], $errors->has('fever_colds'), $errors->first('fever_colds'), '', ''
                          ) !!}
                        </div>

                        <div class="col-md-6">
                          <p style="margin-bottom:-10px;">If YES, pls. describe condition: </p>
                          {!! __form::textbox(
                           '12', 'fever_colds_yes_details', 'text', '', '', old('fever_colds_yes_details') ? old('fever_colds_yes_details') : optional($employee->employeeHealthDeclaration)->fever_colds_yes_details, $errors->has('fever_colds_yes_details'), $errors->first('fever_colds_yes_details'), ''
                        ) !!}
                        </div>
                      </div>
                    </div>


                    <div class="col-md-12" style="border-top:solid 2px; padding-bottom:15px; color:gray;">

                    </div>
                    <div class="form-group col-md-12 ">
                      <label for="family_doctor">Medical history</label>
                      <br>

                      <?php
                      $medical_histories_db = [];
                      if (!empty($employee->employeeMedicalHistories)){
                        foreach ($employee->employeeMedicalHistories as $key => $medical_history) {
                          $medical_histories_db[$medical_history['medical_history']] = $medical_history['medication'];
                        }

                      }
                      ?>
                      <select name="medical_histories[]" id="medical_history" class="form-control select2" multiple="multiple" style="width: 100%">
                        @foreach($medical_history_options as $option)
                          @if(isset($medical_histories_db[$option]))
                            <option value="{{$option}}" selected="">{{$option}}</option>
                          @else
                            <option value="{{$option}}">{{$option}}</option>
                          @endif
                        @endforeach

                      </select>

                      <div class="row">
                        <div class="col-md-12">
                          <br>
                          <table id="medical_history_table" class="table table-bordered table-striped">
                            <thead class="bg-info">
                              <tr>
                                <th>Medical Condition</th>
                                <th>Medication</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($medical_histories_db as $key => $medication_db)
                                <tr>
                                  <td>{{$key}}</td>
                                  <td>
                                    <input class="form-control input-sm" id="med_{{$key}}" name="medications[]" type="text" value="{{$medication_db}}" placeholder="Medication">
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12" style="border-top:solid 2px; padding-bottom:15px; color:gray;">

                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <label style="padding-left: 15px;"><i>SOCIAL HISTORY / CURRENT</i> </label>
                      <hr style="margin-bottom: 10px;margin-top: 0px;">

                      <div class="col-md-6">
                        <p style="margin-bottom:-10px; font-weight: bold;">1. Do you SMOKE/VAPE?</p>
                        {!! __form::select_static2(
                          '6', 'smoking', '', old('smoking') ? old('smoking') : optional($employee->employeeHealthDeclaration)->smoking, ['YES' => 'true', 'NO' => 'false'], $errors->has('smoking'), $errors->first('smoking'), '', ''
                        ) !!}
                      </div>

                      <div class="col-md-6">
                        <p style="margin-bottom:-10px;">If YES, number of packs per day: </p>
                        {!! __form::textbox(
                         '12', 'smoking_yes_details', 'text', '', '', old('smoking_yes_details') ? old('smoking_yes_details') : optional($employee->employeeHealthDeclaration)->smoking_yes_details, $errors->has('smoking_yes_details'), $errors->first('smoking_yes_details'), ''
                      ) !!}
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="col-md-6">
                        <p style="margin-bottom:-10px; font-weight: bold;">2. Do you DRINK ALCOHOL?</p>
                        {!! __form::select_static2(
                          '6', 'drinking', '', old('drinking') ? old('drinking') : optional($employee->employeeHealthDeclaration)->drinking , ['YES' => 'true', 'NO' => 'false'], $errors->has('drinking'), $errors->first('drinking'), '', ''
                        ) !!}
                      </div>

                      <div class="col-md-6">
                        <p style="margin-bottom:-10px;">If YES, how often? </p>
                        {!! __form::textbox(
                         '12', 'drinking_yes_details', 'text', '', '', old('drinking_yes_details') ? old('drinking_yes_details') : optional($employee->employeeHealthDeclaration)->drinking_yes_details, $errors->has('drinking_yes_details'), $errors->first('drinking_yes_details'), ''
                      ) !!}
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="col-md-6">
                        <p style="margin-bottom:-10px; font-weight: bold;">3. Do you take prohibited DRUGS?</p>
                        {!! __form::select_static2(
                          '6', 'taking_drugs', '', old('taking_drugs') ? old('taking_drugs') : optional($employee->employeeHealthDeclaration)->taking_drugs , ['YES' => 'true', 'NO' => 'false'], $errors->has('taking_drugs'), $errors->first('taking_drugs'), '', ''
                        ) !!}
                      </div>

                      <div class="col-md-6">
                        <p style="margin-bottom:-10px;">If YES, specify: </p>
                        {!! __form::textbox(
                         '12', 'taking_drugs_yes_details', 'text', '', '', old('taking_drugs_yes_details') ? old('taking_drugs_yes_details') : optional($employee->employeeHealthDeclaration)->taking_drugs_yes_details, $errors->has('taking_drugs_yes_details'), $errors->first('taking_drugs_yes_details'), ''
                      ) !!}
                      </div>
                    </div>

                    <label style="padding-left:30px;"><i>HEALTH ROUTINES</i> </label>

                    <hr style="margin-bottom: 10px;margin-top: 0px;">



                    <div class="col-md-12">
                      <div class="col-md-6">
                        <p style="margin-bottom:-10px; font-weight: bold;">1. Do you take VITAMINS?</p>

                        {!! __form::select_static2(
                          '6', 'taking_vitamins', '', old('taking_vitamins') ? old('taking_vitamins') : optional($employee->employeeHealthDeclaration)->taking_vitamins , ['YES' => 'true', 'NO' => 'false'], $errors->has('taking_vitamins'), $errors->first('taking_vitamins'), '', ''
                        ) !!}
                      </div>

                      <div class="col-md-6">
                        <p style="margin-bottom:-10px;">If YES, specify: </p>
                        {!! __form::textbox(
                         '12', 'taking_vitamins_yes_details', 'text', '', '', old('taking_vitamins_yes_details') ? old('taking_vitamins_yes_details') : optional($employee->employeeHealthDeclaration)->taking_vitamins_yes_details, $errors->has('taking_vitamins_yes_details'), $errors->first('taking_vitamins_yes_details'), ''
                      ) !!}
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="col-md-6">
                        <p style="margin-bottom:-10px; font-weight: bold;">2. Do you wear EYEGLASSES?</p>
                        {!! __form::select_static2(
                          '6', 'eyeglasses', '', old('eyeglasses') ? old('eyeglasses') : optional( $employee->employeeHealthDeclaration)->eyeglasses , ['YES' => 'true', 'NO' => 'false'], $errors->has('eyeglasses'), $errors->first('eyeglasses'), '', ''
                        ) !!}
                      </div>

                      <div class="col-md-6">
                        <p style="margin-bottom:-10px;">If YES, specify visual actuality: </p>
                        {!! __form::textbox(
                         '12', 'eyeglasses_yes_details', 'text', '', '', old('eyeglasses_yes_details') ? old('eyeglasses_yes_details') : optional($employee->employeeHealthDeclaration)->eyeglasses_yes_details, $errors->has('eyeglasses_yes_details'), $errors->first('eyeglasses_yes_details'), ''
                      ) !!}
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="col-md-6">
                        <p style="margin-bottom:-10px; font-weight: bold;">3. Do you do Physical Conditioning (Exercise)?</p>
                        {!! __form::select_static2(
                          '6', 'exercise', '', old('exercise') ? old('exercise') : optional($employee->employeeHealthDeclaration)->exercise , ['YES' => 'true', 'NO' => 'false'], $errors->has('exercise'), $errors->first('exercise'), '', ''
                        ) !!}
                      </div>

                      <div class="col-md-6">
                        <p style="margin-bottom:-10px;">If YES, how often? </p>
                        {!! __form::textbox(
                         '12', 'exercise_yes_details', 'text', '', '', old('exercise_yes_details') ? old('exercise_yes_details') : optional($employee->employeeHealthDeclaration)->exercise_yes_details, $errors->has('exercise_yes_details'), $errors->first('exercise_yes_details'), ''
                      ) !!}
                      </div>
                    </div>


                    <label style="padding-left: 30px;"><i>CURRENT MEDICAL CONDITION</i> </label>

                    <hr style="margin-bottom: 10px;margin-top: 0px;">

                    <div class="col-md-12">
                      <div class="col-md-6">
                        <p style="margin-bottom:-10px; font-weight: bold;">Are you currently being treated for any underlying medical conditions? <i>(ie. Diabetes, hypertension, cancer, COPD, etc.)</i></p>
                        {!! __form::select_static2(
                          '6', 'being_treated', '', old('being_treated') ? old('being_treated') : optional($employee->employeeHealthDeclaration)->being_treated , ['YES' => 'true', 'NO' => 'false'], $errors->has('being_treated'), $errors->first('being_treated'), '', ''
                        ) !!}
                      </div>

                      <div class="col-md-6">
                        <p style="margin-bottom:-10px;">If YES, specify: <i><b>(Name, dose and frequency of any medicines)</b></i> </p>
                        {!! __form::textbox(
                         '12', 'being_treated_yes_details', 'text', '', '', old('being_treated_yes_details') ? old('being_treated_yes_details') : optional($employee->employeeHealthDeclaration)->being_treated_yes_details, $errors->has('being_treated_yes_details'), $errors->first('being_treated_yes_details'), ''
                      ) !!}
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="col-md-6">

                        <p style="margin-bottom:-10px; font-weight: bold;">
                          Do you have any chronic illness or injuries that must be pointed out?
                        </p>
                        {!! __form::select_static2(
                          '6',
                          'chronic_injuries',
                          '',
                          old('chronic_injuries') ? old('chronic_injuries') : optional($employee->employeeHealthDeclaration)->chronic_injuries ,
                          ['YES' => 'true', 'NO' => 'false'],
                          $errors->has('chronic_injuries'),
                          $errors->first('chronic_injuries'),
                          '',
                          '') !!}
                      </div>

                      <div class="col-md-6">
                        <p style="margin-bottom:-10px;">If YES, specify: <i><b>(Give details of illness or injuries and their treatment details)</b></i> </p>
                        {!! __form::textbox(
                         '12', 'chronic_injuries_yes_details', 'text', '', '', old('chronic_injuries_yes_details') ? old('chronic_injuries_yes_details') : optional($employee->employeeHealthDeclaration)->chronic_injuries_yes_details, $errors->has('chronic_injuries_yes_details'), $errors->first('chronic_injuries_yes_details'), '') !!}
                      </div>
                    </div>

                  </div>


                </div>
              </div>

            </div>

          </div>

        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary pull-right">
            <i class="fa fa-check"></i> Save
          </button>
        </div>

      </form>

    </div>

  </section>

@endsection





@section('modals')

  @if(Session::has('EMPLOYEE_CREATE_SUCCESS'))
    {!! __html::modal('employee', '<i class="fa fa-fw fa-check"></i> Saved!', Session::get('EMPLOYEE_CREATE_SUCCESS')) !!}
  @endif

@endsection





@section('scripts')

  <script type="text/javascript">

    @if(Session::has('EMPLOYEE_CREATE_SUCCESS'))
      $('#employee').modal('show');
    @endif


    {!! __js::ajax_select_to_select(
      'department_id', 'department_unit_id', '/api/department_unit/select_departmentUnit_byDeptId/', 'department_unit_id', 'description'
    ) !!}
    @if(\Illuminate\Support\Facades\Request::get("page") != null)
      const page = '{{\Illuminate\Support\Facades\Request::get("page")}}';
    @else
      const page = 0;
    @endif
    $("#edit_employee_form").submit(function (e) {
      e.preventDefault();
      let form = $(this);
      loading_btn(form);
      $.ajax({
        url : '{{ route('dashboard.employee.update', $employee->slug) }}',
        data : form.serialize(),
        type: 'PUT',
        headers: {
          {!! __html::token_header() !!}
        },
        success: function (res) {
          unmark_required(form)
          form.get(0).reset();
          remove_loading_btn(form);
          markTabs(form);
          window.location.replace('{{route("dashboard.employee.index")}}?toPage='+page+'&mark='+res.slug);
        },
        error: function (res) {
          errored(form,res);
          notify('Please fill out the required fields.','warning');
          markTabs(form);
        }
      })
    })


    {{-- Medical History --}}
    $(document).ready(function() {


      $("#medical_history").change(function(){
        medical_history_typed = [];

        $.each($(this).val(), function(i,item){
          medical_history_typed["med_"+item] = "";
        });

        $("#medical_history_table tbody input").each(function(){
            medical_history_typed[$(this).attr('id')] = $(this).val() ;
        });


        $("#medical_history_table tbody").html("");
        $.each($(this).val(), function(i,item){

          if(medical_history_typed["med_"+item] != ""){
            $("#medical_history_table tbody").append("<tr><td>"+item+"</td><td><input class='form-control input-sm' id='med_"+item+"' name='medications[]' type='text' value='"+medical_history_typed["med_"+item]+"' placeholder='Medication'></td></tr>");
          }else{
            $("#medical_history_table tbody").append("<tr><td>"+item+"</td><td><input class='form-control input-sm' id='med_"+item+"' name='medications[]' type='text' value='' placeholder='Medication'></td></tr>");
          }

        })
        // console.log(medical_history_typed);
      });


    });



    {{-- Children ADD ROW --}}
    $(document).ready(function() {

      $("#children_add_row").on("click", function() {
      var i = $("#children_table_body").children().length;
      var content ='<tr>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_children[' + i + '][fullname]" class="form-control" placeholder="Fullname">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_children[' + i + '][date_of_birth]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                          '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                      '</td>' +

                    '</tr>';

      $("#children_table_body").append($(content));

      $('.datepicker').each(function(){
          $(this).datepicker({
            autoclose: true,
            dateFormat: "mm/dd/yy",
            orientation: "bottom"
        });
      });

      $(this).removeClass('datepicker');

      });

    });







    {{-- EB ADD ROW --}}
    $(document).ready(function() {

      $("#eb_add_row").on("click", function() {
      var i = $("#eb_table_body").children().length;
      var content ='<tr>' +
                    '<td>' +
                      '<div class="form-group">' +
                        '<select name="row_eb[' + i + '][level]" class="form-control">' +
                          '<option value="">Select</option>' +
                          '@foreach(__static::educ_level() as $name => $value)' +
                            '<option value="{{ $value }}">{{ $name }}</option>' +
                          '@endforeach' +
                        '</select>' +
                      '</div>' +
                    '</td>' +

                    '<td>' +
                      '<div class="form-group">' +
                        '<input type="text" name="row_eb[' + i + '][school_name]" class="form-control" placeholder="Name of School">' +
                      '</div>' +
                    '</td>' +

                    '<td>' +
                      '<div class="form-group">' +
                        '<input type="text" name="row_eb[' + i + '][course]" class="form-control" placeholder="Course">' +
                      '</div>' +
                    '</td>' +

                    '<td>' +
                      '<div class="form-group">' +
                        '<input type="text" name="row_eb[' + i + '][date_from]" class="form-control" placeholder="Date From">' +
                      '</div>' +
                    '</td>' +

                    '<td>' +
                      '<div class="form-group">' +
                        '<input type="text" name="row_eb[' + i + '][date_to]" class="form-control" placeholder="Date To">' +
                      '</div>' +
                    '</td>' +

                    '<td>' +
                      '<div class="form-group">' +
                        '<input type="text" name="row_eb[' + i + '][units]" class="form-control" placeholder="Units">' +
                      '</div>' +
                    '</td>' +

                    '<td>' +
                      '<div class="form-group">' +
                        '<input type="text" name="row_eb[' + i + '][graduate_year]" class="form-control" placeholder="Year">' +
                      '</div>' +
                    '</td>' +

                    '<td>' +
                      '<div class="form-group">' +
                        '<input type="text" name="row_eb[' + i + '][scholarship]" class="form-control" placeholder="Scholarship">' +
                      '</div>' +
                    '</td>' +

                    '<td>' +
                      '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                    '</td>' +

                  '</tr>';

      $("#eb_table_body").append($(content));

      $('.datepicker').each(function(){
          $(this).datepicker({
            autoclose: true,
            dateFormat: "mm/dd/yy",
            orientation: "bottom"
        });
      });

      $(this).removeClass('datepicker');

      });

    });







    {{-- Training ADD ROW --}}
    $(document).ready(function() {

      $("#training_add_row").on("click", function() {
      var i = $("#training_table_body").children().length;
      var content ='<tr>' +
                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_training[' + i + '][title]" class="form-control" placeholder="Title">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_training[' + i + '][type]" class="form-control" placeholder="Type of L & D">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_training[' + i + '][conducted_by]" class="form-control" placeholder="Conducted by">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_training[' + i + '][date_from]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_training[' + i + '][date_to]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_training[' + i + '][hours]" class="form-control" placeholder="Hours">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_training[' + i + '][venue]" class="form-control" placeholder="Venue">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_training[' + i + '][remarks]" class="form-control" placeholder="Remarks">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                          '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                      '</td>' +

                    '</tr>';

      $("#training_table_body").append($(content));

      $('.datepicker').each(function(){
          $(this).datepicker({
            autoclose: true,
            dateFormat: "mm/dd/yy",
            orientation: "bottom"
        });
      });

      $(this).removeClass('datepicker');

      });
    });







    {{-- Eligibility ADD ROW --}}
    $(document).ready(function() {

      $("#eligibility_add_row").on("click", function() {
      var i = $("#eligibility_table_body").children().length;
      var content ='<tr>' +

                      '<td>' +
                        '<div class="form-group">' +
                         ' <input type="text" name="row_eligibility[' + i + '][eligibility]" class="form-control" placeholder="Eligibility">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_eligibility[' + i + '][level]" class="form-control" placeholder="Level">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_eligibility[' + i + '][rating]" class="form-control" placeholder="Rating">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_eligibility[' + i + '][exam_place]" class="form-control" placeholder="Place of Examination">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_eligibility[' + i + '][exam_date]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_eligibility[' + i + '][license_no]" class="form-control" placeholder="License No">' +
                        '</div>' +
                      '</td>' +


                       '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_eligibility[' + i + '][license_validity]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                      '</td>' +

                    '</tr>';

      $("#eligibility_table_body").append($(content));

      $('.datepicker').each(function(){
          $(this).datepicker({
            autoclose: true,
            dateFormat: "mm/dd/yy",
            orientation: "bottom"
        });
      });

      $(this).removeClass('datepicker');

      });
    });







    {{-- Experience ADD ROW --}}
    $(document).ready(function() {

      $("#we_add_row").on("click", function() {
      var i = $("#we_table_body").children().length;
      var content ='<tr>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_we[' + i + '][date_from]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_we[' + i + '][date_to]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_we[' + i + '][company]" class="form-control" placeholder="Company">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_we[' + i + '][position]" class="form-control" placeholder="Position">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_we[' + i + '][salary]" class="form-control priceformat" placeholder="Salary">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_we[' + i + '][salary_grade]" class="form-control" placeholder="Salary Grade">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_we[' + i + '][appointment_status]" class="form-control" placeholder="Appointment Status">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<select name="row_we[' + i + '][is_gov_service]" class="form-control">' +
                            '<option value="">Select</option>' +
                              '<option value="true">YES</option>' +
                              '<option value="false">NO</option>' +
                          '</select>' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                          '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                      '</td>' +

                    '</tr>';

      $("#we_table_body").append($(content));

      $('.datepicker').each(function(){
          $(this).datepicker({
            autoclose: true,
            dateFormat: "mm/dd/yy",
            orientation: "bottom"
        });
      });

      $(".priceformat").priceFormat({
        prefix: "",
        thousandsSeparator: ",",
        clearOnEmpty: true,
        allowNegative: true
      });

      $(this).removeClass('datepicker');

      });
    });







    {{-- Voluntary Works ADD ROW --}}
    $(document).ready(function() {

      $("#vw_add_row").on("click", function() {
      var i = $("#vw_table_body").children().length;
      var content ='<tr>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_vw[' + i + '][name]" class="form-control" placeholder="Name">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_vw[' + i + '][address]" class="form-control" placeholder="Address">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_vw[' + i + '][date_from]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_vw[' + i + '][date_to]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_vw[' + i + '][hours]" class="form-control" placeholder="Hours">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_vw[' + i + '][position]" class="form-control" placeholder="Position">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                      '</td>' +

                    '</tr>';

      $("#vw_table_body").append($(content));

      $('.datepicker').each(function(){
          $(this).datepicker({
            autoclose: true,
            dateFormat: "mm/dd/yy",
            orientation: "bottom"
        });
      });

      $(this).removeClass('datepicker');

      });

    });







    {{-- Recognitions ADD ROW --}}
    $(document).ready(function() {

      $("#recognition_add_row").on("click", function() {
      var i = $("#recognition_table_body").children().length;
      var content ='<tr>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_recognition[' + i + '][title]" class="form-control" placeholder="Title">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                      '</td>' +

                    '</tr>';

      $("#recognition_table_body").append($(content));

      });

    });







    {{-- Organizations ADD ROW --}}
    $(document).ready(function() {

      $("#org_add_row").on("click", function() {
      var i = $("#org_table_body").children().length;
      var content ='<tr>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_org[' + i + '][name]" class="form-control" placeholder="Name">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                      '</td>' +

                    '</tr>';

      $("#org_table_body").append($(content));

      });

    });







    {{-- Special Skills ADD ROW --}}
    $(document).ready(function() {

      $("#ss_add_row").on("click", function() {
      var i = $("#ss_table_body").children().length;
      var content ='<tr>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_ss[' + i + '][description]" class="form-control" placeholder="Special Skills or Hobies">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                      '</td>' +

                    '</tr>';

      $("#ss_table_body").append($(content));

      });

    });







    {{-- Reference ADD ROW --}}
    $(document).ready(function() {

      $("#reference_add_row").on("click", function() {
      var i = $("#reference_table_body").children().length;
      var content ='<tr>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_reference[' + i + '][fullname]" class="form-control" placeholder="Fullname">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_reference[' + i + '][address]" class="form-control" placeholder="Address">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_reference[' + i + '][tel_no]" class="form-control" placeholder="Telephone No.">' +
                        '</div>' +
                      '</td>' +


                      '<td>' +
                        '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                      '</td>' +

                    '</tr>';

      if(i < 3){
        $("#reference_table_body").append($(content));
      }

      });

    });





    {{-- Fill Permanent address --}}
    $(document).on("change","#fill_perm" ,function(e) {

      if(this.checked) {

        $('#perm_address_block').val($('#res_address_block').val());
        $('#perm_address_street').val($('#res_address_street').val());
        $('#perm_address_village').val($('#res_address_village').val());
        $('#perm_address_barangay').val($('#res_address_barangay').val());
        $('#perm_address_city').val($('#res_address_city').val());
        $('#perm_address_province').val($('#res_address_province').val());
        $('#perm_address_zipcode').val($('#res_address_zipcode').val());

      }else{

        $('#perm_address_block').val('');
        $('#perm_address_street').val('');
        $('#perm_address_village').val('');
        $('#perm_address_barangay').val('');
        $('#perm_address_city').val('');
        $('#perm_address_province').val('');
        $('#perm_address_zipcode').val('');

      }

    });



  </script>

@endsection