@extends('crud')

@section ('title', 'Update Kategori')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="col-md-9">

                <form action="{{route ('kategori.update' , $kategori -> id)}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Card Informasi kategori-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Categori</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- Table kategori-->
                        <div class="card-body">

                            
                            <div class="row mb-4">
                                <!-- Nama Product -->
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Nama Kategori</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" id="nama" value="{{old('nama', $kategori-> nama)}}">
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
                                <!-- Foto kategori-->
                                <div class="col-md-2">
                                    <label for="customFile"> Banner </label>
                                </div>
                                <div class="col-md-6">
                                    <p><span class="text-danger">*</span> Foto 800x800</p>
                                    <img src="/{{$kategori -> gambar}}" alt="gambar" height="100" width="50px">
                                    <input class="form-control mt-3 @error('gambar') is-invalid @enderror" type="file"
                                        id="gambar" name="gambar">
                                        @error('gambar')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                                    </div>
                            </div>
                           
                            <!--// Foto kategori-->

                            <div class="row justify-content-end flex-nowrap">
                                <div class="col-md-1"> <a href="{{route ('kategori.index')}}" class="btn btn-secondary">
                                        Kembali
                                    </a>
                                </div>
                                <div class="col-md-1"><button type="submit" class="btn btn-danger"> Perbarui </button>
                                </div>

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