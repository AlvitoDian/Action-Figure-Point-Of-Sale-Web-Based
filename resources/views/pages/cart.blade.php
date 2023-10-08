@extends('layouts.app')

@section('content')
<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Keranjang</h1>
<div class="table-responsive">
  <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Nama Barang</th>
      <th scope="col">Kategori</th>
      <th scope="col">Harga</th>
      <th scope="col">Kuantitas</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @php $totalPrice = 0 @endphp
    @php $tempTax = 2500 @endphp
    @php $Total = 0 @endphp
    @foreach ($carts as $cart)
    
    <tr>
      <td>{{ $cart->product->name }}</td>
      <td>{{ $cart->product->category->name }}</td>
      <td>@money($cart->product->price)</td>
      <td><form action="">
        <input type="number" class="form-control" style="width: 30%" value="{{ $cart->quantity }}" data-rowid="{{ $cart->id }}" name="quantity" onchange="updateQuantity(this)">
        </form>
{{--       <a href="" class="mr-2"><i class="fa fa-minus"></i></a>
      <span>{{ $cart->quantity }}</span>
      <a href="" class="ml-2"><i class="fa fa-plus"></i></a> --}}
      </td>
      <td><form action="{{ route('cart-delete', $cart->id) }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-trash"></i></span><span class="text">Hapus</span></button>
        </form></td> 
    </tr>
      
    @php
    // Hitung total harga untuk produk ini (harga dikali kuantitas)
    $productTotalPrice = $cart->product->price * $cart->quantity;
    $totalPrice += $productTotalPrice;

    // Hitung total harga dengan pajak
    $Total = $totalPrice + $tempTax;
    @endphp
    @endforeach
  </tbody>
  </table>
</div>

<div>
    <hr class="sidebar-divider">
        <h5>Konfirmasi</h5>
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  {{-- <button type="submit" class="btn btn-primary">Sign in</button> --}}
</form>
</div>

{{-- <div>
    <hr class="sidebar-divider">
        <h5>Total Harga</h5>
        <p>Harga Barang : @money($totalPrice)</p>
        <p>Layanan Aplikasi : @money($tempTax)</p>
    <hr class="sidebar-divider">
        <p>Total Pembayaran : @money($Total)</p>
        <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <button type="submit" href="" class="btn btn-success btn-icon-split" style="width: 100%;"><span class="text"><i class="fas fa-cart-plus"  style="padding-right: 5px"></i>Checkout</span>
        </button>
        </form>
</div> --}}
<div>
    <hr class="sidebar-divider">
    <h5>Total Harga</h5>
    <div class="row">
        <div class="col-md-12">
            @foreach ($carts as $cart)
                <div class="row">
                    <div class="col-md-2">
                        {{ $cart->product->name }} ( x{{ $cart->quantity }} ):
                    </div>
                    <div class="col-md-3">
                        @money($cart->product->price * $cart->quantity)
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <p>Layanan Aplikasi : </p>
        </div>
        <div class="col-md-3">
            <p> @money($tempTax)</p>
        </div>
    </div>
    <hr class="sidebar-divider">
    <div class="row">
        <div class="col-md-2">
            <p>Total Pembayaran : </p>
        </div>
        <div class="col-md-3">
            <p id="total_price">@money($Total)</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <button type="submit" href="" class="btn btn-success btn-icon-split" style="width: 100%;"><span class="text"><i class="fas fa-cart-plus"  style="padding-right: 5px"></i>Checkout</span></button>
            </form>
        </div>
    </div>
</div>
</div>

<form id="updateCartQty" action="{{ route('cart.updateqty') }}" method="POST">
  @csrf
  @method('PUT')
  <input type="hidden" id="rowId" name="id"/>
  <input type="hidden" id="quantity" name="quantity"/>
</form>
@endsection
@push('addon-script')
 <script>
  function updateQuantity(quantity)
  {
    $('#rowId').val($(quantity).data('rowid'));
    $('#quantity').val($(quantity).val());
    $('#updateCartQty').submit();
  }
 </script>
@endpush
