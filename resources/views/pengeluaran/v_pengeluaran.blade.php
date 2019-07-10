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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title"><i style="color: blue;" class="fa fa-star"></i> Kelola Pengeluaran <i style="color: blue;" class="fa fa-star"></i></h4>
                        </div>
                        <div class="card-header">
                            <a href="{{url('pengeluaran/add')}}" class="btn btn-wd btn-info btn-outline">
                                		<span class="btn-label">
                                			<i class="fa fa-plus"></i>
                                		</span>
                                Pengeluaran
                            </a>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr><th>Nomer</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Nota</th>
                                    <th>Nama Finance Pembuat</th>
                                    <th>Aksi</th>

                                </tr></thead>
                                <tbody>
                                @php $no = 0; @endphp
                                @if(count($jsontoarray) > 0)
                                    @for($i=0; $i<count($jsontoarray); $i++)
                                        @php $no++; @endphp
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$jsontoarray[$i]["deskripsi"]}}</td>
                                            <td>Rp.{{$jsontoarray[$i]["harga"]}}</td>
                                            <td>{{$jsontoarray[$i]["nota"]}}</td>
                                            <td>{{$jsontoarray[$i]["name"]}}</td>

                                            <td>
                                                <a href="{{action('c_pengeluaran@show', $jsontoarray[$i]["pengeluaran_id"])}}" class="btn btn-wd btn-info btn-outline">
                                                		<span class="btn-label">
                                                			<i class="fa fa-edit"></i>
                                                		</span>
                                                    Edit
                                                </a>

                                                <form action="{{action('c_pengeluaran@destroy', $jsontoarray[$i]["pengeluaran_id"])}}" method="post">
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
                                    @endfor
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection