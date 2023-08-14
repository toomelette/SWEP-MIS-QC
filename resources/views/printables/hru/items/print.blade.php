@php
$rand = \Illuminate\Support\Str::random();
@endphp
@extends('printables.print_layouts.print_layout_main')

@section('wrapper')

<table class="tbl tbl-bordered" style="width: 100%">
    <thead>
    <tr>
        <th>Name & Age</th>
        @forelse($item->applicants as $applicant)
            <th>
                {{$applicant->lastname}}, {{$applicant->firstname}} {{$applicant->middlename}}
            </th>
        @empty
        @endforelse
    </tr>
    <tr>
        <th>Position</th>
        @forelse($item->applicants as $applicant)
            <th>
                {{$applicant->position}}
            </th>
        @empty
        @endforelse
    </tr>
    <tr>
        <th>Civil Status</th>
        @forelse($item->applicants as $applicant)
            <th>
                {{$applicant->civil_status}}
            </th>
        @empty
        @endforelse
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            Education
            <br>
            {{$item->qs_education}}
        </td>

        @forelse($item->applicants as $applicant)
            <td>
                @forelse($applicant->educationalBackground as $education)
                    <b>{{$education->course}}</b><br>
                    {{$education->school}}<hr class="no-margin">
                @empty
                @endforelse
            </td>
        @empty
        @endforelse
    </tr>
    <tr>
        <td>
            Education
            <br>
            {{$item->qs_training}}
        </td>

        @forelse($item->applicants as $applicant)
            <td>
                @forelse($applicant->trainings as $training)
                    <b>{{$training->training}}</b> {{$training->from}} to {{$training->to}}, {{$training->number_of_hours}} - {{$training->conducted_by}}<hr class="no-margin">
                @empty
                @endforelse
            </td>
        @empty
        @endforelse
    </tr>
    <tr>
        <td>
            Experience
            <br>
            {{$item->qs_experience}}
        </td>

        @forelse($item->applicants as $applicant)
            <td>
                @forelse($applicant->workExperiences as $workExperience)
                    <b>{{$workExperience->position}}</b> {{$workExperience->from}} to {{$workExperience->to}} - {{$workExperience->company}}<hr class="no-margin">
                @empty
                @endforelse
            </td>
        @empty
        @endforelse
    </tr>
    <tr>
        <td>
            Eligibility
            <br>
            {{$item->qs_eligibility}}
        </td>

        @forelse($item->applicants as $applicant)
            <td>
                @forelse($applicant->eligibilities as $eligibility)
                    <b>{{$eligibility->eligibility}}</b> {{$eligibility->rating}}<hr class="no-margin">
                @empty
                @endforelse
            </td>
        @empty
        @endforelse
    </tr>
    </tbody>
</table>
@endsection

@section('scripts')
<script type="text/javascript">

    print();
</script>
@endsection