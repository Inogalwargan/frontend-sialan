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
                            <form method="post" action="{{url('/pengeluaran/store')}}" class="form-horizontal">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea style="width:100%; height: 100px;" type="text" placeholder="" class="form-control" name="deskripsi"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Harga</label>
                                            <div class="col-sm-10">
                                                <input placeholder="Rp. 90000" type="text" class="form-control" name="harga">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Nota</label>
                                            <div class="col-sm-10">
                                                <input placeholder=Nota XXX type="text" class="form-control" name="nota">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group" hidden>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">ID Users</label>
                                            <div class="col-sm-10">
                                                    <input placeholder="User ID" type="text" class="form-control" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
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