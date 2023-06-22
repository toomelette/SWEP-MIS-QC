<div class="btn-group">
    <button type="button" data="{{$data->slug}}" class="btn btn-default btn-sm edit_btn" data-toggle="modal" data-target="#edit_modal" title="" data-placement="top" data-original-title="Edit">
        <i class="fa fa-edit"></i>
    </button>
    <button type="button" onclick="delete_data('{{$data->slug}}','{{route("dashboard.annual_budget.destroy",$data->slug)}}')" class="btn btn-sm btn-danger" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete">
        <i class="fa fa-trash"></i>
    </button>
</div>