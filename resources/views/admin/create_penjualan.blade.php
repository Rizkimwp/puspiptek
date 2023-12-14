@extends('crud')

@section ('title', 'Tambah Transaksi')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="col-md-9">


                <!-- Card Informasi Produk -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product Tersedia</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- Table Produk -->
                    <div class="card-body">
                        <div class="overflow-auto" style="white-space: nowrap;">
                            <div class="d-inline-flex flex-nowrap">
                                @foreach ($barang as $detail)
                                <div class="card shadow" style="width: 18rem;">
                                    <img src="/{{$detail -> gambar}}" class="card-img-top" width="100px" height="300px"
                                        alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$detail -> nama}}</h5>
                                        <p class="card-text">Rp{{ number_format($detail->harga, 0, ',', '.') }}</p>
                                        Qty <input type="number" id="quantity_{{$detail->id}}" min="1" value="1">
                                        <a href="#"
                                            onclick="addToCheckout('{{ $detail->id }}', '{{ $detail->nama }}', '{{ $detail->harga }}')"
                                            class="btn btn-danger">Add</a>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- ... Tambahkan Card lainnya sesuai kebutuhan -->
                </div>





                <!-- /.Card Table Produk -->



                <!-- Card Informasi Penjualan -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Penjualan</h3>
                    </div>
                    <!-- /.card-header -->
                    @if(session('error'))
                    <div class="alert alert-success">
                        {{ session('error') }}
                    </div>
                    @endif
                    <!-- Table Produk -->
                    <form action="{{route ('pembayaran.checkout')}}" method="get">
                        <div class="card-body">
                            @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th> Qty </th>

                                        <th>Aksi</th>
                                        <input type="text" name="id" id="barang_id" hidden>
                                        <input type="text" name="nama[]" id="nama_barangs" hidden>
                                        <input type="text" name="harga[]" id="hargas" hidden>
                                        <input type="text" name="jumlah[]" id="quantities" hidden>
                                        <input type="text" name="total" id="totalPayment" hidden>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td id="displayId" hidden></td>
                                        <td id="displayNama"></td>
                                        <td id="displayHarga"></td>
                                        <td id="displayQty"></td>

                                        <td>
                                            <p class="btn btn-danger delete-button delete-row" hidden>Delete</p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                            <h3> Total Pembayaran</h1>
                                <h4 id="total"></h4>
                                <button class="btn btn-danger" type="submit" onclick="checkout()"
                                    hidden>Checkout</button>
                        </div>
                    </form>
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Your existing HTML code remains unchanged -->

<script>
let selectedItems = [];

function addToCheckout(id, nama, harga) {
    const quantity = document.getElementById('quantity_' + id).value;

    const item = {
        id: id,
        nama: nama,
        harga: harga,
        quantity: quantity
    };

    selectedItems.push(item);
    updateCheckoutDetails();
    bindDeleteButtons(); // Mengikat kembali tombol delete setelah menambahkan item

    // Show the "Checkout" button
    const checkoutButton = document.querySelector('.btn.btn-danger[type="submit"]');
    if (checkoutButton) {
        checkoutButton.removeAttribute('hidden');

    }

    // Show the delete button for the added item
    const deleteButton = document.querySelector('.delete-button.delete-row');
    if (deleteButton) {
        deleteButton.removeAttribute('hidden');
    }
}

function updateCheckoutDetails() {
    let displayId = [];
    let displayNama = '';
    let displayHarga = '';
    let displayQty = '';
    let totalPayment = 0;

    selectedItems.forEach((item, index) => {
        
            displayId.push(parseInt(item.id)); // Menambahkan ID baru ke dalam array jika belum ada
        
        displayNama += item.nama + '<br>';
        displayHarga += 'Rp' + item.harga + '<br>';
        displayQty += item.quantity + '<br>';
        totalPayment += item.quantity * item.harga;
    });
    
    document.getElementById('displayId').innerHTML = displayId;
    document.getElementById('displayNama').innerHTML = displayNama;
    document.getElementById('displayHarga').innerHTML = displayHarga;
    document.getElementById('displayQty').innerHTML = displayQty;
    document.getElementById('total').innerHTML = 'Rp' + totalPayment;
    document.getElementById('totalPayment').value = totalPayment;
    document.getElementById('barang_id').value = displayId ;
    // Set value for hidden input fields to be sent to the server
    const namaBarangs = selectedItems.map(item => item.nama);
    const barang_id = selectedItems.map(item => item.id);
    const hargas = selectedItems.map(item => item.harga);
    const quantities = selectedItems.map(item => item.quantity);




    document.getElementById('nama_barangs').value = JSON.stringify(namaBarangs);
    document.getElementById('hargas').value = JSON.stringify(hargas);
    document.getElementById('quantities').value = JSON.stringify(quantities);


}

function bindDeleteButtons() {
    const deleteButtons = document.querySelectorAll('.delete-row');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const row = event.target.closest('tr');
            const index = row.rowIndex - 1; // Adjusting for header row

            // Hapus nilai dari sel-sel yang sesuai tanpa menghapus baris
            row.cells[0].innerHTML = ''; // Contoh: Kolom ID
            row.cells[1].innerHTML = ''; // Contoh: Kolom Nama
            row.cells[2].innerHTML = ''; // Contoh: Kolom Harga
            row.cells[3].innerHTML = ''; // Contoh: Kolom Quantity


            selectedItems.splice(index, 1);
            // Show the "Checkout" button
         
            updateCheckoutDetails();
        });
    });
}

// Pertama kali, ikat tombol delete
bindDeleteButtons();
</script>








@endsection