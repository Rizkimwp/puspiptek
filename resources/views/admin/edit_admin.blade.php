@extends('crud')

@section ('title', 'Tambah Admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="col-md-9">

                <form action="{{route ('admin.update', $admin -> id)}}" method="post">
                    @csrf
                    method('put')
                    <!-- Card Informasi Produk -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Product</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- Table Produk -->
                        <div class="card-body">

                            <!-- Start Form -->
                            <div class="row mb-4">
                                <!-- Foto Produk -->
                                <div class="col-md-2">
                                    <label for="customFile"> Nama Admin </label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control  @error('name') is-invalid @enderror" type="text"
                                        id="name" name="name" value="{{old('name', $admin-> nama)}}">
                                        @error('name')
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
                                    <label for="customFile"><span class="text-danger">*</span> Email </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" value="{{old('email', $admin-> nama)}}">
                                        <div class="input-group-append">
                                        </div>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- //Nama Product -->
                            </div>


                            <div class="row mb-4">
                                <!-- Kategori Product -->
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Role
                                    </label>
                                </div>
                                <div class="col-md-6">
                                <select name="role" id="role" class="form-control"
                                            aria-label="Large select example">
                                            <option value="admin" selected>admin</option>
                                          
                                        </select>
                                </div>
                            </div>
                            <!-- //Kategori Product -->

                            <!-- Deskripsi Produk-->

                            <div class="row mb-4">
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Password
                                      </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" rows="3"
                                            name="password" id="password"></textarea>
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <!-- //Deskripsi Produk-->
                            </div>
                        </div>
                    </div>
                    <!-- /.Card Informasi Penjualan -->


                    <div class="row justify-content-end flex-nowrap">
                        <div class="col-md-1"> <a href="{{route ('admin.index')}}" class="btn btn-secondary"> Kembali
                            </a>
                        </div>
                        <div class="col-md-1"><button type="submit" class="btn btn-danger"> Simpan </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection