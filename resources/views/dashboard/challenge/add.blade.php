@extends('template.app')
@section('content')
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/master">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="/challenge">Challenge</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Tambah Challenge</span>
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
                <div class="caption" style="font-weight:bolder;padding:20px 0;">Tambah Challenge</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    <a href="javascript:;" class="reload"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-borderless">
                    <form method="POST" action="{{ route('challenge.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Pilih Surat</label>
                            <div class="col-md-6">
                                <select id="surah_id" name="surah_id" style="padding:6px;width:100%">
                                    @foreach($surahs as $surah)
                                    <option value="{{$surah['id']}}">{{$surah['nama']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Pilih Tipe Challenge</label>
                            <div class="col-md-6">
                                <select id="level_id" name="level_id" style="padding:6px;width:100%">
                                    @foreach($levels as $level)
                                    <option value="{{$level['id']}}">Level {{$level['id']}} : {{$level['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">Score atau Point</label>
                            <div class="col-md-12">
                                <input class="form-control" type="number" id="score" name="score">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">Waktu Challenge dalam Menit</label>
                            <div class="col-md-12">
                                <input class="form-control" type="number" id="time" name="time" min="1" max="60">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">Peringatan setiap hari</label>
                            <div class="col-md-12">
                                <input class="form-control" type="checkbox" id="daily" name="daily">
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