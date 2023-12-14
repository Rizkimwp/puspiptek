@extends('crud')

@section ('title', 'Update Product')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="col-md-9">

                <form action="{{route ('produk.update' , $produk -> id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                    <label for="customFile"> Foto Product: </label>
                                </div>
                                <div class="col-md-6">
                                    <p><span class="text-danger">*</span> Foto 1:1</p>
                                    <input class="form-control  @error('gambar') is-invalid @enderror" type="file"
                                        id="gambar" name="gambar">
                                </div>
                                @error('gambar')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <!--// Foto Produk -->

                            <div class="row mb-4">
                                <!-- Nama Product -->
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Nama Produk </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama" id="nama" value="{{old('nama', $produk -> nama)}}">
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
                                <!-- Kategori Product -->
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Kategori Produk
                                    </label>
                                </div>
                                <div class="col-md-6">
                                <select name="kategori_id" id="categori" class="form-control form-control-ms mb-3"
                                            aria-label="Large select example">
                                            @foreach ($categories as $category)
                                            @if (old('kategori_id', $produk -> kategori_id) == $category->id)
                                            <option value="{{$category->id}}" selected>{{$category->nama}}</option>
                                            @else
                                            <option value="{{$category->id}}">{{$category->nama}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <!-- //Kategori Product -->

                            <!-- Deskripsi Produk-->

                            <div class="row mb-4">
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Deskripsi
                                        Produk</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" rows="3" 
                                            name="deskripsi" id="deskripsi"  value="{{old('deskripsi', $produk -> deskripsi)}}">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                                    </div>
                                    @error('deskripsi')
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



                    <!-- Card Informasi Penjualan -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Penjualan</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- Table Produk -->
                        <div class="card-body">



                            <div class="row mb-4">
                                <!-- Foto Produk -->
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Harga </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                            placeholder="mohon masukan" name="harga" id="harga" value="{{old('harga' , $produk -> harga)}}">
                                    </div>
                                    @error('harga')
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
                                    <label for="customFile"><span class="text-danger">*</span> Stok</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control @error('stok') is-invalid @enderror"
                                            placeholder="mohon masukan" name="stok" id="stok" value="{{old('stok', $produk -> stok)}}">
                                    </div>
                                    @error('stok')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- //Nama Product -->



                            <div class="row mb-4">
                                <!-- Kategori Product -->
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Berat
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="number" step="1.0" class="form-control @error('berat') is-invalid @enderror"
                                            name="berat" id="berat" value="{{old('berat',$produk -> berat)}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">/kg</span>
                                        </div>
                                        @error('berat')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- //Kategori Product -->

                            <!-- Deskripsi Produk-->

                            <div class="row mb-4">
                                <div class="col-md-2">
                                    <label for="customFile"><span class="text-danger">*</span> Satuan
                                        Produk</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="satuan">
                                        <option value="kg">Kg</option>
                                        <option value="pcs">Pcs</option>
                                        <option value="ton">Ton</option>
                                    </select>
                                </div>
                                <!-- //Deskripsi Produk-->
                            </div>
                        </div>
                    </div>
                    <!-- Card Informasi Penjualan -->

                    <div class="row justify-content-end flex-nowrap">
                        <div class="col-md-1"> <a href="{{route ('produk.index')}}" class="btn btn-secondary"> Kembali
                            </a>
                        </div>
                        <div class="col-md-1"><button type="submit" class="btn btn-danger"> Perbarui </button>
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