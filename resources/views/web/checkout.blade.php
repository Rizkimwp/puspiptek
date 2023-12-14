@extends('main')
@section('title', 'Checkout')
@section('content')

<section class="bg-success py-5">
    <div class="container">
        <div class="row justify-content-center">
        <form id="whatsappForm" action="https://wa.me/6283812654522" method="GET" target="_blank">
    @csrf
    <div class="col-md-5 text-white">
        <h2 class="fw-bold text-white">Informasi Pemesanan</h2>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama lengkap" name="nama_lengkap" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">No WhatsApp</label>
            <input type="number" name="nomor" class="form-control" id="exampleFormControlInput2" placeholder="Masukan Nomor WhasApp" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="exampleFormControlInput3" placeholder="Masukan Alamat" required>
        </div>
    </div>

    <div class="col-md-3 text-dark">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="fw-bold">Pembayaran</h3>
                </div>
                <table class="table">
                    @if(session('checkout'))
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(session()->has('checkout') && is_array(session('checkout')))
                    @foreach(session('checkout') as $id => $item)
                        <tr>
                            <td><input type="hidden" id="barang" name="nama" value="{{ $item['nama'] }}">{{ $item['name'] }}</td>
                            <td><input type="hidden" id="qty" name="quantity" value="{{ $item['quantity'] }}">{{ $item['quantity'] }}</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>Jumlah Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="hidden" id="total" name="total" value="">Rp{{ $item['price'] * $item['quantity'] }}</td>
                            
                            @endforeach
                            @endif
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

<script>
    document.getElementById('whatsappForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Hindari pengiriman form default

        var namaLengkap = document.getElementById('exampleFormControlInput1').value;
        var nomor = document.getElementById('exampleFormControlInput2').value;
        var alamat = document.getElementById('exampleFormControlInput3').value;
        var barang = document.getElementById('barang').value;
        var qty = document.getElementById('qty').value;
        var total = document.getElementById('total').value;

        var message = "Halo, saya ingin memesan dengan rincian:\n\n" +
            "Nama: " + namaLengkap + "\n" +
            "No. WhatsApp: " + nomor + "\n" +
            "Alamat: " + alamat + "\n" +
            "Barang: " + barang + "\n" +
            "Jumlah: " + qty + "\n" +
            "Total Pembayaran: " + total;

        var encodedMessage = encodeURIComponent(message); // Kodekan pesan

        var url = "https://wa.me/6283812654522?text=" + encodedMessage; // URL WhatsApp
         // Hapus session 'checkout' sebelum mengarahkan ke WhatsApp
    fetch("{{ route('removecheckout') }}", {
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
</script>
@endsection