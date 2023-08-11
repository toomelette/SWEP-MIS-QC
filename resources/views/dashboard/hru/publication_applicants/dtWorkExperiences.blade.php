@forelse($data->workExperiences as $work)

    <dl style="margin-bottom: 0px">
        <dt >
            <small title="{{$work->company}}">
                {{\Illuminate\Support\Str::limit($work->company,'25','...')}}:
            </small>
        </dt>
        <dd class="text-info">
            <small>
                {{\App\Swep\Helpers\Helper::dateFormat($work->from,'m/d/Y')}}
                @if(!empty($work->to))

                    to {{\App\Swep\Helpers\Helper::dateFormat($work->to,'m/d/Y')}} -

                    {{\Illuminate\Support\Str::remove('before',\Illuminate\Support\Carbon::parse($work->from)->diffForHumans(\Illuminate\Support\Carbon::parse($work->to),null,true))}}
                @endif
            </small></dd>
    </dl>

@empty

@endforelse