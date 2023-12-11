@extends('admin.admin-layout')

@section("content")
<div class="card card-dark bg-secondary">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h2>Add Technology</h2>

    </div>
    @if($errors->any())
        @foreach ($errors->all() as $error )
           <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    <div class="card-body">
       <form action="{{ route('technologies.update',$technology->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name='name' placeholder="name......."
            value="{{ old($technology->name,$technology->name) }}">
          </div>

            <div class="row">
                <div class="image col-md-3">
                    <img width="60" height='60' style="display: block" src="{{ $technology->image_path() }}" alt="">
                </div>
                <div class="mb-3 col-md-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Image</label>
                    <input type="file" name = 'image' class="form-control">
                  </div>
            </div>

          <button class="btn btn-success" type="submit">Update</button>
    </form>
    </div>
</div>
@endsection
