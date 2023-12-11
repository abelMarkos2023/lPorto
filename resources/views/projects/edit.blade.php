@extends('admin.admin-layout')

@section('content')
    <div class="card card-dark bg-secondary">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h4>Edit Project Detail</h4>

        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="card-body">
            <form action="{{ route('projects.update',$project->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name='title'
                        placeholder="Project Title..............."
                        value="{{ $project->title }}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">URL</label>
                        <input type="text"  class="form-control" id="exampleFormControlInput1" name='url'
                        placeholder="Project URL......."
                        value="{{ $project->url }}"
                        >
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">Description</label>

                        <textarea name="description" id=""rows="3" class="form-control">{{ $project->description }}</textarea>
                    </div>
                    <div class="col-md-12">

                        <div class="check">
                            <span>Technologies</span>
                        @foreach ($techs as $tech )
                            <input class="techs" type="checkbox" name="techs[]" @if($project->techs->contains('id',$tech->id)) checked  @endif value="{{ $tech->id }}" id=""> {{ $tech->name }}
                        @endforeach
                    </div>
                    </div>
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
                <button class="btn btn-primary" type="submit">Add Project</button>
            </form>
        </div>
    </div>
@endsection
