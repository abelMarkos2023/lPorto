@extends('admin.admin-layout')

@section('content')
    <div class="card card-dark bg-secondary">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2>Add Technology</h2>

        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="card-body">
            <form action="{{ route('technologies.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name='name'
                        placeholder="name.......">
                </div>
                <div class="mb-3">
                    <div class="row conta">
                        <div class="col-md-6">

                            <label for="exampleFormControlTextarea1" class="form-label">Image</label>
                            <input type="file" id='fileInput' name = 'image' class="form-control col-md-6">
                        </div>
                        <div class="pre_container col-md-6  border border-2 d-flex justify-items-center align-items-center">
                            <span id="text">Choose a photo</span>
                            <img id="img" src="" alt="Photo view" class="hidden w-[100%]">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Add </button>
            </form>
        </div>
    </div>
@endsection
