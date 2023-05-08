@extends('layouts.modal-content')

@section('modal-header')
    {{$ors->ors_no}}
@endsection

@section('modal-body')
    <p class="page-header-sm text-info" style="border-bottom: 1px solid #cedbe1">
        ORS Details
    </p>
    <dl class="dl-horizontal">
        <dt>ORS No: </dt>
        <dd>{{$ors->ors_no}}</dd>

        <dt>Date:</dt>
        <dd>{{\Illuminate\Support\Carbon::parse($ors->date)->format('M. d, Y')}}</dd>

        <dt>Payee:</dt>
        <dd>{{$ors->payee}}</dd>

        <dt>Office:</dt>
        <dd>{{$ors->office}}</dd>

        <dt>Address:</dt>
        <dd>{{$ors->address}}</dd>

        <dt>Ref Book:</dt>
        <dd>{{\App\Swep\Helpers\Arrays::orsBooks()[$ors->ref_book] ?? $ors->ref_book}}</dd>

        <dt>Ref Doc:</dt>
        <dd>{{$ors->ref_doc}}</dd>

        <dt>Particulars:</dt>
        <dd>{{$ors->particulars}}</dd>

        <dt>Amount:</dt>
        <dd>{{number_format($ors->amount,2)}}</dd>
    </dl>
    <p class="page-header-sm text-info" style="border-bottom: 1px solid #cedbe1">
        Account Entries
    </p>

    <table class="table table-condensed table-striped table-bordered">
        <thead>
            <th>Resp Center</th>
            <th>Account Code | Title</th>
            <th>Debit</th>
            <th>Credit</th>
        </thead>
        <tbody>
            @php
                $aeArray = [];
            @endphp
            @if(count($ors->accountEntries) > 0)
                @foreach($ors->accountEntries as $ac)
                    @php
                        $aeArray[$ac->type][$ac->slug] = [
                            'debit' => $ac->debit,
                            'credit'=> $ac->credit,
                            'obj' => $ac,
                        ]
                    @endphp
                @endforeach
            @endif
            @foreach($aeArray as $type => $accountEntries)
                <tr>
                    <td colspan="4" class="bg-info text-center text-strong">{{$type}}</td>
                </tr>
                @php
                    $total = [
                        'debit' => 0,
                        'credit' => 0,
                    ];
                @endphp
                @foreach($accountEntries as $accountEntry)
                    @php
                        $total['debit'] = $total['debit'] + $accountEntry['obj']->debit;
                        $total['credit'] = $total['credit'] + $accountEntry['obj']->credit;
                    @endphp
                    <tr>
                        <td>{{$accountEntry['obj']->resp_center}}</td>
                        <td><b>{{$accountEntry['obj']->account_code}}</b> | {{$accountEntry['obj']->chartOfAccount->account_title}}</td>
                        <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($accountEntry['obj']->debit,2)}}</td>
                        <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($accountEntry['obj']->credit,2)}}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="2">TOTAL {{$type}}</th>
                    <th class="text-right">{{number_format($total['debit'],2)}}</th>
                    <th class="text-right">{{number_format($total['credit'],2)}}</th>
                </tr>
            @endforeach

        </tbody>
        <tfoot>


        </tfoot>
    </table>
@endsection

@section('modal-footer')

@endsection

@section('scripts')
    <script type="text/javascript">

    </script>
@endsection

