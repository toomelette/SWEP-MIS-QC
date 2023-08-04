@php
   $rand = \Illuminate\Support\Str::random();
@endphp
@extends('printables.print_layouts.print_layout_main')

@section('wrapper')
    @php
        $noOfPages = 1;
        $chunkBy = \Illuminate\Support\Facades\Request::get('accountEntriesPerPage') ?? 15;
        if(\Illuminate\Support\Facades\Request::get('withOrsEntries') == true){
            $chunked = $ors->dvEntries->chunk($chunkBy);
            $noOfPages = count($chunked);
        }

        $total = 0;
    @endphp
    @for($pageNo = 0; $pageNo < $noOfPages; $pageNo++)
        <div style="break-after: page">
            <table style="width: 100%;">
                <tbody><tr>
                    <td style="width: 50%; vertical-align: top">
                        <img src="{{asset('images/sra.png')}}" style="width: 80px; float: left; margin-right: 15px;">
                        <p class="no-margin text-left" style="font-size: 16px"> <b>Republic of the Philippines</b></p>
                        <p class="no-margin text-left" style="font-size: 16px"> <b>SUGAR REGULATORY ADMINISTRATION</b></p>
                        <p class="no-margin text-left" style="font-size: 16px; margin-bottom: 15px"> North Avenue Diliman, Quezon City</p>
                    </td>
                    <td style="text-align: right; vertical-align: top">
                        Page {{$pageNo + 1}} of {{$noOfPages}}
                    </td>

                </tr>
                </tbody>
            </table>
            <table style="width: 100%" class="tbl-bordered">
                <tr>
                    <td class="text-center" style="width: 60%">
                        <p style="font-size: 22px" class="text-strong no-margin">OBLIGATION REQUEST AND STATUS</p>
                        <p class="no-margin" style="font-size: 16px">SRA - QUEZON CITY</p>
                    </td>
                    <td style="padding: 7px 15px">
                        <table style="width: 100%; font-size: 14px">
                            <tr>
                                <td style="width: 80px">Serial no:</td>
                                <td class="text-strong">{{$ors->ors_no}}</td>
                            </tr>
                            <tr>
                                <td>Date:</td>
                                <td class="text-strong">{{\Illuminate\Support\Carbon::parse($ors->date)->format('M. d, Y')}}</td>
                            </tr>
                            <tr>
                                <td>Fund Cluster:</td>
                                <td class="text-strong">{{$ors->funds}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table style="width: 100%; font-size: 14px" class="tbl-bordered tbl-padded">
                <tr>
                    <td style="width: 120px">
                        Payee:
                    </td>
                    <td class="text-strong">{{$ors->payee}}</td>
                </tr>
                <tr>
                    <td>
                        Office:
                    </td>
                    <td class="text-strong">{{$ors->office}}</td>
                </tr>
                <td>
                    Address:
                </td>
                <td class="text-strong">{{$ors->address}}</td>
            </table>
            <table style="font-size: 14px; width: 100%" class="tbl-padded reference_table" id="reference_table">
                <thead>
                <tr style="font-size: 12px">
                    <th class="text-center b-left b-bottom" style="width: 120px">Responsibility Center</th>
                    <th style="width: 40%" class="text-center b-left b-bottom">Particulars</th>
                    <th class="text-center b-left b-bottom">MFO/PAP</th>
                    <th class="text-center b-left b-bottom">UACS Object Code</th>
                    <th style="width: 10%" class="text-center b-left b-bottom b-right">Amount</th>
                </tr>
                <tr>
                    <td class="b-left"></td>
                    <td class="b-left">
                        {{$ors->particulars}}
                        <br><br>
                        <p class="no-margin text-strong" style="font-size: 18px">
                            {{
                            \App\Swep\Helpers\Arrays::orsBooks()[$ors->ref_book] ??
                            \App\Swep\Helpers\Arrays::oldOrsBooks()[$ors->ref_book] ??
                            $ors->ref_book
                            }}
                            No. {{ $ors->ref_doc }} <br><br>
                        </p>
                    </td>
                    <td class="b-left"></td>
                    <td class="b-left"></td>
                    <td class="b-left b-right"></td>
                </tr>

                @if(\Illuminate\Support\Facades\Request::get('withOrsEntries') == true)
                    @if(count($chunked[$pageNo]) > 0)

                        @foreach($chunked[$pageNo] as $dvEntry)
                            @php
                                $total = $total + $dvEntry->debit;
                            @endphp
                            <tr>
                                <td style="padding: 0px 2px !important; font-size: 13px" class="b-left">
                                    {{$dvEntry->responsibilityCenter->description->department ?? ($dvEntry->dept.' '.$dvEntry->unit)}}
                                </td>
                                <td style="padding: 0px 2px !important; font-size: 13px" class="b-left">{{$dvEntry->chartOfAccount->account_title ?? '-'}}</td>
                                <td style="padding: 0px 2px !important; font-size: 13px" class="b-left"></td>
                                <td style="padding: 0px 2px !important; font-size: 12px" class="b-left">{{$dvEntry->account_code}}</td>
                                <td style="padding: 0px 2px !important; font-size: 13px" class="text-right b-left b-right">{{\App\Swep\Helpers\Helper::toNumber($dvEntry->debit,2)}}</td>
                            </tr>
                        @endforeach
                        @if($pageNo == $noOfPages - 1)
                            <tr style=" font-size: 12px">
                                <td class="b-left"></td>
                                <td class="b-left"></td>
                                <td class="b-left"></td>
                                <td class="text-right b-top b-left">
                                    TOTAL
                                </td>
                                <td class="text-right b-top text-strong b-left b-right">{{\App\Swep\Helpers\Helper::toNumber($total,2)}}</td>
                            </tr>
                        @endif

                    @endif
                @endif
                @if($pageNo + 1 == $noOfPages)
                <tr>
                    <td class="b-left"></td>
                    <td class="b-left">
                        <table style="width: 90%; margin-left: 25px; margin-right: 25px" class="">
                            <thead>
                            <tr>
                                <th class="b-bottom">PROJECT</th>
                                <th class="b-bottom">AMOUNT</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($ors->projectsApplied))
                                @foreach($ors->projectsApplied as $projectApplied)
                                    <tr>
                                        <td>{{$projectApplied->pap_code}}</td>
                                        <td class="text-right">{{number_format($projectApplied->mooe ?? $projectApplied->co,2)}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </td>
                    <td class="b-left"></td>
                    <td class="b-left"></td>
                    <td class="b-left b-right"></td>
                </tr>
                @endif
                </thead>
                <tbody>
                <tr id="adjuster" class="adjuster">
                    <td class="b-left"></td>
                    <td class="b-left"></td>
                    <td class="b-left"></td>
                    <td class="b-left"></td>
                    <td class="b-left b-right"></td>
                </tr>
                </tbody>
            </table>
            <table style="width: 100%; font-size: 12px" class="tbl-padded">
                <tr>
                    <td style="width: 48%" class="text-top b-left b-top text-justify">A. Certified: Charges to appropriation/allotment are necessary, lawful and under my direct supervision; and supporting documents valid, proper and legal.</td>
                    <td class="text-top b-left b-right b-top text-justify">B. Certified: Allotment available and obligated for the purpose/adjustment necessary as indicated above.</td>
                </tr>
            </table>
            <table style="width: 100%; font-size: 14px" class="tbl-padded">
                <tr>
                    <td style="width: 48%" class="text-top b-left">
                        <table style="width: 100%; font-size: 14px">
                            <tr>
                                <td style="padding-top: 30px">Signature:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Printed Name:</td>
                                <td class="text-strong text-center">{{$ors->certified_by}}</td>
                            </tr>
                            <tr>
                                <td>Position:</td>
                                <td class="text-strong text-center">{{$ors->certified_by_position}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-center" style="font-size: 12px">Head, Requesting Office/Authorized Representative</td>
                            </tr>
                        </table>
                    </td>
                    <td class="text-top b-left b-right">
                        <table style="width: 100%; font-size: 14px">
                            <tr>
                                <td style="padding-top: 30px">Signature:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Printed Name:</td>
                                <td class="text-strong text-center">{{$ors->certified_budget_by}}</td>
                            </tr>
                            <tr>
                                <td>Position:</td>
                                <td class="text-strong text-center">{{$ors->certified_budget_by_position}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-center" style="font-size: 12px">Head, Budget Division/Unit/Authorized Representative</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table style="width: 100%; font-size: 12px" class="tbl-padded tbl-bordered">
                <tr>
                    <td colspan="8" class="text-center text-strong">STATUS OF OBLIGATION</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-center text-strong">Reference</td>
                    <td colspan="4" class="text-center text-strong">Amount</td>
                </tr>
                <tr>
                    <td class="text-center text-strong" rowspan="2">Date</td>
                    <td class="text-center text-strong" rowspan="2">Particulars</td>
                    <td class="text-center text-strong" rowspan="2">ORS/JEV/CHECK/ ADA/TRA No.</td>
                    <td class="text-center text-strong">Obligation</td>
                    <td class="text-center text-strong">Payable</td>
                    <td class="text-center text-strong">Payment</td>
                    <td class="text-center text-strong">Not Yet Due</td>
                    <td class="text-center text-strong">Due and Demandable</td>
                </tr>
                <tr>

                    <td class="text-center text-strong">(a)</td>
                    <td class="text-center text-strong">(b)</td>
                    <td class="text-center text-strong">(c)</td>
                    <td class="text-center text-strong">(a-b)</td>
                    <td class="text-center text-strong">(b-c)</td>
                </tr>
                <tr>
                    <td><br><br><br><br><br></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 80%;"></td>
                    <td>
                        <p class="no-margin">FM-AFD-BTD-001, Rev. 02</p>
                        <p class="no-margin">Effective August 18, 2022</p>
                    </td>
                </tr>
            </table>
        </div>
        <hr class="page-break no-print">
    @endfor
@endsection

@section('scripts')
    <script type="text/javascript">
        let height = 400;
        $(document).ready(function () {
            let set = height;
            // if($("#reference_table").height() < set){
            //     let rem = set - $("#reference_table").height();
            //     $("#adjuster").css('height',rem);
            //     print();
            // }
            $(".reference_table").each(function () {
                if($(this).height() < set){
                    let rem = set - $(this).height();
                    $(this).find('.adjuster').css('height',rem);
                }

            });
            print();

        })
    </script>
@endsection