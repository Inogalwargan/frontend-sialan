@extends('layouts.app_admin')

@section('content')
    <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        <small>WARNING UNTHORIZED 404</small>
                                    </h5>
                                    <div class="alert alert-danger alert-with-icon" data-notify="container">
                                        <span data-notify="icon" class="nc-icon nc-simple-remove"></span>
                                        <span data-notify="message">404 - Anda Tidak Bisa Mengakses Halaman ini Karena Anda Login Sebagai 
                                        {{ strtoupper(Auth::user()->jabatan) }}. Untuk Dapat Mengakses Halaman Ini Anda Harus Login Sebagai {{$role}} 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection