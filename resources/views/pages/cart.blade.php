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

<form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
@csrf
<input type="hidden" name="total_price" value="{{ $Total }}">
<div>
    <hr class="sidebar-divider">
        <h5>Konfirmasi</h5>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Email</label>
      <fieldset disabled><input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{ Auth::user()->email }}"></fieldset>
    </div>
    <div class="form-group col-md-12">
      <label for="phone">Phone Number</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Phone Number" name="phone_number" required>
    </div>
    <div class="form-group col-md-12">
      <label for="province">Payment Method</label>
      <select name="payment_method" class="form-control">
          <option value="DANA">DANA</option>
          <option value="OVO">OVO</option>
          <option value="GOPAY">GOPAY</option>
      </select>
    </div>
    <div class="form-group col-md-12">
      <label for="phone">Notes</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="notes"></textarea>
    </div>
  </div>
  {{-- <button type="submit" class="btn btn-primary">Sign in</button> --}}

</div>

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
            
                @csrf
                <button type="submit" href="" class="btn btn-success btn-icon-split" style="width: 100%;"><span class="text"><i class="fas fa-cart-plus"  style="padding-right: 5px"></i>Checkout</span></button>
          
        </div>
    </div>
</div>
</form>


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
