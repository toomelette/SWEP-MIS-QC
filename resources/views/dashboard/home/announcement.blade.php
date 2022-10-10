@php
$announcements = \App\Models\News::query()
            ->where('expires_on','>',\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'))
            ->where('is_active','=',1)
            ->orderBy('created_at','desc')
            ->get();
$ct = 0;
$max = 2;
@endphp

@if($announcements->count() > 0)
        <div class="panel" >
            <div class="panel-body">
                <label><span><i class="fa fa-bell-o"></i> Bulletin:</span></label>
                <hr class="no-margin" style="margin-bottom: 10px !important;">
                <div style="overflow-x: hidden; max-height: 350px" >
                    @foreach($announcements as $announcement)
                        @php($ct++)
                    <div class="box box-widget {{($ct > 0) ? 'collapsed-box' : ''}}" style="border: 1px solid #d7d7d7"
                         @if(\Illuminate\Support\Facades\Request::get('initiator') == $announcement->slug)
                         data-step="1"
                            data-intro="{{$announcement->title}}"
                         @endif
                    >

                        <div class="box-header with-border">
                            <div class="user-block">
                                <span class="username" style="margin-left: 0"><a href="#" data-widget="collapse">{{$announcement->title}}</a></span>
                                <span class="description" style="margin-left: 0">
                                    Posted:
                                    {{\Illuminate\Support\Carbon::parse($announcement->created_at)->format('F d, Y | h:i A')}}
                                    -
                                    Expires on: {{\Illuminate\Support\Carbon::parse($announcement->expires_on)->format('F d, Y | h:i A')}}
                                </span>
                                <span class="text-info small">{{$announcement->author}} {{($announcement->author_position != '')? ' - '.$announcement->author_position : ''}}</span>
                            </div>

                            <div class="box-tools">
                                <button type="button" id="hide_show_{{$announcement->slug}}" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"> </i> Hide/Show
                                </button>
                            </div>

                        </div>

                        <div class="box-body" {{($ct > 0) ? 'style=display:none' : ''}}>
                            <p>{!! $announcement->details !!} </p>

                            @if($announcement->attachments->count() > 0)
                            <label><i class="fa fa-paperclip"></i> Attachments [{{$announcement->attachments->count()}}]:</label>
                                <div class="row">
                                    @foreach($announcement->attachments as $attachment)
                                    <div class="col-md-4">
                                        <div class="clearfix attatchment-horizontal">
                                            <div>
                                                <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                                            </div>
                                            <div>
                                                <div class="mailbox-attachment-info">
                                                    <a href="{{route('dashboard.news.view_doc',$attachment->id)}}" target="_blank" class="mailbox-attachment-name">
                                                        <i class="fa fa-paperclip"></i>
                                                        {{\Illuminate\Support\Str::limit($attachment->file,40,'...')}}
                                                    </a>
                                                    <span class="mailbox-attachment-size">

                                                      <a href="{{route('dashboard.news.view_doc',$attachment->id)}}?download=true" target="_blank" class="download_attendance btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download fa-fw"></i> Download</a>
                                                      <a style="margin-right: 5px" href="{{route('dashboard.news.view_doc',$attachment->id)}}" target="_blank" class="download_attendance btn btn-default btn-xs pull-right"><i class="fa fa-file-text fa-fw"></i> View</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            @endif

                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>

@endif