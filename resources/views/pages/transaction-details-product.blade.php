@extends('layouts.app')

@section('content')
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">{{ $productTransDetails->code }}</h1>

                    <div class="row">

                        <div class="col-lg-12">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">{{ $productTransDetails->product->category->name }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6" style="display:flex;
                                    justify-content:center;">
                                            <img src="{{ asset('storage/' . $productTransDetails->product->image) }}" alt="{{ $productTransDetails->product->category->name }}" class="img-fluid mt-3 mb-3 shadow-lg" style="border-radius: 10px;
                                    width: 50%;">
                                        </div>
                                        <div class="col-lg-6">
                                            <p>
                                                <div class="font-weight-bold" style="display: inline-block;">Pembeli : </div>
                                                <div style="display: inline-block;">{{ $productTransDetails->transaction->user->name }}</div>
                                            </p>
                                            
                                            <p>
                                                <div class="font-weight-bold" style="display: inline-block;">Nama Produk : </div>
                                                <div style="display: inline-block;">{{ $productTransDetails->product->name }}</div>
                                            </p>
                                            
                                            <p>
                                                <div class="font-weight-bold" style="display: inline-block;">Status : </div>
                                                <div style="display: inline-block;">{{ $productTransDetails->delivery_status }}</div>
                                            </p>
                                            
                                            <p class="mt-5">
                                                <hr class="sidebar-divider">
                                                <div class="font-weight-bold" style="display: inline-block;">Harga</div>
                                                <div style="font-size: 50px">@money($productTransDetails->product->price)</div>
                                            </p>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                       
                        </div>

                    

                    </div>

                </div>
@endsection