<table class="tbl tbl-bordered-grey tbl-padded" style="width: 100%; font-size: 11px">
    <thead>
    <tr>
        <th class="text-center">Date</th>
        <th class="text-center">ORS No.</th>
        <th class="text-center">Particulars</th>
        <th class="text-center">Unit</th>
        <th class="text-center">Project Code</th>
        <th class="text-center">Debit</th>
        <th class="text-center">Credit</th>
        <th class="text-center">Balance</th>
    </tr>
    </thead>
    <tbody>
    @forelse($accountEntries as $accountEntry)

        <tr>
            <td>{{\App\Swep\Helpers\Helper::dateFormat($accountEntry->ors->ors_date ?? null,'m-d-Y')}}</td>
            <td>{{$accountEntry->ors->ors_no ?? null}}</td>
            <td>{{$accountEntry->ors->particulars ?? null}}</td>

            <td>{{$accountEntry->unit ?? null}}</td>

            <td>
                @if(!empty($accountEntry->ors->projectsApplied))
                    @foreach($accountEntry->ors->projectsApplied as $proj)
                        {{$proj->pap_code}} <br>
                    @endforeach
                @endif
            </td>
            <td class="text-right">{{Helper::toNumber($accountEntry->debit)}}</td>
            <td class="text-right">{{Helper::toNumber($accountEntry->credit)}}</td>
            <td></td>
        </tr>
    @empty

    @endforelse
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-strong">Total</td>
        <td class="text-strong text-right">{{number_format($accountEntries->sum('debit'),2)}}</td>
        <td class="text-strong text-right">{{number_format($accountEntries->sum('credit'),2)}}</td>
        <td class="text-strong text-right"></td>
    </tr>
    </tbody>
</table>