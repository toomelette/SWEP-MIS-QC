@extends('layouts.admin-master')

@section('content')

    <section class="content-header">
        <h1>Annual Budget</h1>
    </section>
@endsection
@section('content2')

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Projects Activities and Programs</h3>
                <div class="pull-right">
                    <button class="btn btn-primary btn-sm" data-target="#add_modal" data-toggle="modal"><i class="fa fa-plus"></i> New</button>
                </div>
            </div>
            <div class="box-body">
                <div class="panel">
                    <div class="box box-sm box-default box-solid collapsed-box">
                        <div class="box-header with-border">
                            <p class="no-margin"><i class="fa fa-filter"></i> Advanced Filters <small id="filter-notifier" class="label bg-blue blink"></small></p>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool advanced_filters_toggler" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="box-body" style="display: none">
                            <form id="filter_form">
                                <div class="row">
                                    {!! \App\Swep\ViewHelpers\__form2::select('year',[
                                        'label' => 'Year:',
                                        'cols' => '2 dt_filter-parent-div',
                                        'class' => 'dt_filter filters',
                                        'options' => 'year',
                                    ]) !!}

                                    {!! \App\Swep\ViewHelpers\__form2::select('department',[
                                        'label' => 'Department:',
                                        'cols' => '4 dt_filter-parent-div',
                                        'class' => 'dt_filter filters',
                                        'options' => \App\Swep\Helpers\Arrays::departmentList(),
                                    ]) !!}

                                    {!! \App\Swep\ViewHelpers\__form2::select('account_code',[
                                        'label' => 'Acct. Code:',
                                        'cols' => '4 dt_filter-parent-div',
                                        'class' => 'dt_filter filters',
                                        'options' => \App\Swep\Helpers\Arrays::chartOfAccounts(),
                                        'id' => 'coa_select2',
                                    ]) !!}

                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <div id="annual_budget_table_container" style="display: none">
                    <table class="table table-bordered table-striped table-hover" id="annual_budget_table" style="width: 100% !important">
                        <thead>
                        <tr class="">
                            <th style="width: 10%;">Year</th>
                            <th class="th-20" style="width: 10%;">Department</th>
                            <th style="width: 20%;">Account Code</th>
                            <th style="width: 10%;">Account Title</th>
                            <th style="width: 10%;">Amount</th>
                            <th style="width: 10%;">Action</th>
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
    <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="add_modal_label">
      <div class="modal-dialog" role="document">
          <form id="add_form">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">New</h4>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          {!! \App\Swep\ViewHelpers\__form2::select('year',[
                              'cols' => '3',
                              'label' => 'Year:',
                              'options' => 'year',
                          ]) !!}
                          {!! \App\Swep\ViewHelpers\__form2::select('department',[
                              'cols' => '9',
                              'label' => 'Department:',
                              'options' => \App\Swep\Helpers\Arrays::departmentList(),
                          ]) !!}

                          {!! \App\Swep\ViewHelpers\__form2::select('account_code',[
                              'cols' => '12',
                              'label' => 'Account:',
                              'options' => \App\Swep\Helpers\Arrays::chartOfAccounts(),
                              'id' => 'select2_chart_of_accounts',
                          ]) !!}

                          {!! \App\Swep\ViewHelpers\__form2::textbox('amount',[
                              'cols' => '6',
                              'label' => 'Amount:',
                              'class' => 'text-right autonum',
                          ]) !!}
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Save</button>
                  </div>
              </div>
          </form>
      </div>
    </div>
    {!! \App\Swep\ViewHelpers\__html::blank_modal('edit_modal','') !!}
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            //-----DATATABLES-----//
            modal_loader = $("#modal_loader").parent('div').html();
            //Initialize DataTable
            active = '';
            $("#select2_chart_of_accounts").select2({
                dropdownParent : $('#add_modal'),
            });


            annual_budget_tbl = $("#annual_budget_table").DataTable({
                "ajax" : '{{\Illuminate\Support\Facades\Request::url()}}?'+$("#filter_form").serialize(),
                "columns": [
                    { "data": "year" },
                    { "data": "department" },
                    { "data": "account_code" },
                    { "data": "account_title" },
                    { "data": "amount" },

                    { "data": "action" }
                ],
                "buttons": [
                    {!! __js::dt_buttons() !!}
                ],
                "columnDefs":[
                    {
                        "targets" : 0,
                        "class" : 'w-8p'
                    },
                    {
                        "targets" : 4,
                        "class" : 'w-8p text-right'
                    },
                    {
                        "targets" : 5,
                        "orderable" : false,
                        "class" : 'action3'
                    },
                ],
                "responsive": false,
                'dom' : 'lBfrtip',
                "processing": true,
                "serverSide": true,
                "order" : [[0,'asc'],[1,'asc'],[2,'asc']],
                "initComplete": function( settings, json ) {
                    style_datatable("#"+settings.sTableId);
                    $('#tbl_loader').fadeOut(function(){
                        $("#"+settings.sTableId+"_container").fadeIn();
                        if(find != ''){
                            annual_budget_tbl.search(find).draw();
                        }
                    });
                    //Need to press enter to search
                    $('#'+settings.sTableId+'_filter input').unbind();
                    $('#'+settings.sTableId+'_filter input').bind('keyup', function (e) {
                        if (e.keyCode == 13) {
                            annual_budget_tbl.search(this.value).draw();
                        }
                    });
                },

                "language":
                    {
                        "processing": "<center><img style='width: 70px' src='{{asset("images/loader.gif")}}'></center>",
                    },
                "drawCallback": function(settings){
                    $('[data-toggle="tooltip"]').tooltip();
                    $('[data-toggle="modal"]').tooltip();
                    if(active != ''){
                        $("#"+settings.sTableId+" #"+active).addClass('success');
                    }
                }
            });
        })

        $("#add_form").submit(function (e) {
            e.preventDefault()
            let form = $(this);
            loading_btn(form);
            $.ajax({
                url : '{{route("dashboard.annual_budget.store")}}',
                data : form.serialize(),
                type: 'POST',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    active = res.slug;
                    annual_budget_tbl.draw(false);
                    succeed(form,true,false);
                },
                error: function (res) {
                    errored(form,res);
                }
            })
        })
        $("body").on("click",".edit_btn",function () {
            let btn = $(this);
            load_modal2(btn);
            let uri = '{{route("dashboard.annual_budget.edit","slug")}}';
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

        $(".dt_filter").change(function () {
            filterDT(annual_budget_tbl);
        })
        $("#coa_select2").select2();
    </script>
@endsection