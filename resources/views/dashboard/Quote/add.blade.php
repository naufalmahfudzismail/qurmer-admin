@extends('template.app')
@section('content')
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/master">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="/quote">Quote</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Tambah Quote</span>
    </li>
</ul>
{{-- @if (session()->has('error')    )
    <div style="margin-top:20px" class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!! session()->get('error') !!}
        </strong>
    </div>
@endif --}}
<div class="row" style="padding:0 20px;">
    <div class="col-md-12 box-shadow box-radius" style="background:#fff;">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption" style="font-weight:bolder;padding:20px 0;">Add Article</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    <a href="javascript:;" class="reload"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-borderless">
                    <form method="POST" action="{{ route('quote.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Judul</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Gambar</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Deskripsi</label>
                            <div class="col-md-12">
                                <textarea name="description" id="description" rows="25"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Upload
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        tinymce.init({
            selector: '#description'
        });
    </script>
@endsection