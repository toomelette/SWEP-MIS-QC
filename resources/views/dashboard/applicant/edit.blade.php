@php
    $rand = \Illuminate\Support\Str::random();

@endphp
@extends('layouts.modal-content',['form_id' => 'edit_applicant_form_'.$rand , 'slug' => $applicant->slug])

@section('modal-header')
    {{$applicant->lastname}}, {{$applicant->firstname}} - Edit
@endsection

@section('modal-body')

    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::textbox('received_at',[
            'cols' => 3,
            'label' => 'Date received:*',
            'type' => 'date',
        ],$applicant) !!}

        {!! \App\Swep\ViewHelpers\__form2::textbox('lastname',[
            'cols' => 3,
            'label' => 'Last Name:*',
        ],$applicant) !!}

        {!! \App\Swep\ViewHelpers\__form2::textbox('firstname',[
            'cols' => 3,
            'label' => 'First Name:*',
        ],$applicant) !!}

        {!! \App\Swep\ViewHelpers\__form2::textbox('middlename',[
            'cols' => 3,
            'label' => 'Middle Name:*',
        ],$applicant) !!}
    </div>
    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::textbox('date_of_birth',[
            'cols' => 2,
            'label' => 'Birthday:*',
            'type' => 'date',
        ],$applicant) !!}

        {!! \App\Swep\ViewHelpers\__form2::select('gender',[
            'cols' => 2,
            'label' => 'Sex:*',
            'options' => \App\Swep\Helpers\Arrays::sex()
        ],$applicant) !!}

        {!! \App\Swep\ViewHelpers\__form2::select('civil_status',[
            'cols' => 2,
            'label' => 'Civil Status:*',
            'options' => \App\Swep\Helpers\Arrays::civil_status()
        ],$applicant) !!}

        {!! \App\Swep\ViewHelpers\__form2::textbox('address',[
            'cols' => 6,
            'label' => 'Address:*',
        ],$applicant) !!}
    </div>

    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::select('course',[
            'cols' => 6,
            'label' => 'Course: *',
            'class' => 'select2_course_'.$rand,
            'options' => [ $applicant->course =>$applicant->course],
        ],$applicant->course) !!}
        {!! \App\Swep\ViewHelpers\__form2::textbox('school',[
            'cols' => 6,
            'label' => 'School:*',
        ],$applicant) !!}
    </div>

    <div class="row">
        <div class="form-group col-md-12 position_applied">
            <label for="school">Position(s) Applied for:</label>
            <br>
            @php
                $value = [];
                if($applicant->positionApplied()->count()>0){
                    foreach ($applicant->positionApplied as $position){
                        if($position->item_no != '' || $position->item_no != null){
                            array_push($value,'ITEM '.$position->item_no.' - '. $position->position_applied);
                        }else{
                            array_push($value,$position->position_applied);
                        }
                    }
                }

            @endphp

            <input value="{{implode(',',$value)}}" type="text" name="position_applied" id="position_applied_{{$rand}}" class="form-control"  data-role="tagsinput" style="width:100%;">
            <p class="text-info"><i class="fa fa-info"></i> You can add more "Position applied for" by pressing <b>ENTER</b>. </p>
        </div>
    </div>
    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::textbox('contact_no',[
            'cols' => 6,
            'label' => 'Contact No.:*',
        ],
        $applicant) !!}
    </div>

@endsection

@section('modal-footer')
    <button type="submit" class="btn btn-primary pull-right btn-sm"><i class="fa fa-check"></i> Save</button>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.select2_{{$rand}}').select2({
            dropdownParent: $('#edit_applicant_modal')
        });

        $("#position_applied_{{$rand}}").tagsinput({
            typeaheadjs: {
                name: 'citynames',
                displayKey: 'name',
                valueKey: 'name',
                source: citynames.ttAdapter(),
            }
        });
        $(".select2_course_{{$rand}}").select2({
            ajax: {
                url: '{{route("dashboard.ajax.get","applicant_courses")}}?default=Select',
                dataType: 'json',
                delay : 250,
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            },
            dropdownParent: $('#edit_applicant_modal')
        });
        
        $("#edit_applicant_form_{{$rand}}").submit(function (e) {
            e.preventDefault()
            let form = $(this);
            let uri = '{{route("dashboard.applicant.update",$applicant->slug)}}';
            loading_btn(form);
            $.ajax({
                url : uri,
                data : form.serialize(),
                type: 'PATCH',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    succeed(form,true,true);
                    notify('Applicant changes were saved.');
                    active = res.slug;
                    applicants_tbl.draw(false);
                },
                error: function (res) {
                    errored(form,res);
                }
            })
        })

        $('.bootstrap-tagsinput input').on('keypress', function(e){
            if (e.keyCode == 13){
                e.keyCode = 188;
                e.preventDefault();
            };
        });
@endsection

