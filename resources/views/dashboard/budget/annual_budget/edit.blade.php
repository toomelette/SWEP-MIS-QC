@php
    $rand = \Illuminate\Support\Str::random();
@endphp
@extends('layouts.modal-content',['form_id' => 'edit_form_'.$rand, 'slug' => $ab->slug])

@section('modal-header')
    Edit
@endsection

@section('modal-body')
    <div class="row">
        {!! \App\Swep\ViewHelpers\__form2::select('year',[
            'cols' => '3',
            'label' => 'Year:',
            'options' => 'year',
        ],$ab ?? null) !!}
        {!! \App\Swep\ViewHelpers\__form2::select('department',[
            'cols' => '9',
            'label' => 'Department:',
            'options' => \App\Swep\Helpers\Arrays::departmentList(),
        ],$ab ?? null) !!}

        {!! \App\Swep\ViewHelpers\__form2::select('account_code',[
            'cols' => '12',
            'label' => 'Account:',
            'options' => \App\Swep\Helpers\Arrays::chartOfAccounts(),
            'id' => 'select2_chart_of_accounts_'.$rand,
        ],$ab ?? null) !!}

        {!! \App\Swep\ViewHelpers\__form2::textbox('amount',[
            'cols' => '6',
            'label' => 'Amount:',
            'class' => 'text-right autonum_'.$rand,
        ],$ab ?? null) !!}
    </div>

@endsection

@section('modal-footer')
    <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-check"></i> Save</button>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".autonum_{{$rand}}").each(function(){
            new AutoNumeric(this, autonum_settings);
        });
        
        $("#edit_form_{{$rand}}").submit(function (e) {
            e.preventDefault();
            let form = $(this);
            let uri = '{{route("dashboard.annual_budget.update","slug")}}';
            uri = uri.replace('slug',form.attr('data'));
            loading_btn(form);
            $.ajax({
                url : uri,
                data : form.serialize(),
                type: 'PATCH',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    succeed(form,true,true);
                    active = res.slug;
                    annual_budget_tbl.draw(false);
                    toast('info','Data successfully updated.','Updated');
                },
                error: function (res) {
                    errored(form,res);
                }
            })
        
        })

        $("#select2_chart_of_accounts_{{$rand}}").select2({
            dropdownParent : $("#edit_modal"),
        })
    </script>
@endsection

