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
    <form action="/grab" method="GET">
        <div class="row">
            {!! \App\Swep\ViewHelpers\__form2::textbox('date',[
                'label' => 'Date:',
                'type' => 'date',
                'cols' => 3,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('time',[
                'label' => 'Time:',
                'type' => 'time',
                'cols' => 3,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('pickup',[
                'label' => 'Pickup:',
                //'type' => 'time',
                'cols' => 3,
            ]) !!}
        </div>
        <div class="row">
            {!! \App\Swep\ViewHelpers\__form2::textbox('qty[]',[
                'label' => 'Qty:',
                'cols' => 2,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('item[]',[
                'label' => 'Item:',
                'cols' => 5,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('details[]',[
                'cols' => 3,
                'label' => 'Details:',
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('amount[]',[
                'label' => 'Amount:',
                'cols' => 2,
            ]) !!}
        </div>
        <div class="row">
            {!! \App\Swep\ViewHelpers\__form2::textbox('qty[]',[
                'label' => 'Qty:',
                'cols' => 2,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('item[]',[
                'label' => 'Item:',
                'cols' => 5,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('details[]',[
                'cols' => 3,
                'label' => 'Details:',
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('amount[]',[
                'label' => 'Amount:',
                'cols' => 2,
            ]) !!}
        </div>
        <div class="row">
            {!! \App\Swep\ViewHelpers\__form2::textbox('qty[]',[
                'label' => 'Qty:',
                'cols' => 2,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('item[]',[
                'label' => 'Item:',
                'cols' => 5,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('details[]',[
                'cols' => 3,
                'label' => 'Details:',
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('amount[]',[
                'label' => 'Amount:',
                'cols' => 2,
            ]) !!}
        </div>
        <div class="row">
            {!! \App\Swep\ViewHelpers\__form2::textbox('qty[]',[
                'label' => 'Qty:',
                'cols' => 2,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('item[]',[
                'label' => 'Item:',
                'cols' => 5,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('details[]',[
                'cols' => 3,
                'label' => 'Details:',
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('amount[]',[
                'label' => 'Amount:',
                'cols' => 2,
            ]) !!}
        </div>
        <div class="row">
            {!! \App\Swep\ViewHelpers\__form2::textbox('qty[]',[
                'label' => 'Qty:',
                'cols' => 2,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('item[]',[
                'label' => 'Item:',
                'cols' => 5,
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('details[]',[
                'cols' => 3,
                'label' => 'Details:',
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('amount[]',[
                'label' => 'Amount:',
                'cols' => 2,
            ]) !!}
        </div>
        <div class="row">
            {!! \App\Swep\ViewHelpers\__form2::textbox('del_fee',[
                'label' => 'Del',
                'cols' => 2,
            ]) !!}
        </div>
        <button class="btn btn-primary" type="submit"> Submit</button>
    </form>
</div>
</body>
</html>