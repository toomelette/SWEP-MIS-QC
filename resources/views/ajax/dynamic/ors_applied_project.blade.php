@php
$rand = \Illuminate\Support\Str::random();
@endphp
<tr  id="ap{{$rand}}">
    <td>
        {!! \App\Swep\ViewHelpers\__form2::selectOnly('applied_projects['.$rand.'][resp_center]',[
            'class' => 'input-sm resp_center_clear',
            'options' => \App\Swep\Helpers\Arrays::groupedRespCodes(),
            'for' => 'resp_center',
        ],$data->pap->responsibilityCenter->rc_code ?? null) !!}
    </td>
    @if(request()->ajax())
        <td>
            {!! \App\Swep\ViewHelpers\__form2::selectOnly('applied_projects['.$rand.'][pap_code]',[
                'class' => 'input-sm select2_clear select2_pap_code_'.$rand,
                'options' => [],
                'id' => 'select2_id_ap'.$rand,
            ],$data->pap_code ?? null) !!}
        </td>
        <td>
            {!! \App\Swep\ViewHelpers\__form2::textboxOnly('applied_projects['.$rand.'][mooe]',[
                'class' => 'input-sm text-right autonum_'.$rand,
            ],$data->mooe ?? null) !!}
        </td>
        <td>
            {!! \App\Swep\ViewHelpers\__form2::textboxOnly('applied_projects['.$rand.'][co]',[
                'class' => 'input-sm text-right autonum_'.$rand,
            ],$data->co ?? null) !!}
        </td>
        <td>
            <button class="btn btn-danger btn-sm remove_row_btn" type="button"><i class="fa fa-times"></i> </button>
        </td>
    @else
        <td>
            {!! \App\Swep\ViewHelpers\__form2::selectOnly('applied_projects['.$rand.'][pap_code]',[
                'class' => 'input-sm select2_clear select2_pap_code',
                'options' => [],
                'select2_preSelected' => (!empty($data->pap)) ? $data->pap_code.' | '.$data->pap->pap_title : '' ,
            ],$data->pap_code ?? null) !!}
        </td>
        <td>
            {!! \App\Swep\ViewHelpers\__form2::textboxOnly('applied_projects['.$rand.'][mooe]',[
                'class' => 'input-sm text-right autonum',
            ],$data->mooe ?? null) !!}
        </td>
        <td>
            {!! \App\Swep\ViewHelpers\__form2::textboxOnly('applied_projects['.$rand.'][co]',[
                'class' => 'input-sm text-right autonum',
            ],$data->co ?? null) !!}
        </td>
        <td>
            <button class="btn btn-danger btn-sm remove_row_btn" type="button"><i class="fa fa-times"></i> </button>
        </td>
    @endif
</tr>

<script type="text/javascript">
    $(".autonum_{{$rand}}").each(function(){
        new AutoNumeric(this, autonum_settings);
    });

    $(".select2_pap_code_{{$rand}}").select2({
        ajax: {
            url: function () {
                let baseUrl = "{{route('dashboard.ajax.get','pap')}}";
                let respCode = $(this).parents('tr').find('select[for="resp_center"]').val();
                return baseUrl+'?respCode='+respCode;
            },
        },
        placeholder: 'Select item',
    });

    $('.select2_pap_code_{{$rand}}').on('select2:select', function (e) {
        let t = $(this);
        let parentTrId = t.parents('tr').attr('id');
        let data = e.params.data;

        $("#"+parentTrId+" [for='account_code']").val(data.id);
    });
</script>