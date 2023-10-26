@extends('halaman_dashboard/index')
@section('navitem')
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Coming Soon</a>
                <a class="collapse-item" href="cards.html">Coming Soon</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="{{route('usercontrol')}}">Manage User</a>
                <a class="collapse-item" href="{{route('datamahasiswa')}}">Manage Students</a>
                <a class="collapse-item" href="{{route('manageclass')}}">Manage Class</a>
                <a class="collapse-item" href="utilities-other.html">Coming soon</a>
            </div>
        </div>
    </li>

    


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
@endsection
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Tambah data Kelas</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="forms-sample" method="POST" action="/tambahclass" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Contoh : Web Programming"
                        name="name" required>
                </div>
                <div class="form-group">
                    <label for="hari">Hari</label>
                    <input type="text" class="form-control" id="hari" placeholder="Contoh : Senin"
                        name="hari" required>
                </div>
                <div class="form-group">
                    <label for="jam">Jam</label>
                    <input type="text" class="form-control" id="jam" placeholder="Contoh : 08:00 - 10:00" name="jam"
                        required>
                </div>
                <div class="form-group">
                    <label for="ruangan">Ruangan</label>
                    <input type="text" class="form-control" id="ruangan" placeholder="Contoh : A" name="ruangan"
                        required>
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" class="form-control" id="semester" placeholder="Contoh : 4"
                        name="semester" required>
                </div>
                <div class="form-group">
                    <label for="tahunAjaran">Tahun Ajaran</label>
                    <input type="text" class="form-control" id="tahunAjaran" placeholder="Contoh : 2021/2022"
                        name="tahunAjaran" required>
                </div>
                <button type="submit" class="btn btn-primary me-2">Tambah</button>
                <a href="/manageclass" class="btn btn-light">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection