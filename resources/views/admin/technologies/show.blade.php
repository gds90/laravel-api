@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-center text-danger text-uppercase ">Progetti per la tecnologia
                <strong>{{ $technology->name }}</strong></h2>
            <div class="col-12 m-auto my-5 bg-light p-5 d-flex">

                @forelse ($technology->project as $project)
                    <div class="card m-3 shadow" style="width: 18rem;">
                        <img src="{{ $project->cover_image ? asset('/storage/' . $project->cover_image) : asset('/img/test-img.jpg') }}"
                            class="card-img-top h-50" alt="{{ $project->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ Str::limit($project->description, 80) }}</p>
                            <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}"
                                class="btn btn-danger">Vai al dettaglio progetto</a>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <h4>Non esistono progetti per questa tecnologia</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
