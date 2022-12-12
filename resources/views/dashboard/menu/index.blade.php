@extends('layouts.admin-master')

@section('content')

  <section class="content-header">
    <h1>Manage Menus</h1>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">List of Menus</h3>
        <div class="pull-right">
          <div class="btn-group">
            <button class="btn btn-default change_menu_btn" data-toggle="modal" data-target="#change_menu_modal">
              <i class="fa fa-sort-amount-asc"></i>
              Change Menu Order</button>
            <button type="button" class="btn bg-green" data-toggle="modal" data-target="#add_menu_modal"><i class="fa fa-plus"></i> Add new</button>
          </div>
        </div>
      </div>
      <div class="panel">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#advanced_filters" aria-expanded="true" class="">
              <i class="fa fa-filter"></i>  Advanced Filters <i class=" fa  fa-angle-down"></i>
            </a>
          </h4>
        </div>
        <div id="advanced_filters" class="panel-collapse collapse" aria-expanded="true" style="">
          <div class="box-body">
            <div class="row">
              <div class="col-md-1 col-sm-2 col-lg-2">
                <label>Is menu:</label>
                <select name="scholars_table_length" aria-controls="scholars_table" class="form-control input-sm filter_menu filters">
                  <option value="">All</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-2 col-lg-2">
                <label>Is dropdown:</label>
                <select name="scholars_table_length" aria-controls="scholars_table" class="form-control input-sm filter_dropdown filters">
                  <option value="">All</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="box-body">
        <div id="menu_table_container" style="display: none">


          <table class="table table-bordered table-striped table-hover" id="menu_table" style="width: 100% !important; font-size: 14px">
            <thead>
            <tr class="bg-green">
              <th>Name</th>
              <th>Category</th>
              <th class="w-40">Submenus</th>
              <th class="th-10">Icon</th>
              <th class="th-10">Menu</th>
              <th class="th-10">Dropdown</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
          </table>

        </div>
      </div>
      <div id="tbl_loader">
        <center>
          <img style="width: 100px" src="{{asset("images/loader.gif")}}">
        </center>
      </div>
      <!-- /.box-body -->
    </div>



    </div>
  </section>

@endsection





@section('modals')

  {!! __html::blank_modal('show_menu_modal','lg') !!}
  {!! __html::blank_modal('edit_menu_modal','sm') !!}
  {!! __html::blank_modal('list_submenus','lg') !!}
  {!! __html::blank_modal('edit_submenu_modal','sm') !!}

  <div class="modal fade" id="change_menu_modal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <div id="add_menu_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <form id="add_menu_form" autocomplete="off">
          @csrf
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add new menu</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              {!! __form::textbox(
                '12 name', 'name', 'text', 'Name: *', 'Name','', '', '', ''
              ) !!}


              {!! __form::textbox(
                '12 route', 'route', 'text', 'Route: *', 'Route','', '', '', ''
              ) !!}

              {!! __form::textbox(
                '12 category', 'category', 'text', 'Category: *', 'Category','', '', '', ''
              ) !!}

              {!! __form::textbox_icon(
                '12 icon', 'icon', 'text', 'Icon: *', 'Icon','', '', '', ''
              ) !!}

              {!! __form::select_static(
                '6 is_menu', 'is_menu', 'Is menu: *', '', [
                  'No' => '0',
                  'Yes' => '1',
                ], '', '', '', ''
              ) !!}

              {!! __form::select_static(
                '6 is_dropdown', 'is_dropdown', 'Is dropdown: *','', [
                  'No' => '0',
                  'Yes' => '1',
                ], '', '', '', ''
              ) !!}

              {!! \App\Swep\ViewHelpers\__form2::select('portal',[
                  'label' => 'Portal',
                  'cols' => 12,
                  'options' => \App\Swep\Helpers\Arrays::portals(),
              ]) !!}
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>





@endsection





@section('scripts')
  <script type="text/javascript">
    function dt_draw(){
      menu_tbl.draw(false);
    }

    function delete_submenu(slug){
      $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to remove this submenu?',
        type: 'red',
        typeAnimated: true,
        buttons: {
          confirm:{
            btnClass: 'btn-danger',
            action: function(){
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              })

              uri = "{{ route('dashboard.submenu.destroy', 'slug') }}";
              uri = uri.replace('slug', slug);
              Pace.restart();
              $.ajax({
                url : uri,
                type: 'DELETE',
                success: function(response){

                  notify("Item successfully deleted.", "success");
                  submenu_tbl.row("#"+slug).remove().draw();
                  active = response.menu_id;
                  menu_tbl.draw(false);
                },
                error: function(response){
                  notify("An error occured while deteling the item.", "danger");
                  console.log(response)
                }

              })

            }

          },
          cancel: function () {

          }
        }
      });
    }

    function filter_dt(){
      is_menu = $(".filter_menu").val();
      is_dropdown = $(".filter_dropdown").val();
      menu_tbl.ajax.url(
              "{{ route('dashboard.menu.index') }}?is_menu="+is_menu+"&is_dropdown="+is_dropdown).load();

      $(".filters").each(function(index, el) {
        if($(this).val() != ''){
          $(this).parent("div").addClass('has-success');
          $(this).siblings('label').addClass('text-green');
        }else{
          $(this).parent("div").removeClass('has-success');
          $(this).siblings('label').removeClass('text-green');
        }
      });
    }


  </script>
  <script type="text/javascript">

    active = '';

    $('#block_farm_tbl')
            .on('preXhr.dt', function ( e, settings, data ) {
              Pace.restart();
            } )

    modal_loader = $("#modal_loader").parent('div').html();
    //-----DATATABLES-----//

    //Initialize DataTable
    menu_tbl = $("#menu_table").DataTable({
      "processing": true,
      "serverSide": true,
      "ajax" : '{{ route("dashboard.menu.index") }}',
      "columns": [
        { "data": "name" },
        { "data": "category" },
        { "data": "submenus" },
        { "data": "icon" },
        { "data": "is_menu" },
        { "data": "is_dropdown" },
        { "data": "action" }
      ],
      // buttons: [
      //     'copy', 'excel', 'pdf'
      // ],
      "columnDefs":[
        {
          "targets" : 0,
          "class" : 'w-10p'
        },
        {
          "targets" : 6,
          "orderable" : false,
          "class" : 'action-3'
        },
        {
          "targets": [3,4,5],
          "class" : 'text-center',
        }
      ],
      "order" : [[1, 'asc'],[0, 'asc']],
      "responsive": false,
      "initComplete": function( settings, json ) {
        $('#tbl_loader').fadeOut(function(){
          $("#menu_table_container").fadeIn();
        });
      },
      "language":
              {
                "processing": "<center><img style='width: 70px' src='{{asset('images/loader.gif')}}'></center>",
              },
      "drawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="modal"]').tooltip();
        if(active != ''){
          $("#menu_table #"+active).addClass('success');
        }
      }
    })


    //Need to press enter to search
    $('#menu_table_filter input').unbind();
    $('#menu_table_filter input').bind('keyup', function (e) {
      if (e.keyCode == 13) {
        menu_tbl.search(this.value).draw();
      }
    });

    style_datatable("#menu_table");

    $(".filters").change(function(){
      filter_dt();
    })

    {{--$(".change_menu_btn").click(function(){--}}
    {{--  load_modal('#change_menu_modal');--}}
    {{--  $.ajax({--}}
    {{--    url : "{{ route('dashboard.menu.get_menus') }}",--}}
    {{--    type : "GET",--}}
    {{--    success: function(response){--}}
    {{--      populate_modal("#change_menu_modal",response);--}}
    {{--    },--}}
    {{--    error: function(response){--}}
    {{--      console.log(response);--}}
    {{--    }--}}
    {{--  })--}}
    {{--});--}}

    {{--$("body").on("click",".submit_reorder_btn",function(){--}}
    {{--  array = new Array;--}}
    {{--  $("#sort_menus li").each(function(index,item){--}}
    {{--    slug = $(this).attr('data');--}}
    {{--    array.push(slug);--}}
    {{--  });--}}
    {{--  uri = "{{ route('dashboard.menu.reorder_menus') }}";--}}
    {{--  $.ajax({--}}
    {{--    url: uri ,--}}
    {{--    data: {array:array},--}}
    {{--    type: 'GET',--}}
    {{--    success: function(response){--}}
    {{--      if(response > 0){--}}
    {{--        notify("Menus was reodered successfully. Navigation panel will reorder after reloading the page.","success");--}}
    {{--        $("#change_menu_modal").modal('hide');--}}
    {{--        menu_tbl.draw(false);--}}
    {{--      }--}}
    {{--    },--}}
    {{--    error: function(response){--}}
    {{--      console.log(response);--}}
    {{--    }--}}
    {{--  })--}}
    {{--});--}}

    $("#add_menu_form").submit(function(e) {
      e.preventDefault();
      form = $(this);
      loading_btn(form)
      $.ajax({
        url : "{{ route('dashboard.menu.store') }}",
        data: $(this).serialize(),
        type: 'POST',
        dataType: 'json',
        success: function(response){
          succeed(form,true,false);
          notify("Menu has been added successfully","success");
          active = response.slug;
          dt_draw();
        },
        error: function(response){
          errored(form,response);
        }
      })
    });

    $("body").on("click",".list_submenus_btn", function(){
      var id = $(this).attr('data');
      var menu_id = $(this).attr('menu_id');
      $("#list_submenus .modal-content").html(modal_loader);
      $.ajax({
        url : "{{ route('dashboard.submenu.index') }}",
        data: {menu_slug : id, menu_id: menu_id},
        type: "GET",
        success: function(response){
          $("#list_submenus #modal_loader").fadeOut(function() {
            $("#list_submenus .modal-content").html(response);
            // submenu_tbl = $(".submenu_table").DataTable({
            //   "columnDefs" :[
            //     {
            //       "targets" : 4,
            //       "orderable" : false
            //     }
            //   ]
            // });

            {{--$("#add_submenu_form").submit(function(e){--}}
            {{--  e.preventDefault();--}}
            {{--  form = $(this);--}}
            {{--  loading_btn(form);--}}
            {{--  $.ajaxSetup({--}}
            {{--    headers: {--}}
            {{--      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--    }--}}
            {{--  });--}}

            {{--  $.ajax({--}}
            {{--    url: "{{ route('dashboard.submenu.store') }}",--}}
            {{--    type: "POST",--}}
            {{--    data: $(this).serialize()+"&menu="+id,--}}
            {{--    dataType : 'json',--}}
            {{--    success: function(response){--}}
            {{--      succeed(form, true, false);--}}
            {{--      notify("Submenu successfully saved.", "success");--}}
            {{--      if(response.is_nav == 1){--}}
            {{--        nav = '<center><span class="bg-green badge"><i class="fa fa-check"></i></span></center>';--}}
            {{--      }else{--}}
            {{--        nav = '<center><span class="bg-red badge"><i class="fa fa-times"></i></span></center>';--}}
            {{--      }--}}
            {{--      submenu_tbl.row.add([--}}
            {{--        response.name,--}}
            {{--        response.route,--}}
            {{--        response.nav_name,--}}
            {{--        nav,--}}
            {{--        '<div class="btn-group">'+--}}
            {{--        '<button  data="'+response.slug+'" class="btn btn-sm btn-default edit_submenu_btn">'+--}}
            {{--        '<i class="fa fa-pencil-square-o"></i>'+--}}
            {{--        '</button>'+--}}
            {{--        '<button data="'+response.slug+'" class="btn btn-sm btn-danger delete_submenu_btn">'+--}}
            {{--        '<i class="fa  fa-trash-o"></i>'+--}}
            {{--        '</button>'+--}}
            {{--        '</div>'--}}
            {{--      ]).node().id= response.slug;--}}
            {{--      submenu_tbl.draw();--}}

            {{--      $(".submenu_table .success").each(function(){--}}
            {{--        $(this).removeClass('success');--}}
            {{--      });--}}

            {{--      $("#"+response.slug).addClass('success');--}}

            {{--      active = id;--}}
            {{--      menu_tbl.draw(false);--}}


            {{--    },--}}
            {{--    error: function(response){--}}
            {{--      errored(form,response);--}}
            {{--    }--}}
            {{--  })--}}
            {{--})--}}
          });
        },
        error: function(response){

        }
      })
    });

    $("body").on("click",".edit_menu_btn", function(){
        var btn = $(this);
        var slug = btn.attr("data");
        load_modal2(btn);
        uri = "{{ route('dashboard.menu.edit','slug') }}";
        uri = uri.replace('slug',slug);
        $.ajax({
            url : uri,
            type: 'GET',
            success: function(response){
                populate_modal2(btn, response);
                        },
            error: function(response){

            }
        });
    });

    $("body").on("submit","#edit_menu_form", function(e){
      e.preventDefault();
      id = $(this).attr("data");
      wait_button("#edit_menu_form");
      uri = "{{ route('dashboard.menu.update','slug') }}";
      uri = uri.replace("slug",id);

      $.ajax({
        url : uri,
        data: $(this).serialize(),
        type: 'PUT',
        success: function(response){
          succeed("#edit_menu_form","save",false);
          active = response.slug;
          menu_tbl.draw(false);
          $("#edit_menu_modal").modal("hide");
        },
        error: function(response){
          console.log(response);
          errored("#edit_menu_form","save",response);
        }
      })
    });

    {{--$("body").on("click",".delete_menu_btn" ,function(){--}}
    {{--  id = $(this).attr("data");--}}
    {{--  confirm("{{ route('dashboard.menu.destroy','slug') }}", id);--}}
    {{--});--}}

    {{--$("body").on("click",".edit_submenu_btn", function(){--}}
    {{--  id = $(this).attr("data");--}}
    {{--  t = $(this);--}}
    {{--  old = t.html();--}}
    {{--  t.html('<i class="fa fa-spin fa-spinner"></i>');--}}
    {{--  t.attr("disabled","disabled");--}}
    {{--  uri = "{{ route('dashboard.submenu.edit','slug') }}",--}}
    {{--          uri = uri.replace('slug', id);--}}
    {{--  $.ajax({--}}
    {{--    url : uri,--}}
    {{--    type: 'GET',--}}
    {{--    success: function(response){--}}
    {{--      console.log(response);--}}
    {{--      t.removeAttr("disabled");--}}
    {{--      t.html(old);--}}
    {{--      r = response;--}}
    {{--      if(r.is_nav == '1'){--}}
    {{--        options = '<option value="">Select</option>'+--}}
    {{--                '<option value="1" selected>Yes</option>'+--}}
    {{--                '<option value="0">No</option>';--}}
    {{--      }else if(r.is_nav == '0'){--}}
    {{--        options = '<option value="">Select</option>'+--}}
    {{--                '<option value="1">Yes</option>'+--}}
    {{--                '<option value="0" selected>No</option>';--}}
    {{--      }else{--}}
    {{--        options = '<option value="" selected>Select</option>'+--}}
    {{--                '<option value="1">Yes</option>'+--}}
    {{--                '<option value="0">No</option>';--}}
    {{--      }--}}

    {{--      if(r.nav_name == null){--}}
    {{--        r.nav_name = "";--}}
    {{--      }--}}
    {{--      edit_dialog = $.dialog({--}}
    {{--        title: 'Edit',--}}
    {{--        content: '' +--}}
    {{--                '<form id="edit_submenu_form" autocomplete="off" data="'+r.slug+'">' +--}}
    {{--                '<div class="form-group name">' +--}}
    {{--                '<label>Name *</label>' +--}}
    {{--                '<input type="text" placeholder="Name" name="name" class="form-control" value= "'+r.name+'"/>' +--}}
    {{--                '</div>' +--}}
    {{--                '<div class="form-group route">' +--}}
    {{--                '<label>Route *</label>' +--}}
    {{--                '<input type="text" placeholder="Route" name="route" class="form-control" value= "'+r.route+'"/>' +--}}
    {{--                '</div>' +--}}

    {{--                '<div class="form-group nav_name">' +--}}
    {{--                '<label>Nav name:</label>' +--}}
    {{--                '<input type="text" placeholder="Nav name" name="nav_name" class="form-control" value= "'+r.nav_name+'"/>' +--}}
    {{--                '</div>' +--}}

    {{--                '<div class="form-group is_nav">' +--}}
    {{--                '<label>Is nav:</label>' +--}}
    {{--                '<select id="" name="is_nav" class="form-control " style="font-size:15px;">'+--}}
    {{--                options+--}}
    {{--                '</select>'+--}}
    {{--                '</div>' +--}}

    {{--                '<div class="jconfirm-buttons">'+--}}
    {{--                '<button type="submit" class="btn btn-blue update_submenu_btn"><i class="fa fa-save"> </i> Save</button></div>'+--}}
    {{--                '</form>'--}}
    {{--      });--}}
    {{--    },--}}
    {{--    error: function(response){--}}
    {{--      console.log(response);--}}
    {{--    }--}}
    {{--  })--}}
    {{--});--}}

    {{--$("body").on("submit","#edit_submenu_form", function(e){--}}
    {{--  e.preventDefault();--}}
    {{--  id = $(this).attr("data");--}}
    {{--  uri = "{{ route('dashboard.submenu.update','slug') }}";--}}
    {{--  uri = uri.replace('slug', id);--}}
    {{--  wait_button('#edit_submenu_form');--}}
    {{--  $.ajax({--}}
    {{--    url : uri,--}}
    {{--    data : $(this).serialize(),--}}
    {{--    type: 'PUT',--}}
    {{--    dataType: 'json',--}}
    {{--    headers: {--}}
    {{--      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--    },--}}
    {{--    success :function(response){--}}
    {{--      r = response;--}}
    {{--      unwait_button('#edit_submenu_form');--}}
    {{--      notify("Submenu has been updated","success");--}}
    {{--      edit_dialog.close();--}}
    {{--      if(r.nav_name == null){--}}
    {{--        r.nav_name = "";--}}
    {{--      }--}}

    {{--      if(r.is_nav == '1'){--}}
    {{--        is_nav = '<center><span class="bg-green badge"><i class="fa fa-check"></i></span></center>';--}}
    {{--      }else{--}}
    {{--        is_nav = '<center><span class="bg-red badge"><i class="fa fa-times"></i></span></center>';--}}
    {{--      }--}}
    {{--      tbl = $(".submenu_table").dataTable();--}}
    {{--      tbl.fnUpdate(r.name,'#'+r.slug, 0,false);--}}
    {{--      tbl.fnUpdate(r.route,'#'+r.slug, 1, false);--}}
    {{--      tbl.fnUpdate(r.nav_name,'#'+r.slug, 2, false);--}}
    {{--      tbl.fnUpdate(is_nav,'#'+r.slug, 3, false);--}}

    {{--      $(".submenu_table .success").each(function(){--}}
    {{--        $(this).removeClass('success');--}}
    {{--      });--}}
    {{--      $(".submenu_table #"+r.slug).addClass('success');--}}

    {{--      active = r.menu_id;--}}
    {{--      menu_tbl.draw(false);--}}



    {{--    },--}}
    {{--    error: function(response){--}}
    {{--      errored("#edit_submenu_form","save",response);--}}
    {{--      errored("#edit_submenu_form","save",response);--}}
    {{--    }--}}
    {{--  })--}}
    {{--});--}}

    // $("body").on("click",".delete_submenu_btn", function(){
    //   id = $(this).attr("data");
    //   delete_submenu(id);
    //
    // })

    $("body").on("keyup", ".with-icon", function(){
      $(this).siblings('.input-group-addon').html("<i class='fa "+$(this).val()+"'></i>");
    })



  </script>
@endsection
