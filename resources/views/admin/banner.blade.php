@extends('app')

@section('title', 'Banner Toko')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@yield('title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center ">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header mb-2">
                            <h3 class="card-title">Banner Toko</h3>
                        </div>
                        <!-- /.card-header -->
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <!-- Tambah Detal Produk -->
                        <div class="row m-3">
                            <div class="col-md-4 my-auto">
                                <a href="#" class="btn btn-danger" data-toggle="modal"
                                    data-target="#tambahKategoriModal">
                                    <i class="nav-icon fas fa-plus"></i> Tambah Banner Baru
                                </a>
                            </div>
                        </div>
                        @error('gambar')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <!-- /. Tambah Detal Produk -->

                        <!-- Table Produk -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Judul Banner</th>
                                        <th>Deskripsi</th>
                                        <th style="width: 15px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banner as $detail)
                                    <tr>
                                        <td>{{$detail -> id}}</td>
                                        <td>{{$detail -> judul}}<img src="{{$detail -> gambar}}" alt="" height="200px"
                                                width="200px"></td>
                                        <td>{{$detail -> deskripsi}}</td>
                                        <td>
                                            <a href="{{ route('banner.edit', $detail->id) }}">Ubah</a>
                                            <form action="{{ route('banner.destroy', $detail->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn" type="submit">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.TableProduk -->
                        <div class="card-footer clearfix">
                            {{$banner-> links()}}
                        </div>
                        <!-- Modal Tambah Kategori -->
                        <div class="modal fade" id="tambahKategoriModal" tabindex="-1" role="dialog"
                            aria-labelledby="tambahKategoriModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahKategoriModalLabel">Tambah Banner Toko</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('banner.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_kategori">Judul Banner</label>
                                                <input type="text"
                                                    class="form-control  @error('judul') is-invalid @enderror"
                                                    id="judul_kategori" name="judul" placeholder="Masukkan judul banner"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="gambar_kategori">Gambar Banner</label>
                                                <input type="file"
                                                    class="form-control-file  @error('gambar') is-invalid @enderror"
                                                    id="gambar_kategori" name="gambar" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi Banner</label>
                                                <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                                    rows="3" name="deskripsi" id="deskripsi"
                                                    value="{{old('deskripsi')}}">{{old('deskripsi')}}</textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.Modal Tambah Kategori -->




                    </div>
                    <!-- /.row -->
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection