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
                            <h4 class="card-title">Edit Outlet</h4>
                        </div>
                        <div class="card-body ">
                            <form method="post" action="{{ url('/customers/update', $jsontoarray[0]["customers_id"] ) }}" class="form-horizontal">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="hidden" value="{{csrf_token()}}" name="_token" />

                                        <div class="row">
                                            <label class="col-sm-2 control-label">NIK</label>
                                            <div class="col-sm-10">
                                                @if(count($jsontoarray)> 0)
                                                    <input placeholder="Shampo Sunslik" type="text" class="form-control" name="nik" value="{{$jsontoarray[0]["nik"]}}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Nama</label>
                                            <div class="col-sm-10">
                                                @if(count($jsontoarray)> 0)
                                                    <input placeholder="Shampo Sunslik" type="text" class="form-control" name="nama" value="{{$jsontoarray[0]["nama"]}}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-10">
                                                @if(count($jsontoarray)> 0)
                                                    <textarea style="width:100%; height: 100px;" type="text" placeholder="Barang ini telat masuk gudang" class="form-control" name="alamat">{{$jsontoarray[0]["alamat"]}}</textarea>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">No HP</label>
                                            <div class="col-sm-10">
                                                @if(count($jsontoarray)> 0)
                                                    <input placeholder="Shampo Sunslik" type="text" class="form-control" name="nohp" value="{{$jsontoarray[0]["nohp"]}}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Kurir</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="kurir_id">
                                                    @foreach($kurir as $row)
                                                        <option value="{{$row['id']}}" {{$row['id'] == $jsontoarray[0]['kurir_id'] ? 'selected':''}}
                                                        >{{$row['name']}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
                                                @if(count($jsontoarray)> 0)
                                                    <input placeholder="" type="text" class="form-control" name="point" value="{{$jsontoarray[0]["point"]}}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Deposit</label>
                                            <div class="col-sm-10">
                                                @if(count($jsontoarray)> 0)
                                                    <input placeholder="" type="text" class="form-control" name="deposit" value="{{$jsontoarray[0]["deposit"]}}">
                                                @endif
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