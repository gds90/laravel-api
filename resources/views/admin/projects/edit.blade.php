@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-uppercase text-dark-emphasis ">Modifica del progetto <strong>"{{ $project->title }}"</strong>
                </h2>
                <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group my-2">
                        <label for="title" class="control-label m-1 text-danger ">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            id="title" placeholder="Titolo del progetto" value="{{ old('title') ?? $project->title }}"
                            required>
                        @if ($error_message != '')
                            <div class="text-danger m-1 ">
                                {{ $error_message }}
                            </div>
                        @endif
                        @error('title')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="type_id" class="control-label m-1 text-danger ">Tipo di progetto</label>
                        <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">
                            <option value="">Seleziona tipo di progetto</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected($type->id == old('type_id', $project->type ? $project->type->id : ''))>{{ $type->name }}
                                </option>
                            @endforeach
                            @error('type_id')
                                <div class="text-danger m-1">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="cover_image" class="control-label m-1 text-danger">Immagine di copertina</label>
                        @if ($project->cover_image != null)
                            <div class="my-3">
                                <img src="{{ asset('storage') . '/' . $project->cover_image }}" alt="{{ $project->title }}"
                                    width="25%">
                            </div>
                        @else
                            <h5>Immagine di copertina non impostata</h5>
                        @endif
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
                            placeholder="Descrizione del progetto" cols="100" rows="10" required>{{ old('description') ?? $project->description }}</textarea>
                        @error('description')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label class="control-label text-danger">Seleziona tecnologia</label>
                        <div>
                            @foreach ($technologies as $technology)
                                <div class="form-check form-check-inline">
                                    @if ($error_message != '')
                                        <input type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}"
                                            class="form-check-input" value="{{ $technology->id }}"
                                            {{ in_array($technology->id, old('tags')) ? 'checked' : '' }}>
                                    @else
                                        <input type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}"
                                            class="form-check-input" value="{{ $technology->id }}"
                                            {{ $project->technology->contains($technology->id) ? 'checked' : '' }}>
                                        <label for="technology-{{ $technology->id }}"
                                            class="form-check-label ">{{ $technology->name }}</label>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <label for="link" class="control-label m-1 text-danger">Link</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror" name="link"
                            id="link" placeholder="Link del progetto" value="{{ old('title') ?? $project->link }} "
                            required>
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
