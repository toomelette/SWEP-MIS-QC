@extends('layouts.admin-master')

@section('content')

    <section class="content-header">
        <h1>IP Address Inventory</h1>
    </section>
@endsection
@section('content2')

    <section class="content">
        <div class="box box-solid">
            <div class="box-header">
                <div class="btn-group pull-right">
                    <a href="{{route('dashboard.ip_address.show','map')}}" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-table"></i> IP Table</a>
                    <button class="btn btn-primary btn-sm" type="button" data-target="#add_ip_modal" data-toggle="modal"><i class="fa fa-plus"></i> Add</button>

                </div>
            </div>
            <div class="box-body">
                <div id="ip_table_container" style="display: none">
                    <table class="table table-bordered table-striped table-hover" id="ip_table" style="width: 100%">
                        <thead>
                        <tr class="">
                            <th >IP Address</th>
                            <th class="th-20">Location</th>
                            <th class="th-20">User</th>
                            <th >Employee No.</th>
                            <th >Property No.</th>
                            <th >Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div id="tbl_loader">
                    <center>
                        <img style="width: 100px" src="{{asset('images/loader.gif')}}">
                    </center>
                </div>
            </div>
        </div>

    </section>
@endsection


@section('modals')
<div class="modal fade" id="add_ip_modal" tabindex="-1" role="dialog" aria-labelledby="add_ip_modal_label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="add_ip_form">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add IP Address</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  {!! \App\Swep\ViewHelpers\__form2::textbox('user',[
                      'label' => 'User:',
                      'cols' => 8,
                  ]) !!}
                  {!! \App\Swep\ViewHelpers\__form2::textbox('employee_no',[
                      'label' => 'Employee No:',
                      'cols' => 4,
                  ]) !!}
              </div>
              <div class="row">
                  {!! \App\Swep\ViewHelpers\__form2::textbox('property_no',[
                      'label' => 'Property No:',
                      'cols' => '6 col-xs-6',
                  ]) !!}
                  {!! \App\Swep\ViewHelpers\__form2::select('location',[
                    'label' => 'Location:',
                    'cols' => '6 col-xs-6',
                    'options' => \App\Swep\Helpers\Helper::populateOptionsFromObjectAsArray(\App\Models\SuOptions::ipAddressLocations(),'option','value'),
                ]) !!}
              </div>
              IP ADDRESS:
              <div class="row">
                  {!! \App\Swep\ViewHelpers\__form2::textbox('octet_1',[
                        'label' => '1st Octet:',
                        'cols' => '3 col-sm-3 col-xs-3',
                        'type' => 'number',
                    ],10) !!}
                  {!! \App\Swep\ViewHelpers\__form2::textbox('octet_2',[
                        'label' => '2nd Octet:',
                        'cols' => '3 col-sm-3 col-xs-3',
                        'type' => 'number',
                    ],36) !!}
                  {!! \App\Swep\ViewHelpers\__form2::textbox('octet_3',[
                        'label' => '3rd Octet:',
                        'cols' => '3 col-sm-3 col-xs-3',
                        'type' => 'number',
                    ]) !!}
                  {!! \App\Swep\ViewHelpers\__form2::textbox('octet_4',[
                        'label' => '4th Octet:',
                        'cols' => '3 col-sm-3 col-xs-3',
                        'type' => 'number',
                    ]) !!}
              </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Save</button>
          </div>
      </form>
    </div>
  </div>
</div>

    {!! \App\Swep\ViewHelpers\__html::blank_modal('edit_ip_modal','') !!}
@endsection

@section('scripts')
    <script type="text/javascript">
        //-----DATATABLES-----//
        modal_loader = $("#modal_loader").parent('div').html();
        //Initialize DataTable
        active = '';
        ip_address_tbl = $("#ip_table").DataTable({
            'dom' : 'lBfrtip',
            "processing": true,
            "serverSide": true,
            "ajax" : '{{route('dashboard.ip_address.index')}}',
            "columns": [
                { "data": "ip_address" },
                { "data": "location" },
                { "data": "user" },
                { "data": "employee_no" },
                { "data": "property_no" },

                { "data": "action"},

            ],
            "buttons": [
                {!! __js::dt_buttons() !!}
            ],
            "columnDefs":[
                {
                    "targets" : 5,
                    "class" : 'action4'
                },


            ],
            "order" : [[1, 'desc'],[2,'desc']],
            "responsive": true,
            "initComplete": function( settings, json ) {
                // console.log(settings);
                setTimeout(function () {
                    $("#filter_form select[name='is_active']").val('ACTIVE');
                    $("#filter_form select[name='is_active']").trigger('change');
                },100);

                setTimeout(function () {
                    // $('a[href="#advanced_filters"]').trigger('click');
                    // $('.advanced_filters_toggler').trigger('click');
                },1000);

                $('#tbl_loader').fadeOut(function(){
                    $("#ip_table_container").fadeIn(function () {
                        @if(request()->has('initiator') && request('initiator') == 'create')
                        introJs().start();
                        @endif
                    });
                    if(find != ''){
                        ip_address_tbl.search(find).draw();
                        setTimeout(function(){
                            active = '';
                        },3000);
                        // window.history.pushState({}, document.title, "/dashboard/employee");
                    }

                });
                @if(\Illuminate\Support\Facades\Request::get('toPage') != null && \Illuminate\Support\Facades\Request::get('mark') != null)
                setTimeout(function () {
                    ip_address_tbl.page({{\Illuminate\Support\Facades\Request::get('toPage')}}).draw('page');
                    active = '{{\Illuminate\Support\Facades\Request::get("mark")}}';
                    notify('Employee successfully updated.');
                    // window.history.pushState({}, document.title, "/dashboard/employee");
                },700);
                @endif
            },
            "language":
                {
                    "processing": "<center><img style='width: 70px' src='{{asset("images/loader.gif")}}'></center>",
                },
            "drawCallback": function(settings){
                // console.log(ip_address_tbl.page.info().page);
                $("#ip_table a[for='linkToEdit']").each(function () {
                    let orig_uri = $(this).attr('href');
                    $(this).attr('href',orig_uri+'?page='+ip_address_tbl.page.info().page);
                });

                $('[data-toggle="tooltip"]').tooltip();
                $('[data-toggle="modal"]').tooltip();
                if(active != ''){
                    $("#ip_table #"+active).addClass('success');
                }
            }
        })

        style_datatable("#ip_table");

        //Need to press enter to search
        $('#ip_table_filter input').unbind();
        $('#ip_table_filter input').bind('keyup', function (e) {
            if (e.keyCode == 13) {
                ip_address_tbl.search(this.value).draw();
            }
        });

        $("#add_ip_form").submit(function (e) {
            e.preventDefault()
            let form = $(this);
            loading_btn(form);
            $.ajax({
                url : '{{route("dashboard.ip_address.store")}}',
                data : form.serialize(),
                type: 'POST',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    active = res.slug;
                    ip_address_tbl.draw(false);
                    succeed(form,true,true);
                },
                error: function (res) {
                    errored(form,res);
                }
            })
        })

        $("body").on("click",".edit_ip_btn",function () {
            let btn = $(this);
            load_modal2(btn);
            let uri = '{{route("dashboard.ip_address.edit","slug")}}';
            uri = uri.replace('slug',btn.attr('data'));
            $.ajax({
                url : uri,
                type: 'GET',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    populate_modal2(btn,res);
                },
                error: function (res) {
                    populate_modal2_error(res);
                }
            })
        })
        </script>
@endsection