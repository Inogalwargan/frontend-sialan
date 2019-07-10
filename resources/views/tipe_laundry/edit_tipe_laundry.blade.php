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
                            <form method="post" action="{{ url('/tipelaundry/update', $jsontoarray[0]["tipe_laundry_id"] ) }}" class="form-horizontal">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Nama</label>
                                            <div class="col-sm-10">
                                                @if(count($jsontoarray)> 0)
                                                    <input placeholder="Tipe Laundry" type="text" class="form-control" name="nama" value="{{$jsontoarray[0]["nama"]}}">
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