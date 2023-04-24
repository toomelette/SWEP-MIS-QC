@extends('layouts.admin-master')

@section('content')

    <section class="content-header">
        <h1>Summary of ORS with Projects</h1>
    </section>
@endsection
@section('content2')

    <section class="content">
        <div class="login-box">
            <div class="login-box-body">
                <form id="" method="GET" action="/summaryOfOrsWithProjects">
                    @csrf
                    <div class="row">
                        {!! \App\Swep\ViewHelpers\__form2::textbox('start',[
                            'label' => 'Date start:*',
                            'cols' => 12,
                            'required' => 'required',
                            'type'=>'date'
                        ]) !!}
                        {!! \App\Swep\ViewHelpers\__form2::textbox('end',[
                            'label' => 'Date start:*',
                            'cols' => 12,
                            'required' => 'required',
                            'type'=>'date'
                        ]) !!}
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        <i class="fa fa-search"> </i> FIND
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

    </script>
@endsection