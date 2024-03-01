@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-uppercase text-dark-emphasis ">Aggiungi nuovo progetto:</h2>
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-2">
                        <label for="title" class="control-label m-1 text-danger ">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            id="title" placeholder="Titolo del progetto" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="type_id" class="control-label m-1 text-danger ">Tipo di progetto</label>
                        <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">
                            <option value="">Seleziona tipo di progetto</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected($type->id == old('type_id'))>{{ $type->name }}
                                </option>
                            @endforeach
                            @error('type_id')
                                <div class="text-danger m-1">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="cover_image" class="control-label m-1 text-danger">Immagine di copertina</label>
                        <input type="file" name="cover_image" id="cover_image"
                            class="form-control @error('cover_image') is-invalid @enderror"
                            value="{{ old('cover_image') }}">
                        @error('cover_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="description" class="control-label m-1 text-danger ">Descrizione</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                            placeholder="Descrizione del progetto" cols="100" rows="10" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label class="control-label text-danger">Seleziona tecnologia</label>
                        <div>
                            @foreach ($technologies as $technology)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}"
                                        class="form-check-input" value="{{ $technology->id }}"
                                        @checked (is_array(old('technologies')) && in_array($technology->id, old('technologies')))>
                                    <label for="technology-{{ $technology->id }}"
                                        class="form-check-label ">{{ $technology->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <label for="link" class="control-label m-1 text-danger">Link</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror" name="link"
                            id="link" placeholder="Link del progetto" value="{{ old('title') }}" required>
                        @error('link')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <button type="submit" class="btn btn-sm btn-success m-1">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
