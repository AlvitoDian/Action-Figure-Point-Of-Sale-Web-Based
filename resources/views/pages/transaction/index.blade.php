@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Daftar Ketersediaan Barang</h1>
               

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-header py-3">
                            <a href="{{ route('cart') }}" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-cart-arrow-down"></i>
                                        </span>
                                        <span class="text">Keranjang Barang</span>
                                    </a>
                        @if(session()->has('deleted'))
                        <div class="alert alert-danger mt-4" role="alert">
                            {{ session('deleted') }}
                        </div>
                        @endif
                        @if(session()->has('added'))
                        <div class="alert alert-success mt-4" role="alert">
                            {{ session('added') }}
                        </div>
                        @endif
                        @if(session()->has('edited'))
                        <div class="alert alert-warning mt-4" role="alert">
                            {{ session('edited') }}
                        </div>
                        @endif
                        </div>
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td><a href="{{ route('detail', $product->slug) }}" class="btn btn-info btn-icon-split"><span class="icon text-white-50">
                                            <i class="fas fa-eye"></i>
                                        </span><span class="text">Lihat</span>
                                    </a>
                                </td>
                                        </tr>
                                        @endforeach                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
@endsection