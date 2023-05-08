<ul style="padding-left: 15px; font-size: 12px; font-family: Consolas">
    @if(count($data->projectsApplied) > 0)
        @foreach($data->projectsApplied as $project)
            <li>
                <b>{{$project->pap_code}}</b> -
                @if($project->mooe != 0)
                    MOOE- {{number_format($project->mooe,2)}}
                @endif
                @if($project->co != 0)
                    CO- {{number_format($project->co,2)}}
                @endif
            </li>
        @endforeach
    @endif

</ul>