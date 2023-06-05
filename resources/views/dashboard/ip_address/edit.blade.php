@php
$rand = \Illuminate\Support\Str::random(10)
@endphp
@extends('layouts.modal-content',['form_id' => 'edit_ip_form_'.$rand, 'slug' => $ip->slug])

@section('modal-header')
    Edit
@endsection

@section('modal-body')
    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::textbox('user',[
            'label' => 'User:',
            'cols' => 8,
        ],$ip) !!}
        {!! \App\Swep\ViewHelpers\__form2::textbox('employee_no',[
            'label' => 'Employee No:',
            'cols' => 4,
        ],$ip) !!}
    </div>
    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::textbox('property_no',[
            'label' => 'Property No:',
            'cols' => '6 col-xs-6',
        ],$ip) !!}
        {!! \App\Swep\ViewHelpers\__form2::select('location',[
          'label' => 'Location:',
          'cols' => '6 col-xs-6',
          'options' => \App\Swep\Helpers\Helper::populateOptionsFromObjectAsArray(\App\Models\SuOptions::ipAddressLocations(),'option','value'),
      ],$ip) !!}
    </div>
    IP ADDRESS:
    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::textbox('octet_1',[
              'label' => '1st Octet:',
              'cols' => '3 col-sm-3 col-xs-3',
              'type' => 'number',
          ],$ip) !!}
        {!! \App\Swep\ViewHelpers\__form2::textbox('octet_2',[
              'label' => '2nd Octet:',
              'cols' => '3 col-sm-3 col-xs-3',
              'type' => 'number',
          ],$ip) !!}
        {!! \App\Swep\ViewHelpers\__form2::textbox('octet_3',[
              'label' => '3rd Octet:',
              'cols' => '3 col-sm-3 col-xs-3',
              'type' => 'number',
          ],$ip) !!}
        {!! \App\Swep\ViewHelpers\__form2::textbox('octet_4',[
              'label' => '4th Octet:',
              'cols' => '3 col-sm-3 col-xs-3',
              'type' => 'number',
          ],$ip) !!}
    </div>

@endsection

@section('modal-footer')
    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Save</button>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#edit_ip_form_{{$rand}}").submit(function (e) {
            e.preventDefault();
            let form = $(this);
            let uri = '{{route("dashboard.ip_address.update","slug")}}';
            uri = uri.replace('slug',form.attr('data'));
            loading_btn(form);
            $.ajax({
                url : uri,
                data : form.serialize(),
                type: 'PATCH',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    succeed(form,true,true);
                    active = res.slug;
                    ip_address_tbl.draw(false);
                    toast('info','Data successfully updated.','Updated');
                },
                error: function (res) {
                    errored(form,res);
                }
            })
        
        })
    </script>
@endsection

