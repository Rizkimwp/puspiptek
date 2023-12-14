<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none"
                    href="mailto:ppid@brin.go.id">ppid@brin.go.id</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">0838-1265-4522</a>
            </div>
            <div>
                <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
                        class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                        class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/" target="_blank"><i
                        class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                        class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->


<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
            Puspiptek
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
            id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="\">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\shop">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\keranjang">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\kontak">Kontak</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn "  id="cartDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-shopping-cart"></i> <!-- Icon keranjang -->
                        <span class="badge bg-danger">
                            @php
                            $cartCount = count(session('cart', [])); // Mendapatkan jumlah item dalam keranjang
                            echo $cartCount; // Menampilkan jumlah item sebagai badge
                            @endphp
                        </span>
                    </button>
                    <ul class="dropdown-menu">
                        @if(session('cart'))
                        @foreach(session('cart') as $item)
                        <div class="dropdown-item">
                            <p class="text-wrap"><img src="{{$item['gambar']}}" alt="" height="40px" width="40px">{{ isset($item['name']) ? $item['name'] : 'No Name' }} -
                               <span class="text-danger"> Rp{{ number_format($item['price'], 0, ',', '.') }} </span></p>
                            <p>Qty: {{ isset($item['quantity']) ? $item['quantity'] : 'No Quantity' }}</p>
                            <hr>
                            <a class="text-decoration-none" href="{{route ('keranjang')}}">View All</a>
                        
                            
                        </div>
                        @endforeach
                        @else
                        <p class="text-center">Keranjang Belanja Kosong</p>
                        @endif
                    </ul>
                </div>


                <!-- Tombol dropdown untuk keranjang belanja -->

            </div>
        </div>

    </div>
</nav>
<!-- Close Header -->

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>