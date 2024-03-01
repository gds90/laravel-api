@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center ">
                    <h2 class="text-uppercase text-danger ">Lista tipologie:</h2>
                    <a href="{{ route('admin.types.create') }}" class="btn btn-sm btn-success" data-bs-toggle="modal"
                        data-bs-target="#modal_type_add">
                        <i class="fa-solid fa-plus me-2"></i>Aggiungi nuova tipologia
                    </a>

                </div>
                <table class="table table-striped border border-2 my-3 shadow">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome tipologia progetti</th>
                            <th>N° progetti per tipologia</th>
                            <th>Slug</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <td>{{ $type->id }}</td>
                                <td>{{ $type->name }}</td>
                                <td>{{ count($type->projects) }}</td>
                                <td>{{ $type->slug }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.types.show', ['type' => $type->slug]) }}"
                                            class="btn btn-sm btn-outline-secondary">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                        <a href="{{ route('admin.types.edit', ['type' => $type->slug]) }}"
                                            class="btn btn-sm btn-outline-warning ms-1" data-bs-toggle="modal"
                                            data-bs-target="#modal_type_edit-{{ $type->slug }}">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.types.destroy', ['type' => $type->slug]) }}"
                                            class="btn btn-sm btn-outline-danger ms-1" data-bs-toggle="modal"
                                            data-bs-target="#modal_type_delete-{{ $type->slug }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        @include('admin.types.partials.modal_delete')
                                        @include('admin.types.partials.modal_add')
                                        @include('admin.types.partials.modal_edit')
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
