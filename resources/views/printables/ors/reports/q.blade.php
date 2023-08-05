@php
    $rand = \Illuminate\Support\Str::random();
    $totalArray = [];

    $GLOBALS['quarter'] = $quarter;
    $monthsStartingAndEnding = \App\Swep\Helpers\Helper::months();

    $orsPerDept = $ors->flatten(1)->groupBy('pap.responsibilityCenter.description.name');

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
        @foreach($depts as $dept)
            <tr class="bg-lightred">
                <td colspan="10" style="padding-bottom: 10px"><span style="font-size: 14px;" class="text-strong">{{$dept->descriptive_name}}</span></td>
            </tr>
            @foreach($dept->responsibilityCenters as $respCenter)
                <tr class="bg-orange">
                    <td class="text-strong td-indent">{{$respCenter->desc}}</td>
                    <td colspan="9"></td>
                </tr>
                @foreach($respCenter->papCodes as $key => $pap)
                    @if($pap->charge_to_income != 1)
                        <tr class="bg-lightblue">
                            <td colspan="10" style="font-size: 12px" class="td-indent-2"> <b>{{$pap->pap_code}}</b> - <span class="text-info text-strong text-italic">{{$pap->pap_title ?? 'N/A'}}</span></td>
                        </tr>
                        <tr>

                            <td class="text-right text-strong">BALANCE FORWARDED:</td>
                            <td class="text-right text-strong">
                                {{number_format(
                                   $balanceForwardedPerPapMooe = ($pap->mooe ?? 0) - (!empty($utilized->get($pap->pap_code)) ? $utilized->get($pap->pap_code)->sum('mooe') : 0 )
                                ,2)}}
                            </td>
                            <td class="text-right text-strong">
                                {{number_format(
                                   $balanceForwardedPerPapCo = ($pap->co ?? 0) - (!empty($utilized->get($pap->pap_code)) ? $utilized->get($pap->pap_code)->sum('co') : 0 )
                                ,2)}}
                            </td>
                            <td colspan="7"></td>
                        </tr>
                        @if(!empty($ors[$pap->pap_code]))

                            @foreach($ors[$pap->pap_code] as $appliedProject)

                                @php
                                    $orsData = $appliedProject->ors;
                                @endphp
                                <tr>
                                    <td class="td-indent-3"> {{$orsData->payee}} - {{$orsData->particulars}} </td>
                                    <td></td>
                                    <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($appliedProject->co)}}</td>
                                    @foreach(\App\Swep\Helpers\Helper::quarters()[$quarter] as $m => $q)
                                        @if( \Illuminate\Support\Carbon::parse($orsData->ors_date)->format('m') == $m)
                                            <td class="text-center">{{$orsData->ors_no}}</td>
                                            <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($appliedProject->mooe)}}</td>
                                        @else
                                            <td></td>
                                            <td></td>
                                        @endif
                                    @endforeach
                                    <td></td>
                                </tr>

                            @endforeach
                        @endif
                        <tr class="bg-lightgreen">
                            @php
                                $utilizedPerPapMooe = !empty($ors->get($pap->pap_code)) ? $ors->get($pap->pap_code)->sum('mooe') : 0;
                                $utilizedPerPapCo = !empty($ors->get($pap->pap_code)) ? $ors->get($pap->pap_code)->sum('co') : 0;
                            @endphp
                            <td class="text-right text-strong">Balance as of</td>
                            <td class="text-right text-strong">
                                {{number_format($balanceForwardedPerPapMooe - $utilizedPerPapMooe,2)}}
                            </td>
                            <td class="text-right text-strong">
                                {{number_format($balanceForwardedPerPapCo - $utilizedPerPapCo,2)}}
                            </td>
                            @foreach(\App\Swep\Helpers\Helper::quarters()[$quarter] as $m => $q)
                                <td></td>
                                @if(!empty($ors[$pap->pap_code]))
                                    <td class="text-right text-strong">
                                        {{
                                            \App\Swep\Helpers\Helper::toNumber($ors[$pap->pap_code]->whereBetween('ors.ors_date',[
                                            $monthsStartingAndEnding[$m]['start'],
                                            $monthsStartingAndEnding[$m]['end'],
                                            ])->sum('mooe') ?? 0,2,'0.00')
                                        }}
                                    </td>
                                @else
                                    <td></td>
                                @endif
                            @endforeach
                            <td class="text-right text-strong">{{number_format($utilizedPerPapMooe,2)}}</td>
                        </tr>
                    @endif
                @endforeach

            @endforeach
            <tr class="bg-lightyellow">
                <td>TOTAL {{ $dept->name  }}</td>
                <td></td>
                <td></td>
                @foreach(\App\Swep\Helpers\Helper::quarters()[$quarter] as $m => $q)
                    <td></td>
                    @if(!empty($orsPerDept[$dept->name]))
                        <td class="text-right text-strong">
                            {{
                                \App\Swep\Helpers\Helper::toNumber($orsPerDept[$dept->name]->whereBetween('ors.ors_date',[
                                $monthsStartingAndEnding[$m]['start'],
                                $monthsStartingAndEnding[$m]['end'],
                                ])->sum('mooe') ?? 0,2,'0.00')
                            }}
                        </td>
                    @else
                        <td></td>
                    @endif
                @endforeach
                <td class="text-right text-strong">
                    @if(!empty($orsPerDept[$dept->name]))
                    {{
                        \App\Swep\Helpers\Helper::toNumber($orsPerDept[$dept->name]->sum('mooe') ?? 0,2,'0.00')
                    }}
                    @else
                        0.00
                    @endif
                </td>
            </tr>
        @endforeach


        </tbody>
    </table>
@endsection