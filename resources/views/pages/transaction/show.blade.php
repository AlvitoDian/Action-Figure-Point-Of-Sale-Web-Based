@extends('layouts.app')

@section('content')
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Produk</h1>

                    <div class="row">

                        <div class="col-lg-12">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">{{ $product->category->name }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6" style="display:flex;
                                    justify-content:center;">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->category->name }}" class="img-fluid mt-3 mb-3 shadow-lg" style="border-radius: 10px;
                                    width: 50%;">
                                        </div>
                                        <div class="col-lg-6">
                                            <p>
                                                <div class="font-weight-bold" style="display: inline-block;">Nama Produk : </div>
                                                <div style="display: inline-block;">{{ $product->name }}</div>
                                            </p>
                                            
                                            <p>
                                                <div class="font-weight-bold" style="display: inline-block;">Stok Tersisa : </div>
                                                <div style="display: inline-block;">{{ $product->quantity }}</div>
                                            </p>
                                            
                                            <p>
                                                <div class="font-weight-bold" style="display: inline-block;">Deskripsi : </div>
                                                <div>{{ $product->description }}</div>
                                            </p>
                                            
                                            <p class="mt-5">
                                                <hr class="sidebar-divider">
                                                <div class="font-weight-bold" style="display: inline-block;">Harga</div>
                                                <div style="font-size: 50px">@money($product->price)</div>
                                            </p>

                                            <p class="mt-5">
                                                <hr class="sidebar-divider">
                                                <form action="{{ route('detail-add', $product->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <button type="submit" href="{{ url('cart') }}" class="btn btn-success btn-icon-split" style="width: 100%;"><span class="text"><i class="fas fa-cart-plus"  style="padding-right: 5px"></i>Beli</span>
                                                </button>
                                                </form>
                                            </p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                       
                        </div>

                    

                    </div>

                </div>
@endsection