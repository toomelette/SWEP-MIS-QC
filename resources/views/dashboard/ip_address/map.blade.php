@extends('layouts.admin-master')

@section('content')

    <section class="content-header">
        <h1>IP TABLE</h1>
    </section>
@endsection
@section('content2')

    <section class="content">
        @foreach($ips as $octet_1 => $ips_1)
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$octet_1}}</h3>
                </div>
                <div class="box-body">
                    @foreach($ips_1 as $octet_2 => $ips_2)
                        @php(ksort($ips_2))
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{$octet_1}}.{{$octet_2}}.x.x</h3>
                            </div>
                            <div class="box-body">
                                @foreach($ips_2 as $octet_3 => $ips_3)
                                    @php(ksort($ips_3))
                                    <div class="box box-solid">
                                        <div class="box-header with-border bg-green">
                                            <h3 class="box-title">{{$octet_1}}.{{$octet_2}}.{{$octet_3}}.x</h3>
                                        </div>
                                        <div class="box-body">
                                            @for($i=0;$i<256;$i++)
                                                @if(isset($ips_3[$i]))
                                                    @if(isset($duplicates[$ips_3[$i]->ip_address]))

                                                        <button class="btn btn-sx btn-danger col-md-1 col-sm-1 col-xs-2 btn-flat" data-toggle="popover" title="{{$ips_3[$i]->ip_address}}" data-content="DUPLICATE IP ADDRESS">{{$i}}</button>
                                                    @else
                                                    <button class="btn btn-sx btn-primary col-md-1 col-sm-1 col-xs-2 btn-flat" data-toggle="popover" title="{{$ips_3[$i]->ip_address}}" data-content="{{$ips_3[$i]->user}}">{{$i}}</button>
                                                    @endif
                                                @else
                                                    <button class="btn btn-sx btn-default col-md-1 col-sm-1 col-xs-2 btn-flat" disabled>{{$i}}</button>
                                                @endif

                                            @endfor
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach

    </section>


@endsection


@section('modals')

@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
@endsection