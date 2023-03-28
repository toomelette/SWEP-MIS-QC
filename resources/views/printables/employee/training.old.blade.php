<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Seminars and Trainings</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="{{ asset('template/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('template/bower_components/font-awesome/css/font-awesome.min.css') }}">

  <link rel="stylesheet" href="{{ asset('template/dist/css/AdminLTE.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/print.css') }}">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arial">

  <style type="text/css">

    .td-body-font{
      font-size: 12px;
    }

    .td-head-font{
      font-size: 12px;
    }

    @media print {
        .footer {
          page-break-after: always;
        }
    }

  </style>

</head>
<body onload="window.print();" onafterprint="window.close()">

  <div class="wrapper" style="overflow:visible;">

    {{-- HEADER --}}

    <div class="row">
      <div class="col-sm-6" style="margin-bottom: -20px;">
        <span style="font-size: 11px; font-weight: bold;">EMPLOYEE NO: {{ $employee->employee_no }}</span><br>
        <div style="width:7em;"></div>
        <p style="font-size: 11px; font-weight: bold;">&nbsp;</p>
      </div>
      <div class="col-sm-6" style="margin-bottom: -20px;">
        <span style="font-size: 11px; float:right;">Page 1</span>
      </div>
    </div>

    <div class="row" style="padding:10px; margin-bottom: 20px;">
      <div class="col-md-1"></div>
      <div class="col-md-12">
          <div class="col-sm-2"></div>
          <div class="col-sm-2" style="text-align: center;">
            <img src="{{ asset('images/sra.png') }}" style="width:110px;">
          </div>
          <div class="col-sm-5" style="text-align: center; padding-right:125px;">
            <span style="font-size:13px;">Republic of the Philippines</span><br>
            <span style="font-size:13px; font-weight:bold;">SUGAR REGULATORY ADMINISTRATION</span><br>
            <span style="font-size:13px;">North Avenue, Diliman, Quezon City</span><br>
            <span style="font-size:13px; font-weight:bold;">LIST OF SEMINARS AND TRAININGS ATTENDED</span><br>
            <span>As of {{ __dataType::date_parse(Request::get('dt'), 'F d, Y') }}</span>
          </div>
          <div class="col-sm-3"></div>
      </div>
      <div class="col-md-1"></div>
    </div>


    <div class="row">
      <div class="col-sm-1">
        <span style="font-size:12px;">NAME:</span>
      </div>
      <div class="col-sm-3 no-padding" style="border-bottom:solid 1px; margin-right: 10px;">
        <span style="font-weight: bold; font-size:13px;">{{ $employee->lastname }}</span>
      </div>
      <div class="col-sm-4 no-padding" style="border-bottom:solid 1px; margin-right: 10px;">
        <span style="font-weight: bold; font-size:13px;">{{ $employee->firstname }}</span>
      </div>
      <div class="col-sm-3 no-padding" style="border-bottom:solid 1px; margin-right: 10px;">
        <span style="font-weight: bold; font-size:13px;">{{ $employee->middlename }}</span>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-1">
        &nbsp;
      </div>
      <div class="col-sm-3 no-padding" style="margin-right: 10px; text-align: center;">
        <span style="font-size:10px;">Surname</span>
      </div>
      <div class="col-sm-4 no-padding" style="margin-right: 10px; text-align: center;">
        <span style="font-size:10px;">Given Name</span>
      </div>
      <div class="col-sm-3 no-padding" style="margin-right: 10px; text-align: center;">
        <span style="font-size:10px;">Middle name</span>
      </div>
    </div>

    <br>

    <div class="row" style="margin:0px;">
      <table class="table bordered">
          <tr>
            <th class="td-head-font">No.</th>  
            <th class="td-head-font" style="width:330px;">TITLE</th>
            <th class="td-head-font" style="width:150px;">DATE</th>
            <th class="td-head-font" style="width:50px; text-align:center;">HRS</th>
            <th class="td-head-font" style="width:230px;">CONDUCTED BY</th>
            <th class="td-head-font" style="width:230px;">VENUE</th>
            <th class="td-head-font" style="width:300px;">REMARKS</th>
          </tr>
          @foreach ($employee_trainings as $key => $data)
            <tr>
              <td class="td-body-font">{{ $key + 1 }}</td>
              <td class="td-body-font">{{ $data->title }}</td>
              <td class="td-body-font">{{ __dataType::date_scope($data->date_from, $data->date_to) }}</td>
              <td class="td-body-font" style="text-align:center;">{{ $data->hours }}</td>
              <td class="td-body-font">{{ $data->conducted_by }}</td>
              <td class="td-body-font">{{ $data->venue }}</td>
              <td class="td-body-font">{{ $data->remarks }}</td>
            </tr>
          @endforeach
      </table>
    </div>
  </div>


</body>
</html>

