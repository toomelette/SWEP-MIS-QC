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

    <div style="text-align: left">

        <h3 class="no-margin">BUDGET PROPOSAL - (Monitoring) -- {{\App\Swep\Helpers\Arrays::departmentList()[$request->dept]}}</h3>
        <p>
            For the period of <b>{{\Illuminate\Support\Carbon::parse($request->date_from)->format('F d, Y')}}</b> to  <b>{{\Illuminate\Support\Carbon::parse($request->date_to)->format('F d, Y')}}</b>
        </p>

        @include('printables.ors.tables.table_budget_proposal_monitoring',[
            'paps' => $paps,
        ])
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">


    </script>
@endsection