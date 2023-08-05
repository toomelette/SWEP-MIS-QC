<table class="tbl tbl-bordered-grey tbl-padded table-fixed-header" style="width: 100%; font-size: 11px">
    <thead class="header">
    <tr class="bg-purple">
        <th class="text-center">ORS No.</th>
        <th class="text-center">Ref Doc</th>
        <th class="text-center">Ref No.</th>
        <th class="text-center">Payee</th>
        <th class="text-center">Total Amount</th>
        @if(count($groupedProjects) > 0)
            @foreach($groupedProjects as $resp_center => $name)
                <th class=w"text-center">{{$name}}</th>
            @endforeach
        @endif
        <th>Equip. Outlay</th>
    </tr>
    </thead>
    <tbody>
    @php
        $grandTotal = null;
        $grandTotalCo = null;
    @endphp
    @if(count($ors) > 0)

        @foreach($orsArray as $ors)
            @php
                $grandTotal = $grandTotal + $ors['obj']->amount;
                $grandTotalCo = $grandTotalCo + array_sum(array_column($ors['projectsApplied'],'co'));
            @endphp
            @if(count($ors['projectsApplied']) > 0)
            @endif
            <tr>
                <td>{{$ors['obj']->ors_no}}</td>
                <td>{{\App\Swep\Helpers\Arrays::oldOrsBooks()[$ors['obj']->ref_book] ?? \App\Swep\Helpers\Arrays::orsBooks()[$ors['obj']->ref_book] ?? $ors['obj']->ref_book}}</td>
                <td>{{$ors['obj']->ref_doc}}</td>
                <td>{{$ors['obj']->payee}}</td>
                @if($ors['obj']->amount == array_sum(array_column($ors['projectsApplied'],'total')))
                    <td class="text-right">{{number_format($ors['obj']->amount,2)}}</td>
                @else
                    <td class="text-right text-red">{{number_format($ors['obj']->amount,2)}}</td>
                @endif

                @foreach($ors['projectsApplied'] as $department => $values)
                    @php
                        $groupedProjectsNull[$department]['mooe'] = $groupedProjectsNull[$department]['mooe'] + ($values['mooe']);
                    @endphp
                    <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($values['mooe'] ?? $values['co'],2,'')}}</td>
                @endforeach
                <td class="text-right">
                    {{\App\Swep\Helpers\Helper::toNumber(array_sum(array_column($ors['projectsApplied'],'co')),2,'')}}
                </td>
            </tr>
        @endforeach
    @endif
    <tr>
        <th colspan="4">Total ({{count($orsArray)}})</th>
        <th class="text-right">{{number_format($grandTotal,2)}}</th>
        @foreach($groupedProjectsNull as $dept => $values)
            <th class="text-right">{{number_format($values['mooe'],2)}}</th>
        @endforeach
        <th class="text-right">{{number_format($grandTotalCo,2)}}</th>
    </tr>
    </tbody>
</table>