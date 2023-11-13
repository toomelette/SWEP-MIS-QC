<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SRA Web Portal - MIS</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.css-plugins')

    @yield('extras')

  </head>

  <body class="hold-transition fixed {!! Auth::check() ? __sanitize::html_encode(Auth::user()->color) : '' !!}" theme="{!! Auth::check() ? __sanitize::html_encode(Auth::user()->color) : '' !!}">

    <div id="loader"></div>

    <div class="wrapper">

      @include('layouts.admin-topnav')

      @include('layouts.admin-sidenav')

      <div class="content-wrapper" >

          @if(!empty(Auth::user()->employee))
            @if(Hash::check(Carbon::parse(Auth::user()->employee->birthday)->format('mdy'), \Illuminate\Support\Facades\Auth::user()->password))
              <div class="row" id="change_pass_container">
                <div class="col-md-12">
                  <a href="#" id="change_pass_href">
                    <div class="alert alert-warning" style="margin: 1rem">
                      <p><b>Your account is at risk. </b> It seems like you haven't changed your password yet. Please change your SWEP Account Password by clicking here.</p>
                    </div>
                  </a>
                </div>
              </div>
            @endif
          @endif


        @yield('content')
        @yield('content2')
            @include('dashboard.home.announcement_banner')
      </div>

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.1.0
        </div>
        <strong>Copyright &copy; 2018-2019 <a href="#">MIS-Visayas</a>.</strong> All rights
        reserved.
      </footer>

    </div>

    @include('layouts.js-plugins')

    @yield('modals')
      {!! __html::modal_loader() !!}

    <div class="modal fade" id="change_pass_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form id="change_pass_form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Change Password</h4>
              </div>
              <div class="modal-body">
                <div class="password_container">
                  <div class="row">
                    {!! __form::textbox_password_btn(
                      '12 password', 'password', 'Password *', 'New Password', '', 'password', '', ''
                    ) !!}
                  </div>
                  <div class="row">
                    {!! __form::textbox_password_btn(
                      '12 password_confirmation', 'password_confirmation', 'Confirm New Password *', 'Confirm Password', '', 'password_confirmation', '', ''
                    ) !!}
                  </div>
                </div>
                <hr>
                <div class="row">
                  {!! __form::textbox_password_btn(
                    '12 user_password', 'user_password', 'Enter your old password to continue:', 'Enter your password', '', 'user_password', '', ''
                  ) !!}
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Confirm</button>
              </div>
            </form>
        </div>
      </div>

    <script type="text/javascript">
      const autonumericElement =  AutoNumeric.multiple('.autonumber');
      var find = '';
      @if(request()->has('find'))
        find = '{{request('find')}}';
      @endif
      function wipe_autonum(){
        $.each(autonumericElement,function (i,item) {
          item.clear();
        })
      }
      {!! __js::show_hide_password() !!}
      modal_loader = $("#modal_loader").parent('div').html();
      $("#change_pass_href").click(function (e) {
        e.preventDefault();
        $("#change_pass_modal").modal('show');
      })

      $("#change_pass_form").submit(function (e) {
        e.preventDefault();
        form = $(this);
        loading_btn(form);
        $.ajax({
            url : '{{route('dashboard.all.changePass')}}',
            data : form.serialize(),
            type: 'POST',
            headers: {
                {!! __html::token_header() !!}
            },
            success: function (res) {
               console.log(res);
               succeed(form,true,true);
              Swal.fire(
                  'Good job!',
                  'You have just made your account more secure by changing your password',
                  'success'
              );
              $("#change_pass_container").slideUp();

            },
            error: function (res) {
                console.log(res);
                errored(form,res);
            }
        })
      })

      $("#sidenav_selector").awselect({
        background: "#535c61",
        placeholder_color: "#ffffff",
        active_background:"#21526e",
        placeholder_active_color: "#fff",
        option_color:"#fff",
        immersive: true
      });
      $("#sidenav_selector").change(function () {
        th = $(this);
        th_selected = th.val();
        $.ajax({
            url : '{{route("dashboard.sidenav.change")}}',
            data : {selected : th_selected},
            type: 'POST',
            headers: {
                {!! __html::token_header() !!}
            },
            success: function (res) {
               if(res == 1){
                 window.location.reload();
               }
            },
            error: function (res) {
                console.log(res);
            }
        })
      })

      function searchSidenav() {
        var input, filter, ul, li, a, i;
        input = $("#mySearch");
        filter = input.val().toUpperCase();
        ul = $("#myMenu");
        li = $("#myMenu li.treeview");
        li.each(function () {
          a = $(this).children('a');
          searchText = a.attr('searchable');
          if (searchText.toUpperCase().indexOf(filter) > -1) {
            $(this).slideDown();
          } else {
            $(this).slideUp();
          }
        });
        if(filter == ''){
          $(".header-group").each(function () {
            $('#sidenav_search_header').slideUp();
            $(this).css('display','');
            $("#myMenu .header-navigation").slideDown();
            $("#myMenu .grouper").slideDown();
            $("#home-nav").slideDown();
          })
        }else{
          $(".header-group").each(function () {
            $('#sidenav_search_header').slideDown();
            $(this).css('display','none');
            $("#myMenu .header-navigation").slideUp();
            $("#myMenu .grouper").slideUp();
            $("#home-nav").slideUp();
          })
        }

      }
      function filterDT(datatable_object){

        let data = $("#filter_form").serialize();
        datatable_object.ajax.url("{{Request::url()}}"+"?"+data).load();

        $(".dt_filter").each(function (index,el) {
          if ($(this).val() != ''){
            $(this).parent("div").addClass('has-success');
            $(this).siblings('label').addClass('text-green');
          } else {
            $(this).parent("div").removeClass('has-success');
            $(this).siblings('label').removeClass('text-green');
          }
        });
        let withSuccess = $('.dt_filter-parent-div.has-success');
        if(withSuccess.length > 0){
          $("#filter-notifier").html(withSuccess.length+' filter(s) currently active');
        }else{
          $("#filter-notifier").html('');
        }
      }

      $("body").on("click",".close_bulletin_btn",function () {
        let btn = $(this);
        $.ajax({
            url : '{{route("dashboard.ajax.get","close_bulletin")}}',
            data: {last_slug: btn.attr('data')},
            type: 'GET',
            headers: {
                {!! __html::token_header() !!}
            },
            success: function (res) {
               btn.parent('div').remove();
            },
            error: function (res) {
                console.log(res);
            }
        })
      })

    </script>

    @yield('scripts')

  </body>

</html>