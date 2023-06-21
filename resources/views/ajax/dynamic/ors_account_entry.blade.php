@php
    $rand = \Illuminate\Support\Str::random();
@endphp
<tr id="{{$rand}}">
    <td>
        {!! \App\Swep\ViewHelpers\__form2::selectOnly('account_entries['.$rand.'][type]',[
            'class' => 'input-sm ors_dv account_entries_'.$rand.'_type',
            'options' => [
                'ORS' => 'ORS',
                'DV' => 'DV',
            ],
            'for' => 'type',
        ],($data->type ?? $data['type'] ?? null) == 'ORS' ? 'DV' : 'ORS') !!}
    </td>
    <td>
        {!! \App\Swep\ViewHelpers\__form2::selectOnly('account_entries['.$rand.'][resp_center]',[
            'class' => 'input-sm select2_respCenter account_entries_'.$rand.'_resp_center',
            'container_class' => 'select2-sm',
            'options' => \App\Swep\Helpers\Arrays::groupedRespCodes(),
            'for' => 'resp_center',
        ],$data->resp_center ?? $data['resp_center'] ?? null) !!}
    </td>

    <td>
        {!! \App\Swep\ViewHelpers\__form2::textboxOnly('account_entries['.$rand.'][account_code]',[
            'class' => 'input-sm account_entries_'.$rand.'_account_code',
            'readonly' => 'readonly',
            'for' => 'account_code',
            'tab_index' => '-1',

        ],$data->account_code ?? $data['account_code'] ?? null) !!}
        <input for="text-value" hidden>
    </td>

    @if(request()->ajax())
        <td>
            {!! \App\Swep\ViewHelpers\__form2::selectOnly('account_entries['.$rand.'][account_title]',[
                'class' => 'input-sm select2_account_'.$rand.' account_entries_'.$rand.'_account_title',
                'options' => [],
                'container_class' => 'select2-sm',
                'for' => 'account_title',
                'select2_preSelected' => (!empty($data['select2_text'])) ?  $data['select2_text'] : '',
            ],$data->account_title ?? $data['account_code'] ?? null) !!}
        </td>
        <td>
            {!! \App\Swep\ViewHelpers\__form2::textboxOnly('account_entries['.$rand.'][debit]',[
                'class' => 'input-sm text-right autonum_'.$rand.' account_entries_'.$rand.'_debit',
                'for' => 'debit',
            ],$data->debit ?? (!empty($data['debit'])) ? \App\Swep\Helpers\Helper::sanitizeAutonum($data['debit']) : '' ) !!}
        </td>
        <td>
            {!! \App\Swep\ViewHelpers\__form2::textboxOnly('account_entries['.$rand.'][credit]',[
                'class' => 'input-sm text-right autonum_'.$rand.' account_entries_'.$rand.'_credit',
                'for' => 'credit',
            ],$data->credit ?? (!empty($data['credit'])) ? \App\Swep\Helpers\Helper::sanitizeAutonum($data['credit']) : '' ) !!}
        </td>
    @else
        <td>
            {!! \App\Swep\ViewHelpers\__form2::selectOnly('account_entries['.$rand.'][account_title]',[
                'class' => 'input-sm select2_account',
                'options' => [],
                'for' => 'account_title',
                'container_class' => 'select2-sm',
                'select2_preSelected' => (!empty($data->chartOfAccount)) ?  ($data->chartOfAccount->account_title.' | '.$data->account_code) : '',
            ],$data->account_code ?? null) !!}
        </td>
        <td>
            {!! \App\Swep\ViewHelpers\__form2::textboxOnly('account_entries['.$rand.'][debit]',[
                'class' => 'input-sm text-right autonum',
                'for' => 'debit',
            ],($data->debit == 0 || $data->debit == null || $data->debit == '') ? '' : $data->debit) !!}
        </td>
        <td>
            {!! \App\Swep\ViewHelpers\__form2::textboxOnly('account_entries['.$rand.'][credit]',[
                'class' => 'input-sm text-right autonum',
                'for' => 'credit',
            ],($data->credit == 0 || $data->credit == null || $data->credit == '') ? '' : $data->credit) !!}
        </td>
    @endif


    <td>
        <div class="btn-group">
            <button class="btn btn-default btn-sm clone_btn" type="button" title="Clone this row"><i class="fa fa-clone"></i> </button>
            <button tabindex="-1" class="btn btn-danger btn-sm remove_row_btn" type="button"><i class="fa fa-times"></i> </button>
        </div>
    </td>
</tr>

<script type="text/javascript">
    @if(request()->ajax())
        $(".autonum_{{$rand}}").each(function(){
            new AutoNumeric(this, autonum_settings);
        });

        $(".select2_account_{{$rand}}").select2({
            ajax: {
                url: '{{route("dashboard.ajax.get","account")}}',
                dataType: 'json',
                delay : 250,
            },

            placeholder: 'Select item',
        });

        $(".select2_respCenter").select2();

        $('.select2_account_{{$rand}}').on('select2:select', function (e) {
            let t = $(this);
            let parentTrId = t.parents('tr').attr('id');
            let data = e.params.data;

            $("#"+parentTrId+" [for='account_code']").val(data.id);
            $("#"+parentTrId+" [for='text-value']").val(data.text);
        });
    @endif
    $(".ors_dv").change();

</script>