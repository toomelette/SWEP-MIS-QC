@forelse($data->eligibilities as $eligibility)
    <dl style="margin-bottom: 0px">
        <dt ><small>{{$eligibility->eligibility}}:</small></dt>
        <dd class="text-info"><small>{{$eligibility->rating}}</small></dd>
    </dl>
@empty

@endforelse