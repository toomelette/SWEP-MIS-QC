<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SRA Web Portal - AFD</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.css-plugins')

    @yield('extras')

</head>

<body>
<div style="margin: 20px">
    <form action="/grabc" method="GET">
        <div class="row">
            {!! \App\Swep\ViewHelpers\__form2::textbox('pickup_date',[
                'label' => 'Pickup:',
                'type' => 'datetime-local',
                'cols' => 3,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('arrival',[
                'label' => 'Arrival:',
                'type' => 'datetime-local',
                'cols' => 3,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('pickup',[
                'label' => 'Pickup location:',
                //'type' => 'time',
                'cols' => 3,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('dropoff',[
               'label' => 'Drop-off location:',
               //'type' => 'time',
               'cols' => 3,
           ]) !!}
        </div>
        <div class="row">
            {!! \App\Swep\ViewHelpers\__form2::textbox('driver',[
                'label' => 'Driver:',
                'cols' => 2,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('distance',[
                'label' => 'Distance Amt',
                'cols' => 2,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('time',[
                'label' => 'Time Amt',
                'cols' => 2,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('charges',[
                'label' => 'Charges',
                'cols' => 2,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('trip_distance',[
                'label' => 'Distance KM',
                'cols' => 2,
            ]) !!}
        </div>
        <button class="btn btn-primary" type="submit"> Submit</button>
    </form>
</div>
</body>
</html>