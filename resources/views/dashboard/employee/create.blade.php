@extends('layouts.admin-master')

@section('content')

  <section class="content-header">
      <h1>Create Employee</h1>
  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
        <div class="pull-right">
            <code>Fields with asterisks(*) are required</code>
        </div>
      </div>


      <form id="add_employee_form" role="form" method="POST" autocomplete="off" action="{{ route('dashboard.employee.store') }}">

        @csrf

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
              <li><a href="#ot" data-toggle="tab">Others Records</a></li>
              <li><a href="#q" data-toggle="tab">Questions</a></li>
            </ul>

            <div class="tab-content">


              {{-- Personal Info --}}
              <div class="tab-pane active" id="pi">
                <div class="row">

                  <div class="col-md-12">
                    <div class="box">

                      <div class="box-header with-border">
                        <h3 class="box-title">Personal Information</h3>
                      </div>

                      <div class="box-body">

                        {!! __form::textbox(
                           '3 lastname', 'lastname', 'text', 'Lastname *', 'Lastname', old('lastname'), $errors->has('lastname'), $errors->first('lastname'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 firstname', 'firstname', 'text', 'Firstname *', 'Firstname', old('firstname'), $errors->has('firstname'), $errors->first('firstname'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 middlename', 'middlename', 'text', 'Middlename *', 'Middlename', old('middlename'), $errors->has('middlename'), $errors->first('middlename'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 name_ext', 'name_ext', 'text', 'Name Extension', 'Name Extension', old('name_ext'), $errors->has('name_ext'), $errors->first('name_ext'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::datepicker(
                          '3 date_of_birth', 'date_of_birth',  'Date of Birth *', old('date_of_birth'), $errors->has('date_of_birth'), $errors->first('date_of_birth')
                        ) !!}

                        {!! __form::textbox(
                          '6 place_of_birth', 'place_of_birth', 'text', 'Place of Birth *', 'Place of Birth', old('place_of_birth'), $errors->has('place_of_birth'), $errors->first('place_of_birth'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::select_static(
                          '3 sex', 'sex', 'Sex *', old('sex'), ['Male' => 'MALE', 'Female' => 'FEMALE'], $errors->has('sex'), $errors->first('sex'), '', ''
                        ) !!}

                        <div class="col-md-12"></div>


                        {!! __form::select_static(
                          '3 civil_status', 'civil_status', 'Civil Status *', old('civil_status'), __static::civil_status(), $errors->has('civil_status'), $errors->first('civil_status'), '', ''
                        ) !!}

                        {!! __form::textbox(
                           '3 height', 'height', 'text', 'Height', 'Height', old('height'), $errors->has('height'), $errors->first('height'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 weight', 'weight', 'text', 'Weight', 'Weight', old('weight'), $errors->has('weight'), $errors->first('weight'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 blood_type', 'blood_type', 'text', 'Blood Type *', 'Blood Type', old('blood_type'), $errors->has('blood_type'), $errors->first('blood_type'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '3 tel_no', 'tel_no', 'text', 'Telephone No.', 'Telephone No.', old('tel_no'), $errors->has('tel_no'), $errors->first('tel_no'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 cell_no', 'cell_no', 'text', 'Cellphone No. *', 'Cellphone No.', old('cell_no'), $errors->has('cell_no'), $errors->first('cell_no'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 email', 'email', 'text', 'Email Address', 'Email Address', old('email'), $errors->has('email'), $errors->first('email'), ''
                        ) !!}

                        {!! __form::select_static(
                          '3 citizenship', 'citizenship', 'Citizenship *', old('citizenship'), ['Filipino' => 'Filipino', 'Dual Citizenship' => 'Dual Citizenship'], $errors->has('citizenship'), $errors->first('citizenship'), '', ''
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::select_static(
                          '3 citizenship_type', 'citizenship_type', 'Citizenship Type *', old('citizenship_type'), ['by birth' => 'BB', 'by naturalization' => 'BN'], $errors->has('citizenship_type'), $errors->first('citizenship_type'), '', ''
                        ) !!}

                        {!! __form::textbox(
                           '3 dual_citizenship_country', 'dual_citizenship_country', 'text', 'If (Dual Citizenship) Pls. Indicate Country', 'Specify', old('dual_citizenship_country'), $errors->has('dual_citizenship_country'), $errors->first('dual_citizenship_country'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 agency_no', 'agency_no', 'text', 'Agency Employee No.', 'Agency Employee No.', old('agency_no'), $errors->has('agency_no'), $errors->first('agency_no'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 gov_id', 'gov_id', 'text', 'Government Issued ID', '(i.e. Passport, GSIS, SSS, PRC, etc.)', old('gov_id'), $errors->has('gov_id'), $errors->first('gov_id'), ''
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '3 license_passport_no', 'license_passport_no', 'text', 'ID / License / Passport No.:', 'PLEASE INDICATE ID Number', old('license_passport_no'), $errors->has('license_passport_no'), $errors->first('license_passport_no'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 id_date_issue', 'id_date_issue', 'text', 'Date / Place of Issuance', 'Date / Place of Issuance', old('id_date_issue'), $errors->has('id_date_issue'), $errors->first('id_date_issue'), ''
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
                           '6 res_address_block', 'res_address_block', 'text', 'Block', 'Block', old('res_address_block'), $errors->has('res_address_block'), $errors->first('res_address_block'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 res_address_street', 'res_address_street', 'text', 'Street', 'Street', old('res_address_street'), $errors->has('res_address_street'), $errors->first('res_address_street'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 res_address_village', 'res_address_village', 'text', 'Village', 'Village', old('res_address_village'), $errors->has('res_address_village'), $errors->first('res_address_village'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 res_address_barangay', 'res_address_barangay', 'text', 'Barangay *', 'Barangay', old('res_address_barangay'), $errors->has('res_address_barangay'), $errors->first('res_address_barangay'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 res_address_city', 'res_address_city', 'text', 'City *', 'City', old('res_address_city'), $errors->has('res_address_city'), $errors->first('res_address_city'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 res_address_province', 'res_address_province', 'text', 'Province *', 'Province', old('res_address_province'), $errors->has('res_address_province'), $errors->first('res_address_province'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 res_address_zipcode', 'res_address_zipcode', 'text', 'Zipcode *', 'Zipcode', old('res_address_zipcode'), $errors->has('res_address_zipcode'), $errors->first('res_address_zipcode'), 'data-transform="uppercase"'
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
                           '6 perm_address_block', 'perm_address_block', 'text', 'Block', 'Block', old('perm_address_block'), $errors->has('perm_address_block'), $errors->first('perm_address_block'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 perm_address_street', 'perm_address_street', 'text', 'Street', 'Street', old('perm_address_street'), $errors->has('perm_address_street'), $errors->first('perm_address_street'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 perm_address_village', 'perm_address_village', 'text', 'Village', 'Village', old('perm_address_village'), $errors->has('perm_address_village'), $errors->first('perm_address_village'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 perm_address_barangay', 'perm_address_barangay', 'text', 'Barangay *', 'Barangay', old('perm_address_barangay'), $errors->has('perm_address_barangay'), $errors->first('perm_address_barangay'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 perm_address_city', 'perm_address_city', 'text', 'City *', 'City', old('perm_address_city'), $errors->has('perm_address_city'), $errors->first('perm_address_city'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 perm_address_province', 'perm_address_province', 'text', 'Province *', 'Province', old('perm_address_province'), $errors->has('perm_address_province'), $errors->first('perm_address_province'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 perm_address_zipcode', 'perm_address_zipcode', 'text', 'Zipcode *', 'Zipcode', old('perm_address_zipcode'), $errors->has('perm_address_zipcode'), $errors->first('perm_address_zipcode'), 'data-transform="uppercase"'
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
                           '6 father_lastname', 'father_lastname', 'text', 'Lastname *', 'Lastname', old('father_lastname'), $errors->has('father_lastname'), $errors->first('father_lastname'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 father_firstname', 'father_firstname', 'text', 'Firstname *', 'Firstname', old('father_firstname'), $errors->has('father_firstname'), $errors->first('father_firstname'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 father_middlename', 'father_middlename', 'text', 'Middlename *', 'Middlename', old('father_middlename'), $errors->has('father_middlename'), $errors->first('father_middlename'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 father_name_ext', 'father_name_ext', 'text', 'Name Extension', 'Name Extension', old('father_name_ext'), $errors->has('father_name_ext'), $errors->first('father_name_ext'), 'data-transform="uppercase"'
                        ) !!}

                      </div>
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Mother's Info (Maiden Name)</h3>
                      </div>
                      <div class="box-body">

                        {!! __form::textbox(
                           '6 mother_lastname', 'mother_lastname', 'text', 'Lastname *', 'Lastname', old('mother_lastname'), $errors->has('mother_lastname'), $errors->first('mother_lastname'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 mother_firstname', 'mother_firstname', 'text', 'Firstname *', 'Firstname', old('mother_firstname'), $errors->has('mother_firstname'), $errors->first('mother_firstname'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '6 mother_middlename', 'mother_middlename', 'text', 'Middlename *', 'Middlename', old('mother_middlename'), $errors->has('mother_middlename'), $errors->first('mother_middlename'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '6 mother_name_ext', 'mother_name_ext', 'text', 'Name Extension', 'Name Extension', old('mother_name_ext'), $errors->has('mother_name_ext'), $errors->first('mother_name_ext'), 'data-transform="uppercase"'
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
                           '3 spouse_lastname', 'spouse_lastname', 'text', 'Lastname', 'Lastname', old('spouse_lastname'), $errors->has('spouse_lastname'), $errors->first('spouse_lastname'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 spouse_firstname', 'spouse_firstname', 'text', 'Firstname', 'Firstname', old('spouse_firstname'), $errors->has('spouse_firstname'), $errors->first('spouse_firstname'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 spouse_middlename', 'spouse_middlename', 'text', 'Middlename', 'Middlename', old('spouse_middlename'), $errors->has('spouse_middlename'), $errors->first('spouse_middlename'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 spouse_name_ext', 'spouse_name_ext', 'text', 'Name Extension', 'Name Extension', old('spouse_name_ext'), $errors->has('spouse_name_ext'), $errors->first('spouse_name_ext'), 'data-transform="uppercase"'
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                           '3 spouse_occupation', 'spouse_occupation', 'text', 'Occupation', 'Occupation', old('spouse_occupation'), $errors->has('spouse_occupation'), $errors->first('spouse_occupation'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 spouse_employer', 'spouse_employer', 'text', 'Employer / Business Name', 'Employer / Business Name', old('spouse_employer'), $errors->has('spouse_employer'), $errors->first('spouse_employer'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 spouse_business_address', 'spouse_business_address', 'text', 'Business Address', 'Business Address', old('spouse_business_address'), $errors->has('spouse_business_address'), $errors->first('spouse_business_address'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                           '3 spouse_tel_no', 'spouse_tel_no', 'text', 'Telephone No.', 'Telephone No.', old('spouse_tel_no'), $errors->has('spouse_tel_no'), $errors->first('spouse_tel_no'), 'data-transform="uppercase"'
                        ) !!}

                      </div>
                    </div>
                  </div>



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
                          '3 employee_no', 'employee_no', 'text', 'Employee No. *', 'Employee No.', old('employee_no'), $errors->has('employee_no'), $errors->first('employee_no'), ''
                        ) !!}

                        {!! __form::textbox(
                          '3 position', 'position', 'text', 'Position *', 'Position', old('position'), $errors->has('position'), $errors->first('position'), 'data-transform="uppercase"'
                        ) !!}

                        {!! __form::textbox(
                          '3 item_no', 'item_no', 'text', 'Item No.', 'Item No.', old('item_no'), $errors->has('item_no'), $errors->first('item_no'), ''
                        ) !!}

                        {!! __form::select_static(
                          '3 appointment_status', 'appointment_status', 'Appointment Status *', old('appointment_status'), \App\Swep\Helpers\Helper::populateOptionsFromObjectAsArray(\App\Models\SuOptions::employeeApptStatus(),'option','value'), $errors->has('appointment_status'), $errors->first('appointment_status'), '', ''
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox(
                          '3 salary_grade', 'salary_grade', 'text', 'Salary Grade', 'Salary Grade', old('salary_grade'), $errors->has('salary_grade'), $errors->first('salary_grade'), ''
                        ) !!}

                        {!! __form::textbox(
                          '3 step_inc', 'step_inc', 'text', 'Step Increment', 'Step Increment', old('step_inc'), $errors->has('step_inc'), $errors->first('step_inc'), ''
                        ) !!}

                        {!! __form::select_dynamic(
                          '3 department_id', 'department_id', 'Department *', old('department_id'), $global_departments_all, 'department_id', 'name', $errors->has('department_id'), $errors->first('department_id'), '', ''
                        ) !!}

                        {!! __form::select_dynamic(
                          '3 department_unit_id', 'department_unit_id', 'Unit *', old('department_unit_id'), $global_department_units_all, 'department_unit_id', 'description', $errors->has('department_unit_id'), $errors->first('department_unit_id'), '', ''
                        ) !!}

                        <div class="col-md-12"></div>

                        {!! __form::textbox_numeric(
                          '3 monthly_basic', 'monthly_basic', 'text', 'Monthly Basic *', 'Monthly Basic', old('monthly_basic'), $errors->has('monthly_basic'), $errors->first('monthly_basic'), ''
                        ) !!}

{{--                        {!! __form::textbox_numeric(--}}
{{--                          '3 aca', 'aca', 'text', 'ACA', 'ACA', old('aca'), $errors->has('aca'), $errors->first('aca'), ''--}}
{{--                        ) !!}--}}

{{--                        {!! __form::textbox_numeric(--}}
{{--                          '3 pera', 'pera', 'text', 'PERA', 'PERA', old('pera'), $errors->has('pera'), $errors->first('pera'), ''--}}
{{--                        ) !!}--}}

                        {!! __form::textbox_numeric(
                          '3 food_subsidy', 'food_subsidy', 'text', 'Fixed basic:', 'Fixed basic', old('food_subsidy'), $errors->has('food_subsidy'), $errors->first('food_subsidy'), ''
                        ) !!}
                        {!! __form::datepicker(
                                              '3 firstday_gov', 'firstday_gov',  'First Day to serve Government *', old('firstday_gov'), $errors->has('firstday_gov'), $errors->first('firstday_gov')
                                            ) !!}

                        {!! __form::datepicker(
                          '3 firstday_sra', 'firstday_sra',  'First Day in SRA *', old('firstday_sra'), $errors->has('firstday_sra'), $errors->first('firstday_sra')
                        ) !!}


                        <div class="col-md-12"></div>

{{--                        {!! __form::textbox_numeric(--}}
{{--                          '3 ra', 'ra', 'text', 'RA', 'RA', old('ra'), $errors->has('ra'), $errors->first('ra'), ''--}}
{{--                        ) !!}--}}

{{--                        {!! __form::textbox_numeric(--}}
{{--                          '3 ta', 'ta', 'text', 'TA', 'TA', old('ta'), $errors->has('ta'), $errors->first('ta'), ''--}}
{{--                        ) !!}--}}


                        <div class="col-md-12"></div>

                        {!! __form::datepicker(
                          '3 appointment_date', 'appointment_date',  'Appointment Date', old('appointment_date'), $errors->has('appointment_date'), $errors->first('appointment_date')
                        ) !!}

                        {!! __form::datepicker(
                          '3 adjustment_date', 'adjustment_date',  'Adjustment Date', old('adjustment_date'), $errors->has('adjustment_date'), $errors->first('adjustment_date')
                        ) !!}
                        <div class="col-md-12"></div>

                        {!! __form::select_dynamic(
                          '2 project_id', 'project_id', 'Station *', old('project_id') ? old('project_id') : $employee->project_id ?? '', $global_projects_all, 'project_id', 'project_address', $errors->has('project_id'), $errors->first('project_id'), '', ''
                        ) !!}

                        {!! __form::select_static(
                          '2 is_active', 'is_active', 'Status *', old('is_active') ? old('is_active') : $employee->is_active ?? '', \App\Swep\Helpers\Helper::populateOptionsFromObjectAsArray(\App\Models\SuOptions::employeeStatus(),'option','value'), $errors->has('is_active'), $errors->first('is_active'), '', ''
                        ) !!}

                        {!! __form::select_static(
                          '3 locations', 'locations', 'Groupings *', old('locations') ? old('locations') : $employee->locations ?? '', \App\Swep\Helpers\Helper::populateOptionsFromObjectAsArray(\App\Models\SuOptions::employeeGroupings(),'option','value'), $errors->has('locations'), $errors->first('locations'), '', ''
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



                  <div class="col-md-12"></div>


                  {{-- Personal ID's --}}
                  <div class="col-md-12" style="padding-top: 30px;">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Personal ID's</h3>
                      </div>
                      <div class="box-body">

                        {!! __form::textbox(
                           '3 gsis', 'gsis', 'text', 'GSIS', 'GSIS', old('gsis'), $errors->has('gsis'), $errors->first('gsis'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 philhealth', 'philhealth', 'text', 'PHILHEALTH', 'PHILHEALTH', old('philhealth'), $errors->has('philhealth'), $errors->first('philhealth'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 tin', 'tin', 'text', 'TIN', 'TIN', old('tin'), $errors->has('tin'), $errors->first('tin'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 sss', 'sss', 'text', 'SSS', 'SSS', old('sss'), $errors->has('sss'), $errors->first('sss'), ''
                        ) !!}

                        {!! __form::textbox(
                           '3 hdmf', 'hdmf', 'text', 'HDMF', 'HDMF', old('hdmf'), $errors->has('hdmf'), $errors->first('hdmf'), ''
                        ) !!}

                        {!! __form::textbox_numeric(
                          '3 hdmfpremiums', 'hdmfpremiums', 'text', 'HDMF Premiums', 'HDMF Premiums', old('hdmfpremiums'), $errors->has('hdmfpremiums'), $errors->first('hdmfpremiums'), ''
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

                      <div class="box-body no-padding">

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

                              <tr>

                                <td>
                                  {!! __form::select_static_for_dt('row_eb[0][level]', __static::educ_level(), 'ELEMENTARY', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[0][school_name]', 'Name of School', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[0][course]', 'Course', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[0][date_from]', 'Date From', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[0][date_to]', 'Date To', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[0][units]', 'Units', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[0][graduate_year]', 'Year', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[0][scholarship]', 'Scholarship', '', '') !!}
                                </td>

                              </tr>


                              <tr>

                                <td>
                                  {!! __form::select_static_for_dt('row_eb[1][level]', __static::educ_level(), 'SECONDARY', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[1][school_name]', 'Name of School', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[1][course]', 'Course', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[1][date_from]', 'Date From', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[1][date_to]', 'Date To', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[1][units]', 'Units', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[1][graduate_year]', 'Year', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[1][scholarship]', 'Scholarship', '', '') !!}
                                </td>

                              </tr>


                              <tr>

                                <td>
                                  {!! __form::select_static_for_dt('row_eb[2][level]', __static::educ_level(), 'VOCATIONAL/TRADE COURSE', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[2][school_name]', 'Name of School', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[2][course]', 'Course', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[2][date_from]', 'Date From', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[2][date_to]', 'Date To', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[2][units]', 'Units', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[2][graduate_year]', 'Year', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[2][scholarship]', 'Scholarship', '', '') !!}
                                </td>

                              </tr>


                              <tr>

                                <td>
                                  {!! __form::select_static_for_dt('row_eb[3][level]', __static::educ_level(), 'COLLEGE', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[3][school_name]', 'Name of School', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[3][course]', 'Course', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[3][date_from]', 'Date From', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[3][date_to]', 'Date To', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[3][units]', 'Units', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[3][graduate_year]', 'Year', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[3][scholarship]', 'Scholarship', '', '') !!}
                                </td>

                              </tr>


                              <tr>

                                <td>
                                  {!! __form::select_static_for_dt('row_eb[4][level]', __static::educ_level(), 'GRADUATE STUDIES', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[4][school_name]', 'Name of School', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[4][course]', 'Course', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[4][date_from]', 'Date From', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[4][date_to]', 'Date To', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[4][units]', 'Units', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[4][graduate_year]', 'Year', '', '') !!}
                                </td>

                                <td>
                                  {!! __form::textbox_for_dt('row_eb[4][scholarship]', 'Scholarship', '', '') !!}
                                </td>

                              </tr>

                            @endif

                            </tbody>

                        </table>
                      </div>

                    </div>
                  </div>







                  {{-- Eligibilities --}}
                  <div class="col-md-12">
                    <div class="box" style="margin-top: 30px;">
                      <div class="box-header with-border">
                        <h3 class="box-title">Eligibilities</h3>
                        <button id="eligibility_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
                      </div>

                      <div class="box-body no-padding">

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

                            @endif

                            </tbody>

                        </table>

                      </div>

                    </div>
                  </div>





                  {{-- Work Experiences --}}
                  <div class="col-md-12">
                    <div class="box" style="margin-top: 30px;">
                      <div class="box-header with-border">
                        <h3 class="box-title">Work Experiences</h3>
                        <button id="we_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
                      </div>

                      <div class="box-body no-padding">

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

                            @endif

                            </tbody>

                        </table>

                      </div>

                    </div>
                  </div>


                </div>
              </div>










              {{-- Others --}}
              <div class="tab-pane" id="ot">
                <div class="row">


                  {{-- Voluntary Works --}}
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header ">
                        <h3 class="box-title">Voluntary Works</h3>
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

                            @endif

                            </tbody>

                        </table>

                      </div>

                    </div>
                  </div>



                  {{-- Organizations --}}
                  <div class="col-md-12" style="padding-top: 30px;">
                    <div class="box">
                      <div class="box-header">
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

                            @endif

                            </tbody>

                        </table>

                      </div>

                    </div>

                  </div>




                  {{-- References --}}
                  <div class="col-md-12" style="padding-top: 30px;">

                    <div class="box">
                      <div class="box-header">
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

                            @endif

                            </tbody>

                        </table>

                      </div>

                    </div>

                  </div>



                </div>
              </div>





              {{-- Questions --}}
              <div class="tab-pane" id="q">
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
                      '3', 'q_34_a', '', old('q_34_a'), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_34_a'), $errors->first('q_34_a'), '', ''
                      ) !!}

                    </div>

                    <div class="col-md-12"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">b. within the fourth degree (for Local Government Unit - Career Employees)?</p>
                      {!! __form::select_static(
                        '6', 'q_34_b', '', old('q_34_b'), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_34_b'), $errors->first('q_34_b'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details: </p>
                      {!! __form::textbox(
                       '12', 'q_34_b_yes_details', 'text', '', '', old('q_34_b_yes_details'), $errors->has('q_34_b_yes_details'), $errors->first('q_34_b_yes_details'), ''
                    ) !!}
                    </div>

                    <div class="col-md-12" style="border-top:solid 2px; padding-bottom:15px; color:gray;"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">a. Have you ever been found guilty of any administrative offense?</p>
                      {!! __form::select_static(
                        '6', 'q_35_a', '', old('q_35_a'), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_35_a'), $errors->first('q_35_a'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details: </p>
                      {!! __form::textbox(
                       '12', 'q_35_a_yes_details', 'text', '', '', old('q_35_a_yes_details'), $errors->has('q_35_a_yes_details'), $errors->first('q_35_a_yes_details'), ''
                    ) !!}
                    </div>

                    <div class="col-md-12"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">b. Have you been criminally charged before any court?</p>
                      {!! __form::select_static(
                        '6', 'q_35_b', '', old('q_35_b'), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_35_b'), $errors->first('q_35_b'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-3">
                      <p style="margin-bottom:-10px;">If YES, give details (Date Filled):</p>
                      {!! __form::textbox(
                       '12', 'q_35_b_yes_details_1', 'text', '', '', old('q_35_b_yes_details_1'), $errors->has('q_35_b_yes_details_1'), $errors->first('q_35_b_yes_details_1'), ''
                      ) !!}
                    </div>

                    <div class="col-md-3">
                      <p style="margin-bottom:-10px;">(Status of Case/s):</p>
                      {!! __form::textbox(
                       '12', 'q_35_b_yes_details_2', 'text', '', '', old('q_35_b_yes_details_2'), $errors->has('q_35_b_yes_details_2'), $errors->first('q_35_b_yes_details_2'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12" style="border-top:solid 2px; padding-bottom:15px; color:gray;"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">a. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</p>
                      {!! __form::select_static(
                        '6', 'q_36', '', old('q_36'), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_36'), $errors->first('q_36'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details:</p>
                      {!! __form::textbox(
                       '12', 'q_36_yes_details', 'text', '', '', old('q_36_yes_details'), $errors->has('q_36_yes_details'), $errors->first('q_36_yes_details'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12" style="border-top:solid 2px; padding-bottom:15px; color:gray;"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">a. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</p>
                      {!! __form::select_static(
                        '6', 'q_37', '', old('q_37'), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_37'), $errors->first('q_37'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details:</p>
                      {!! __form::textbox(
                       '12', 'q_37_yes_details', 'text', '', '', old('q_37_yes_details'), $errors->has('q_37_yes_details'), $errors->first('q_37_yes_details'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12" style="border-top:solid 2px; padding-bottom:15px; color:gray;"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</p>
                      {!! __form::select_static(
                        '6', 'q_38_a', '', old('q_38_a'), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_38_a'), $errors->first('q_38_a'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details:</p>
                      {!! __form::textbox(
                       '12', 'q_38_a_yes_details', 'text', '', '', old('q_38_a_yes_details'), $errors->has('q_38_a_yes_details'), $errors->first('q_38_a_yes_details'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</p>
                      {!! __form::select_static(
                        '6', 'q_38_b', '', old('q_38_b'), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_38_b'), $errors->first('q_38_b'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details:</p>
                      {!! __form::textbox(
                       '12', 'q_38_b_yes_details', 'text', '', '', old('q_38_b_yes_details'), $errors->has('q_38_b_yes_details'), $errors->first('q_38_b_yes_details'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12" style="border-top:solid 2px; padding-bottom:15px; color:gray;"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">a. Have you acquired the status of an immigrant or permanent resident of another country?</p>
                      {!! __form::select_static(
                        '6', 'q_39', '', old('q_39'), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_39'), $errors->first('q_39'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details (Country):</p>
                      {!! __form::textbox(
                       '12', 'q_39_yes_details', 'text', '', '', old('q_39_yes_details'), $errors->has('q_39_yes_details'), $errors->first('q_39_yes_details'), ''
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
                        '6', 'q_40_a', '', old('q_40_a'), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_40_a'), $errors->first('q_40_a'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details:</p>
                      {!! __form::textbox(
                       '12', 'q_40_a_yes_details', 'text', '', '', old('q_40_a_yes_details'), $errors->has('q_40_a_yes_details'), $errors->first('q_40_a_yes_details'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">b. Are you a person with disability?</p>
                      {!! __form::select_static(
                        '6', 'q_40_b', '', old('q_40_b'), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_40_b'), $errors->first('q_40_b'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details (ID No.):</p>
                      {!! __form::textbox(
                       '12', 'q_40_b_yes_details', 'text', '', '', old('q_40_b_yes_details'), $errors->has('q_40_b_yes_details'), $errors->first('q_40_b_yes_details'), ''
                      ) !!}
                    </div>

                    <div class="col-md-12"></div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px; font-weight: bold;">c. Are you a solo parent?</p>
                      {!! __form::select_static(
                        '6', 'q_40_c', '', old('q_40_c'), ['YES' => 'true', 'NO' => 'false'], $errors->has('q_40_c'), $errors->first('q_40_c'), '', ''
                      ) !!}
                    </div>

                    <div class="col-md-6">
                      <p style="margin-bottom:-10px;">If YES, give details (ID No.):</p>
                      {!! __form::textbox(
                       '12', 'q_40_c_yes_details', 'text', '', '', old('q_40_c_yes_details'), $errors->has('q_40_c_yes_details'), $errors->first('q_40_c_yes_details'), ''
                      ) !!}
                    </div>

                  </div>


                </div>
              </div>




            </div>

          </div>

        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Save</button>
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

      // $(".priceformat").priceFormat({
      //   prefix: "",
      //   thousandsSeparator: ",",
      //   clearOnEmpty: true,
      //   allowNegative: true
      // });

      $(this).removeClass('datepicker');

      });
    });







    {{-- Voluntary Works ADD ROW --}}
    $(document).ready(function() {
      {!! \App\Swep\ViewHelpers\__js::autonum() !!}
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



    $("#add_employee_form").submit(function (e) {
      e.preventDefault();
      let form = $(this);
      loading_btn(form);
      $.ajax({
          url : '{{route("dashboard.employee.store")}}',
          data : form.serialize(),
          type: 'POST',
          headers: {
              {!! __html::token_header() !!}
          },
          success: function (res) {
              unmark_required(form)
              form.get(0).reset();
              notify('Employee successfully added.');
              remove_loading_btn(form);
            markTabs(form);
          },
          error: function (res) {

            errored(form,res);
            markTabs(form);
          }
      })
    })




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