<html>
<head>
    <style>
        body{
            font-family: Cambria !important;
        }

        .edit_form{
            margin-bottom: 0px;
        }

    </style>
    <link type="text/css" rel="stylesheet" href="{{asset('css/print.css')}}?rand={{\Illuminate\Support\Str::random()}}">
    <script type="text/javascript" src="{{ asset('template/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <title>
        CERTIFICATE OF EMPLOYMENT
    </title>
</head>
<body style="padding-top: 85px; ">

<p class="text-right">{{\Illuminate\Support\Carbon::now()->format('F d, Y')}}</p>

<p class="text-strong text-center">CERTIFICATE OF EMPLOYMENT AND COMPENSATION</p>
<br><br>
<p style="text-indent: 40px; text-align: justify; line-height: 30px">This is to certify that
    <u>
        <b>
            {{$employee->firstname}}
            @if(strlen( $employee->middlename < 2))
                {{$employee->middlename}}.
            @else
                {{\Illuminate\Support\Str::limit($employee->middlename,1,'.')}}
            @endif
            {{$employee->lastname}}
        </b>
    </u>

    is an employee of SUGAR REGULATORY ADMINISTRATION since
    <u>
        <b>
            {{\Illuminate\Support\Carbon::parse($employee->firstday_sra)->format('F d, Y')}}
        </b>
    </u>
    and up to the present.

    {{($employee->sex == 'FEMALE') ? 'She' : 'He'}}

    holds a Permanent Appointment of
    <u>
        <b>
            {{strtoupper($employee->position)}}.
        </b>
    </u>
</p>

<p style="text-indent: 40px; text-align: justify; line-height: 30px">
    {{($employee->sex == 'FEMALE' ? 'Her' : 'His')}}
    present monthly compensation are as follows:
</p>

@php
    $monthlyTemplate = $employee->incentiveTemplate()->whereHas('incentive',function($q){
            return $q->where('IsMonthly','=',1);
        })
        ->where('IncAmount','!=',0)
        ->orderBy('IncCode','asc')
        ->get();
    $yearlyTemplate = $employee->incentiveTemplate()->whereHas('incentive',function($q){
            return $q->where('IsMonthly','=',0);
        })
        ->where('IncAmount','!=',0)
        ->orderBy('IncCode','asc')
        ->get();

@endphp

<table style="width: 100%; padding: 0 70px">
    <tbody>
    @php
        $total = 0;
    @endphp
    @if(!empty($monthlyTemplate))
        @foreach($monthlyTemplate as $incentive)
            @php
                $total = $total + $incentive->IncAmount
            @endphp
            <tr>
                <td>{{$incentive->incentive->IncDesc ?? 'N/A'}}</td>
                <td class="text-right">{{number_format($incentive->IncAmount,2)}}</td>
            </tr>
        @endforeach
        <tr>
            <td class="text-strong text-center b-top" >TOTAL</td>
            <td class="text-strong text-right b-top" >{{number_format($total,2)}}</td>
        </tr>
    @endif
    </tbody>
</table>

<p style="text-indent: 40px; text-align: justify; line-height: 30px">
    Further,
    {{($employee->sex == 'FEMALE' ? 'she' : 'he')}}
    receives the following additional yearly remuneration:
</p>

<table style="width: 100%; padding: 0 70px">
    <tbody>
    @php
        $total = 0;
    @endphp
    @if(!empty($yearlyTemplate))
        @foreach($yearlyTemplate as $incentive)
            @php
                $total = $total + $incentive->IncAmount
            @endphp
            <tr>
                <td>{{$incentive->incentive->IncDesc ?? 'N/A'}}</td>
                <td class="text-right">{{number_format($incentive->IncAmount,2)}}</td>
            </tr>
        @endforeach
        <tr>
            <td class="text-strong text-center b-top" >TOTAL</td>
            <td class="text-strong text-right b-top" >{{number_format($total,2)}}</td>
        </tr>
    @endif
    </tbody>
</table>


<p style="text-indent: 40px">
    This certification is issued for whatever legal purpose it may serve.
</p>
<br><br>
<div style="overflow: auto">
    <div style="width: 40%; float: right">
        <p class="text-center">
            <b>{{\Illuminate\Support\Facades\Request::get('signatory_name')}}</b>
            <br>
            {{\Illuminate\Support\Facades\Request::get('signatory_position')}}
        </p>
    </div>
</div>


<br><br><br><br>

<p class="no-margin text-right" style="font-size: 10px; font-style: italic">FM-AFD-HRS-037, Rev. 01</p>
<p class="no-margin text-right" style="font-size: 10px; font-style: italic">Effectivity Date: January 08, 2016</p>
</body>
</html>