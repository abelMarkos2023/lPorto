<section class="projects" id="projects">
    <h2 class="title">
        Projects
    </h2>
    <div class="cards">

        @foreach ($projects as $project )


        <div class="project">
            <div class="project__image">
                <img src="{{ $project->image_path() }}" alt="">
            </div>
            <div class="project__info">
                <p class="project__desc">
                   {{ $project->description }}
                </p>
                <div class="project__footer">
                    <h3>{{ $project->title }}</h3>
                    <a href="" class="btn">
                        More Details
                    </a>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</section>
