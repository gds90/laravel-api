@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center ">
                    <h2 class="text-uppercase text-danger ">Lista tecnologie:</h2>
                    <a href="{{ route('admin.technologies.create') }}" class="btn btn-sm btn-success">
                        <i class="fa-solid fa-plus me-2"></i>Aggiungi nuova tecnologia
                    </a>

                </div>
                <table class="table table-striped border border-2 my-3 shadow">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome tecnologia</th>
                            <th>N° progetti per tecnologia</th>
                            <th>Colore badge</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($technologies as $technology)
                            <tr>
                                <td>{{ $technology->id }}</td>
                                <td>{{ $technology->name }}</td>
                                <td>{{ $technology->project->count() }}</td>
                                <td><span class="badge rounded-pill text-bg-{{ $technology->badge_color }}">
                                        BADGE
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.technologies.show', ['technology' => $technology->slug]) }}"
                                            class="btn btn-sm btn-outline-secondary">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                        <a href="{{ route('admin.technologies.edit', ['technology' => $technology->slug]) }}"
                                            class="btn btn-sm btn-outline-warning ms-1">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.technologies.destroy', ['technology' => $technology->slug]) }}"
                                            class="btn btn-sm btn-outline-danger ms-1" data-bs-toggle="modal"
                                            data-bs-target="#modal_technology_delete-{{ $technology->slug }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        @include('admin.technologies.partials.modal_delete')
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
