@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center ">
                    <h2 class="text-uppercase text-danger ">Lista progetti:</h2>
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-success">
                        <i class="fa-solid fa-plus me-2"></i>Aggiungi nuovo progetto
                    </a>
                </div>
                <table class="table table-striped border border-2 my-3 shadow">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titolo</th>
                            <th>Tipo di progetto</th>
                            <th>Descrizione</th>
                            <th>Link</th>
                            <th>Tecnologie</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->type ? $project->type->name : 'Non precisato' }}</td>
                                <td>{{ Str::limit($project->description, 100) }}</td>
                                <td>{{ $project->link }}</td>
                                <td>
                                    @forelse ($project->technology as $technology)
                                        <span class="badge rounded-pill text-bg-{{ $technology->badge_color }}"
                                            aria-label="{{ $technology->name }}">
                                            {{ $technology->name }}
                                        </span>
                                    @empty
                                        <span>Il progetto non ha tecnologie associate</span>
                                    @endforelse
                                </td>
                                <td>
                                    <div class="d-flex">

                                        <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}"
                                            class="btn btn-sm btn-outline-secondary">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                        <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}"
                                            class="btn btn-sm btn-outline-warning ms-1">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        {{-- <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                            method="POST" class="ms-1"
                                            onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" ><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form> --}}
                                        <a href="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                            class="btn btn-sm btn-outline-danger ms-1" data-bs-toggle="modal"
                                            data-bs-target="#modal_post_delete-{{ $project->slug }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        @include('admin.projects.partials.modal_delete')
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
