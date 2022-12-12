@extends('layouts.modal-content', ['form_id'=> 'edit_menu_form', 'slug'=>$menu->slug])

@section('modal-header')
    <i class="fa {{$menu->icon}}"></i> {{$menu->name}}
@endsection

@section('modal-body')
    <div class="row">
        {!! __form::textbox(
          '12 name', 'name', 'text', 'Name: *', 'Name',$menu->name, '', '', ''
        ) !!}


        {!! __form::textbox(
          '12 route', 'route', 'text', 'Route: *', 'Route',$menu->route, '', '', ''
        ) !!}

        {!! __form::textbox(
          '12 category', 'category', 'text', 'Category: *', 'Category',$menu->category, '', '', ''
        ) !!}

        {!! __form::textbox_icon(
          '12 icon', 'icon', 'text', 'Icon: *', 'Icon',$menu->icon, '', '', ''
        ) !!}

        {!! __form::select_static(
          '6 is_menu', 'is_menu', 'Is menu: *', $menu->is_menu, [
            'No' => '0',
            'Yes' => '1',
          ], '', '', '', ''
        ) !!}

        {!! __form::select_static(
          '6 is_dropdown', 'is_dropdown', 'Is dropdown: *',$menu->is_dropdown, [
            'No' => '0',
            'Yes' => '1',
          ], '', '', '', ''
        ) !!}
        {!! \App\Swep\ViewHelpers\__form2::select('portal',[
            'label' => 'Portal',
            'cols' => 12,
            'options' => \App\Swep\Helpers\Arrays::portals(),
        ],
        $menu ?? null
        ) !!}
    </div>
@endsection

@section('modal-footer')
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
@endsection

@section('scripts')
    <script>
        $("#edit_menu_form").submit(function (e) {
            e.preventDefault();
            form = $(this);
            var slug = form.attr('data');
            var uri = "{{route('dashboard.menu.update','slug')}}";
            uri = uri.replace('slug',slug);
            $.ajax({
                url : uri,
                data : form.serialize(),
                type: 'PATCH',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    succeed(form,false,true);
                    active = res.slug;
                    menu_tbl.draw(false);
                    notify('Data change success','success');
                },
                error: function (res) {
                    errored(form,res);
                }
            })
        })
    </script>
@endsection

