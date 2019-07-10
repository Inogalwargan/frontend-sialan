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
                                    <h4 class="card-title">Tambah To Do List</h4>
                                </div>
                                <div class="card-body ">
                                    <form method="post" action="{{url('/addtodo/store')}}" class="form-horizontal">
                                        <fieldset>
                                            <div class="form-group">
                                            	<input type="hidden" value="{{csrf_token()}}" name="_token" />
                                                <div class="row">
                                                    <label class="col-sm-2 control-label">Aktifitas</label>
                                                    <div class="col-sm-10">
                                                        <input placeholder="Belajar" type="text" class="form-control" name="activity">
                                                        <small class="form-text text-muted">Nama Aktifitas Tidak Boleh Menggunakan Karakter Khusus</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-2 control-label">Deskripsi</label>
                                                    <div class="col-sm-10">
                                                        <textarea style="width:100%; height: 100px;" type="text" placeholder="Hari Aku Belajar Lumen" class="form-control" name="description"></textarea>
                                                        <small class="form-text text-muted">Tulis Keterangan Tentang Aktifitas Yang Dilakukan</small>
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