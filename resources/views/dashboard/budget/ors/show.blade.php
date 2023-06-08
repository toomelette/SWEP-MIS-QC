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
            <th class="bg-green">Resp Center</th>
            <th class="bg-green">Account Code | Title</th>
            <th class="bg-green">Debit</th>
            <th class="bg-green">Credit</th>
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
                    <th colspan="2" class="bg-success">TOTAL {{$type}}</th>
                    <th class="text-right bg-success">{{number_format($total['debit'],2)}}</th>
                    <th class="text-right bg-success">{{number_format($total['credit'],2)}}</th>
                </tr>
            @endforeach

        </tbody>
        <tfoot>


        </tfoot>
    </table>

    <p class="page-header-sm text-info" style="border-bottom: 1px solid #cedbe1">
        Applied Projects
    </p>
    <table class="table table-condensed table-striped table-bordered">
        <thead>
        <th class="bg-primary">PAP</th>
        <th style="min-width: 80px" class="bg-primary">MOOE</th>
        <th style="min-width: 80px" class="bg-primary">CO</th>
        </thead>
        <tbody>
        @php
            $totalMooe = 0;
            $totalCo = 0;
        @endphp
        @if(count($ors->projectsApplied) > 0)
            @foreach($ors->projectsApplied as $projectApplied)
                @php
                    $totalMooe = $totalMooe + $projectApplied->mooe;
                    $totalCo = $totalCo + $projectApplied->co;
                @endphp
                <tr>
                    <td><span class="text-strong">
                        {{$projectApplied->pap_code}}</span> - <small>{{$projectApplied->pap->pap_title ?? 'N/A'}}</small>
                        <div class="table-subdetail" style="margin-top: 3px">
                            {{$projectApplied->pap->responsibilityCenter->desc ?? 'N/A'}}
                        </div>
                    </td>
                    <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($projectApplied->mooe)}}</td>
                    <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($projectApplied->co)}}</td>
                </tr>
            @endforeach
        @endif
        <tr>
            <td class="text-strong bg-success">TOTAL</td>
            <td class="text-strong text-right bg-success">{{number_format($totalMooe,2)}}</td>
            <td class="text-strong text-right bg-success">{{number_format($totalCo,2)}}</td>
        </tr>
        </tbody>
    </table>

@endsection

@section('modal-footer')

@endsection

@section('scripts')
    <script type="text/javascript">

    </script>
@endsection

