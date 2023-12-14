@extends('main')
@section('title', 'Keranjang')
@section('content')



<section class="bg-success py-5">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row justify-content-center py-5">
            <div class="col-md-9">
                @if(session('cart'))
                <table class="table text-white mb-4">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total Bayar </th>
                            <th style="width: 15px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        <!-- Inisialisasi total -->

                        @csrf
                        @foreach(session('cart') as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>Rp{{ $item['price'] }}</td>
                            <td>
                                <!-- Form untuk mengubah kuantitas -->
                                <input type="number" value="{{ $item['quantity'] }}"
                                    class="form-control quantity cart_update" data-id="{{ $item['id'] }}" min="1"
                                    disabled />
                            </td>
                            <td class="subtotal">Rp{{ number_format($item['price'], 0, ',', '.') }}
                            </td>
                            <input type="hidden" name="cart_data[total]">

                            <td>
                                <a href="{{route ('remove', $item['id'])}}" class="btn btn-danger btn-sm cart_remove"
                                    type="submit">
                                    <i class="fa fa-trash-o"></i> Delete
                                    </button>
                            </td>

                        </tr>


                        <!-- Update total -->
                        @endforeach
                        <!-- Menampilkan total pembayaran setelah loop selesai -->

                    </tbody>
                </table>
                @else
                <table class="table text-white mb-4">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total Bayar </th>
                            <th style="width: 15px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                        </tr>
                        <td>
                            <p class="text-white">Keranjang Belanjaan Kosong</p>
                        </td>
                    </tbody>
                </table>
                @endif

            </div>
        </div>

        <div class="row justify-content-center">
            <form id="whatsappForm" action="https://wa.me/6283812654522" method="GET" target="_blank">
                @csrf
                <div class="col-md-5 text-white">
                    <h2 class="fw-bold text-white">Informasi Pemesanan</h2>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan nama lengkap" name="nama_lengkap" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">No WhatsApp</label>
                        <input type="number" name="nomor" class="form-control" id="exampleFormControlInput2"
                            placeholder="Masukan Nomor WhasApp" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="exampleFormControlInput3"
                            placeholder="Masukan Alamat" required>
                    </div>
                </div>

                <div class="col-md-3 text-dark">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="fw-bold">Pembayaran</h3>
                            </div>
                            <table class="table">
                                @if(session('cart'))
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(session()->has('cart') && is_array(session('cart')))
                                    @foreach(session('cart') as $item)
                                    <tr>
                                        <td><input type="hidden" id="barang{{ $item['id'] }}" name="nama"
                                                value="{{ $item['name'] }}">{{ $item['name'] }}</td>
                                        <td><input type="hidden" id="qty{{ $item['id'] }}" name="quantity"
                                                value="{{ $item['quantity'] }}">{{ $item['quantity'] }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Jumlah Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p id="total"></p>
                                        </td>

                                    </tr>
                                </tbody>
                                @else
                                <p>Tidak Ada Data</p>
                                @endif
                            </table>

                            <button type="submit" class="btn btn-danger">Pesan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Close Banner -->



<!-- Start Section -->
<section class="container py-5">
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Pelayanan Kami</h1>
            <p>
                Nikmati pelayanan kami
            </p>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                <h2 class="h5 mt-4 text-center">Delivery Services</h2>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                <h2 class="h5 mt-4 text-center">Shipping & Return</h2>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                <h2 class="h5 mt-4 text-center">Promotion</h2>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
            </div>
        </div>
    </div>
</section>
<!-- End Section -->

@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Memanggil fungsi updateTotal saat halaman dimuat
    updateTotal();

    $(".quantity").on('input', function() {
        var id = $(this).data("id");
        var quantity = $(this).val();
        var price = $(this).closest("tr").find("td:eq(1)").text().replace('Rp', '').replace(',', '')
            .trim();
        var subtotalField = $(this).closest("tr").find(".subtotal");
        var subtotal = price * quantity;

        // Memperbarui nilai subtotal pada tampilan
        subtotalField.text('Rp' + subtotal.toLocaleString());

        // Memperbarui nilai total
        updateTotal();
    });

    function updateTotal() {
        var total = 0;
        $(".quantity").each(function() {
            var quantity = $(this).val();
            var price = $(this).closest("tr").find("td:eq(1)").text().replace('Rp', '').replace(',', '')
                .trim();
            var subtotal = price * quantity;
            total += subtotal;
        });

        // Memperbarui nilai total pada tampilan
        $("#total").text('Rp' + total.toLocaleString());
    }


});




$(document).ready(function() {
    document.getElementById('whatsappForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Hindari pengiriman form default

        var namaLengkap = document.getElementById('exampleFormControlInput1').value;
        var nomor = document.getElementById('exampleFormControlInput2').value;
        var alamat = document.getElementById('exampleFormControlInput3').value;
        var total = document.getElementById('total').textContent;

        var message = "Halo, saya ingin memesan dengan rincian:\n\n" +
            "Nama: " + namaLengkap + "\n" +
            "No. WhatsApp: " + nomor + "\n" +
            "Alamat: " + alamat + "\n" +
            "Total Pembayaran: " + total + "\n"

// Mendapatkan semua elemen <input> dengan type="hidden" yang memiliki ID yang cocok dengan pola
var inputElements = document.querySelectorAll('input[type="hidden"][id^="barang"], input[type="hidden"][id^="qty"]');

// Objek untuk menyimpan data barang dan qty
var items = {};

// Iterasi melalui semua elemen yang ditemukan
inputElements.forEach(function(input) {
    var id = input.id; // Mendapatkan ID elemen
    var value = input.value; // Mendapatkan nilai elemen

    // Mengecek apakah ID elemen adalah barang atau qty
    if (id.startsWith('barang')) {
        var number = id.replace('barang', ''); // Mengambil angka dari ID
        if (!items[number]) {
            items[number] = {}; // Inisialisasi objek jika belum ada
        }
        items[number]['barang'] = value; // Menyimpan nilai barang
    } else if (id.startsWith('qty')) {
        var number = id.replace('qty', ''); // Mengambil angka dari ID
        if (!items[number]) {
            items[number] = {}; // Inisialisasi objek jika belum ada
        }
        items[number]['qty'] = value; // Menyimpan nilai quantity
    }
});

// Menambahkan rincian barang dan quantity ke dalam pesan
for (var key in items) {
    if (items.hasOwnProperty(key)) {
        message += "Barang: " + items[key]['barang'] + "\n" +
                   "Jumlah: " + items[key]['qty'] + "\n\n";
    }
}

// Menambahkan pesan selanjutnya (nama, nomor, alamat, total, dll.)
// ...

// Menampilkan pesan yang sudah terkumpul
console.log(message);
     

        var encodedMessage = encodeURIComponent(message); // Kodekan pesan

        var url = "https://wa.me/6283812654522?text=" + encodedMessage; // URL WhatsApp

        // Hapus session 'cart' sebelum mengarahkan ke WhatsApp
        fetch("{{ route('remove') }}", {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({}),
            })
            .then(response => {
                // Setelah session dihapus, buka link WhatsApp di tab baru
                window.open(url, '_blank');
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});
</script>