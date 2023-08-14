@extends('layouts.admin-master')

@section('content')

@endsection
@section('content2')
    <style>
        .select2-dropdown {
            z-index: 1061;
        }
    </style>
    <section class="content">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Publication</h3>
                <div class="btn-group pull-right">
                    <button class="btn btn-sm btn-primary" type="button" id="finalize_button" {{$publication->is_final == 1 ? 'disabled="disabled"' : ""  }}>Finalize Publication</button>
                </div>
            </div>

            <div class="box-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-2">
                            <dl>
                                <dt>Date:</dt>
                                <dd>{{\App\Swep\Helpers\Helper::dateFormat($publication->date,'F d, Y')}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-2">
                            <dl>
                                <dt>Deadline:</dt>
                                <dd>{{\App\Swep\Helpers\Helper::dateFormat($publication->deadline,'F d, Y')}}</dd>
                            </dl>
                        </div>

                        <div class="col-md-4">
                            <dl>
                                <dt>Send to:</dt>
                                <dd>
                                    {{$publication->send_to}}, <br><span class="text-italic"><i>{{$publication->send_to_position}}</i></span>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Email to:</dt>
                                <dd>{{$publication->send_to_email}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if($publication->is_final != 1)
                        <div class="col-md-12">
                            <button class="btn btn-sm btn-success pull-right" id="add_position_button" type="button" data-toggle="modal" data-target="#add_publication_modal" style="margin-bottom: 10px">
                                <i class="fa fa-plus"></i> Add Position
                            </button>
                        </div>
                    @endif
                </div>


                <div id="items_table_container" style="display: none">
                    <table class="table table-bordered table-striped table-hover table-responsive" id="items_table" style="width: 100% !important">
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

    <div class="modal fade" id="add_publication_modal" tabindex="-1" role="dialog" aria-labelledby="add_publication_modal_label">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form id="add_item_form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add item</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            {!! \App\Swep\ViewHelpers\__form2::select('item_no',[
                                  'label' => 'Select Plantilla Item',
                                  'cols' => 12,
                                  'options' => \App\Swep\Helpers\Arrays::payPlantillasWithItemNumber(),
                                  'id' => 'plantilla_select',
                            ])  !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#plantilla_select").select2({
            dropdownParent : $("#add_publication_modal"),
        });


        //-----DATATABLES-----//
        modal_loader = $("#modal_loader").parent('div').html();
        //Initialize DataTable
        var active = '';
        items_tbl = $("#items_table").DataTable({
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
            "responsive": true,
            'dom' : 'lBfrtip',
            "processing": true,
            "serverSide": true,
            "initComplete": function( settings, json ) {
                style_datatable("#"+settings.sTableId);
                $('#tbl_loader').fadeOut(function(){
                    $("#"+settings.sTableId+"_container").fadeIn();
                    if(find != ''){
                        items_tbl.search(find).draw();
                    }
                });
                //Need to press enter to search
                $('#'+settings.sTableId+'_filter input').unbind();
                $('#'+settings.sTableId+'_filter input').bind('keyup', function (e) {
                    if (e.keyCode == 13) {
                        items_tbl.search(this.value).draw();
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


        $("#add_item_form").submit(function (e) {
            e.preventDefault()
            let form = $(this);
            let uri = '{{route("dashboard.publication.add_item",$publication->slug)}}';
            loading_btn(form);
            $.ajax({
                url : uri,
                data : form.serialize(),
                type: 'POST',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    active = res.slug;
                    items_tbl.draw(false);
                    succeed(form,true,false);
                    toast('success','Item successfully added.','Success');
                },
                error: function (res) {
                    errored(form,res);
                }
            })
        })

        $("#finalize_button").click(function (){
            Swal.fire({
                title: 'Finalize publication?',
                // html: 'Finalize publication?',
                // input : 'textarea',
                inputAttributes: {
                    autocapitalize: 'off',
                },
                inputValue: '',
                showCancelButton: true,
                confirmButtonText: 'Finalize',
                cancelButtonText: 'Cancel',
                showLoaderOnConfirm: true,
                preConfirm: (text) => {
                    return $.ajax({
                        url : '{{route('dashboard.publication.update',$publication->slug)}}?action=finalize',
                        // data : {'reason':text},
                        type: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function (res) {
                            toast('info','Publication Finalized.','Success');
                            setTimeout(function (){
                                location.reload()
                            },1000);
                        },
                        error: function (res) {
                            if(res.status == 422){
                                var message = res.responseJSON.errors.biometric_user_id;
                            }else{
                                var message = res.responseJSON.message;
                            }
                            Swal.showValidationMessage(
                                'Request failed: ' + message
                            );
                        }
                    }).then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                        .catch(error => {

                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        })
    </script>
@endsection