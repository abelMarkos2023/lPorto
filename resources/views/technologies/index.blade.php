@extends('admin.admin-layout')

@section("content")
<div class="card card-dark bg-secondary">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h2>All Technologies</h2>
        <a href="{{ route('technologies.create') }}" class="btn btn-primary float-end btn-sm">Add Technology</a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-dark table-striped">

       <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Image</th>
        <th>Action</th>
       </thead>
        @forelse ($technologies as $technology )
        <tr>
            <td>{{ $technology->id }}</td>
            <td>{{ $technology->name }}</td>
            <td><img style="max-height: 100%;object-fit:cover;" src="{{ $technology->image_path() }}" width="60" alt=""></td>
            <td class="d-flex">
                <a href="{{ route('technologies.edit',$technology->id) }}" class="btn btn-success btn-sm mx-2">Edit</a>
                <form class="inline-flex" action="{{ route('technologies.destroy',$technology->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="btn btn-primary btn-sm">
                </form>
            </td>

        </tr>
        @empty
            <h2 class="font-bold">No Technologies Available</h2>
        @endforelse
    </table>
    </div>
</div>
@endsection
