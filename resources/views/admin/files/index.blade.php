@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">
        @lang('quickadmin.files.title')</h3>
    @can('file_create')
        <p>

            @if (Auth::getUser()->role_id == 2 && $userFilesCount >= 5)
                <a href="{{ route('admin.files.create') }}" class="btn btn-success disabled">@lang('quickadmin.qa_add_new')</a>
                <a href="{{ url('/admin/subscriptions') }}" class="btn btn-primary">Upgrade plan to Premium for $9.99/month</a>
            @else
                <a href="{{ route('admin.files.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
            @endif
            @if (!is_null(Auth::getUser()->role_id) && config('quickadmin.can_see_all_records_role_id') == Auth::getUser()->role_id)
                @if (Session::get('File.filter', 'all') == 'my')
                    <a href="?filter=all" class="btn btn-default">Show all records</a>
                @else
                    <a href="?filter=my" class="btn btn-default">Filter my records</a>
                @endif
            @endif
        </p>
    @endcan

    @can('file_delete')
        <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.files.index') }}"
                    style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li>
            |
            <li><a href="{{ route('admin.files.index') }}?show_deleted=1"
                    style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
        </p>
    @endcan

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('quickadmin.qa_list')
                </div>



                <div class="panel-body table-responsive">
                    <table
                        class="table table-bordered table-striped {{ count($files) > 0 ? 'datatable' : '' }} @can('file_delete') @if (request('show_deleted') != 1) dt-select @endif @endcan">
                        <thead>
                            <tr>
                                @can('file_delete')
                                    @if (request('show_deleted') != 1)
                                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                                    @endif
                                @endcan

                                <th>Filename</th>
                                {{-- <th>Folder</th> --}}
                                @if (request('show_deleted') == 1)
                                    <th>&nbsp;</th>
                                @else
                                    <th>&nbsp;</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>

                            @if (count($files) > 0)
                                @foreach ($files->reverse() as $file)
                                    <tr data-entry-id="{{ $file->id }}">
                                        @can('file_delete')
                                            @if (request('show_deleted') != 1)
                                                <td></td>
                                            @endif
                                        @endcan
                                        <td field-key='filename'>
                                            @foreach ($file->getMedia('filename') as $media)
                                                <p class="form-group">
                                                    {{ $media->name }} ({{ $media->size }} KB)
                                                </p>
                                            @endforeach
                                        </td>
                                        {{-- <td field-key='folder'>{{ $file->folder->name }}</td> --}}
                                        @if (request('show_deleted') == 1)
                                            <td>
                                                @if (Auth::getUser()->role_id == 2 && $userFilesCount >= 5)
                                                    @can('file_delete')
                                                        {!! Form::open([
                                                            'style' => 'display: inline-block;',
                                                            'method' => 'DELETE',
                                                            'onsubmit' => "return confirm('" . trans('quickadmin.qa_are_you_sure') . "');",
                                                            'route' => ['admin.files.perma_del', $file->id],
                                                        ]) !!}
                                                        {!! Form::submit(trans('quickadmin.qa_permadel'), ['class' => 'btn btn-xs btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                @else
                                                    @can('file_delete')
                                                        {!! Form::open([
                                                            'style' => 'display: inline-block;',
                                                            'method' => 'POST',
                                                            'onsubmit' => "return confirm('" . trans('quickadmin.qa_are_you_sure') . "');",
                                                            'route' => ['admin.files.restore', $file->id],
                                                        ]) !!}
                                                        {!! Form::submit(trans('quickadmin.qa_restore'), ['class' => 'btn btn-xs btn-success']) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                    @can('file_delete')
                                                        {!! Form::open([
                                                            'style' => 'display: inline-block;',
                                                            'method' => 'DELETE',
                                                            'onsubmit' => "return confirm('" . trans('quickadmin.qa_are_you_sure') . "');",
                                                            'route' => ['admin.files.perma_del', $file->id],
                                                        ]) !!}
                                                        {!! Form::submit(trans('quickadmin.qa_permadel'), ['class' => 'btn btn-xs btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                @endif
                                            </td>
                                        @else
                                            <td>

                                                @php
                                                    $media = Spatie\MediaLibrary\MediaCollections\Models\Media::where('model_id', $file->id)->first();
                                                    $urlToFile = asset('storage/' . $file->id . '/' . $media->file_name);
                                                @endphp
                                                {{-- <a href="{{ $urlToFile }}" class="btn btn-xs btn-success">View</a> --}}
                                                <a href="{{ $urlToFile }}" class="btn btn-xs btn-success view-file-btn" data-src="{{ $urlToFile }}">View</a>

                                                <a href="{{ url('/admin/' . $file->uuid . '/download') }}"
                                                    class="btn btn-xs btn-success">Download</a>


                                                @can('file_delete')
                                                    {!! Form::open([
                                                        'style' => 'display: inline-block;',
                                                        'method' => 'DELETE',
                                                        'onsubmit' => "return confirm('" . trans('quickadmin.qa_are_you_sure') . "');",
                                                        'route' => ['admin.files.destroy', $file->id],
                                                    ]) !!}
                                                    {!! Form::submit(trans('quickadmin.qa_delete'), ['class' => 'btn btn-xs btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>





            </div>

        </div>
        <div class="col-md-8">

        <div class="panel panel-default">
            <div class="panel-body text-center"> <!-- Center the content within the panel -->

            <img src="{{ Auth::check() && Auth::user()->image ? url('storage/' . Auth::user()->image) : url('images/no_img.png') }}" alt="Preview Image" style="max-width: 100%; max-height: 100%; margin: auto;" id="file-preview-img">
            <embed src="" type="" width="100%" height="100%" id="file-preview-embed"></embed>           
            <p id="preview-message" style="display: none;">Nothing to preview</p>
        </div>
    </div>

        </div>

    </div>

@stop

@section('javascript')
    <script>
        @can('file_delete')
            @if (request('show_deleted') != 1)
                window.route_mass_crud_entries_destroy =
                    '{{ route('admin.files.mass_destroy') }}';
            @endif
        @endcan
    </script>

  
<script>
    $(document).ready(function () {
        $('.view-file-btn').on('click', function (e) {
            e.preventDefault();

            var fileUrl = $(this).data('src');
            if (fileUrl) {
                var fileExtension = getFileExtension(fileUrl);

                if (isImage(fileExtension)) {
                    // It's an image, use <img>
                    $('#file-preview-img').attr('src', fileUrl).show(); // Show the image
                    $('#file-preview-embed').attr('src', ''); // Reset the src attribute for embed
                } else {
                    // It's not an image, use <embed>
                    $('#file-preview-embed').attr('src', fileUrl);
                    $('#file-preview-img').hide(); // Hide the image
                }

                $('#preview-message').hide();
            } else {
                // No file selected, show the message
                $('#file-preview-img').attr('src', '').hide(); // Reset the src attribute and hide the image
                $('#file-preview-embed').attr('src', ''); // Reset the src attribute for embed
                $('#preview-message').show();
            }
        });

        // Helper function to get file extension
        function getFileExtension(filename) {
            return filename.split('.').pop().toLowerCase();
        }

        // Helper function to check if the file is an image
        function isImage(extension) {
            return ['jpg', 'jpeg', 'png', 'gif'].includes(extension);
        }
    });
</script>
    
@endsection
