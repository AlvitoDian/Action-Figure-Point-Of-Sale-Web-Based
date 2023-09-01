@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <form action="{{ route('product.update', $products->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Barang</label>
                        <input type="text" class="form-control" placeholder="Nama Barang" name="name" value="{{ old('name', $products->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kategori Barang</label>
                        <select id="inputState" class="form-control" name="categories_id">
                            @foreach ( $categories as $category)
            
                            @if(old('categories_id', $products->categories_id) == $category->id)

                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>

                            @else

                            <option value="{{ $category->id }}">{{ $category->name }}</option>

                            @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stok Barang</label>
                        <input type="number" class="form-control" placeholder="Stok Barang" name="quantity" value="{{ old('quantity', $products->quantity) }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Barang</label>
                        <input type="number" class="form-control" placeholder="Harga Barang" name="price" value="{{ old('price', $products->price) }}">
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Gambar Produk</label>
                        <input type="hidden" name="oldImage" value="{{ $products->image }}">

                        @if($products->image)
                        <img src="{{ asset('storage/' . $products->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

                        @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">

                        @endif
                        <img class="img-preview img-fluid mb-3 col-sm-5" style="width: 20%">
                        <input class="form-control-file" type="file" id="image" name="image" onchange="previewImage()">
                    </div>
                     <div class="form-group">
                        <label for="exampleFormControlTextarea1">Deskripsi Singkat Barang</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ old('description', $products->description) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

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