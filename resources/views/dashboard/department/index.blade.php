@extends('layouts.admin-master')

@section('content')
    
      <section class="content-header">
          <h1>Department List</h1>
      </section>

      <section class="content">

        {{-- Form Start --}}
        <form data-pjax class="form" id="filter_form" method="GET" autocomplete="off" action="{{ route('dashboard.department.index') }}">

        <div class="box" id="pjax-container">

          {{-- Table Search --}}        
          <div class="box-header with-border">
            {!! HtmlHelper::table_search(route('dashboard.department.index')) !!}
          </div>

        {{-- Form End --}}  
        </form>

          {{-- Table Grid --}}        
          <div class="box-body no-padding">
            <table class="table table-bordered">
              <tr>
                <th>@sortablelink('name', 'Name')</th>
                <th style="width: 150px">Action</th>
              </tr>
              @foreach($departments as $data) 
                <tr {!! HtmlHelper::table_highlighter( $data->slug, [ 
                        Session::get('DEPARTMENT_UPDATE_SUCCESS_SLUG')
                      ]) 
                    !!}
                >
                  <td>{{ $data->name }}</td>
                  <td> 
                    <select id="action" class="form-control input-sm">
                      <option value="">Select</option>
                      <option data-type="1" data-url="{{ route('dashboard.department.edit', $data->slug) }}">Edit</option>
                      <option data-type="0" data-action="delete" data-url="{{ route('dashboard.department.destroy', $data->slug) }}">Delete</option>
                    </select>
                  </td>
                </tr>
                @endforeach
              </table>
          </div>

          @if($departments->isEmpty())
            <div style="padding :5px;">
              <center><h4>No Records found!</h4></center>
            </div>
          @endif

          <div class="box-footer">
            <strong>Displaying {{ $departments->firstItem() > 0 ? $departments->firstItem() : 0 }} - {{ $departments->lastItem() > 0 ? $departments->lastItem() : 0 }} out of {{ $departments->total()}} Records</strong>
            {!! $departments->appends([
              'q'=> Request::get('q'),
              'sort' => Request::get('sort'),
              'order' => Request::get('order'),
              ])->render('vendor.pagination.bootstrap-4') !!}
          </div>

        </div>

    </section>

@endsection


@section('modals')

  {!! HtmlHelper::modal_delete('department_delete') !!}

@endsection 


@section('scripts')

  <script type="text/javascript">

    {{-- CALL CONFIRM DELETE MODAL --}}
    {!! JSHelper::modal_confirm_delete_caller('department_delete') !!}

    {{-- FORM VARIABLES RULE --}}
    {!! JSHelper::table_action_rule() !!}

    {{-- UPDATE TOAST --}}
    @if(Session::has('DEPARTMENT_UPDATE_SUCCESS'))
      {!! JSHelper::toast(Session::get('DEPARTMENT_UPDATE_SUCCESS')) !!}
    @endif

    {{-- DELETE TOAST --}}
    @if(Session::has('DEPARTMENT_DELETE_SUCCESS'))
      {!! JSHelper::toast(Session::get('DEPARTMENT_DELETE_SUCCESS')) !!}
    @endif

  </script>
    
@endsection