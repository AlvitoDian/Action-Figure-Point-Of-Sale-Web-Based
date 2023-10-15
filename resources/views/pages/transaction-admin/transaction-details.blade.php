@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Transactions</h1>
      <!-- section content-->
   <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >


              <div class="dashboard-content">
                <div class="tab-content" id="myTabContent">
                  <div
                    class="tab-pane fade show active"
                    id="sell"
                    role="tabpanel"
                    aria-labelledby="sell-tab"
                  >
                    <div class="row mt-3">
                      <div class="col-12 mt-2">
                        @foreach ($transactionProducts as $transaction)
                            <a
                          class="card card-list d-block"
                          href="{{ route('transaction-details-product', $transaction->id) }}"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                {{ $transaction->code }}
                              </div>
                              <div class="col-md-4">
                                {{ $transaction->product->name }}
                              </div>
                              <div class="col-md-3">
                                {{ $transaction->product->price }}
                              </div>
                             
                              <div class="col-md-1 d-none d-md-block">
                                <img
                                  src="/images/dashboard-arrow-right.svg"
                                  alt=""
                                />
                              </div>
                            </div>
                          </div>
                        </a>
                        @endforeach
                      </div>
                    </div>
                    
                                    @if(auth()->user()->hasRole('ADMIN'))
                                    <h3>Bukti Pembayaran : </h3>
                    <img src="{{ asset('storage/' . $transactions->payment_proof) }}" alt="">
                    <h3>Total Pembayaran : @money($transactions->total_price)</h3>
                                    <form action="{{ route('transaction-update-status', $transactions->id) }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      @method('PUT')
                                        <div class="form-group">
                                        <label for="exampleFormControlSelect1">Perbarui Status Pembayaran</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="transaction_status">
                                                <option value="PENDING">PENDING</option>
                                                <option value="PEMBAYARAN TERVERIFIKASI">PEMBAYARAN TERVERIFIKASI</option>
                                                <option value="READY TAKE">READY TAKE</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Perbarui</button>
                                    </form>
                                    @elseif(auth()->user()->hasRole('USER'))
                                    <form action="">
                                        <div class="form-group">
                                        <label for="exampleInputPassword1">Upload Bukti Pembayaran</label>
                                        <p class="mt-4">Cara Pembayaran : </p>
                                        <p>1. Pembayaran dilakukan menggunakan --- </p>
                                        <p>2. Transfer ke Nomer 082132123123</p>
                                        <p>3. Screenshot dan kirim bukti pembayaran pada kolom di bawah ini</p>
                                        <input type="file" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </form>
                                    @endif
                  </div>

                </div>
              </div>

          </div>
</div>

@endsection
