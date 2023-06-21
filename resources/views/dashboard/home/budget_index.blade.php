@extends('layouts.admin-master')

@section('content')

    <section class="content-header">
        <h1>Dashboard</h1>
    </section>
@endsection
@section('content2')


    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>111</h3>
                        <p>SAMPLE DATA 1</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>

                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>222</h3>

                        <p>SAMPLE DATA 2</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-ioxhost"></i>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>333</h3>
                        <p>SAMPLE DATA 3</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-text-o"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>444</h3>

                        <p>SAMPLE DATA 4</p>
                    </div>
                    <div class="icon">
                        <i class="fa  fa-hand-o-right"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(!empty($orsNoErrors))
                    <div class="callout callout-danger">
                        <h4><i class="fa fa-warning"></i> Warning | The system has found some errors with the following ORS Number:</h4>
                        @foreach($orsNoErrors as $orsNoError)
                        <p>
                            <a href="{{route('dashboard.ors.index')}}?find={{$orsNoError->ors_no}}" target="_blank"><span class="text-strong">{{$orsNoError->ors_no}}</span> - {{$orsNoError->payee}} ----- {{$orsNoError->particulars}}</a>
                        </p>
                        @endforeach
                    </div>
                @endif

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