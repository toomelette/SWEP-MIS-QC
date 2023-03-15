@extends('printables.print_layouts.print_layout_main')
@section('wrapper')

    @if(!empty($trainingsArray))
        @php
            $ct = 0;
        @endphp
        @foreach($trainingsArray as $pageNo => $trainings)

            <div style="break-after: page">
                <div class="text-left">
                    <p class="text-strong">EMPLOYEE NO: {{$employee->employee_no}}
                        <span class="pull-right">Page {{$pageNo+1}} of {{count($trainingsArray)}}</span>
                    </p>
                </div>

                @if($pageNo == 0)
                    @include('printables.print_layouts.header_with_logo')
                    <p class="no-margin text-strong">LIST OF SEMINARS AND TRAININGS ATTENDED</p>
                    <p class="no-margin">As of {{\Illuminate\Support\Carbon::now()->format('F d, Y')}}</p>
                    <br>
                    <table style="width: 100%;border-collapse: separate; border-spacing: 10px 0px ">
                        <tbody>
                        <tr>
                            <td class="text-strong no-margin">NAME:</td>
                            <td class="text-strong b-bottom no-margin">{{$employee->lastname}}</td>
                            <td class="text-strong b-bottom no-margin">{{$employee->firstname}}</td>
                            <td class="text-strong b-bottom no-margin">{{$employee->middlename}}</td>
                        </tr>
                        <tr>
                            <td class="no-padding"></td>
                            <td class="no-padding">Surname</td>
                            <td class="no-padding">Given Name</td>
                            <td class="no-padding">Middle Name</td>
                        </tr>
                        </tbody>
                    </table>
                    <br><br>
                @endif


                <table style="width: 100%; font-size: 10px" class="table table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">NO.</th>
                        <th class="text-center">TITLE</th>
                        <th class="text-center">DATE</th>
                        <th class="text-center">HRS</th>
                        <th class="text-center" style="min-width: 100px">CONDUCTED BY</th>
                        <th class="text-center">VENUE</th>
                        <th class="text-center">REMARKS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trainings as $training)
                        @php
                            $ct++;
                        @endphp
                        <tr>
                            <td>{{$ct}}</td>
                            <td>{{$training->title}}</td>
                            <td>{{$training->detailed_period}}</td>
                            <td class="text-center">{{$training->hours}}</td>
                            <td>{{$training->conducted_by}}</td>
                            <td>{{$training->venue}}</td>
                            <td>{{$training->remarks}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    @else
        <h3 class="text-center">NO DATA FOUND</h3>
    @endif

@endsection

@section('scripts')
    <script type="text/javascript">
        print();
    </script>
@endsection