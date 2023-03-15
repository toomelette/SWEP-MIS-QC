<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MIS Request Form - Print</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('template/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template/bower_components/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template/dist/css/AdminLTE.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/print.css') }}?s={{\Illuminate\Support\Str::random()}}">


    <style type="text/css">

        .div-height{

            margin-bottom: -50px;
            padding-bottom: 50px;
            overflow: hidden;

        }

        .bordered td,th{
            border: 1px solid black;
            padding-left: 2px;
        }

        .top-left{
            float: left;
        }
        .no-margin{
            margin: 0 0 0 0;
        }
        .text-center{
            text-align: center;
        }
        .text-strong{
            font-weight: bold;
        }
        .f-12{
            font-size: 12px;
        }
        .f-9{
            font-size: 9px;
        }
        .no-border-top{
            border-top: 0px
        }
        .no-border-bottom{
            border-bottom: 0px
        }
        .no-border-left{
            border-left: 0px
        }
        .no-border-right{
            border-right: 0px
        }
        #dv_table{
            border-right: 2px solid black;
            border-left: 2px solid black;
            border-bottom: 2px solid black;
        }

        .details_table tr td:first-child{
            width: 25%;
        }
        /*.details_table  td{*/
        /*    line-height: 40px;*/
        /*}*/

        .department{
            background-color: #c7f2cd !important;
            -webkit-print-color-adjust: exact;
            font-weight: bold;
            font-size: 13px;
        }
        .division{
            background-color: #bff7ff !important;
            -webkit-print-color-adjust: exact;
            font-weight: bold;
            font-size: 13px;
        }
        .section{
            background-color: #f5deb8 !important;
            -webkit-print-color-adjust: exact;
            font-weight: bold;
            font-size: 13px;
        }
        table tbody tr td:nth-child(2){
            width: 15%;
        }
        table tbody tr td:nth-child(8){
            width: 7%;
        }
        table tbody tr td:nth-child(9){
            width: 15%;
        }
        table tbody tr td:nth-child(10){
            width: 7%;
        }
        table tbody tr td:nth-child(11){
            width: 7%;
        }

        table tbody tr td:nth-child(12){
            width: 7%;
        }
    </style>

</head>

{{--<body onload="window.print();" onafterprint="window.close()">--}}
<body>

    <div class="printable">
        <h3 class="text-center no-margin">SUGAR REGULATORY ADMINISTRATION</h3>
        <p class="text-center no-margin">PLANTILLA OF PERSONNEL</p>
        <p class="text-center no-margin">As of {{\Illuminate\Support\Carbon::now()->format('F d, Y')}}</p>

        <table style="width: 100%; font-size: 12px" class="bordered">
            <thead>
                <tr>
                    <th class="text-center">Item No</th>
                    <th class="text-center">Position Title</th>
                    <th class="text-center" style="width: 250px">Name of Incumbents</th>
                    <th class="text-center">JG</th>
                    <th class="text-center">Step</th>
                    <th class="text-center">Actual</th>
                    <th class="text-center">GCG</th>
                    <th class="text-center">Highest Elegibility</th>
                    <th class="text-center">Hightest Educ Att</th>
                    <th class="text-center">Status of Appt</th>
                    <th class="text-center">Date of Orig Appt</th>
                    <th class="text-center">Date of Last Promotion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pls as $department => $divisions)
                    <tr>
                        <td colspan="12" class="department">{{$department}}</td>
                    </tr>
                    @foreach($divisions as $key => $division)
                        @if(is_numeric($key))
                            <tr>
                                <td class="text-center">{{$division->item_no}}</td>
                                <td>{{$division->position}}</td>
                                <td>{{$division->employee_name}}</td>
                                <td class="text-center">{{$division->job_grade}}</td>
                                <td class="text-center">{{$division->step_inc}}</td>
                                <td class="text-right"  style="padding-right: 2px">{{number_format($division->actual_salary,2)}}</td>
                                <td class="text-right" style="padding-right: 2px">{{number_format($division->actual_salary_gcg,2)}}</td>
                                <td>{{$division->eligibility}}</td>
                                <td>{{$division->educ_att}}</td>
                                <td>{{$division->appointment_status}}</td>
                                <td>{{($division->appointment_date == '1900-01-01') ? '' :Carbon::parse($division->appointment_date)->format('M. d, Y')}}</td>
                                <td>{{($division->last_promotion == '1900-01-01') ? '' : Carbon::parse($division->last_promotion)->format('M. d, Y')}}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="12" style="padding-left: 15px" class="division">{{$key}}</td>
                            </tr>
                            @foreach($division as $key2 => $section)
                                @if(is_numeric($key2))
                                    <tr>
                                        <td class="text-center">{{$section->item_no}}</td>
                                        <td>{{$section->position}}</td>
                                        <td>{{$section->employee_name}}</td>
                                        <td class="text-center">{{$section->job_grade}}</td>
                                        <td class="text-center">{{$section->step_inc}}</td>
                                        <td class="text-right" style="padding-right: 2px">{{number_format($section->actual_salary,2)}}</td>
                                        <td class="text-right" style="padding-right: 2px">{{number_format($section->actual_salary_gcg,2)}}</td>
                                        <td>{{$section->eligibility}}</td>
                                        <td>{{$section->educ_att}}</td>
                                        <td>{{$section->appointment_status}}</td>
                                        <td>{{($section->appointment_date == '1900-01-01') ? '' :Carbon::parse($section->appointment_date)->format('M. d, Y')}}</td>
                                        <td>{{($section->last_promotion == '1900-01-01') ? '' : Carbon::parse($section->last_promotion)->format('M. d, Y')}}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="12" style="padding-left: 30px;" class="section">{{$key2}}</td>
                                    </tr>
                                    @foreach($section as $item)
                                        <tr>
                                            <td class="text-center">{{$item->item_no}}</td>
                                            <td>{{$item->position}}</td>
                                            <td>{{$item->employee_name}}</td>
                                            <td class="text-center">{{$item->job_grade}}</td>
                                            <td class="text-center">{{$item->step_inc}}</td>
                                            <td class="text-right" style="padding-right: 2px">{{number_format($item->actual_salary,2)}}</td>
                                            <td class="text-right" style="padding-right: 2px">{{number_format($item->actual_salary_gcg,2)}}</td>
                                            <td>{{$item->eligibility}}</td>
                                            <td>{{$item->educ_att}}</td>
                                            <td>{{$item->appointment_status}}</td>
                                            <td>{{($item->appointment_date == '1900-01-01') ? '' :Carbon::parse($item->appointment_date)->format('M. d, Y')}}</td>
                                            <td>{{($item->last_promotion == '1900-01-01') ? '' : Carbon::parse($item->last_promotion)->format('M. d, Y')}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>