@php
    $announcements = \App\Models\News::query()
                ->where('expires_on','>',\Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'))
                ->where('is_active','=',1);
    $an = $announcements;
    $announcements = $announcements->get();
    if($announcements->count() < 1){
        return;
    }
    $last_slug = $an->orderBy('id','desc')->first()->slug;
    $ct = 0;
@endphp
@if(\Illuminate\Support\Facades\Session::get('last_slug') != $last_slug)
    @if($announcements->count() > 0)

            <div data-notify="container" class="callout callout-success" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #939393;border-right: 1px solid #939393;z-index: 5000;
              padding: 10px; min-width: 300px;
              box-shadow: 5px 10px 18px #888888;bottom: 40px; color: black !important;right: 20px;border-top: 1px solid #939393;background-color: #effff7 !important;">
                <button type="button" class="close close_bulletin_btn" data="{{$last_slug}}" data-dismiss="alert" aria-hidden="true">×</button>
                <span data-notify="icon"></span>
                <span data-notify="title"></span>
                <p class="no-margin"><i class="fa fa-bell-o"></i> Bulletin:</p>

                @foreach($announcements as $announcement)
                    @php($ct++)
                    <a href="{{route('dashboard.home')}}?initiator={{$announcement->slug}}" target="_blank">
                        <div class="news">
                            <h4 style="color: black">{{\Illuminate\Support\Str::limit($announcement->title,30,'...')}}</h4>
                            <p style="color: black">{!! \Illuminate\Support\Str::limit(strip_tags($announcement->details),60,' ...') !!}.</p>
                        </div>
                    </a>
                @endforeach
                <a href="#" target="_blank" data-notify="url"></a>
            </div>


    @endif
@endif
