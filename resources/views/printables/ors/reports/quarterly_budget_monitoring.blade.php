@php
    $rand = \Illuminate\Support\Str::random();
    $totalArray = [];

    $GLOBALS['quarter'] = $quarter;
    function sumQuarters ($value){
        $quarter = $GLOBALS['quarter'];
        $totals = [];
        foreach (\App\Swep\Helpers\Helper::quarters()[$quarter] as $m => $val){
            $quarters = array_column($value,'quarters');
            $totals[$m] =  array_sum(array_column($quarters,$m));
        }
        return $totals;
    }
@endphp
@extends('printables.print_layouts.print_layout_main')

@section('wrapper')
    <div style="text-align: center">
        <p class="no-margin">SUGAR REGULATORY ADMINISTRATION</p>
        <p class="no-margin">Araneta Street, Singcang, Bacolod City</p>
        <br>
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
        <tr>
            <th class="text-center" rowspan="2">Recommended Programs/Projects</th>
            <th class="text-center" colspan="2">Year</th>
            @foreach(\App\Swep\Helpers\Helper::quarters()[$quarter] as $m => $q)
                <th class="text-center" colspan="2">{{\Illuminate\Support\Carbon::parse('2022-'.$m.'-01')->format('F')}}</th>
            @endforeach
            <th class="text-center" rowspan="2">Remarks</th>
        </tr>
        <tr>
            <th class="text-center" style="width: 80px">MOOE</th>
            <th class="text-center" style="width: 80px">CO</th>
            @foreach(\App\Swep\Helpers\Helper::quarters()[$quarter] as $m => $q)
               <th class="text-center">DETAILS</th>
                <th class="text-center">AMOUNT</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($orsArray as $resp_center=> $paps)
            <tr class="bg-lightred">
                <td colspan="10" style="padding-bottom: 10px"><span style="font-size: 14px;" class="text-strong">{{$resp_center}}</span></td>
            </tr>
            @foreach($paps as $pap_code => $papDetails)
                @php
                    $totalsArray[$resp_center][$pap_code] = [
                        'mooe' => 0,
                        'co' => 0,
                        'quarters' => \App\Swep\Helpers\Helper::quarters()[$quarter],
                    ];
                @endphp
                <tr class="bg-lightblue">
                    <td colspan="10" style="font-size: 12px" class="td-indent"> <b>{{$pap_code}}</b> - <span class="text-info text-strong text-italic">{{$papDetails['pap_obj']->pap_title ?? 'N/A'}}</span></td>
                </tr>
                <tr>
                    <td class="text-right text-strong">BALANCE FORWARDED:</td>
                    <td class="text-right text-strong">{{number_format($papDetails['pap_obj']->mooe ?? 0,2)}}</td>
                    <td class="text-right text-strong">{{number_format($papDetails['pap_obj']->co ?? 0,2)}}</td>
                    <td colspan="7"></td>
                </tr>
                @foreach($papDetails['ors'] as $or)
                    <tr>
                        <td class="td-indent-2"> {{$or['ors_obj']->payee}} - {{$or['ors_obj']->particulars}}</td>
                        <td></td>
                        <td></td>
                        @foreach($or['months'] as $m => $appliedProject)
                            @if(!empty($appliedProject))
                                @php
                                    $totalsArray[$resp_center][$pap_code]['mooe'] =   $totalsArray[$resp_center][$pap_code]['mooe'] + $appliedProject->mooe;
                                    $totalsArray[$resp_center][$pap_code]['co'] =   $totalsArray[$resp_center][$pap_code]['co'] + $appliedProject->co;
                                    $totalsArray[$resp_center][$pap_code]['quarters'][$m] = $totalsArray[$resp_center][$pap_code]['quarters'][$m] + $appliedProject->mooe ?? $appliedProject->co;
                                @endphp

                                <td style="width: 80px" class="text-center">{{$or['ors_obj']->ors_no}}</td>
                                <td style="width: 80px" class="text-right">{{\App\Swep\Helpers\Helper::toNumber($appliedProject->mooe, 2,'')}}</td>
                            @else
                                <td></td>
                                <td></td>
                            @endif

                        @endforeach
                        <td></td>
                    </tr>
                @endforeach
                <tr class="bg-lightgreen">
                    <td class="text-right text-strong">Balance as of</td>
                    <td class="text-right text-strong">{{number_format(($papDetails['pap_obj']->mooe ?? 0) - $totalsArray[$resp_center][$pap_code]['mooe'],2)}}</td>
                    <td class="text-right text-strong">{{number_format(($papDetails['pap_obj']->co ?? 0) - $totalsArray[$resp_center][$pap_code]['co'] ?? 0,2)}}</td>
                    @foreach($totalsArray[$resp_center][$pap_code]['quarters'] as $m => $amount)
                        <td></td>
                        <td class="text-right text-strong">{{number_format($amount,2)}}</td>
                    @endforeach

                    <td class="text-right text-strong">{{number_format(array_sum($totalsArray[$resp_center][$pap_code]['quarters']),2)}}</td>
                </tr>
            @endforeach
            <tr class="bg-lightyellow">
                <td class="text-strong">TOTAL {{$resp_center}}</td>
                <td></td>
                <td></td>
                @foreach(array_map('sumQuarters',$totalsArray)[$resp_center] as $m => $amount)
                    <td></td>
                    <td class="text-strong text-right">{{number_format($amount,2)}}</td>
                @endforeach
                <td class="text-strong text-right">{{number_format(array_sum(array_map('sumQuarters',$totalsArray)[$resp_center]),2)}}</td>
            </tr>
        @endforeach
            @if(count($orsArray) > 1)
                <tr>
                    <td class="text-strong">TOTAL</td>
                    <td></td>
                    <td></td>
                    @php
                        $sumQuarters = array_map('sumQuarters',$totalsArray);
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