@php
    $rand = \Illuminate\Support\Str::random(10);
@endphp
@extends('layouts.modal-content',['form_id'=>'assess_form_'.$rand,'slug' => $applicant->slug])

@section('modal-header')
    {{$applicant->lastname}}, {{ $applicant->firstname }} - Item no. {{$applicant->publicationItem->item_no}} {{$applicant->publicationItem->position}}
@endsection

@section('modal-body')
    <p class="text-info text-right"><i class="fa fa-info-circle"></i> Please select relevant information to the position applied</p>
    <table class="table table-striped table-condensed table-bordered">
        <thead>
        <tr>
            <th>Education</th>
            <th>Eligibility</th>
            <th>Experience</th>
            <th>Training</th>
        </tr>
        </thead>
        <tbody>
            <tr >
                <td class="bg-info">{{$applicant->publicationItem->qs_education}}</td>
                <td class="bg-info">{{$applicant->publicationItem->qs_eligibility}}</td>
                <td class="bg-info">{{$applicant->publicationItem->qs_work_experience}}</td>
                <td class="bg-info">{{$applicant->publicationItem->qs_training}}</td>
            </tr>
            <tr>
                <td>
                    <div class="form-group no-margin" >
                        <div class="checkbox no-margin">
                            <label>
                                <input type="checkbox" class="select-all-{{$rand}}" target="education">
                                Select All
                            </label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group no-margin" >
                        <div class="checkbox no-margin">
                            <label>
                                <input type="checkbox" class="select-all-{{$rand}}" target="eligibility">
                                Select All
                            </label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group no-margin" >
                        <div class="checkbox no-margin">
                            <label>
                                <input type="checkbox" class="select-all-{{$rand}}" target="work-experience">
                                Select All
                            </label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group no-margin" >
                        <div class="checkbox no-margin">
                            <label>
                                <input type="checkbox" class="select-all-{{$rand}}" target="trainings">
                                Select All
                            </label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr id="details-tr">
                <td>
                    <table id="education"  style="width: 100%" class="table-condensed table-striped table-bordered details-table">
                        <tbody>
                        @forelse($applicant->educationalBackground as $education)
                            <tr>
                                <td>
                                    <div class="form-group" style="margin-bottom: 0px">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="educationalBackground[]" value="{{$education->id}}" {{$education->selected == 1 ? 'checked' : ''}}>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <dl class="no-margin">
                                        <dt>{{$education->level}}:</dt>
                                        <dd class="text-info">{{$education->school}}</dd>
                                        @if(in_array($education->level,\App\Swep\Helpers\Arrays::educationalLevelsLimited()))
                                            <dd>{{$education->course}}</dd>
                                        @endif
                                        <dd>From <b>{{$education->from}} to {{$education->to}}</b></dd>
                                        <dd>Graduated in <b>{{$education->year_graduated}}</b></dd>
                                    </dl>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                        </tbody>
                    </table>
                </td>
                <td>
                    <table id="eligibility" style="width: 100%" class="table-condensed table-striped table-bordered details-table">
                        <tbody>
                        @forelse($applicant->eligibilities as $eligibility)
                            <tr>
                                <td>
                                    <div class="form-group" style="margin-bottom: 0px">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="eligibilities[]" value="{{$eligibility->id}}"  {{$eligibility->selected == 1 ? 'checked' : ''}}>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <dl class="no-margin">
                                        <dt>{{$eligibility->eligibility}}:</dt>
                                        <dd>Rating: <b>{{$eligibility->rating}}</b></dd>
                                        <dd>Taken at <b>{{\App\Swep\Helpers\Helper::dateFormat($eligibility->date,'F d, Y')}}</b></dd>
                                        <dd>in {{$eligibility->place}}</dd>
                                        <dd>
                                            {!!  (!empty($eligibility->license_no)) ? 'with License no <b>'.$eligibility->license_no.'</b>' : '' !!}
                                            {!!  (!empty($eligibility->license_validity)) ? 'valid until <b>'.$eligibility->license_validity.'</b>' : '' !!}
                                        </dd>
                                    </dl>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                        </tbody>
                    </table>
                </td>
                <td>
                    <table id="work-experience" style="width: 100%" class="table-condensed table-striped table-bordered details-table">
                        <tbody>
                        @forelse($applicant->workExperiences as $work)
                            <tr>
                                <td>
                                    <div class="form-group" style="margin-bottom: 0px">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="workExperiences[]" value="{{$work->id}}" {{$work->selected == 1 ? 'checked' : ''}}>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <dl class="no-margin">
                                        <dt>{{$work->company}}</dt>
                                        <dd>
                                            {{$work->position}}
                                            @if(!empty($work->status))
                                                , {{$work->status}}
                                            @endif
                                        </dd>
                                        <dd>
                                            From: <b>{{\App\Swep\Helpers\Helper::dateFormat($work->from,'Y-m-d')}}</b>
                                            {!!  (!empty($work->to)) ? 'to <b>'.$work->to.'</b>' : '' !!},
                                            <span class="text-info text-strong">
                                                {{\Illuminate\Support\Str::remove('before',\Illuminate\Support\Carbon::parse($work->from)->diffForHumans(\Illuminate\Support\Carbon::parse($work->to),null,true))}}
                                            </span>
                                        </dd>
                                        <dd>
                                            Monthly Salary:
                                            <b>{{number_format($work->monthly_salary,2)}}</b>
                                            @if(!empty($work->sg_si))
                                                - {{$work->sg_si}}
                                            @endif
                                        </dd>
                                        @if($work->is_gov == 1)
                                            <dd>
                                                <span class="text-info text-strong"><i class="fa fa-check"></i>
                                                    <small>GOVERNMENT SERVICE</small>
                                                </span>
                                            </dd>
                                        @else
                                            <dd>
                                                <span class="text-danger text-strong"><i class="fa fa-times"></i>
                                                    <small>NOT A GOVERNMENT SERVICE</small>
                                                </span>
                                            </dd>
                                        @endif
                                    </dl>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                        </tbody>
                    </table>
                </td>
                <td>
                    <table id="trainings" style="width: 100%" class="table-condensed table-striped table-bordered details-table">
                        <tbody>
                        @forelse($applicant->trainings as $training)
                            <tr>
                                <td>
                                    <div class="form-group" style="margin-bottom: 0px">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="trainings[]" value="{{$training->id}}"
                                                       {{$training->selected == 1 ? 'checked' : ''}}>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <dl class="no-margin">
                                        <dt>{{$training->training}}</dt>
                                        <dd>{{$training->from}} to {{$training->to}}</dd>
                                        <dd>
                                            <span class="text-success text-strong">
                                                {{$training->number_of_hours}} hours
                                            </span>
                                        </dd>
                                        <dd>
                                            <small>
                                                Conducted by:<b> {{$training->conducted_by}}</b>
                                            </small>
                                        </dd>
                                    </dl>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>

    </table>

@endsection

@section('modal-footer')
    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Save</button>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(".select-all-{{$rand}}").change(function (){
            let t = $(this);
            let checked = t.prop('checked');


            let tr = $("#details-tr").children('td').eq(t.attr('eq'));
            $("#"+t.attr('target')+" input[type='checkbox']").each(function (){
                $(this).prop('checked',checked);
            })
        });
        $('input[type="checkbox"]').change(function (){
            let t = $(this);
            let len = t.parents('.details-table').find('input[type="checkbox"]').length;
            let lenSelected = t.parents('.details-table').find('input[type="checkbox"]:checked').length;
            let id = t.closest('table').attr('id');
            let selectAll = $(".select-all-{{$rand}}[target='"+id+"']");
            if(len === lenSelected){
                selectAll.prop('indeterminate',false);
                selectAll.prop('checked',true);
            }else if(lenSelected === 0){
                selectAll.prop('indeterminate',false);
                selectAll.prop('checked',false);
            }else{
                selectAll.prop('indeterminate',true);
            }
        })

        $("#assess_form_{{$rand}}").submit(function (e){
            e.preventDefault();
            let form = $(this);
            loading_btn(form);
            $.ajax({
                url : '{{route("dashboard.publication_applicants.assess",$applicant->slug)}}',
                data : form.serialize(),
                type: 'POST',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    active = res.slug;
                    succeed(form,true,true);
                    toast('success','Assessment successfully saved.','Success!');
                },
                error: function (res) {
                    errored(form,res);
                }
            })
        })
    </script>
@endsection

