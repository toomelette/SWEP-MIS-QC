@extends('layouts.admin-master')

@section('content')

    <section class="content-header">
        <h1>Obligation and Request Status</h1>
    </section>
@endsection
@section('content2')

    <section class="content">
        <div class="box box-success">
            <form id="ors_form">
                <div class="box-header with-border">
                    <h3 class="box-title">ORS</h3>
                    <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-check"></i> Save</button>
                </div>
                <div class="box-body">

                        <div class="row">
                            {!! \App\Swep\ViewHelpers\__form2::select('funds',[
                                'label' => 'Funds:',
                                'cols' => 1,
                                'options' => \App\Swep\Helpers\Arrays::orsFunds(),
                            ]) !!}

                            {!! \App\Swep\ViewHelpers\__form2::textbox('ors_date',[
                                'label' => 'Date:',
                                'cols' => 2,
                                'type' => 'date',
                            ],Carbon::now()->format('Y-m-d')) !!}

                            {!! \App\Swep\ViewHelpers\__form2::textbox('payee',[
                                'label' => 'Payee:',
                                'cols' => 4,
                            ]) !!}

                            {!! \App\Swep\ViewHelpers\__form2::textbox('office',[
                                'label' => 'Office:',
                                'cols' => 2,
                            ]) !!}

                            {!! \App\Swep\ViewHelpers\__form2::textbox('address',[
                                'label' => 'Address:',
                                'cols' => 3,
                            ]) !!}
                        </div>
                        <div class="row">
                            {!! \App\Swep\ViewHelpers\__form2::select('ref_book',[
                                'label' => 'Book:',
                                'cols' => 1,
                                'options' => \App\Swep\Helpers\Arrays::orsBooks(),
                            ]) !!}

                            {!! \App\Swep\ViewHelpers\__form2::textbox('ref_doc',[
                                'label' => 'Document Ref No:',
                                'cols' => 2,
                            ]) !!}

                            {!! \App\Swep\ViewHelpers\__form2::textbox('particulars',[
                                'label' => 'Remarks:',
                                'cols' => 6,
                            ]) !!}

                            {!! \App\Swep\ViewHelpers\__form2::textbox('amount',[
                                'label' => 'Amount:',
                                'cols' => 2,
                                'class' => 'text-right autonum'
                            ]) !!}
                        </div>

{{--                        <p class="page-header-sm text-info" style="margin-bottom: 0px;background-color: #00a65a;border-bottom: 1px solid #cedbe1;border-radius: 5px;text-align: center; color: white">--}}
{{--                            CERTIFICATION--}}
{{--                        </p>--}}
                        <div class="row">
                            <div class="col-md-6">
                                <p class="page-header-sm text-info" style="border-bottom: 1px solid #cedbe1">
                                    Certified By
                                </p>
                                <div class="row">
                                    {!! \App\Swep\ViewHelpers\__form2::textbox('certified_by',[
                                        'label' => 'Certified by:',
                                        'cols' => 6,
                                    ]) !!}
                                    {!! \App\Swep\ViewHelpers\__form2::textbox('certified_by_position',[
                                        'label' => 'Position:',
                                        'cols' => 6,
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="page-header-sm text-info" style="border-bottom: 1px solid #cedbe1">
                                    Budget Certification
                                </p>
                                <div class="row">
                                    {!! \App\Swep\ViewHelpers\__form2::textbox('certified_budget_by',[
                                        'label' => 'Budget Cert.:',
                                        'cols' => 6,
                                    ]) !!}
                                    {!! \App\Swep\ViewHelpers\__form2::textbox('certified_budget_by_position',[
                                        'label' => 'Position:',
                                        'cols' => 6,
                                    ]) !!}
                                </div>
                            </div>
                        </div>

                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Account Entries</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Applied Projects</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <button data-target="#account_entries_table" uri="{{route('dashboard.ajax.get','add_row')}}?view=ors_account_entry" style="margin-bottom: 5px" type="button" class="btn btn-xs btn-success pull-right add_button"><i class="fa fa-plus"></i> Add item</button>
                                    <table id="account_entries_table" class="table table-bordered table-striped table-condensed">
                                        <thead>
                                        <tr>
                                            <th style="width: 100px">Type</th>
                                            <th style="width: 25%">Resp Center</th>
                                            <th style="width: 200px;">Account Code</th>
                                            <th>Account Title</th>
                                            <th style="width: 200px">Debit</th>
                                            <th style="width: 200px">Credit</th>
                                            <th style="width: 50px"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane " id="tab_2">
                                    <button data-target="#applied_projects_table" uri="{{route('dashboard.ajax.get','add_row')}}?view=ors_applied_project" style="margin-bottom: 5px" type="button" class="btn btn-xs btn-success pull-right add_button"><i class="fa fa-plus"></i> Add item</button>
                                    <table id="applied_projects_table" class="table table-bordered table-striped table-condensed">
                                        <thead>
                                        <tr>
                                            <th style="width: 30%">Resp Center</th>
                                            <th>PAP</th>
                                            <th style="width: 200px">MOOE</th>
                                            <th style="width: 200px">CO</th>
                                            <th style="width: 50px"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>

                </div>
            </form>
        </div>

    </section>


@endsection


@section('modals')

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".add_button").each(function () {
                $(this).trigger('click');
            })
        })

        $("body").on("change",".resp_center_clear",function () {
            let id = $(this).parents('tr').attr('id');
            $('#select2_id_'+id).val(null).trigger('change');

        })

        $("#ors_form").submit(function (e) {
            e.preventDefault()
            let form = $(this);
            loading_btn(form);
            $.ajax({
                url : '{{route("dashboard.ors.store")}}',
                data : form.serialize(),
                type: 'POST',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    succeed(form,true,true);
                },
                error: function (res) {
                    errored(form,res);
                }
            })
        })

    </script>
@endsection