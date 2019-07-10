@extends('layouts.app_admin')

@section('content')

    <div class="content">
        @if (count($errors) > 0)
            <div class="col-md-12">
                <div class="alert alert-danger" style="border-radius: 8px;">
                    <button style="margin-right: 10px; " type="button" aria-hidden="true" class="close" data-dismiss="alert">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Tambah Outlet</h4>
                        </div>
                        <div class="card-body ">
                            <form method="post" action="{{url('/outlet/store')}}" class="form-horizontal">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Kode</label>
                                            <div class="col-sm-10">
                                                <input placeholder="001S" type="text" class="form-control" name="kode">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input placeholder="Alan Walker" type="text" class="form-control" name="nama">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10" readonly="">
                                                <input placeholder="Aktif" type="text" class="form-control" name="status">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea style="width:100%; height: 100px;" type="text" placeholder="" class="form-control" name="alamat"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">No Hp</label>
                                            <div class="col-sm-10">
                                                <input placeholder="081xxx xxxx xxx" type="text" class="form-control" name="nohp">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <button class="btn btn-wd btn-success btn-outline" type="submit"><span class="btn-label">
                                        	<i class="fa fa-check"></i>
                                        </span>
                                    Tambah</button>
                                <button class="btn btn-wd btn-danger btn-outline" type="reset"><span class="btn-label">
                                        	<i class="fa fa-trash"></i>
                                        </span>
                                    Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection