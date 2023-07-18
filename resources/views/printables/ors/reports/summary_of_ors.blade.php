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
        <h3 class="no-margin">SUMMARY OF OBLIGATION REQUESTS AND STATUS (ORS) - {{\App\Swep\Helpers\Arrays::departmentList()[Request::get('resp_center')] ?? ''}}</h3>
        <p>
            For the period of
            <b>
                {{Carbon::parse(\Illuminate\Support\Facades\Request::capture()->date_from)->format('F d, Y')}} to {{Carbon::parse(\Illuminate\Support\Facades\Request::capture()->date_to)->format('F d, Y')}}
            </b>
        </p>
    </div>
    @include('printables.ors.tables.table_summary_of_ors',[
        'ors' => $ors,
        'groupedProjects' => $groupedProjects,
        'groupedProjectsNull' => $groupedProjectsNull,
        'orsArray' => $orsArray,
    ])
@endsection