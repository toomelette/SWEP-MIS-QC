<div class="col-md-{{$cols}}" style="font-size: 14px">
    <div class="stamps">
        <small class="no-margin">
            Encoded by:
            <b>
                @if(!empty($data->creator->employee))
                    {{$data->creator->employee->lastname}}, {{$data->creator->employee->firstname}}
                @else
                    {{$data->user_created ?? '-'}}
                @endif
            </b>
        </small>
        <br>
        <small class="no-margin">
            Timestamp:
            <b>
                {{\App\Swep\Helpers\Helper::dateFormat($data->created_at) ?? '-'}}
            </b>
        </small>
    </div>
</div>
<div class="col-md-{{$cols}}"  style="font-size: 14px">

    <div class="stamps">
        <small class="no-margin">
            Last updated by:
            <b>
                @if(!empty($data->updater->employee))
                    {{$data->updater->employee->lastname}}, {{$data->updater->employee->firstname}}
                @else
                    {{$data->user_created ?? '-'}}
                @endif
            </b>
        </small>
        <br>
        <small class="no-margin">
            Timestamp:
            <b>
                {{\App\Swep\Helpers\Helper::dateFormat($data->updated_at) ?? '-'}}
            </b>
        </small>
    </div>
</div>