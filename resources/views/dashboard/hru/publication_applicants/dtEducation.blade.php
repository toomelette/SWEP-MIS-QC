@if($data->status == null)
    <span class="text-info">
        <i class="fa fa-info-circle"></i> Not yet assessed.
    </span>
@else
    @forelse($data->educationalBackground as $education)
        <dl style="margin-bottom: 0px">
            <dt><small>{{$education->level}}:</small></dt>
            <dd class="text-info">
                <small>
                    {{$education->school}}

                    @if(in_array($education->level,\App\Swep\Helpers\Arrays::educationalLevelsLimited()))
                        <br>
                        <span class="text-success">
                        {{$education->course}}
                    </span>
                    @endif
                </small>
            </dd>
        </dl>
        <hr class="no-margin">
    @empty

    @endforelse
@endif