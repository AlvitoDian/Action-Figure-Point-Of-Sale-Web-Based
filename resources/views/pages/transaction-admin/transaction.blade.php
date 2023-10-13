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
                <ul class="nav nav-pills" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a
                      class="nav-link active"
                      id="sell-tab"
                      data-toggle="tab"
                      href="#unpayed"
                      role="tab"
                      aria-controls="sell"
                      aria-selected="true"
                      >Menunggu Pembayaran</a
                    >
                  </li>
                  <li class="nav-item" role="presentation">
                    <a
                      class="nav-link"
                      id="buy-tab"
                      data-toggle="tab"
                      href="#payed"
                      role="tab"
                      aria-controls="buy"
                      aria-selected="false"
                      >Pembayaran Terverifikasi</a
                    >
                  </li>
                  <li class="nav-item" role="presentation">
                    <a
                      class="nav-link"
                      id="buy-tab"
                      data-toggle="tab"
                      href="#ready"
                      role="tab"
                      aria-controls="buy"
                      aria-selected="false"
                      >Barang Siap Diambil</a
                    >
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div
                    class="tab-pane fade show active"
                    id="unpayed"
                    role="tabpanel"
                    aria-labelledby="sell-tab"
                  >
                    <div class="row mt-3">
                      <div class="col-12 mt-2">
                        @foreach ($transactions as $transaction)
                        @if ($transaction->transaction_status === 'PENDING')
                            <a
                          class="card card-list d-block"
                          href="{{ route('transaction-details', $transaction->id) }}"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                {{ $transaction->code }}
                              </div>
                              <div class="col-md-1">
                                {{ $transaction->user->name }}
                              </div>
                              <div class="col-md-4">
                                {{ $transaction->created_at }}
                              </div>
                              <div class="col-md-3">
                                {{ $transaction->transaction_status }}
                              </div>
                              <div class="col-md-3">
                                @money($transaction->total_price)
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
                        @else 
                        {{-- <div class="card-body">
                          <p>Transaksi ini telah ber-status {{ $transaction->transaction_status }}</p>
                        </div> --}}
                        @endif
                        @endforeach
                      </div>
                    </div>
                  </div>

                  <div
                    class="tab-pane fade"
                    id="payed"
                    role="tabpanel"
                    aria-labelledby="buy-tab"
                  >
                    <div class="row mt-3">
                      <div class="col-12 mt-2">
                        @foreach ($transactions as $transaction)
                        @if ($transaction->transaction_status === 'PEMBAYARAN TERVERIFIKASI')
                            <a
                          class="card card-list d-block"
                          href="{{ route('transaction-details', $transaction->id) }}"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                {{ $transaction->code }}
                              </div>
                              <div class="col-md-4">
                                {{ $transaction->created_at }}
                              </div>
                              <div class="col-md-3">
                                {{ $transaction->transaction_status }}
                              </div>
                              <div class="col-md-3">
                                @money($transaction->total_price)
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
                        @else
                        {{-- <div class="card-body">
                          <p>Tidak ada transaksi</p>
                        </div> --}}
                        @endif
                        @endforeach
                      </div>
                    </div>
                  </div>
                  
                  <div
                    class="tab-pane fade"
                    id="payed"
                    role="tabpanel"
                    aria-labelledby="buy-tab"
                  >
                    <div class="row mt-3">
                      <div class="col-12 mt-2">
                        @foreach ($transactions as $transaction)
                        @if ($transaction->transaction_status === 'READY TAKE')
                            <a
                          class="card card-list d-block"
                          href="{{ route('transaction-details', $transaction->id) }}"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                {{ $transaction->code }}
                              </div>
                              <div class="col-md-4">
                                {{ $transaction->created_at }}
                              </div>
                              <div class="col-md-3">
                                {{ $transaction->transaction_status }}
                              </div>
                              <div class="col-md-3">
                                @money($transaction->total_price)
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
                        @else
                       {{--  <div class="card-body">
                          <p>Tidak ada transaksi</p>
                        </div> --}}
                        @endif
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          </div>
</div>

@endsection
