@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Profil Akun</h1>
                    <form action="{{ route('profile-update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="name" value="{{ old('name', $users->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-Mail</label>
                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email', $users->email) }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor HP</label>
                        <input type="number" class="form-control" placeholder="Nomer HP" name="phone_number" value="{{ old('phone_number', $users->phone_number) }}">
                    </div>
                    <label for="image" class="form-label">Foto Profil</label>
                        <input type="hidden" name="oldImage" value="{{ $users->photo_profile }}">

                        @if($users->photo_profile)
                        <img src="{{ asset('storage/' . $users->photo_profile) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

                        @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">

                        @endif
                        <img class="img-preview img-fluid mb-3 col-sm-5" style="width: 20%">
                        <input class="form-control-file mb-4" type="file" id="image" name="photo_profile" onchange="previewImage()">
                    <button type="submit" class="btn btn-primary">Ubah Profil</button>
                    </form>
                    @if($errors->any())
                         <div class="alert alert-danger mt-3">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                     @endif

                </div>
                <script>
                    function previewImage() {

                    const image = document.querySelector('#image');
                    const imgPreview = document.querySelector('.img-preview');

                    imgPreview.style.display = 'block';

                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(image.files[0]);

                    oFReader.onload = function(oFREvent){
                        imgPreview.src =  oFREvent.target.result;
                    }
                    }
                </script>
                <!-- /.container-fluid -->
@endsection