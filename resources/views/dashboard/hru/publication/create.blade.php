@extends('layouts.admin-master')

@section('content')

@endsection
@section('content2')

    <section class="content">
        <div class="login-box">
            <div class="login-logo">
                <h3>Edit</h3>
            </div>

            <div class="login-box-body">
                <form id="add_publication_form">
                    @csrf
                    <div class="row">
                        {!! \App\Swep\ViewHelpers\__form2::textbox('date',[
                            'label' => 'Date:',
                            'cols' => 12,
                            'type' => 'date',
                        ]) !!}
                        {!! \App\Swep\ViewHelpers\__form2::textbox('deadline',[
                            'label' => 'Deadline:',
                            'cols' => 12,
                            'type' => 'date',
                        ]) !!}
                        <p class="page-header-sm text-info text-strong col-md-12" style="border-bottom: 1px solid #cedbe1">
                            Address Application to:
                        </p>
                        {!! \App\Swep\ViewHelpers\__form2::textbox('send_to',[
                            'label' => 'Name:',
                            'cols' => 12,
                        ]) !!}
                        {!! \App\Swep\ViewHelpers\__form2::textbox('send_to_position',[
                            'label' => 'Position:',
                            'cols' => 12,
                        ]) !!}

                        {!! \App\Swep\ViewHelpers\__form2::textbox('send_to_address',[
                            'label' => 'Address:',
                            'cols' => 12,
                        ]) !!}
                        {!! \App\Swep\ViewHelpers\__form2::textbox('send_to_email',[
                            'label' => 'Email:',
                            'cols' => 12,
                        ]) !!}
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        <i class="fa fa-check"> </i> SAVE
                    </button>
                </form>

            </div>

        </div>

    </section>

@endsection


@section('modals')

@endsection

@section('scripts')
    <script type="text/javascript">
        $("#add_publication_form").submit(function (e) {
            e.preventDefault()
            let form = $(this);
            loading_btn(form);
            $.ajax({
                url : '{{route("dashboard.publication.store")}}',
                data : form.serialize(),
                type: 'POST',
                headers: {
                    {!! __html::token_header() !!}
                },
                success: function (res) {
                    let link = '{{route('dashboard.publication.edit','slug')}}';
                    link = link.replace('slug',res.slug);
                    window.location.href = link;
                },
                error: function (res) {
                    errored(form,res);
                }
            })
        })
    </script>
@endsection