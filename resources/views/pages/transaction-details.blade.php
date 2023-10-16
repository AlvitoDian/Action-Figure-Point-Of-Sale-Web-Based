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
                    
                                  {{--   @if(auth()->user()->hasRole('ADMIN'))
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
                                    </form> --}}
                                    @if(auth()->user()->hasRole('USER'))
                                    
                                    <form action="{{ route('transaction-proof', $transactions->id) }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      @method('PUT')
                                        <div class="form-group">
                                        <label for="exampleInputPassword1">Upload Bukti Pembayaran</label>
                                        <p class="mt-4">Cara Pembayaran : </p>
                                        <p>1. Pembayaran dilakukan menggunakan</p>
                                        <p>2. Transfer ke Nomer 082132123123 dengan total Pembayaran @money($transactions->total_price)</p>
                                        <p>3. Screenshot dan kirim bukti pembayaran pada kolom di bawah ini</p>
                                        <input type="file" class="form-control" id="exampleInputPassword1" name="payment_proof" id="submit-image">
                                        </div>
                                        <button type="submit" class="btn btn-primary" id="submit-button" >Kirim</button>
                                        @if($errors->any())
                                             <div class="alert alert-danger mt-3">
                                                 <ul>
                                                      @foreach ($errors->all() as $error)
                                                          <li>{{ $error }}</li>
                                                      @endforeach
                                                  </ul>
                                              </div>
                                        @endif
                                        @if(session('error'))
                                           <div class="alert alert-danger mt-3">
                                               {{ session('error') }}
                                           </div>
                                        @endif
                                        @if(session('success'))
                                           <div class="alert alert-success mt-3">
                                               {{ session('success') }}
                                           </div>
                                        @endif
                                    </form>
                                    <script>
                                       // Mengambil elemen form dan tombol submit
                                        const form = document.querySelector('form');
                                       const submitButton = document.getElementById('submit-button');
                                       const paymentProofInput = document.querySelector('input[name="payment_proof"]');

                                        // Mengganti teks tombol submit ketika formulir dikirim
                                        form.addEventListener('submit', function () {
                                          submitButton.innerHTML = 'Mengirim...';
                                        });
                                      </script>
                                      @if ($transactions->payment_proof) <!-- Tambahkan kondisi ini -->
                                        <script>
                                          // Menonaktifkan form jika bukti pembayaran telah diunggah
                                          submitButton.setAttribute("disabled", true);
                                          paymentProofInput.setAttribute('disabled', true);
                                          submitButton.innerHTML = 'Terkirim';
                                        </script>
                                     @endif
                                    @endif
                  </div>

                </div>
              </div>

          </div>
</div>
@endsection
