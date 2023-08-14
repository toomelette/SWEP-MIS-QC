
        <a href="{{route('dashboard.publication_applicants.index',$data->slug)}}" type="button" data="{{$data->slug}}" class="btn btn-default btn-sm edit_btn btn-block" title="" data-placement="top" data-original-title="Edit">
            <i class="fa fa-users"></i>
            {{$data->applicants_count}} Applicants
        </a>

    <a href="{{route('dashboard.publication.print_item',$data->slug)}}" target="_blank" type="button" data="{{$data->slug}}" class="btn btn-default btn-sm btn-block" title="" data-placement="top" data-original-title="Edit">
        <i class="fa fa-print"></i>
        Print
    </a>
