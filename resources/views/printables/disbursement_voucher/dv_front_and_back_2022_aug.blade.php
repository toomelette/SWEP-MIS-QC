<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Disbursement Voucher</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{--    <link rel="stylesheet" href="{{ asset('template/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">--}}

    <link rel="stylesheet" href="{{ asset('template/bower_components/font-awesome/css/font-awesome.min.css') }}">

    {{--    <link rel="stylesheet" href="{{ asset('template/dist/css/AdminLTE.min.css') }}">--}}

    <link rel="stylesheet" href="{{ asset('css/print.css') }}?s={{\Illuminate\Support\Str::random()}}">


    <style type="text/css">

        .div-height{

            margin-bottom: -50px;
            padding-bottom: 50px;
            overflow: hidden;

        }

        td{
            border: 1px solid black;
            padding-left: 2px;
        }

        .top-left{
            float: left;
        }
        .no-margin{
            margin: 0 0 0 0;
        }
        .text-center{
            text-align: center;
        }
        .text-strong{
            font-weight: bold;
        }
        .f-12{
            font-size: 12px;
        }
        .f-9{
            font-size: 9px;
        }
        .no-border-top{
            border-top: 0px
        }
        .no-border-bottom{
            border-bottom: 0px
        }
        .no-border-left{
            border-left: 0px
        }
        .no-border-right{
            border-right: 0px
        }
        .dv_table{
            border-right: 2px solid black;
            border-left: 2px solid black;
            border-bottom: 2px solid black;
            border-collapse: collapse;
        }

        .arrow {
            position: absolute;
            overflow: hidden;
            display: inline-block;
            font-size: 3px;
            width: 3em;
            height: 3em;
            border-top: 2px solid black;
            border-right: 2px solid black ;
            transform: rotate(54deg) skew(20deg);
        }
        .letter{
            width: 5px;
        }

        ol li{
            text-align: justify;
        }

    </style>

</head>

{{--<body onload="window.print();" onafterprint="window.close()">--}}
<body>

<div class="printable">
    <div style="break-after: page">
        <div class="printable font-px14">
            <table style="width: 100%" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td  rowspan="3" class="no-border-bottom no-border-right" style="width: 20%; border-left: 2px solid black; border-top: 2px solid black">
                        <div style=" width: 100%">
                            <div style="width: 100%; float: left">
                                <center>
                                    <img src="{{ asset('images/sra.png') }}" style="width:90px; float: right">
                                </center>
                            </div>

                        </div>
                    </td>
                    <td rowspan="3" class="text-strong text-center no no-border-bottom no-border-left text-strong" style="width: 50%; border-top: 2px solid black; border-right: none !important;">
                        <p class="no-margin">Republic of the Philippines</p>
                        <p class="no-margin">SUGAR REGULATORY ADMINISTRATION</p>
                        <p class="no-margin">Araneta Street, Singcang, Bacolod City</p>
                        <p class="no-margin" style="font-size: 18px">DISBURSEMENT VOUCHER	</p>
                    </td>
                    <td rowspan="3" style="width: 7%; border-top: 2px solid black; border-left: none !important; border-bottom: none !important; border-right: none !important;"></td>
                    <td style="vertical-align: top; border-top: 2px solid black; border-right: 2px solid black" class="text-strong no-border-bottom font-px11">
                        Fund Cluster:
                        <p class="no-margin">{{(isset(\App\Swep\Helpers\Helper::budgetTypes()[$dv->fund_source])) ? \App\Swep\Helpers\Helper::budgetTypes()[$dv->fund_source] : $dv->fund_source}}</p>
                    </td>
                </tr>
                <tr>
                    <td class="font-px11" style="vertical-align: top; border-right: 2px solid black">
                        <b>Date:</b>
                        <p class="no-margin">{{\Illuminate\Support\Carbon::parse($dv->date)->format('M. d, Y')}}</p>
                    </td>
                </tr>
                <tr>
                    <td class="font-px11" style="vertical-align: top; border-top: none !important; border-right: 2px solid black; border-bottom: none !important;">
                        DV No.:
                        <p class="no-margin">{{$dv->dv_no ?? '<br>'}}</p>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="dv_table" style="width: 100%; border-bottom: none">
{{--                <tr style="border: none">--}}
{{--                    <td style="border: none"></td>--}}
{{--                    <td style="border: none; width: 40px"></td>--}}
{{--                    <td style="border: none"></td>--}}
{{--                    <td style="border: none"></td>--}}
{{--                    <td style="border: none"></td>--}}
{{--                    <td style="border: none"></td>--}}
{{--                    <td style="border: none"></td>--}}
{{--                    <td style="border: none"></td>--}}
{{--                    <td style="border: none"></td>--}}
{{--                    <td style="border: none"></td>--}}
{{--                    <td style="border: none"></td>--}}
{{--                    <td style="border: none"></td>--}}

{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td colspan="3" rowspan="4" class="no-border-bottom no-border-right" style="width: 300px">--}}
{{--                        <div style=" width: 100%">--}}
{{--                            <div style="width: 100%; float: left">--}}
{{--                                <center>--}}
{{--                                    <img src="{{ asset('images/sra.png') }}" style="width:90px; float: right">--}}
{{--                                </center>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </td>--}}
{{--                    <td colspan="7" class="text-strong text-center no no-border-bottom no-border-left text-strong">Republic of the Philippines</td>--}}
{{--                    <td colspan="2" class="text-strong no-border-bottom font-px11">Fund Cluster:</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td colspan="7" class="text-strong text-center no-border-top no-border-bottom no-border-left">SUGAR REGULATORY ADMINISTRATION</td>--}}
{{--                    <td colspan="2" class="no-border-top text-strong f-12"></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td colspan="7"  class="text-strong text-center no-border-top no-border-bottom no-border-left">Araneta Street, Singcang, Bacolod City</td>--}}
{{--                    <td colspan="2" class="text-strong no-border-bottom font-px12">Date: {{\Illuminate\Support\Carbon::parse($dv->date)->format('F d, Y')}}</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td colspan="7" class="no-border-top no-border-bottom no-border-left"></td>--}}
{{--                    <td colspan="2" class="no-border-top no-border-bottom font-px11">DV No.:</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td colspan="3" class="no-border-top no-border-right"></td>--}}
{{--                    <td colspan="7" class="text-strong font-px18 text-center no-border-top no-border-left">DISBURSEMENT VOUCHER</td>--}}
{{--                    <td colspan="2" class="no-border-top text-strong f-12">{{$dv->dv_no}}</td>--}}
{{--                </tr>--}}
                <tr class="font-px12 text-strong">
                    <td rowspan="2" colspan="2" style="width: 13%">Mode of Payment</td>
                    <td rowspan="2" class="text-center no-border-right">
                        <div style="width: 20px; height: 20px; border: 1.4px solid; float: right; {{($dv->mode_of_payment == 'CHECK')? 'background-color: black' : ''}}"></div>
                    </td>
                    <td rowspan="2" class="no-border-left no-border-right">MDS Check</td>
                    <td rowspan="2" class="no-border-left no-border-right">
                        <div style="width: 20px; height: 20px; border: 1.4px solid; float: right ;{{($dv->mode_of_payment == 'COM_CHECK')? 'background-color: black' : ''}}"></div>
                    </td>
                    <td rowspan="2"  class="no-border-left no-border-right">Commercial Check</td>
                    <td rowspan="2" colspan="2"  class="no-border-left no-border-right">
                        <div style="width: 20px; height: 20px; border: 1.4px solid; float: right ; {{($dv->mode_of_payment == 'ADA')? 'background-color: black' : ''}}"></div>
                    </td>
                    <td rowspan="2" class="no-border-left no-border-right">ADA</td>
                    <td rowspan="2"  class="no-border-left no-border-right">
                        <div style="width: 20px; height: 20px; border: 1.4px solid; float: right; {{($dv->mode_of_payment == 'OTHERS')? 'background-color: black' : ''}}"></div>
                    </td>
                    <td colspan="2" class="no-border-bottom no-border-left ">Others (Please specify)</td>
                </tr>
                <tr class="font-px12">
                    <td colspan="2" class="no-border-top no-border-left">{{$dv->mode_of_payment_specify}}</td>
                </tr>
                <tr class="text-strong ">
                    <td colspan="2" rowspan="2" class="font-px11">Payee</td>
                    <td colspan="6" rowspan="2">{{strtoupper($dv->payee)}}</td>
                    <td colspan="3" class="no-border-bottom font-px11">TIN/Emp. No.:</td>
                    <td class="no-border-bottom font-px11">ORS/BURS NO.:</td>
                </tr>

                <tr class="text-strong">
                    <td colspan="3" class="no-border-bottom no-border-top">{!! ($dv->tin == '') ? '<br>': $dv->tin !!}</td>
                    <td class="no-border-bottom no-border-top">{{$dv->bur_no}}</td>
                </tr>
                <tr class="text-strong">
                    <td colspan="2" class="font-px11">Address</td>
                    <td colspan="10">{{$dv->address}}</td>
                </tr>
                <tr class="text-strong font-px11">

                    <td colspan="8" class="text-center">Particulars</td>
                    <td class="text-center">RC</td>
                    <td class="text-center" colspan="2">MFO/PAP</td>
                    <td class="text-center">Amount</td>
                </tr>
                @php($total = 0)
                @if(!empty($dv->details))
                    @php($n = 0)
                    <tr>
                        <td colspan="8" class="explanation" style="max-width: 650px; height: 200px; vertical-align: top">
                            {!! $dv->explanation!!}
                        </td>
                        <td class="text-top text-center f-12">
                            @foreach($dv->details as $detail)
                                @php($total = $total+$detail->amount)
                                <p class="no-margin">{{$detail->resp_center}}</p>
                            @endforeach
                        </td>
                        <td class="text-top text-center f-12" colspan="2">

                            @foreach($dv->details as $detail)
                                <p class="no-margin">{{$detail->mfo_pap}}</p>
                            @endforeach
                        </td>
                        <td class="text-right text-top f-12">
                            @foreach($dv->details as $detail)
                                <p class="no-margin">{{number_format($detail->amount,2)}}</p>
                            @endforeach
                        </td>

                    </tr>
                @else

                @endif


                <tr class="text-strong">
                    <td colspan="8" class="text-center">Amount Due</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td class="text-right ">{{number_format($total,2)}}</td>
                </tr>
            </table>
            <table class="dv_table" style="width: 100%; border-top: none">
                <tr style="border: none" class="text-strong font-px11">
                    <td style="border-top: none" class="letter">A</td>
                    <td style="border-top: none" colspan="11" class="no-border-bottom">Certified: Expenses/Cash Advance necessary, lawful and incurred under my direct supervision</td>
                </tr>

                <tr  class="text-strong font-px11">
                    <td style="padding-top: 20px" colspan="12" class="no-border-top no-border-bottom text-center">
                        @if($dv->certified_supervisor != '')
                            <p class="no-margin"><u>{{$dv->certified_supervisor}}</u></p>
                            <p class="no-margin">{{$dv->certified_supervisor_position}}</p>
                        @else
                            ____________________________________________________________
                        @endif
                    </td>
                </tr>
                <tr  class="text-strong font-px11">
                    <td colspan="12" class="text-center no-border-top">Printed Name, Designation and Signature of Supervisor</td>
                </tr>
                <tr  class="text-strong font-px11">
                    <td class="letter">B</td>
                    <td colspan="5" style=" width: 45%">Accounting Entry:</td>
                    <td colspan="6"></td>
                </tr>
                <tr  class="text-strong font-px11">
                    <td colspan="6" class="text-center">Account Title</td>
                    <td colspan="3" class="text-center" style="width: 5%">UACS Code</td>
                    <td colspan="2" class="text-center">Debit</td>
                    <td class="text-center">Credit</td>
                </tr>
                <tr  class="text-strong font-px11">
                    <td colspan="6" class="text-center" style="padding-top: 50px"></td>
                    <td colspan="3" class="text-center" style="padding-top: 50px"></td>
                    <td colspan="2" class="text-center" style="padding-top: 50px"></td>
                    <td class="text-center" style="padding-top: 50px"></td>
                </tr>
                <tr  class="text-strong font-px11">
                    <td class="letter">C</td>
                    <td colspan="5">Certified:</td>
                    <td class="letter">D</td>
                    <td colspan="5">Approved Payment:</td>
                </tr>
                <tr  class="text-strong font-px11">
                    <td colspan="6" class="font-px11 no-border-bottom no-border-top">
                        <div>
                            <div style="width: 30px; float: left; padding-top: 1px">
                                <div style="width: 20px; height: 10px; border: 1.4px solid;"></div>
                            </div>
                            <div style="float:left;">
                                Cash Available
                            </div>
                        </div>

                    </td>
                    <td colspan="6" rowspan="3"></td>
                </tr>
                <tr  class="text-strong font-px11">
                    <td colspan="6" class="font-px11 no-border-bottom no-border-top">
                        <div>
                            <div style="width: 30px; float: left; padding-top: 1px">
                                <div style="width: 20px; height: 10px; border: 1.4px solid;"></div>
                            </div>
                            <div style="float:left;">
                                Subject to Authority to Debit Account (when applicable)
                            </div>
                        </div>
                    </td>
                    {{--                <td colspan="6"></td>--}}
                </tr>
                <tr  class="text-strong font-px11">
                    <td colspan="6" class="font-px11 no-border-bottom no-border-top" style="padding-bottom: 5px">
                        <div>
                            <div style="width: 30px; float: left; padding-top: 1px">
                                <div style="width: 20px; height: 10px; border: 1.4px solid;"></div>
                            </div>
                            <div style="float:left;">
                                Supporting documents complete and amount claimed
                            </div>
                        </div>
                    </td>
                    {{--                <td colspan="6"></td>--}}
                </tr>

                <tr class="font-px11 text-strong" style="height: 30px">
                    <td colspan="2" class="text-center">Signature</td>
                    <td colspan="4"></td>
                    <td colspan="3" class="text-center">Signature</td>
                    <td colspan="3"></td>
                </tr>
                <tr class="font-px11 text-strong">
                    <td colspan="2" class="text-center">Printed Name</td>
                    <td colspan="4" class="text-center">{{$dv->certified_by}}</td>
                    <td colspan="3" class="text-center">Printed Name</td>
                    <td colspan="3" class="text-center">{{$dv->approved_by}}</td>
                </tr>
                <tr class="font-px11 text-strong">
                    <td colspan="2" rowspan="2" class="text-center">Position</td>
                    <td colspan="4" class="text-center">{{$dv->certified_by_position}}</td>
                    <td colspan="3" rowspan="2" class="text-center">Position</td>
                    <td colspan="3" class="text-center">{{$dv->approved_by_position}}</td>
                </tr>
                <tr class="font-px11 text-strong">
                    <td colspan="4" class="text-center">Head, Accounting Unit/Authorized Representative</td>
                    <td colspan="3" class="text-center">Agency Head/Authorized Representative</td>
                </tr>
                <tr class="font-px11 text-strong">
                    <td colspan="2" class="text-center">Date</td>
                    <td colspan="4"></td>
                    <td colspan="3" class="text-center">Date</td>
                    <td colspan="3"></td>
                </tr>
                <tr  class="text-strong font-px11">
                    <td>E</td>
                    <td colspan="10">Receipt of Payment</td>
                    <td>JEV No.</td>
                </tr>
                <tr class="font-px11 text-strong">
                    <td colspan="2" class="no-border-bottom">Check/</td>
                    <td colspan="3" rowspan="2" style="width: 20%;"></td>
                    <td class="no-border-bottom">Date:</td>
                    <td colspan="5" class="no-border-bottom">Bank Name & Account Number</td>
                    <td rowspan="2"></td>
                </tr>
                <tr class="font-px11 text-strong">
                    <td colspan="2" class="no-border-top">ADA No.:</td>
                    <td class="no-border-top"></td>
                    <td colspan="5" class="no-border-top"></td>
                </tr>
                <tr class="font-px11 text-strong" style="height: 40px">
                    <td colspan="2">Signature</td>
                    <td colspan="3"></td>
                    <td style="vertical-align: top; text-align: left">Date:</td>
                    <td style="vertical-align: top; text-align: left" colspan="5">Printed Name:</td>
                    <td  style="vertical-align: top; text-align: left" rowspan="2">Date:</td>
                </tr>
                <tr class="font-px11 text-strong">
                    <td colspan="11">Official Receipt No. & Date/Other Documents</td>
                </tr>
            </table>
            <p class="no-margin text-strong" style="text-align: right; font-size: 10px">
                FMD-AFD-ACC-001, Rev. 01<br>
                Effectivity Date: August 18, 2022
            </p>
        </div>
    </div>
    <hr class="page-break no-print">
    <div>
        <p class="no-margin text-center text-strong">DISBURSEMENT VOUCHER</p>
        <p class="no-margin text-center text-strong">(DV)</p>
        <p class="text-center"><i>INSTRUCTIONS</i></p>

        <div style="border: 1px solid black; padding: 20px 12px 10px 5px">
            <ol type="A" class="text-strong font-px12">
                <li>
                    This DV is a form used to pay and obligation to employee/individuals/agencies/creditor for goods purchased or services rendered.  It shall be prepared by the Requesting Office/Unit.  The Accounting Division/Unit shall stamp on the face of this form the date of receipt from the requesting Unit.
                </li>
                <li>
                    This form shall be accomplished as follows
                </li>
                <ol>
                    <li>
                        Entity Name – name of the agency/entity
                    </li>
                    <li>
                        Fund Cluster – the fund cluster name/code in accordance with UACS in which the disbursement should be changed
                    </li>
                    <li>
                        Date – date of preparation of the DV
                    </li>
                    <li>
                        DV No. – number assigned to the DV by the Accounting Division/Unit.  It shall be numbered as follows:
                        <br>
                        <u style="font-size:10px;">0000</u> &nbsp;&nbsp;&nbsp; <u style="font-size:10px;">00</u> &nbsp;&nbsp;&nbsp; <u style="font-size:10px;">0000</u>
                        <div class="row">
                            <div style="border-left: 2px solid; width: 95px; border-bottom: 2px solid; height: 60px; margin-left:26px;">
                                <div class="arrow" style="margin-top: 55px; margin-left: 85px;"></div>
                            </div>
                            <div style="border-left: 2px solid; width: 60px; border-bottom: 2px solid; height: 47px; margin-left:61px; margin-top:-60px;">
                                <div class="arrow" style="margin-top: 41px; margin-left: 50px;"></div>
                            </div>
                            <div style="border-left: 2px solid; width: 22px; border-bottom: 2px solid; height: 25px; margin-left:98px; margin-top:-47px;">
                                <div class="arrow" style="margin-top: 20px; margin-left: 12px;"></div>
                            </div>
                            <div class="row">
                                <p style="margin-left:145px; margin-top:-11px; font-size:10px;">
                                    Serial number<br>
                                    (one series each year)<br>
                                    <span>Month</span><br>
                                    <span>Year</span>
                                </p><br>
                            </div>
                        </div>

                    </li>
                    <li>
                        Mode of Payment – put a check “  “ mark in the appropriate box of the mode of payment (MDS Check, Commercial Check, ADA, Others)
                    </li>
                    <li>
                        Payee – name of the payee/creditor
                    </li>
                    <li>
                        TIN/Employee No. – Tax Identification Number (TIN) of the claimant/Identification Number assigned by the agency to the officer/Employee
                    </li>
                    <li>
                        ORS/BURS No. – the serial number of the ORS or BURS supporting the DV
                    </li>
                    <li>
                        Address – address of the claimant
                    </li>
                    <li>
                        Particulars – brief description of the disbursement
                    </li>
                    <li>
                        Responsibility Center (Office/Unit/Project and Code) – the office/unit project and code assigned to the cost center where the  disbursement shall be charged
                    </li>
                    <li>
                        MFO/PAF – MFO or PAP as shown in the GAARD/SARO/GARO
                    </li>
                    <li>
                        Amount – Amount of claim
                    </li>
                    <li>
                        Certified (Box A) – certification by the responsible officer having direct supervision and knowledge of the facts of the transaction.
                    </li>
                    <li>
                        Accounting Entry (Box B) – the respective accounting entry for the disbursement.
                    </li>
                    <li>
                        Certified (Box C) – certification by the Head of Accounting Unit or his/her authorized representative on the availability of cash, subject to ADA, on the completeness of the supporting documents and the propriety of the amount claimed.
                        The certifying officer shall affix his/her signature and indicate his/her name and position/.designation, and the date of signing on the spaces provided.
                    </li>
                    <li>
                        Approved for Payment (Box D) – approval by the Head of the Agency or his/her Authorized Representative on the payment covered by the DV.
                        The approving officer shall affix his/her signature and indicate his/her name and position/designation, and the date of signing on the spaces provided.
                    </li>
                    <li>
                        Receipt of Payment (Box E) – acknowledgement by the claimant or his/her duly authorized representative for the receipt of the check/ADA/cash and the date of receipt.  The claimant/payee shall affix his/her signature on the space provided and shall indicate the number and the date of the check, bank name and account number, and OR number and date other relevant documents issued to acknowledge the receipt of payment
                    </li>
                    <li>
                        JEB No. and Date – number and date of the JEV covering the DV
                    </li>
                </ol>
                <li>
                    The DVs shall be prepared in four (4) copies to be distributed as follows;
                    <ul style="list-style-type: none">
                        <li>
                            Original – COA, through Accounting Division/Unit together with the supporting documents for submission to the Auditor for post audit
                            Documents for submission to the Auditor for post Audit
                        </li>
                        <li>
                            Copy 2   -  Cash Treasury/Unit
                        </li>
                        <li>
                            Copy 3   -  Accounting Division/Unit
                        </li>
                        <li>
                            Copy 4   -  Payee
                        </li>

                    </ul>
                </li>
            </ol>
        </div>
    </div>
</div>


</body>
</html>

