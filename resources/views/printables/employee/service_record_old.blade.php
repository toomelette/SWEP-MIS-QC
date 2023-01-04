<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Employee Service Record</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="{{ asset('template/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('template/bower_components/font-awesome/css/font-awesome.min.css') }}">

  <link rel="stylesheet" href="{{ asset('template/dist/css/AdminLTE.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/print.css') }}">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arial">

  <style type="text/css">

    .box-d-grey{
      -webkit-print-color-adjust: exact;
      background-color: #a7aaab !important;
    }

    .box-l-grey{
      -webkit-print-color-adjust: exact;
      background-color: #e8e8e8 !important;
    }

    .title-l{
      -webkit-print-color-adjust: exact;
      color: #ffffff !important;
      font-style:italic;
      font-size: 13px;
      font-weight: bold;
    }

    @media print {
        .footer {
          page-break-after: always;
        }
    }

  </style>

</head>
<body onload="window.print();" onafterprint="window.close()">
{{--<body>--}}
  <div class="wrapper" style="overflow:hidden !important;">

    {{-- HEADER --}}
    <div class="row">
      <div class="col-sm-6" style="margin-bottom: -20px;">
        <span style="font-size: 11px; font-weight: bold;">{{ $employee->gsis }}</span><br>
        <div style="border-top:solid 1px; width:7em;"></div>
        <p style="font-size: 11px; font-weight: bold;">BP NUMBER</p>
      </div>
      <div class="col-sm-6" style="margin-bottom: -20px;">
        <span style="font-size: 11px; float:right;">Page 1 of 2</span>
      </div>
    </div>


    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10" style="text-align: center;">
        <span style="font-weight:bold; font-size:28px;">SERVICE RECORD</span><br>
        <p style="font-size:15px; margin-top: -5px;">(To Be Accomplished By Employer)</p>
      </div>
      <div class="col-md-1"></div>
    </div>


    <div class="row">
      <div class="col-sm-2">
        <span style="font-size:13px;">NAME</span>
      </div>
      <div class="col-sm-3 no-padding" style="border-bottom:solid 1px; margin-right: 10px;">
        <span style="font-weight: bold; font-size:15px;">{{ $employee->lastname }}</span>
      </div>
      <div class="col-sm-3 no-padding" style="border-bottom:solid 1px; margin-right: 10px;">
        <span style="font-weight: bold; font-size:15px;">{{ $employee->firstname }}</span>
      </div>
      <div class="col-sm-3 no-padding" style="border-bottom:solid 1px; margin-right: 10px;">
        <span style="font-weight: bold; font-size:15px;">{{ $employee->middlename }}</span>
      </div>
    </div>


    <div class="row">
      <div class="col-sm-2">
        &nbsp;
      </div>
      <div class="col-sm-3 no-padding" style="margin-right: 10px; text-align: center;">
        <span style="font-size:10px;">Surname</span>
      </div>
      <div class="col-sm-3 no-padding" style="margin-right: 10px; text-align: center;">
        <span style="font-size:10px;">Given Name</span>
      </div>
      <div class="col-sm-3 no-padding" style="margin-right: 10px; text-align: center;">
        <span style="font-size:10px;">Middle name</span>
      </div>
    </div>


    <div class="row">
      <div class="col-sm-2">
        <span style="font-size:13px;">BIRTH</span>
      </div>
      <div class="col-sm-3 no-padding" style="border-bottom:solid 1px;">
        <span style="font-weight: bold; font-size:15px;">{{ __dataType::date_parse($employee->date_of_birth, 'F d, Y') }}</span>
      </div>
      <div class="col-sm-3 no-padding" style="text-align:center;">
        <span style="font-size:13px;">PLACE OF BIRTH</span>
      </div>
      <div class="col-sm-4 no-padding" style="border-bottom:solid 1px;">
        <span style="font-weight: bold; font-size:15px;">{{ $employee->place_of_birth }}</span>
      </div>
    </div>


    <div class="row" style="margin-top: 10px;">
      <div class="col-sm-12">
        <p style="font-size:9px;">This is to certify that the employee hereinabove actually rendered services in this Office as shown by the service record below, each line of which is supported by appointment and other papers actually issued by this office.</p>
      </div>
    </div>


    <div class="row" style="margin:0px;">
      <div class="col-sm-12 no-padding" style="border:solid 1px;">

        <div class="col-sm-2 no-padding">
          <span style="font-size:12px; font-weight:bold; margin-left: 30px;">SERVICE</span>
          <div class="col-sm-12 no-padding" style="border-top:solid 1px;">
            <div class="col-sm-6" style="border-right:solid 1px;">
              <span style="font-size:12px; margin-left:3px;">From</span>
            </div>
            <div class="col-sm-6">
              <span style="font-size:12px; margin-left:7px;">To</span>
            </div>
          </div>
        </div>

        <div class="col-sm-5 no-padding" style="border-left:solid 1px; height: 2.93em;">
          <span style="font-size:12px; font-weight:bold; margin-left: 40px;">RECORD OF APPOINTMENT</span>
          <div class="col-sm-12 no-padding" style="border-top:solid 1px;">
            <div class="col-sm-6" style="border-right:solid 1px;">
              <span style="font-size:12px; margin-left:30px;">Designation</span>
            </div>
            <div class="col-sm-2" style="border-right:solid 1px;">
              <span style="font-size:12px; margin-left:-5px;">Status</span>
            </div>
            <div class="col-sm-4">
              <span style="font-size:12px; margin-left:15px;">Salary</span>
            </div>
          </div>
        </div>

        <div class="col-sm-1 no-padding" style="border-left:solid 1px; height: 2.93em; text-align: center;">
          <span style="font-size:12px; font-weight:bold;">OFFICE/ STATION</span>
        </div>

        <div class="col-sm-1 no-padding" style="border-left:solid 1px; height: 2.93em; text-align: center;">
          <span style="font-size:12px; font-weight:bold;">LEAVE W/O PAY</span>
        </div>

        <div class="col-sm-2 no-padding" style="border-left:solid 1px; height: 2.93em;">
          <span style="font-size:12px; font-weight:bold; margin-left: 20px;">SEPARATION</span>
          <div class="col-sm-12 no-padding" style="border-top:solid 1px;">
            <div class="col-sm-6" style="border-right:solid 1px;">
              <span style="font-size:12px; margin-left:1px;">Date</span>
            </div>
            <div class="col-sm-6">
              <span style="font-size:12px;">Cause</span>
            </div>
          </div>
        </div>

        <div class="col-sm-1 no-padding" style="border-left:solid 1px; height: 2.93em; text-align: center;">
          <span style="font-size:11px; font-weight:bold;">REMARKS</span>
        </div>

      </div>
    </div>


    @foreach ($employee_service_records as $key => $data)
      @if($key < 25)
        <div class="row">
          <div class="col-sm-12 no-padding" style="line-height:13.5px;">

            <div class="col-sm-2 no-padding">
              <div class="col-sm-12 no-padding">
                <div class="col-sm-6">
                  <span style="font-size:10px;">
{{--                    {{ \Carbon\Carbon::parse($data->date_from)->format('m/d/Y') }}--}}
                    {{\Illuminate\Support\Carbon::parse($data->from_date)->format('m/d/Y')}}
                  </span>
                </div>
                <div class="col-sm-6">
                  <span style="font-size:10px;">
                      {{($data->upto_date == 1) ? 'PRESENT' : \Illuminate\Support\Carbon::parse($data->to_date)->format('m/d/Y')}}
{{--                    {{ \Carbon\Carbon::parse($data->date_to)->format('m/d/Y') }}--}}
                  </span>
                </div>
              </div>
            </div>

            <div class="col-sm-5 no-padding">
              <div class="col-sm-12 no-padding">
                <div class="col-sm-6" style="margin:0;">
                  <span style="font-size:10px;">{{ $data->position }}</span>
                </div>
                <div class="col-sm-2" style="text-align: center;">
                  <span style="font-size:10px;">{{ $data->appointment_status }}</span>
                </div>
                <div class="col-sm-4">
                  <span style="font-size:10px; margin-left: -10px;">{{ number_format($data->salary, 2) .' / '. $data->mode_of_payment}}</span>
                </div>
              </div>
            </div>

            <div class="col-sm-1 no-padding">
              <span style="font-size:10px; margin-left: 17px;">{{ $data->station }}</span>
            </div>

            <div class="col-sm-1 no-padding" style="text-align: center;">
              <span style="font-size:10px;">{{ $data->lwp }}</span>
            </div>

            <div class="col-sm-2 no-padding" style="">
              <div class="col-sm-12 no-padding">
                <div class="col-sm-6 no-padding">
                  <span style="font-size:10px;">{{ $data->spdate }}</span>
                </div>
                <div class="col-sm-6">
                  <span style="font-size:10px;">{{ $data->status }}</span>
                </div>
              </div>
            </div>

            <div class="col-sm-1" style="text-align: center;">
              <span style="font-size:7px; line-height: 0.5px;"></span>
            </div>

          </div>

          @if(isset($data->remarks) && $data->remarks != '')
            <div class="col-sm-8">
              &nbsp;
            </div>
            <div class="col-sm-4">
              <p style="font-size:10px; font-style: italic; -webkit-print-color-adjust: exact; color: green !important;">({{ $data->remarks }})</p>
            </div>
          @endif

        </div>
      @endif
    @endforeach


    <div style="border-bottom:solid 1px;"></div>


    @if(count($employee_service_records) <= 20)
      <div class="row" style="margin-top: 10px;">
        <div class="col-sm-12">
          <p style="font-size:9px;">Issued in Compliance with No. 54 dated August 10, 1954 and in accordance with Circular No. 58 dated August 10, 1954 of the System.</p>
        </div>
      </div>


      <div class="row" style="margin-top: 10px;">
        <div class="col-sm-6">
          <span style="font-size:13px;">PREPARED BY:</span>
        </div>
        <div class="col-sm-6">
          <span style="font-size:13px;">CERTIFIED CORRECT:</span>
        </div>
      </div>


      <div class="row" style="margin-top: 30px;">
        <div class="col-sm-2">
          &nbsp;
        </div>
        <div class="col-sm-3" style="border-bottom:1px solid; text-align: center;">
          <span style="font-size:10px;">{{ Request::get('pn') }}</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
        <div class="col-sm-2" >
        </div>
        <div class="col-sm-3" style="border-bottom:1px solid; text-align: center;">
          <span style="font-size:10px;">{{ Request::get('cn') }}</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
      </div>


      <div class="row">
        <div class="col-sm-6">
          &nbsp;
        </div>
        <div class="col-sm-2">
          &nbsp;
        </div>
        <div class="col-sm-3" style="text-align:center;">
          <span style="font-size:10px;">(Chief or Head of Office)</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
      </div>



      <div class="row" style="margin-top: 20px;">
        <div class="col-sm-2">
          &nbsp;
        </div>
        <div class="col-sm-3" style="border-bottom:1px solid; text-align: center;">
          <span style="font-size:10px;">{{ Request::get('pp') }}</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
        <div class="col-sm-2" >
        </div>
        <div class="col-sm-3" style="border-bottom:1px solid; text-align: center;">
          <span style="font-size:10px;">{{ Request::get('cp') }}</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
      </div>



      <div class="row">
        <div class="col-sm-2">
          &nbsp;
        </div>
        <div class="col-sm-3" style="text-align: center;">
          <span style="font-size:10px;">(Designation)</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
        <div class="col-sm-2">
          &nbsp;
        </div>
        <div class="col-sm-3" style="text-align: center;">
          <span style="font-size:10px; margin-left:25px;">(Designation)</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
      </div>


      <div class="row" style="margin-top: 20px;">
        <div class="col-sm-4">
          &nbsp;
        </div>
        <div class="col-sm-4" style="text-align: center;">
          <span style="font-size: 11px; font-weight: bold;">{{ Carbon::now()->format('F d, Y') }}</span><br>
          <div style="border-top:solid 1px; text-align: center;"></div>
          <span style="font-size: 11px;">(Date)</span>
        </div>
        <div class="col-sm-4">
          &nbsp;
        </div>
      </div>

    @endif

  </div>



  {{-- Break Page if Records is Greater than 20 --}}


  @if(count($employee_service_records) > 20)
    <div class="wrapper" style="overflow:hidden !important;">

      {{-- HEADER --}}
      <div class="row">
        <div class="col-sm-6" style="margin-bottom: -20px;">
          <span style="font-size: 11px; font-weight: bold;">{{ $employee->gsis }}</span><br>
          <div style="border-top:solid 1px; width:7em;"></div>
          <p style="font-size: 11px; font-weight: bold;">BP NUMBER</p>
        </div>
        <div class="col-sm-6" style="margin-bottom: -20px;">
        <span style="font-size: 11px; float:right;">Page 2 of 2</span>
      </div>
      </div>


      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="text-align: center;">
          <span style="font-weight:bold; font-size:28px;">SERVICE RECORD</span><br>
          <p style="font-size:15px; margin-top: -5px;">(To Be Accomplished By Employer)</p>
        </div>
        <div class="col-md-1"></div>
      </div>


      <div class="row">
        <div class="col-sm-2">
          <span style="font-size:13px;">NAME</span>
        </div>
        <div class="col-sm-3 no-padding" style="border-bottom:solid 1px; margin-right: 10px;">
          <span style="font-weight: bold; font-size:15px;">{{ $employee->lastname }}</span>
        </div>
        <div class="col-sm-3 no-padding" style="border-bottom:solid 1px; margin-right: 10px;">
          <span style="font-weight: bold; font-size:15px;">{{ $employee->firstname }}</span>
        </div>
        <div class="col-sm-3 no-padding" style="border-bottom:solid 1px; margin-right: 10px;">
          <span style="font-weight: bold; font-size:15px;">{{ $employee->middlename }}</span>
        </div>
      </div>


      <div class="row">
        <div class="col-sm-2">
          &nbsp;
        </div>
        <div class="col-sm-3 no-padding" style="margin-right: 10px; text-align: center;">
          <span style="font-size:10px;">Surname</span>
        </div>
        <div class="col-sm-3 no-padding" style="margin-right: 10px; text-align: center;">
          <span style="font-size:10px;">Given Name</span>
        </div>
        <div class="col-sm-3 no-padding" style="margin-right: 10px; text-align: center;">
          <span style="font-size:10px;">Middle name</span>
        </div>
      </div>


      <div class="row">
        <div class="col-sm-2">
          <span style="font-size:13px;">BIRTH</span>
        </div>
        <div class="col-sm-3 no-padding" style="border-bottom:solid 1px;">
          <span style="font-weight: bold; font-size:15px;">{{ __dataType::date_parse($employee->date_of_birth, 'F d, Y') }}</span>
        </div>
        <div class="col-sm-3 no-padding" style="text-align:center;">
          <span style="font-size:13px;">PLACE OF BIRTH</span>
        </div>
        <div class="col-sm-4 no-padding" style="border-bottom:solid 1px;">
          <span style="font-weight: bold; font-size:15px;">{{ $employee->place_of_birth }}</span>
        </div>
      </div>


      <div class="row" style="margin-top: 10px;">
        <div class="col-sm-12">
          <p style="font-size:9px;">This is to certify that the employee hereinabove actually rendered services in this Office as shown by the service record below, each line of which is supported by appointment and other papers actually issued by this office.</p>
        </div>
      </div>


      <div class="row" style="margin:0px;">
        <div class="col-sm-12 no-padding" style="border:solid 1px;">

          <div class="col-sm-2 no-padding">
            <span style="font-size:12px; font-weight:bold; margin-left: 30px;">SERVICE</span>
            <div class="col-sm-12 no-padding" style="border-top:solid 1px;">
              <div class="col-sm-6" style="border-right:solid 1px;">
                <span style="font-size:12px; margin-left:3px;">From</span>
              </div>
              <div class="col-sm-6">
                <span style="font-size:12px; margin-left:7px;">To</span>
              </div>
            </div>
          </div>

          <div class="col-sm-5 no-padding" style="border-left:solid 1px; height: 2.93em;">
            <span style="font-size:12px; font-weight:bold; margin-left: 40px;">RECORD OF APPOINTMENT</span>
            <div class="col-sm-12 no-padding" style="border-top:solid 1px;">
              <div class="col-sm-6" style="border-right:solid 1px;">
                <span style="font-size:12px; margin-left:30px;">Designation</span>
              </div>
              <div class="col-sm-2" style="border-right:solid 1px;">
                <span style="font-size:12px; margin-left:-5px;">Status</span>
              </div>
              <div class="col-sm-4">
                <span style="font-size:12px; margin-left:15px;">Salary</span>
              </div>
            </div>
          </div>

          <div class="col-sm-1 no-padding" style="border-left:solid 1px; height: 2.93em; text-align: center;">
            <span style="font-size:12px; font-weight:bold;">OFFICE/ STATION</span>
          </div>

          <div class="col-sm-1 no-padding" style="border-left:solid 1px; height: 2.93em; text-align: center;">
            <span style="font-size:12px; font-weight:bold;">LEAVE W/O PAY</span>
          </div>

          <div class="col-sm-2 no-padding" style="border-left:solid 1px; height: 2.93em;">
            <span style="font-size:12px; font-weight:bold; margin-left: 20px;">SEPARATION</span>
            <div class="col-sm-12 no-padding" style="border-top:solid 1px;">
              <div class="col-sm-6" style="border-right:solid 1px;">
                <span style="font-size:12px; margin-left:1px;">Date</span>
              </div>
              <div class="col-sm-6">
                <span style="font-size:12px;">Cause</span>
              </div>
            </div>
          </div>

          <div class="col-sm-1 no-padding" style="border-left:solid 1px; height: 2.93em; text-align: center;">
            <span style="font-size:11px; font-weight:bold;">REMARKS</span>
          </div>

        </div>
      </div>


      @foreach ($employee_service_records as $key => $data)
        @if($key >= 25)
          <div class="row">
            <div class="col-sm-12 no-padding" style="line-height:13.5px;">

              <div class="col-sm-2 no-padding">
                <div class="col-sm-12 no-padding">
                    <div class="col-sm-6">
                      <span style="font-size:10px;">
    {{--                    {{ \Carbon\Carbon::parse($data->date_from)->format('m/d/Y') }}--}}
                          {{\Illuminate\Support\Carbon::parse($data->from_date)->format('m/d/Y')}}
                      </span>
                    </div>
                    <div class="col-sm-6">
                      <span style="font-size:10px;">
                          {{($data->upto_date == 1) ? 'PRESENT' : \Illuminate\Support\Carbon::parse($data->to_date)->format('m/d/Y')}}
                          {{--                    {{ \Carbon\Carbon::parse($data->date_to)->format('m/d/Y') }}--}}
                      </span>
                    </div>
                </div>
              </div>

              <div class="col-sm-5 no-padding">
                <div class="col-sm-12 no-padding">
                  <div class="col-sm-6" style="margin:0;">
                    <span style="font-size:10px;">{{ $data->position }}</span>
                  </div>
                  <div class="col-sm-2" style="text-align: center;">
                    <span style="font-size:10px;">{{ $data->appointment_status }}</span>
                  </div>
                  <div class="col-sm-4">
                    <span style="font-size:10px; margin-left: -10px;">{{ number_format($data->salary, 2) .' / '. $data->mode_of_payment}}</span>
                  </div>
                </div>
              </div>

              <div class="col-sm-1 no-padding">
                <span style="font-size:10px; margin-left: 17px;">{{ $data->station }}</span>
              </div>

              <div class="col-sm-1 no-padding" style="text-align: center;">
                <span style="font-size:10px;">{{ $data->lwp }}</span>
              </div>

              <div class="col-sm-2 no-padding" style="">
                <div class="col-sm-12 no-padding">
                  <div class="col-sm-6 no-padding">
                    <span style="font-size:10px;">{{ $data->spdate }}</span>
                  </div>
                  <div class="col-sm-6">
                    <span style="font-size:10px; margin-left:3px;">{{$data->status}}</span>
                  </div>
                </div>
              </div>

              <div class="col-sm-1" style="text-align: center;">
                <span style="font-size:7px; line-height: 0.5px;"></span>
              </div>

            </div>

            @if(isset($data->remarks) && $data->remarks != '')
              <div class="col-sm-8">
                &nbsp;
              </div>
              <div class="col-sm-4">
                <p style="font-size:10px; font-style: italic; -webkit-print-color-adjust: exact; color: green !important;">({{ $data->remarks }})</p>
              </div>
            @endif

          </div>
        @endif
      @endforeach

      <div style="border-bottom:solid 1px;"></div>

        <div class="row" style="margin-top: 10px;">
        <div class="col-sm-12">
          <p style="font-size:9px;">Issued in Compliance with No. 54 dated August 10, 1954 and in accordance with Circular No. 58 dated August 10, 1954 of the System.</p>
        </div>
      </div>


      <div class="row" style="margin-top: 10px;">
        <div class="col-sm-6">
          <span style="font-size:13px;">PREPARED BY:</span>
        </div>
        <div class="col-sm-6">
          <span style="font-size:13px;">CERTIFIED CORRECT:</span>
        </div>
      </div>


      <div class="row" style="margin-top: 30px;">
        <div class="col-sm-2">
          &nbsp;
        </div>
        <div class="col-sm-3" style="border-bottom:1px solid; text-align: center;">
          <span style="font-size:10px;">{{ Request::get('pn') }}</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
        <div class="col-sm-2" >
        </div>
        <div class="col-sm-3" style="border-bottom:1px solid; text-align: center;">
          <span style="font-size:10px;">{{ Request::get('cn') }}</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
      </div>


      <div class="row">
        <div class="col-sm-6">
          &nbsp;
        </div>
        <div class="col-sm-2">
          &nbsp;
        </div>
        <div class="col-sm-3" style="text-align:center;">
          <span style="font-size:10px;">(Chief or Head of Office)</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
      </div>



      <div class="row" style="margin-top: 20px;">
        <div class="col-sm-2">
          &nbsp;
        </div>
        <div class="col-sm-3" style="border-bottom:1px solid; text-align: center;">
          <span style="font-size:10px;">{{ Request::get('pp') }}</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
        <div class="col-sm-2" >
        </div>
        <div class="col-sm-3" style="border-bottom:1px solid; text-align: center;">
          <span style="font-size:10px;">{{ Request::get('cp') }}</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
      </div>



      <div class="row">
        <div class="col-sm-2">
          &nbsp;
        </div>
        <div class="col-sm-3" style="text-align: center;">
          <span style="font-size:10px;">(Designation)</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
        <div class="col-sm-2">
          &nbsp;
        </div>
        <div class="col-sm-3" style="text-align: center;">
          <span style="font-size:10px; margin-left:25px;">(Designation)</span>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
      </div>


      <div class="row" style="margin-top: 20px;">
        <div class="col-sm-4">
          &nbsp;
        </div>
        <div class="col-sm-4" style="text-align: center;">
          <span style="font-size: 11px; font-weight: bold;">{{ Carbon::now()->format('F d, Y') }}</span><br>
          <div style="border-top:solid 1px; text-align: center;"></div>
          <span style="font-size: 11px;">(Date)</span>
        </div>
        <div class="col-sm-4">
          &nbsp;
        </div>
      </div>

    </div>
  @endif




</body>
</html>

