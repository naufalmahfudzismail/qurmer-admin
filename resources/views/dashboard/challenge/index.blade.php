@extends('template.app')
@section('content')
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/master">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">challenge</span>
    </li>
</ul>

<div class="dashboard-stat2 bordered box-radius box-shadow">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">challenge</span>
                    </div>
                    <div style="text-align:right">
                        <a href="/challenge/create" class="btn btn-info btn-sm" style="margin-left:20px;margin-top:10px"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                    
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="table-index" max-width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Surat</th>
                                <th>Level</th>
                                <th>Nama challenge</th>
                                <th>Score</th>
                                <th>Waktu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->level}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->bonus_score + $data->score}}</td>
                            <td>{{$data->time}}</td>
                            <td><a href="/challenge/' . {{$data['id']}} . '/edit"><button class="btn btn-warning btn-sm edit" style="float:left;" id="' . {{$data['id']}} . '"><i class="fa fa-pencil"></i> Edit</button>
                            </a>  <a href="javascript:;"><button class="btn btn-danger btn-sm delete" id="' . {{$data['id']}} . '"><i class="fa fa-trash"></i>Hapus</button></a></td>
                            
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>

                <div class="modal fade" id="modTambah" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Tambah challenge</h4>
                            </div>
                            <form method="POST" id="sample_form">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>
                                        <div class="col-md-8">
                                            <input id="name" type="text"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="hidden_id" id="hidden_id" />
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary col-md-2" style="float:right;"
                                        id="action_button" value="Add">
                                        Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Modal Delete --}}
                <div id="confirmModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title-delete">Confirmation Delete</h2>
                            </div>
                            <div class="modal-body">
                                <form method="get" id="delete_form" class="form-horizontal">
                                    @csrf {{method_field('DELETE')}}
                                    <h4 align="center" style="margin:0;">Are you sure you want to remove this data?
                                    </h4>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="ok_button" id="ok_button" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>Delete</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                    Cancel</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function () {
        var id;
        $(document).on('click', '.delete', function(){
            event.preventDefault();
            id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#delete_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                type: "DELETE",
                url:"{{url('challenge')}}"+'/'+id,
                beforeSend:function(){
                    $('#ok_button').text('Deleting...');;
                },
                
                success:function(data)
                {
                    $('#confirmModal').modal('hide');
                    bootbox.alert({
                        message: "data berhasil di non-aktifkan",
                        size: 'medium',
                        callback: function() {
                            location.reload();
                        }
                    });
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            })
        });
    });

</script>
@endsection
