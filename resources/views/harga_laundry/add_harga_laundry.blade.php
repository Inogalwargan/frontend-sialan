@extends('layouts.app_admin')

@section('content')

    <div class="content">
        @if(\Session::has('success'))
            <div class="col-md-12">
                <div class="alert alert-success" style="border-radius: 8px;">
                    {{\Session::get('success')}}
                    <button style="margin-right: 10px; " type="button" aria-hidden="true" class="close" data-dismiss="alert">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>
                </div>
            </div>
        @endif
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
                            <h4 class="card-title">Tambah Harga Laundry</h4>
                        </div>
                        <div class="card-body ">
                            <form method="post" action="{{ url('/hargalaundry/store')}}" class="form-horizontal">
                                <fieldset>
                                    <div class="form-group" hidden>
                                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                                        <div class="row">
                                            <label class="col-sm-2 control-label">ID Tipe Laundry</label>
                                            <div class="col-sm-10">
                                                @if(count($jsontoarray)> 0)
                                                    <input placeholder="Tipe Laundry" type="text" class="form-control" name="tipe_laundry_id" value="{{$jsontoarray[0]["tipe_laundry_id"]}}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Harga</label>
                                            <div class="col-sm-10">
                                                    <input placeholder="Rp. 2000" type="text" class="form-control" name="harga">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Jenis Laundry</label>
                                            <div class="col-sm-10">
                                                    <input placeholder="Express" type="text" class="form-control" name="jenis_kilogram">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group" hidden>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">ID Users</label>
                                            <div class="col-sm-10">
                                                @if(count($jsontoarray)> 0)
                                                    <input placeholder="Tipe Laundry" type="text" class="form-control" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
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
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr><th>Nomer</th>
                                    <th>Nama Tipe Laundry</th>
                                    <th>Harga Per Tipe Laundry</th>
                                    <th>Jenis Kilogram</th>
                                    <th>Nama Bagian Finance</th>
                                    <th>Aksi</th>

                                </tr></thead>
                                <tbody>
                                @php $no = 0; @endphp
                                @foreach($allhargalaundry as $harga)
                                        @php $no++; @endphp
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$harga["nama"]}}</td>
                                            <td>Rp. {{$harga["harga"]}}</td>
                                            <td>{{$harga["jenis_kilogram"]}}</td>
                                            <td>{{$harga["name"]}}</td>

                                            <td>
                                                <a href="{{action('c_harga_laundry@show', $harga["harga_laundry_id"])}}" class="btn btn-wd btn-info btn-outline">
                                                		<span class="btn-label">
                                                			<i class="fa fa-edit"></i>
                                                		</span>
                                                    Edit
                                                </a>
                                                <form action="{{action('c_harga_laundry@destroy', $harga["harga_laundry_id"])}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-wd btn-danger btn-outline" type="submit">
                                                             <span class="btn-label">
                                                			<i class="fa fa-trash"></i>
                                                		</span>
                                                        Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection