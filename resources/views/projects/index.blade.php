@extends('admin.admin-layout')

@section("content")
<div class="card bg-secondary">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h4>All Projects</h4>
        <a href="{{ route('projects.create') }}" class="btn btn-primary float-end btn-sm">Add Project</a>
    </div>
    <div class="card-body">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
       <table class="table table-dark table-striped">
        <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>URL</th>
            <th>Image</th>
            <th>Technologies Used</th>
            <th>Action</th>
        </thead>
        @forelse ($projects as $project )
           <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->title }}</td>
            <td>{{ $project->description }}</td>
            <td>{{ $project->url }}</td>
            <td><img style="max-height: 100%;object-fit:cover;" src="{{ $project->image_path() }}" width="50" alt=""></td>
            <td>
                @foreach ($project->techs as $p )
                    {{ $p->name }},
                @endforeach
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <a href="{{ route('projects.edit',$project) }}" class="btn btn-success btn-sm block mr-4" style="margin-right: 10px;">Edit</a>
                    <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
                    @csrf
                    @method('Delete')
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>
                </div>
            </td>
           </tr>
        @empty
            <h2 class="font-bold">No Projects Available</h2>
        @endforelse
       </table>
    </div>
</div>
@endsection
