@extends('app')

@section('title', 'Data Product')

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
                            <h3 class="card-title">Data Product</h3>
                        </div>
                        <!-- /.card-header -->
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <!-- Tambah Detal Produk -->
                        <div class="row  m-3">
                            <div class="col-md-4 my-auto"> <a href="{{route('produk.create') }}"
                                    class="btn btn-danger"><i class="nav-icon fas fa-plus"></i> Tambah Produk Baru</a>
                            </div>
                        </div>

                        <!-- /. Tambah Detal Produk -->

                        <!-- Table Produk -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th style="width: 15px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $detail)
                                    <tr>
                                        <td>{{$detail -> id}}</td>
                                        <td><img src="{{$detail -> gambar}}" alt="" height="70px" width="50px">
                                            {{$detail -> nama}}</td>
                                        <td>Rp{{ number_format($detail->harga, 0, ',', '.') }}</td>
                                        <td>{{$detail -> stok}}</td>
                                        <td><a href="{{route ('produk.edit', $detail  -> id)}}">ubah</a>
                                            <form action="{{ route('produk.destroy', $detail->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button  type="submit">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.TableProduk -->
                        <div class="card-footer clearfix">
                            {{$barang -> links()}}
                        </div>

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