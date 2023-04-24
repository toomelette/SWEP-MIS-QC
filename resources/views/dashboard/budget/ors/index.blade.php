@extends('layouts.admin-master')

@section('content')

    <section class="content-header">
        <h1>OBLIGATION REQUEST AND STATUS</h1>
    </section>
@endsection
@section('content2')

    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div id="ors_table_container" style="display: none">
                    <table class="table table-bordered table-striped table-hover" id="ors_table" style="width: 100%">
                        <thead>
                        <tr class="">
                            <th >ORS No/</th>
                            <th class="th-20">Date</th>
                            <th class="th-20">Payee</th>
                            <th >Particulars</th>
                            <th >Details</th>
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

@endsection

@section('scripts')
    <script type="text/javascript">
        //-----DATATABLES-----//
        modal_loader = $("#modal_loader").parent('div').html();
        //Initialize DataTable
        active = '';
        ors_tbl = $("#ors_table").on('xhr.dt', function (e, settings, json, xhr){
            if(xhr.status > 500){
                alert('Error '+xhr.status+': '+xhr.responseJSON.message);
            }
        }).DataTable({
            'dom' : 'lBfrtip',
            "processing": true,
            "serverSide": true,
            "ajax" : '{{route('dashboard.ors.index')}}',
            "columns": [
                { "data": "ors_no" },
                { "data": "ors_date" },
                { "data": "payee" },
                { "data": "particulars" },
                { "data": "details" },
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
                {
                    'targets' : 0,
                    "class" : 'w-10p',
                },
                {
                    'targets' : 1,
                    'class' : 'w-8p',
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
                    $("#ors_table_container").fadeIn(function () {
                        @if(request()->has('initiator') && request('initiator') == 'create')
                        introJs().start();
                        @endif
                    });
                    if(find != ''){
                        ors_tbl.search(find).draw();
                        setTimeout(function(){
                            active = '';
                        },3000);
                        // window.history.pushState({}, document.title, "/dashboard/employee");
                    }

                });
                @if(\Illuminate\Support\Facades\Request::get('toPage') != null && \Illuminate\Support\Facades\Request::get('mark') != null)
                setTimeout(function () {
                    ors_tbl.page({{\Illuminate\Support\Facades\Request::get('toPage')}}).draw('page');
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
                // console.log(ors_tbl.page.info().page);
                $("#ors_table a[for='linkToEdit']").each(function () {
                    let orig_uri = $(this).attr('href');
                    $(this).attr('href',orig_uri+'?page='+ors_tbl.page.info().page);
                });

                $('[data-toggle="tooltip"]').tooltip();
                $('[data-toggle="modal"]').tooltip();
                if(active != ''){
                    $("#ors_table #"+active).addClass('success');
                }
            }
        })

        style_datatable("#ors_table");

        //Need to press enter to search
        $('#ors_table_filter input').unbind();
        $('#ors_table_filter input').bind('keyup', function (e) {
            if (e.keyCode == 13) {
                ors_tbl.search(this.value).draw();
            }
        });
    </script>
@endsection