<h4>Qualification Standards</h4>
<table class="table table-condensed table-bordered table-striped" style="font-size: 12px">
    <thead>
    <tr>
        <th>Position Applied for</th>
        <th>Item No.</th>
        <th>JG</th>
        <th>Monthly Salary</th>
        <th>Education</th>
        <th>Training</th>
        <th>Experience</th>
        <th>Eligibility</th>
        <th>Competency</th>
        <th>Place of Assignment</th>
    </tr>
    </thead>
    <tbody>
        @forelse($pds as $pd)
            <tr>
                <td>{{$pd->position}}</td>
                <td>{{$pd->item_no}}</td>
                <td>{{$pd->salary_grade}}</td>
                <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($pd->monthly_salary,2)}}</td>
                <td>{{$pd->qs_education}}</td>
                <td>{{$pd->qs_training}}</td>
                <td>{{$pd->qs_work_experience}}</td>
                <td>{{$pd->qs_eligibility}}</td>
                <td>{{$pd->qs_competency}}</td>
                <td>{{$pd->place_of_assignment}}</td>
            </tr>
        @empty

        @endforelse
    </tbody>
</table>