@extends('layouts.admin-master')

@section('content')

    <section class="content-header">
        <h1>Obligation Request and Status - REPORTS</h1>
    </section>
@endsection
@section('content2')

    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="nav-tabs">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li role="presentation" class="active"><a href="#ors_summary" data-toggle="tab" aria-expanded="true">ORS Summary</a></li>
                                        <li role="presentation" class=""><a href="#ors_summary_with_projects" data-toggle="tab" aria-expanded="true">ORS Summary with projects</a></li>
                                        <li role="presentation" class=""><a href="#budget_monitoring" data-toggle="tab" aria-expanded="true">Budget Monitoring</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="tab-content">
                                <div class="tab-pane active" id="ors_summary">

                                    @include('dashboard.budget.ors.reports.ors_summary')
                                </div>

                                <div class="tab-pane" id="ors_summary_with_projects">
                                    <div class="row">

                                    </div>
                                </div>

                                <div class="tab-pane active" id="budget_monitoring">

                                    @include('dashboard.budget.ors.reports.budget_monitoring')
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </section>


@endsection


@section('modals')

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".generate_report_form").submit(function (e) {
            e.preventDefault();
            let form = $(this);
            let targetFrameId = form.attr('target');
            let baseUrl = form.attr('url');
            let submitBtn = $(this).find('button[type=submit]');
            loading_btn(form);
            $(targetFrameId).attr('src',baseUrl+'?'+form.serialize());
        })

        $(".embed-responsive-item").on('load',function () {
            let frame = $(this);
            let id = frame.attr('id');
            let form = $(".generate_report_form[target='#"+id+"']");
            remove_loading_btn(form);
            frame.parents('.frame-inner-container').siblings('.frame-placeholder').hide();
            frame.parents('.frame-inner-container').show();
        })
        
        $(".print-btn").click(function () {
            let btn = $(this);
            btn.parents('.frame-inner-container').find('iframe').get(0).contentWindow.print();
        })
    </script>
@endsection