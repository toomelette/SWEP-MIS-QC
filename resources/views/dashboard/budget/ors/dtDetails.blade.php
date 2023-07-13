<ul style="padding-left: 15px; font-size: 12px; font-family: Consolas">
    @if($data->projectsApplied->count() > 0)
        @foreach($data->projectsApplied as $project)
            <li>
                @if($request->applied_projects == $project->pap_code)
                    <span title="{{$project->pap->pap_title ?? ''}}" style="background-color: yellow">
                        <b>{{$project->pap_code}}</b> -
                    @if($project->mooe != 0)
                            MOOE- {{number_format($project->mooe,2)}}
                        @endif
                        @if($project->co != 0)
                            CO- {{number_format($project->co,2)}}
                        @endif
                    </span>
                @else
                    <span title="{{$project->pap->pap_title ?? ''}}">
                        <b>{{$project->pap_code}}</b> -
                        @if($project->mooe != 0)
                            MOOE- {{number_format($project->mooe,2)}}
                        @endif
                        @if($project->co != 0)
                            CO- {{number_format($project->co,2)}}
                        @endif
                    </span>
                @endif
            </li>
        @endforeach
    @endif

</ul>