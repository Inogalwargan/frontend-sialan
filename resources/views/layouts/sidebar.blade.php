<div class="sidebar" data-color="orange" data-image="{{url('adminlight/assets/img/sidebar-5.jpg')}}">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/dashboard" class="simple-text logo-mini">
                <img class="img-responsive" src="{{url('adminlight/assets/img/lg-ws.png')}}">
            </a>
            <a href="/dashboard" class="simple-text logo-normal">
                CV. SANG BARAT
            </a>
        </div>
        <div class="user">
            <div class="photo">
                <img src="{{url('adminlight/assets/img/avatar1.jpg')}}" />
            </div>
            <div class="info ">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>{{ strtoupper(Auth::user()->name) }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a class="profile-dropdown" href="#pablo">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="#pablo">
                                <span class="sidebar-mini">EP</span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a class="profile-dropdown" href="#pablo">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Settings</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="{{url('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @if(strtoupper(Auth::user()->jabatan) == 'ADMIN' || strtoupper(Auth::user()->jabatan) == 'SUPERADMIN')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
                    <i class="nc-icon nc-app"></i>
                    <p>
                        DATA MASTER 
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="componentsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{('/outlet')}}">
                                <span class="sidebar-mini">O</span>
                                <span class="sidebar-normal">Outlet</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{('/customers')}}">
                                <span class="sidebar-mini">C</span>
                                <span class="sidebar-normal">Customers</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{('/tipelaundry')}}">
                                <span class="sidebar-mini">TL</span>
                                <span class="sidebar-normal">Tipe Laundry</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
            @if(strtoupper(Auth::user()->jabatan) == 'FINANCE'  || strtoupper(Auth::user()->jabatan) == 'SUPERADMIN')
            <li class="nav-item ">
                <a class="nav-link" href="{{url('/hargalaundry')}}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>Harga Laundry</p>
                </a>
            </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/pengeluaran')}}">
                        <i class="nc-icon nc-single-copy-04"></i>
                        <p>Pengeluaran Laundry</p>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>