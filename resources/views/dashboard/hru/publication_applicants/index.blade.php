@extends('layouts.admin-master')

@section('content')

    <section class="content-header">
        <h1>{{$publicationDetail->position}} - Item No. {{$publicationDetail->item_no}}</h1>
    </section>
@endsection
@section('content2')

    <section class="content">
        <div class="box box-solid">
            <div class="box-header with-border">
                <p class="box-title" class="no-margin">List of Applicants</p>
            </div>

            <div class="box-body">
                <div id="applicants_table_container" style="display: none">
                    <table class="table table-bordered table-striped table-hover" id="applicants_table" style="width: 100% !important">
                        <thead>
                        <tr class="">
                            <th >Position</th>
                            <th >Item No.</th>
                            <th >JG</th>
                            <th >Salary</th>
                            <th >Education</th>
                            <th >Training</th>
                            <th >Experience</th>
                            <th >Eligibility</th>
                            <th >Competency</th>
                            <th >Place of Assgn.</th>

                            <th class="action">Action</th>
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
        var active = '';
        applicants_tbl = $("#applicants_table").DataTable({
            "ajax" : '{{\Illuminate\Support\Facades\Request::url()}}',
            "columns": [
                { "data": "position" },
                { "data": "item_no" },
                { "data": "salary_grade" },
                { "data": "monthly_salary" },
                { "data": "qs_education" },
                { "data": "qs_training" },
                { "data": "qs_experience" },
                { "data": "qs_eligibility" },
                { "data": "qs_competency" },
                { "data": "place_of_assignment" },
                { "data": "action" }
            ],
            "buttons": [
                {!! __js::dt_buttons() !!}
            ],
            "columnDefs":[
                {
                    "targets" : [1,2],
                    "class" : 'w-6p',
                },
                {
                    "targets" : [3],
                    "class" : 'w-6p text-right',
                },
                {
                    "targets" : 10,
                    "orderable" : false,
                    "class" : 'action3'
                },
            ],
            "responsive": false,
            'dom' : 'lBfrtip',
            "processing": true,
            "serverSide": true,
            "initComplete": function( settings, json ) {
                style_datatable("#"+settings.sTableId);
                $('#tbl_loader').fadeOut(function(){
                    $("#"+settings.sTableId+"_container").fadeIn();
                    if(find != ''){
                        applicants_tbl.search(find).draw();
                    }
                });
                //Need to press enter to search
                $('#'+settings.sTableId+'_filter input').unbind();
                $('#'+settings.sTableId+'_filter input').bind('keyup', function (e) {
                    if (e.keyCode == 13) {
                        applicants_tbl.search(this.value).draw();
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

    </script>
@endsection