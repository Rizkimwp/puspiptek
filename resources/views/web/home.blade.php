@extends('main')
@section('title', 'Home')
@section('content')
<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @foreach ($banner as $detail)
        @if ($detail -> id === 2)
        <div class="carousel-item active">
            @else
            <div class="carousel-item">
                @endif
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{$detail -> gambar}}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success">{{$detail -> judul}}</h1>
                            
                            <p>
                               {{$detail -> deskripsi}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Kategori </h1>
            <p>
                Dapatkan perlengkapan kantor berkualitas tinggi dengan harga yang terjangkau. 
            </p>
        </div>
    </div>
    <div class="row">
        @foreach ($kategori as $detail)
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="{{$detail -> gambar}}" height="800px" width="800px"
                    class="rounded-circle img-fluid border"></a>
            <h5 class="text-center mt-3 mb-3">{{$detail -> nama}}</h5>
            <p class="text-center"><a href="{{route ('showkategori' , $detail -> id)}}" class="btn btn-success">Go Shop</a></p>
        </div>
        @endforeach
    </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Barang Bekas Berkualitas</h1>
                <p>
                Dapatkan perlengkapan kantor berkualitas tinggi dengan harga yang terjangkau. 
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($produk as $detail)
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="/shop">
                        <img src="{{$detail -> gambar}}" class="card-img-top" alt="gambar" height="400px" width="400px">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                            <li class="text-muted text-right">Rp{{ number_format($detail->harga, 0, ',', '.') }}</li>
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">{{$detail -> nama}}</a>
                        <p class="card-text">
                           {{$detail -> berat . $detail -> satuan}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
</section>
<!-- End Featured Product -->

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