@if($data->status == null)
    <span class="text-info">
        <i class="fa fa-info-circle"></i> Not yet assessed.
    </span>
@else
    @forelse($data->eligibilities as $eligibility)
        <dl style="margin-bottom: 0px">
            <dt ><small>{{$eligibility->eligibility}}:</small></dt>
            <dd class="text-info"><small>{{$eligibility->rating}}</small></dd>
        </dl>
    @empty

    @endforelse
@endif