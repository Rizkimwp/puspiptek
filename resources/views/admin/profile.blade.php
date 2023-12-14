@extends('app')
@section('title', 'Profile Toko')
@section('content')
<div class="content-wrapper" style="min-height: 1604.62px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    
                    <!-- Profile Image -->
                    @foreach ($profile as $profil)
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{$profil -> logo}}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$profil -> nama_toko}}</h3>

                            <p class="text-muted">
                                {{$profil -> deskripsi}}
                            </p>

                            <a href="{{route ('profile.edit', $profil -> id)}}" class="btn btn-primary btn-block"><b>Perbarui</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tentang Toko</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat </strong>

                            <p class="text-muted">
                                {{$profil -> alamat}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-phone mr-1"></i> Nomor WhatsApp</strong>

                            <p class="text-muted">{{$profil -> nomor_telepon}}</p>

                            <hr>

                            <strong><i class="fas fa-mail-bulk mr-1"></i> Email</strong>

                            <p class="text-muted">
                                {{$profil -> email}}
                            </p>



                        </div>
                        <!-- /.card-body -->
                    </div>
                    @endforeach
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection