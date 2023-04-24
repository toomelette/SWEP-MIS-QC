@php
    $rand = \Illuminate\Support\Str::random();
@endphp
<tr id="{{$rand}}">
    <td>
        {!! \App\Swep\ViewHelpers\__form2::selectOnly('account_entries['.$rand.'][type]',[
            'class' => 'input-sm',
            'options' => [
                'ORS' => 'ORS',
                'DV' => 'DV',
            ]
        ],$data->type ?? null) !!}
    </td>
    <td>
        {!! \App\Swep\ViewHelpers\__form2::selectOnly('account_entries['.$rand.'][resp_center]',[
            'class' => 'input-sm',
            'options' => \App\Swep\Helpers\Arrays::groupedRespCodes(),
        ],$data->resp_center ?? null) !!}
    </td>

    <td>
        {!! \App\Swep\ViewHelpers\__form2::textboxOnly('account_entries['.$rand.'][account_code]',[
            'class' => 'input-sm',
            'readonly' => 'readonly',
            'for' => 'account_code',
        ],$data->account_code ?? null) !!}
    </td>

    @if(request()->ajax())
        <td>
            {!! \App\Swep\ViewHelpers\__form2::selectOnly('account_entries['.$rand.'][account_title]',[
                'class' => 'input-sm select2_account_'.$rand,
                'options' => [],
            ],$data->account_title ?? null) !!}
        </td>
        <td>
            {!! \App\Swep\ViewHelpers\__form2::textboxOnly('account_entries['.$rand.'][debit]',[
                'class' => 'input-sm text-right autonum_'.$rand,
            ],$data->debit ?? null) !!}
        </td>
        <td>
            {!! \App\Swep\ViewHelpers\__form2::textboxOnly('account_entries['.$rand.'][credit]',[
                'class' => 'input-sm text-right autonum_'.$rand,
            ],$data->credit ?? null) !!}
        </td>
    @else
        <td>
            {!! \App\Swep\ViewHelpers\__form2::selectOnly('account_entries['.$rand.'][account_title]',[
                'class' => 'input-sm select2_account',
                'options' => [],
                'select2_preSelected' => (!empty($data->chartOfAccount)) ?  ($data->chartOfAccount->account_title.' | '.$data->account_code) : '',
            ],$data->account_code ?? null) !!}
        </td>
        <td>
            {!! \App\Swep\ViewHelpers\__form2::textboxOnly('account_entries['.$rand.'][debit]',[
                'class' => 'input-sm text-right autonum',
            ],$data->debit ?? null) !!}
        </td>
        <td>
            {!! \App\Swep\ViewHelpers\__form2::textboxOnly('account_entries['.$rand.'][credit]',[
                'class' => 'input-sm text-right autonum',
            ],$data->credit ?? null) !!}
        </td>
    @endif


    <td>
        <button class="btn btn-danger btn-sm remove_row_btn" type="button"><i class="fa fa-times"></i> </button>
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

        $('.select2_account_{{$rand}}').on('select2:select', function (e) {
            let t = $(this);
            let parentTrId = t.parents('tr').attr('id');
            let data = e.params.data;

            $("#"+parentTrId+" [for='account_code']").val(data.id);
        });
    @endif


</script>