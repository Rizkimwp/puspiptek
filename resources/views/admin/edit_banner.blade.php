@extends('crud')

@section ('title', 'Tambah Admin')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="col-md-9">

                <form action="{{route ('banner.update', $banner -> id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- Card Informasi Produk -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Banner</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- Table Produk -->
                        <div class="card-body">

                            <!-- Start Form -->
                            <div class="row mb-4">
                                <!-- Foto Produk -->
                                <div class="col-md-2">
                                    <label for="customFile"> Judul </label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control  @error('judul') is-invalid @enderror" type="text"
                                        id="judul" name="judul" value="{{old('name', $banner-> judul)}}">
                                    @error('judul')
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
                                    <label for="customFile"><span class="text-danger">*</span> Foto Banner </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="file"
                                            class="form-control-file  @error('gambar') is-invalid @enderror"
                                            id="gambar_kategori" name="gambar">
                                        <div class="input-group-append">
                                        </div>
                                        @error('gambar')
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
                                    <label for="customFile"><span class="text-danger">*</span> Deskripsi
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" rows="3"
                                        name="deskripsi" id="deskripsi"
                                        value="{{old('deskripsi')}}">{{old('deskripsi', $banner -> deskripsi)}}</textarea>

                                    </select>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                </div>
                            </div>
                            <!-- //Kategori Product -->

                            <!-- Deskripsi Produk-->

                            <!-- //Deskripsi Produk-->
                            <div class="row justify-content-end flex-nowrap">
                                <div class="col-md-1"> <a href="{{route ('admin.index')}}" class="btn btn-secondary">
                                        Kembali
                                    </a>
                                </div>
                                <div class="col-md-1"><button type="submit" class="btn btn-danger"> Simpan </button>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
            <!-- /.Card Informasi Penjualan -->


            </form>
        </div>
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection