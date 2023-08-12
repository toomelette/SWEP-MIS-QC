@if($data->status == null)
    <span class="text-info">
        <i class="fa fa-info-circle"></i> Not yet assessed.
    </span>
@else
    @forelse($data->trainings as $training)
        @if($loop->iteration < 10)
            <dl style="margin-bottom: 0px">
                <dd>
                    <small title="{{$training->training}}">{{\Illuminate\Support\Str::limit($training->training,40,'...')}}:</small></dd>
                <dt class="text-info">
                    <small>
                        No. of hrs: {{$training->number_of_hours}}
                    </small>
                </dt>
            </dl>
            <hr class="no-margin">
        @else
            <small class="text-warning">+ {{$loop->remaining}} reminaining</small>
            @php
                break;
            @endphp
        @endif
    @empty

    @endforelse
@endif