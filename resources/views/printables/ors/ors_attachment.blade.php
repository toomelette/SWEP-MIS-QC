@php
  $rand  = \Illuminate\Support\Str::random();
@endphp
@extends('printables.print_layouts.print_layout_main')

@section('wrapper')
    <table style="width: 100%;">
        <tbody><tr>
            <td style="width: 50%; vertical-align: top">
                <img src="{{asset('images/sra.png')}}" style="width: 80px; float: left; margin-right: 15px;">
                <p class="no-margin text-left" style="font-size: 16px"> <b>Republic of the Philippines</b></p>
                <p class="no-margin text-left" style="font-size: 16px"> <b>SUGAR REGULATORY ADMINISTRATION</b></p>
                <p class="no-margin text-left" style="font-size: 16px; margin-bottom: 15px"> North Avenue Diliman, Quezon City</p>
            </td>
            <td style="text-align: right; vertical-align: top">

            </td>

        </tr>
        </tbody>
    </table>
    <h3 class="text-left text-strong">OBLIGATION REQUEST AND STATUS</h3>
    <table style="width: 30%; font-size: 16px" class="text-strong">
        <tr>
            <td>ORS NO.</td>
            <td>{{$ors->ors_no}}</td>
        </tr>
        <tr>
            <td>DATE</td>
            <td>{{\App\Swep\Helpers\Helper::dateFormat($ors->ors_date,'M. d, Y')}}</td>
        </tr>
        <tr>
            <td>{{$ors->ref_book}}</td>
            <td>{{$ors->ref_doc}}</td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 14px" class="tbl-padded">
        <thead>
        <tr>
            <th class="text-center b-top b-bottom b-right b-left">RESP CTR</th>
            <th class="text-center b-top b-bottom b-right">ACCOUNT CODE</th>
            <th class="text-center b-top b-bottom b-right">ACCOUNT TITLE</th>
            <th class="text-center b-top b-bottom b-right">DEBIT</th>
            <th class="text-center b-top b-bottom b-right">CREDIT</th>
        </tr>
        </thead>
        <tbody>
            @if(!empty($ors->dvEntries))
                @foreach($ors->dvEntries as $dvEntry)
                    <tr>
                        <td>{{$dvEntry->responsibilityCenter->description->name ?? '-'}}</td>
                        <td>{{$dvEntry->account_code}}</td>
                        <td>{{$dvEntry->chartOfAccount->account_title}}</td>
                        <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($dvEntry->debit,2)}}</td>
                        <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($dvEntry->credit,2)}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-strong b-top">TOTAL</td>
                    <td class="text-right b-top text-strong">{{\App\Swep\Helpers\Helper::toNumber($ors->dvEntries->sum('debit'),2)}}</td>
                    <td class="text-right b-top text-strong">{{\App\Swep\Helpers\Helper::toNumber($ors->dvEntries->sum('credit'),2)}}</td>
                </tr>
            @else
            @endif

        </tbody>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript">

        print();
    </script>
@endsection