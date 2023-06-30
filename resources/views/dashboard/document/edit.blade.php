@php($rand = \Illuminate\Support\Str::random())
@extends('layouts.modal-content',['form_id' => 'edit_document_form_'.$rand , 'slug' => $document->slug])

@section('modal-header')
{{($document->reference_no != '') ? $document->reference_no : $document->subject}} - Edit
@endsection

@section('modal-body')
    <input name="slug" value="{{$document->slug}}" hidden>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                {!! \App\Swep\ViewHelpers\__form2::textbox('reference_no',
                  [
                      'label' => 'Reference no:',
                      'cols' => 8,
                  ],
                  $document
                ) !!}
                {!! \App\Swep\ViewHelpers\__form2::textbox('date',
                  [
                      'label' => 'Document Date:',
                      'cols' => 4,
                      'type' => 'date',
                  ],
                  $document
                ) !!}
            </div>
            <div class="row">
                {!! \App\Swep\ViewHelpers\__form2::textbox('person_to',
                  [
                      'label' => 'To:',
                      'cols' => 6,
                  ],
                  $document
                ) !!}
                {!! \App\Swep\ViewHelpers\__form2::textbox('person_from',
                  [
                      'label' => 'From:',
                      'cols' => 6,
                  ],
                  $document
                ) !!}
            </div>
            <div class="row">
                {!! \App\Swep\ViewHelpers\__form2::select('type',
                  [
                      'label' => 'Document type:',
                      'cols' => 6,
                      'options' => \App\Swep\Helpers\__static::document_types(true),
                  ],
                  $document
                ) !!}

                {!! \App\Swep\ViewHelpers\__form2::textbox('subject',
                  [
                      'label' => 'Subject:',
                      'cols' => 12,
                  ],
                $document
                ) !!}
            </div>
            <div class="row">
                {!! \App\Swep\ViewHelpers\__form2::select('folder_code',[
                    'label' => 'Folder Code:',
                    'cols' => 6,
                    'options' => \App\Swep\Helpers\Helper::folderCodesArray(),
                    'class' => 'select2_'.$rand,
                ],
                $document) !!}

                {!! \App\Swep\ViewHelpers\__form2::select('folder_code2',[
                    'label' => '2nd Folder Code (If Cross-File) :',
                    'cols' => 6,
                    'options' => \App\Swep\Helpers\Helper::folderCodesArray(),
                    'class' => 'select2_'.$rand,
                ],
                $document) !!}
            </div>
            <div class="row">
                {!! \App\Swep\ViewHelpers\__form2::textbox('remarks',[
                    'label' => 'Remarks:',
                    'cols' => 12,
                ],
                $document) !!}

            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="file-loading">
                        <input id="doc_file_{{$rand}}" name="doc_file_{{$rand}}" type="file" multiple>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal-footer')
    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Save</button>
@endsection

@section('scripts')
<script type="text/javascript">
    $('.select2_{{$rand}}').select2({
        dropdownParent: $('#edit_document_modal')
    });
    let url1_{{$rand}} = '{{route("dashboard.document.view_file",$document->slug)}}';
    uploader_{{$rand}} = $("#doc_file_{{$rand}}").fileinput({
        // uploadUrl: "",
        enableResumableUpload: false,
        resumableUploadOptions: {
            // uncomment below if you wish to test the file for previous partial uploaded chunks
            // to the server and resume uploads from that point afterwards
            // testUrl: "http://localhost/test-upload.php"
        },
        uploadExtraData: {

        },
        maxFileCount: 1,
        minFileCount: 0,
        showCancel: false,
        theme: 'fa',
        browseOnZoneClick: false,
        showBrowse: false,
        showCaption: false,
        showRemove: false,
        showUpload: false,
        uploadAsync: false,
        initialPreview: [url1_{{$rand}}],
        overwriteInitial: false,
        initialPreviewAsData: true,
        dropZoneEnabled : false,
        initialPreviewConfig: [
            {
                caption: "{{$document->filename}}",
                downloadUrl: url1_{{$rand}},
                type : '{{(strtolower(substr($document->filename, strrpos($document->filename, '.') + 1)) == "pdf")? "pdf" : "image"}}',
            },
        ],
    }).on('fileloaded', function(event, previewId, index, fileId) {
        $("#edit_document_form_{{$rand}} input[name='_changed']").val('true');
    })

    $("#edit_document_form_{{$rand}}").submit(function (e) {
        e.preventDefault();
        let form = $(this);
        let uri = '{{route('dashboard.document.update','slug')}}';
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
                succeed(form,false,true);
                active = res.slug;
                setTimeout(function () {
                    documents_tbl.draw(false);
                },500)
            },
            error: function (res) {
                errored(form,res);
            }
        })

    })
</script>
@endsection

