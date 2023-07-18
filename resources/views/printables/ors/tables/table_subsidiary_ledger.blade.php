@php
    $totals = [
        'debit' => 0,
        'credit' => 0,
    ]
@endphp
<table class="tbl tbl-bordered-grey tbl-padded" style="width: 100%; font-size: 11px">
    <thead>
    <tr>
        <th class="text-center">Date</th>
        <th class="text-center">ORS No.</th>
        <th class="text-center">Particulars</th>
        <th class="text-center">Unit</th>
        <th class="text-center">Debit</th>
        <th class="text-center">Credit</th>
        <th class="text-center">Balance</th>
    </tr>
    </thead>
    <tbody>
        @if(!empty($ors))
            @foreach($ors as $o)
                @foreach($o->orsEntries as $orsEntry)
                    @if($account->account_code == $orsEntry->account_code)
                        @php
                            $totals['debit'] = $totals['debit'] + $orsEntry->debit;
                            $totals['credit'] = $totals['credit'] + $orsEntry->credit;
                        @endphp
                        <tr>
                            <td>{{\App\Swep\Helpers\Helper::dateFormat($o->ors_date,'m-d-Y')}}</td>
                            <td>{{$o->ors_no}}</td>
                            <td>{{$o->particulars}}</td>
                            <td>{{$orsEntry->unit}}</td>
                            <td class="text-right">{{Helper::toNumber($orsEntry->debit)}}</td>
                            <td class="text-right">{{Helper::toNumber($orsEntry->credit)}}</td>
                            <td></td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td class="text-strong">Total</td>
                <td></td>
                <td class="text-right text-strong"> {{number_format($totals['debit'],2)}}</td>
                <td class="text-right text-strong"> {{number_format($totals['credit'],2)}}</td>
                <td></td>
            </tr>
        @endif
    </tbody>
</table>