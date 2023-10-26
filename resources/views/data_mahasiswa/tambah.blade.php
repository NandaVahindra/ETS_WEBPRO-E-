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
            <h4 class="card-title mb-4">Tambah data Mahasiswa</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="forms-sample" method="POST" action="/tambahdama" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Name</label>
                    <input type="text" class="form-control" id="nama" placeholder="Name Example"
                        name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="name@example.com"
                        name="email" required>
                </div>
                <div class="form-group">
                    <label for="nim">NRP</label>
                    <input type="number" class="form-control" id="nim" placeholder="8 digit NRP" name="NRP"
                        required>
                </div>
                <div class="form-group">
                    <label for="angkatan">Batch</label>
                    <input type="number" class="form-control" id="angkatan" placeholder="2021" name="Batch"
                        required>
                </div>
                <div class="form-group">
                    <label for="jurusan">Major</label>
                    <input type="text" class="form-control" id="jurusan" placeholder="Teknik Informatika"
                        name="Major" required>
                </div>
                <button type="submit" class="btn btn-primary me-2">Tambah</button>
                <a href="/datamahasiswa" class="btn btn-light">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection