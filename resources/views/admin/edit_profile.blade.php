@extends('crud')

@section ('title', 'Profile Toko')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="col-md-9">

                <form action="{{route ('profile.update' , $profile -> id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Card Informasi Produk -->
                   
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Perbarui Profile Toko</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- Table Produk -->
                        <div class="card-body">

                            <!-- Start Form -->
                            <div class="row mb-4">
                                <!-- Foto Produk -->
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Logo </label>
                                </div>
                                <div class="col-md-6">
                                    <p><span class="text-danger">*</span> Foto 1:1</p>
                                    <input class="form-control  @error('logo') is-invalid @enderror" type="file"
                                        id="logo" name="logo" >
                                    @error('logo')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!--// Foto Produk -->

                            <div class="row mb-4">
                                <!-- Nama Product -->
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Nama Toko </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama_toko" id="nama" value="{{old('nama', $profile -> nama_toko)}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">0/255</span>
                                        </div>
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- //Nama Product -->
                            </div>



                            <div class="row mb-4">
                                <!-- Nomor Whatsap -->
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> No WhatsApp </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control @error('no_whatsapp') is-invalid @enderror"
                                            name="nomor_telepon" id="no_whatsapp" value="{{old('no_whatsapp', $profile -> nomor_telepon)}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">0/255</span>
                                        </div>
                                        @error('no_whatsapp')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- //Nomor Whatsapp -->
                            </div>


                            <div class="row mb-4">
                                <!-- Email -->
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Email </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" value="{{old('email', $profile->email)}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">0/255</span>
                                        </div>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Email -->
                            </div>


                            <!-- Alamt Toko-->
                            <div class="row mb-4">
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Alamat </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" rows="3"
                                            name="alamat" id="alamat" value="{{old('alamat', $profile->alamat)}}">{{$profile->alamat}}</textarea>
                                    </div>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <!-- //Alamat Toko-->
                            </div>

                            <!-- Deskripsi Toko -->
                            <div class="row mb-4">
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Tentang </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" rows="3"
                                            name="deskripsi" id="deskripsi" value="{{old('deskripsi', $profile -> deskripsi)}}">{{$profile->deskripsi}}</textarea>
                                    </div>
                                    @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <!-- //Deskripsi Toko-->
                            </div>

                            <div class="row justify-content-end flex-nowrap">
                                <div class="col-md-1"> <a href="{{route ('profile.index')}}" class="btn btn-secondary">
                                        Kembali
                                    </a>
                                </div>
                                <div class="col-md-1"><button type="submit" class="btn btn-danger"> Simpan </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.Card Informasi Penjualan -->


                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection