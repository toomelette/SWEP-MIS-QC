@php
   $rand = \Illuminate\Support\Str::random();
@endphp
@extends('printables.print_layouts.print_layout_main')

@section('wrapper')
    <div>
        <img src="{{asset('images/sra.png')}}" style="width: 60px; float: left; margin-right: 15px;">
        <p class="no-margin text-left" style="font-size: 14px"> <b>SUGAR REGULATORY ADMINISTRATION</b></p>
        <p class="no-margin text-left" style="font-size: 12px;"> Araneta Street, Singcang, Bacolod City</p>
        <p class="no-margin text-left" style="font-size: 10px;"> SRA Web Portal - Budget Monitoring System</p>
    </div>

    <div style="text-align:left">

        <h3 class="no-margin">STATEMENT OF BUDGET AND ACTUAL EXPENDITURES</h3>
        <p>
            @if(!empty($request->date_from) && !empty($request->date_to))
                For the period of {{\Illuminate\Support\Carbon::parse($request->date_from)->format('F d, Y')}} to  {{\Illuminate\Support\Carbon::parse($request->date_to)->format('F d, Y')}}
            @else
                All records
            @endif
        </p>
    </div>

    <table class="tbl tbl-bordered-grey tbl-padded" style="width: 100%; font-size: 11px">
        <thead>
            <tr>
                <th class="text-center">Account Title</th>
                <th class="text-center">Account Code</th>
                @foreach($depts as $key => $dept)
                    <th style="min-width: 70px" class="text-center">{{$key ?? 'N/A'}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @php
                $totals = [];
            @endphp
            @foreach($groupedCoasArray as $type => $coas)
                @php
                    $totals[$type] = $depts;
                @endphp
                <tr class="bg-success">
                    <td colspan="{{count($depts) + 2}}" class="text-strong" style="font-size: 14px">
                        {{$type ?? 'N/A'}}
                    </td>
                </tr>
                @foreach($coas as $coa)
                    <tr>
                        <td>{{$coa['obj']->account_title}}</td>
                        <td>{{$coa['obj']->account_code}}</td>
                        @foreach($depts as $key => $dept)
                            @if(isset($coa['resp_center']))
                                @if(!empty($coa['resp_center'][$key]))
                                    @php
                                        $totals[$type][$key] = $totals[$type][$key] + $coa['resp_center'][$key]['sum_debit'];
                                    @endphp
                                    <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($coa['resp_center'][$key]['sum_debit'],2,'')}}</td>
                                @else
                                    <td></td>
                                @endif
                            @else
                                <td></td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
                <tr class="bg-info">
                    <td colspan="2" style="font-size: 12px" class="text-strong">TOTAL {{$type}}</td>
                    @foreach($depts as $key => $dept)
                        <td class="text-right text-strong b-top">{{\App\Swep\Helpers\Helper::toNumber($totals[$type][$key])}}</td>
                    @endforeach
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection

@section('scripts')
    <script type="text/javascript">


    </script>
@endsection