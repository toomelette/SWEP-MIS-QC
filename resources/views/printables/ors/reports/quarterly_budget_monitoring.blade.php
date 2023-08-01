@php
    $rand = \Illuminate\Support\Str::random();
    $totalArray = [];

    $GLOBALS['quarter'] = $quarter;

@endphp
@extends('printables.print_layouts.print_layout_main')

@section('wrapper')
    <div>
        <img src="{{asset('images/sra.png')}}" style="width: 60px; float: left; margin-right: 15px;">
        <p class="no-margin text-left" style="font-size: 14px"> <b>SUGAR REGULATORY ADMINISTRATION</b></p>
        <p class="no-margin text-left" style="font-size: 12px;"> Araneta Street, Singcang, Bacolod City</p>
        <p class="no-margin text-left" style="font-size: 10px;"> SRA Web Portal - Budget Monitoring System</p>
    </div>

    <div style="text-align: left">

        <h3 class="no-margin">BUDGET MONITORING</h3>
        <p>
            {{\App\Swep\Helpers\Helper::ordinalWords()[$quarter]}}
            Quarter [
            {{\Illuminate\Support\Carbon::parse(\App\Swep\Helpers\Get::startAndEndOfQuarter($quarter,\Illuminate\Support\Facades\Request::get('year'))['startOfQuarter'])->format('M. d, Y')}} to
            {{\Illuminate\Support\Carbon::parse(\App\Swep\Helpers\Get::startAndEndOfQuarter($quarter,\Illuminate\Support\Facades\Request::get('year'))['endOfQuarter'])->format('M. d, Y')}}
            ]
        </p>
    </div>

    <table class="tbl tbl-bordered-grey tbl-padded" style="width: 100%; font-size: 11px">
        <thead>
        <tr class="bg-purple">
            <th class="text-center" rowspan="2">Recommended Programs/Projects</th>
            <th class="text-center" colspan="2">Year</th>
            @foreach(\App\Swep\Helpers\Helper::quarters()[$quarter] as $m => $q)
                <th class="text-center" colspan="2">{{\Illuminate\Support\Carbon::parse('2022-'.$m.'-01')->format('F')}}</th>
            @endforeach
            <th class="text-center" rowspan="2">Total for the <br> {{\App\Swep\Helpers\Helper::ordinal($quarter)}}  Quarter</th>
        </tr>
        <tr class="bg-purple">
            <th class="text-center" style="width: 80px">MOOE</th>
            <th class="text-center" style="width: 80px">CO</th>
            @foreach(\App\Swep\Helpers\Helper::quarters()[$quarter] as $m => $q)
               <th class="text-center">DETAILS</th>
                <th class="text-center">AMOUNT</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($orsArray as $deptCode => $dept)

            <tr class="bg-lightred">
                <td colspan="10" style="padding-bottom: 10px"><span style="font-size: 14px;" class="text-strong">{{$dept['dept_obj']->descriptive_name ?? ''}}</span></td>
            </tr>
            @foreach($dept['resp_centers'] as $respCenterCode => $respCenter)
                <tr class="bg-orange">
                    <td class="text-strong td-indent">{{$respCenter['resp_center_obj']->desc ?? ''}}</td>
                    <td colspan="{{count((\App\Swep\Helpers\Helper::quarters()[$quarter]) )* 2 + 3}}"></td>
                </tr>
                @foreach($respCenter['paps'] as $papCode => $pap)
                    @php
                        $totalsArray[$deptCode][$papCode] = [
                            'mooe' => 0,
                            'co' => 0,
                            'quarters' => \App\Swep\Helpers\Helper::quarters()[$quarter],
                        ];
                    @endphp
                    <tr class="bg-lightblue">
                        <td colspan="10" style="font-size: 12px" class="td-indent-2"> <b>{{$papCode}}</b> - <span class="text-info text-strong text-italic">{{$pap['pap_obj']->pap_title ?? 'N/A'}}</span></td>
                    </tr>
                    <tr>
                        <td class="text-right text-strong">BALANCE FORWARDED:</td>
                        <td class="text-right text-strong">{{number_format($pap['pap_obj']->mooe ?? 0,2)}}</td>
                        <td class="text-right text-strong">{{number_format($pap['pap_obj']->co ?? 0,2)}}</td>
                        <td colspan="7"></td>
                    </tr>
                    @foreach($pap['ors'] as $or)
                        <tr>
                            <td class="td-indent-3"> {{$or['ors_obj']->payee}} - {{$or['ors_obj']->particulars}}</td>
                            <td></td>
                            @if($or['applied_project_obj']->co != 0)
                                @php
                                    $totalsArray[$deptCode][$papCode]['co'] =   $totalsArray[$deptCode][$papCode]['co'] + $or['applied_project_obj']->co;
                                @endphp
                                <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($or['applied_project_obj']->co,2,'')}}</td>
                                @for($a = 0; $a < count((\App\Swep\Helpers\Helper::quarters()[$quarter]) )* 2 ; $a++)
                                    <td></td>
                                @endfor
                            @else
                                <td></td>
                                @foreach($or['months'] as $m => $appliedProject)
                                    @if(!empty($appliedProject))
                                            @php
                                                $totalsArray[$deptCode][$papCode]['mooe'] =   $totalsArray[$deptCode][$papCode]['mooe'] + $appliedProject->mooe;
                                                $totalsArray[$deptCode][$papCode]['co'] =   $totalsArray[$deptCode][$papCode]['co'] + $appliedProject->co;
                                                $totalsArray[$deptCode][$papCode]['quarters'][$m] = $totalsArray[$deptCode][$papCode]['quarters'][$m] + $appliedProject->mooe ?? $appliedProject->co;
                                            @endphp
                                            <td style="width: 80px" class="text-center">{{$or['ors_obj']->ors_no}}</td>
                                            <td style="width: 80px" class="text-right">{{\App\Swep\Helpers\Helper::toNumber($appliedProject->mooe, 2,'')}}</td>

                                    @else
                                        <td></td>
                                        <td></td>
                                    @endif

                                @endforeach
                            @endif

                            <td></td>
                        </tr>
                    @endforeach
                    <tr class="bg-lightgreen">
                        <td class="text-right text-strong">Balance as of</td>
                        <td class="text-right text-strong">{{number_format(($pap['pap_obj']->mooe ?? 0) - $totalsArray[$deptCode][$papCode]['mooe'],2)}}</td>
                        <td class="text-right text-strong">{{number_format(($pap['pap_obj']->co ?? 0) - $totalsArray[$deptCode][$papCode]['co'] ?? 0,2)}}</td>
                        @foreach($totalsArray[$deptCode][$papCode]['quarters'] as $m => $amount)
                            <td></td>
                            <td class="text-right text-strong">{{number_format($amount,2)}}</td>
                        @endforeach

                        <td class="text-right text-strong">{{number_format(array_sum($totalsArray[$deptCode][$papCode]['quarters']),2)}}</td>
                    </tr>
                @endforeach


            @endforeach
            <tr class="bg-lightyellow">
                <td class="text-strong">TOTAL {{$dept['dept_obj']->name ?? ''}}</td>
                <td></td>
                <td></td>
                @foreach(array_map(function ($value){
                                        $quarter = $GLOBALS['quarter'];
                                        $totals = [];
                                        foreach (\App\Swep\Helpers\Helper::quarters()[$quarter] as $m => $val){
                                            $quarters = array_column($value,'quarters');
                                            $totals[$m] =  array_sum(array_column($quarters,$m));
                                        }
                                        return $totals;
                                    },$totalsArray)[$deptCode] as $m => $amount)
                    <td></td>
                    <td class="text-strong text-right">{{number_format($amount,2)}}</td>
                @endforeach
                <td class="text-strong text-right">{{number_format(array_sum(array_map(function ($value){
                                        $quarter = $GLOBALS['quarter'];
                                        $totals = [];
                                        foreach (\App\Swep\Helpers\Helper::quarters()[$quarter] as $m => $val){
                                            $quarters = array_column($value,'quarters');
                                            $totals[$m] =  array_sum(array_column($quarters,$m));
                                        }
                                        return $totals;
                                    },$totalsArray)[$deptCode]),2)}}</td>
            </tr>
        @endforeach
            @if(count($orsArray) > 1)
                <tr>
                    <td class="text-strong">TOTAL</td>
                    <td></td>
                    <td></td>
                    @php
                        $sumQuarters = array_map(function ($value){
                                        $quarter = $GLOBALS['quarter'];
                                        $totals = [];
                                        foreach (\App\Swep\Helpers\Helper::quarters()[$quarter] as $m => $val){
                                            $quarters = array_column($value,'quarters');
                                            $totals[$m] =  array_sum(array_column($quarters,$m));
                                        }
                                        return $totals;
                                    },$totalsArray);
                        $grandTotal = 0;
                    @endphp
                    @foreach(\App\Swep\Helpers\Helper::quarters()[$quarter] as $m => $amount)
                        @php
                            $grandTotal = $grandTotal + array_sum(array_column($sumQuarters,$m));
                        @endphp
                        <td></td>
                        <td class="text-strong text-right">{{number_format(array_sum(array_column($sumQuarters,$m)),2)}}</td>
                    @endforeach
                    <td class="text-strong text-right">{{number_format($grandTotal,2)}}</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection