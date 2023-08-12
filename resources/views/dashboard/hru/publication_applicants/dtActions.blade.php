@if($data->status == 'FINALIZED')
    <button type="button" class="btn btn-warning btn-block btn-sm finalize-assessment-btn" data="{{$data->slug}}" action="reassess">Re-assess</button>
@else
    <button type="button" class="btn btn-default btn-block btn-sm assess-applicant-btn" data-toggle="modal" data-target="#assess-applicant-modal" data="{{$data->slug}}">Assess applicant</button>
    @if($data->status == 'ASSESSED')
        <button type="button" class="btn btn-success btn-block btn-sm finalize-assessment-btn" data="{{$data->slug}}" action="finalize">Finalize Assessment</button>
    @endif
    @if($data->status == 'DISQUALIFIED')
        <button type="button" class="btn btn-block btn-xs btn-info disqualify-btn" data="{{$data->slug}}">Qualify</button>
    @else
        <button type="button" class="btn btn-block btn-xs btn-danger disqualify-btn" data="{{$data->slug}}">Disqualify</button>
    @endif
@endif