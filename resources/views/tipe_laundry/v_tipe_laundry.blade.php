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
                            <h4 class="card-title"><i style="color: blue;" class="fa fa-star"></i> Kelola Customers <i style="color: blue;" class="fa fa-star"></i></h4>
                        </div>
                        <div class="card-header">
                            <a href="{{url('tipelaundry/add')}}" class="btn btn-wd btn-info btn-outline">
                                		<span class="btn-label">
                                			<i class="fa fa-plus"></i>
                                		</span>
                                Tipe Laundry
                            </a>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr><th>Nomer</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>

                                </tr></thead>
                                <tbody>
                                @php $no = 0; @endphp
                                @if(count($jsontoarray) > 0)
                                    @for($i=0; $i<count($jsontoarray); $i++)
                                        @php $no++; @endphp
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$jsontoarray[$i]["nama"]}}</td>
                                            <td>
                                                <a href="{{action('c_tipe_laundry@show', $jsontoarray[$i]["tipe_laundry_id"])}}" class="btn btn-wd btn-info btn-outline">
                                                		<span class="btn-label">
                                                			<i class="fa fa-edit"></i>
                                                		</span>
                                                    Edit
                                                </a>

                                                <form action="{{action('c_tipe_laundry@destroy', $jsontoarray[$i]["tipe_laundry_id"])}}" method="post">
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