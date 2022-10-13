@if(count($employees_with_adjustments) > 0)
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Employee</th>
            <th>Position</th>
            <th>Date of Last Promotion</th>
            <th>JG</th>
            <th>Current Saved Step</th>
            <th>Update Step to</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach($employees_with_adjustments as $employee)

                <tr>
                    <td class="text-strong">{{$employee->lastname}}, {{$employee->firstname}}</td>
                    <td>{{$employee->position}}</td>
                    <td>{{Carbon::parse($employee->adjustment_date)->format('M. d, Y')}}</td>
                    <td>{{$employee->salary_grade}}</td>
                    <td>{{$employee->step_inc}}</td>
                    <td>
                        @if($employee->step_inc+1 > 8)
                            N/A
                        @else
                            {{$employee->step_inc+1}}
                        @endif
                    </td>
                    <td style="width: 50px">
                        <a href="{{route('dashboard.employee.index')}}?find={{$employee->employee_no}}" target="_blank">
                        <button class="btn btn-xs">View Employee</button>
                        </a>
                    </td>
                </tr>
        @endforeach
    </table>
@else
    <h3 class="text-center text-info" style="padding: 20px"><i class="fa fa-info-circle"></i> No Employee with adjustments for this month</h3>
@endif