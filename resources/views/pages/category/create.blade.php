@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kategori</label>
                        <input type="text" class="form-control" placeholder="Nama Kategori Baru" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
                <!-- /.container-fluid -->
@endsection