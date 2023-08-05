<table style="width: 100%" class="tbl-padded tbl-bordered-vertical table-fixed-header">
    <thead class="header">
    <tr>
        <th >ORS No.</th>
        <th >Payee</th>
        <th >Total Amount</th>
        @foreach($cols as $col => $null)
            <th class="text-center">{{$departmentListAbbv[$col] ?? ''}}</th>
        @endforeach
        <th>Equip. Outlay</th>
        <th>Project Code</th>
        <th>MOOE</th>
        <th>CO</th>
    </tr>
    <tr>

    </tr>
    </thead>
    <tbody>
    @foreach($burs as $bur)

        <tr>
            <td>{{$bur['obj']->ors_no}}</td>
            <td>{{$bur['obj']->payee}}</td>
            <td class="text-right">{{number_format($bur['obj']->amount,2)}}</td>
            @foreach($bur['accountEntries'] as $dept => $amount)
                <td class="text-right"> {{\App\Swep\Helpers\Helper::toNumber($amount,2,'')}}</td>
            @endforeach
            @if(isset($bur['projectsApplied']))
                @foreach($bur['projectsApplied'] as $proj)
                    @if($loop->index == 0)
                        <td></td>
                        <td>{{$proj->AcctCode}}</td>
                        <td class="text-right">{{Helper::toNumber($proj->Amount,2,'')}}</td>
                        <td class="text-right">{{Helper::toNumber($proj->COAmt,2,'')}}</td>
                    @endif
                @endforeach
            @else
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            @endif
        </tr>
        @if(isset($bur['projectsApplied']) && count($bur['projectsApplied']) > 0)
            @foreach($bur['projectsApplied'] as $p)
                @if($loop->index > 0)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        @foreach($cols as $col => $null)
                            <td class="text-center"></td>
                        @endforeach
                        <td></td>
                        <td>{{$p->AcctCode}}</td>
                        <td class="text-right">{{Helper::toNumber($p->mooe,2,'')}}</td>
                        <td class="text-right">{{Helper::toNumber($p->co,2,'')}}</td>
                    </tr>
                @endif
            @endforeach
        @endif
    @endforeach
    </tbody>
</table>