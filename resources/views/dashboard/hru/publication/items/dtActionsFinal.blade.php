<div class="btn-group">
        <a href="{{route('dashboard.publication_applicants.index',$data->slug)}}" type="button" data="{{$data->slug}}" class="btn btn-default btn-sm edit_btn" title="" data-placement="top" data-original-title="Edit">
            <i class="fa fa-users"></i>
            {{$data->applicants_count}} Applicants
        </a>
</div>