<table class="tbl tbl-bordered-grey tbl-padded table-fixed-header" style="width: 100%; font-size: 11px">
    <thead class="header">
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