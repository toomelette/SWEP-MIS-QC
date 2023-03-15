@php
    $rand = \Illuminate\Support\Str::random();
@endphp
@extends('layouts.modal-content')

@section('modal-header')
{{$pp->position}}
@endsection

@section('modal-body')
    {!! \App\Swep\ViewHelpers\__html::line('Add Employee') !!}

    <form id="add_occupants_form_{{$rand}}">
        <div class="row">
            {!! \App\Swep\ViewHelpers\__form2::textbox('fullname',[
                'id' => 'fullname_'.$rand,
                'label' => 'Fullname:',
                'cols' => 6,
                'autocomplete' => 'off',
            ]) !!}
            {!! \App\Swep\ViewHelpers\__form2::textbox('employee_no',[
                'id' => 'employee_no_'.$rand,
                'label' => 'Emp No.:*',
                'cols' => 3,
                'readonly' => 'readonly',
            ]) !!}

            {!! \App\Swep\ViewHelpers\__form2::textbox('appointment_date',[
                'label' => 'Appt. Date:*',
                'cols' => 3,
                'type' => 'date',
            ]) !!}
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-check"></i> Save</button>
            </div>
        </div>
    </form>

    {!! \App\Swep\ViewHelpers\__html::line('Previous employee(s) occupying this item') !!}

        <div id="occupants_table_{{$rand}}_container" style="display: none">
            <table class="table table-bordered table-striped table-hover" id="occupants_table_{{$rand}}" style="width: 100% !important">
                <thead>
                <tr class="">
                    <th >Fullname</th>
                    <th >Emp No.</th>
                    <th >Appt. Date</th>
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div id="tbl_loader_{{$rand}}">
            <center>
                <img style="width: 100px" src="{{asset('images/loader.gif')}}">
            </center>
        </div>




@endsection

@section('modal-footer')

@endsection

@section('scripts')
    <script type="text/javascript">
        $("#fullname_{{$rand}}").typeahead({
            ajax : "{{route('dashboard.plantilla.show',$pp->id)}}?typeahead=true",
            onSelect:function (result) {
                $("#employee_no_{{$rand}}").val(result.value);

            },
            lookup: function (i) {
                console.log(i);
            }
        });

        $("#add_occupants_form_{{$rand}}").submit(function (e) {
            e.preventDefault();
            let form = $(this);
            loading_btn(form);
            $.ajax({
                url : '{{route("dashboard.plantilla_employees.store")}}',
                data : form.serialize()+'&item_no={{$pp->item_no}}',
                type: 'POST',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    succeed(form,true,false);
                    notify('Item added successfully','success');
                    active_occupants = res.id;
                    occupants_tbl_{{$rand}}.draw(false);
                },
                error: function (res) {
                    errored(form,res);
                }
            })
        })

        var active_occupants = '';
        occupants_tbl_{{$rand}} = $("#occupants_table_{{$rand}}").DataTable({
            "ajax" : '{{route('dashboard.plantilla_employees.index')}}?item_no={{$pp->item_no}}',
            "columns": [
                { "data": "fullname" },
                { "data": "employee_no" },
                { "data": "appointment_date" },
                { "data": "action" }
            ],
            "buttons": [
                {!! __js::dt_buttons() !!}
            ],
            "columnDefs":[

                {
                    "targets" : 3,
                    "orderable" : false,
                    "class" : 'action2'
                },
            ],
            "responsive": false,
            'dom' : 'lBfrtip',
            "processing": true,
            "serverSide": true,
            "order" : [[2,'desc']],
            "initComplete": function( settings, json ) {
                style_datatable("#"+settings.sTableId);
                $('#tbl_loader_{{$rand}}').fadeOut(function(){
                    $("#"+settings.sTableId+"_container").fadeIn();
                    if(find != ''){
                        occupants_tbl_{{$rand}}.search(find).draw();
                    }
                });
                //Need to press enter to search
                $('#'+settings.sTableId+'_filter input').unbind();
                $('#'+settings.sTableId+'_filter input').bind('keyup', function (e) {
                    if (e.keyCode == 13) {
                        occupants_tbl_{{$rand}}.search(this.value).draw();
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
                if(active_occupants != ''){
                    $("#"+settings.sTableId+" #"+active_occupants).addClass('success');
                }
            }
        });
    </script>
@endsection

