@extends('crud')

@section ('title', 'Tambah Transaksi')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="col-md-8">


                <!-- Card Informasi Produk -->
                <div class="card">
                    <form action="{{ route ('penjualan.store')}}" method="post"> 
                        @csrf
                    <div class="card-body">
                        <div class="card-title">
                            Konfirmasi Pembayaran
                        </div>
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Puspiptek
                                        <small class="float-right">Data : <?= date('d / m / Y') ?></small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>





                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Qty</th>
                                                <th>Product</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                            @php
                                            // Memisahkan string berdasarkan spasi dan karakter "[" "]"
                                            $quantities = explode(",", str_replace(['[', ']'], '', $item['quantity']));
                                            $names = explode(",", str_replace(['[', ']'], '', $item['nama']));
                                            $prices = explode(",", str_replace(['[', ']', 'Rp'], '', $item['harga']));


                                            $rowCount = max(count($quantities), count($names), count($prices));
                                            @endphp
                                            @for($i = 0; $i < $rowCount; $i++) <tr>
                                                {{-- Menampilkan quantities --}}
                                                <td>{{ isset($quantities[$i]) ? $quantities[$i] : '' }}</td>

                                                {{-- Menampilkan names --}}
                                                <td>{{ isset($names[$i]) ? $names[$i] : '' }}</td>

                                                {{-- Menampilkan prices --}}
                                                <td>Rp{{ isset($prices[$i]) ? $prices[$i] : '' }}</td>
                                                </tr>


                                                @endfor
                                                @endforeach
                                        </tbody>
                                    </table>


                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Status Pembayaran</p>

                                    <select name="status_pembayaran" class="form-select" aria-label="Default select example">
                                        <option selected>Pilih</option>
                                        <option value="lunas">Lunas</option>
                                        <option value="menunggu" selected>Pending</option>
                                        <option value="dibatalkan">Dibatalkan</option>
                                    </select>

                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead">Date : <?= date('d / m / Y') ?></p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                @foreach ($items as $item)
                                                <tr>
                                                    <input type="text" name="barang_id" value="{{  $item['id'] }}" hidden>
                                                    <input type="text" name="total_pembayaran" value="{{ $item['total'] }}" hidden>
                                                    <th style="width:50%">Subtotal:</th>
                                                    <td>Rp{{ number_format($item['total'], 0, ',', '.') }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td>Rp{{ number_format($item['total'], 0, ',', '.') }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                   
                                    <button type="submit" class="btn btn-success float-right"><i
                                            class="far fa-credit-card"></i> Submit
                                        Payment
                                    </button>
                                </div>
                            </div>
                        </div>




                    </div>
                    </form>



                    <!-- ... Tambahkan Card lainnya sesuai kebutuhan -->
                </div>




            </div>
        </div>

    </div>
    </div>
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>




@endsection