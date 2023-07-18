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

        <h3 class="no-margin">Subsidiary Ledger - {{$account->account_code}} - <small>{{$account->account_title}}</small></h3>
        <p>
            @if(!empty($request->date_from) && !empty($request->date_to))
                For the period of {{\Illuminate\Support\Carbon::parse($request->date_from)->format('F d, Y')}} to  {{\Illuminate\Support\Carbon::parse($request->date_to)->format('F d, Y')}}
            @else
                All records
            @endif
        </p>
    </div>

    @include('printables.ors.tables.table_subsidiary_ledger',[
        'ors' => $ors,
        'account' => $account,
    ])

@endsection

@section('scripts')
    <script type="text/javascript">


    </script>
@endsection