@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-uppercase text-dark-emphasis ">Modifica tecnologia <strong>"{{ $technology->name }}"</strong>
                </h2>
                <form action="{{ route('admin.technologies.update', ['technology' => $technology->slug]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group my-2">
                        <label for="name" class="control-label m-1 text-danger ">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Nome tecnologia" value="{{ old('name') ?? $technology->name }}"
                            required>
                        @error('name')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="badge_color" class="control-label m-1 text-danger ">Colore badge</label>
                        <select name="badge_color" id="badge_color"
                            class="form-select @error('badge_color') is-invalid @enderror">
                            <option value="">Seleziona colore badge</option>
                            @foreach ($badge_colors as $badge_color)
                                <option value="{{ $badge_color['badge_color'] }}" @selected($badge_color['badge_color'] == old('badge_color'))>
                                    {{ $badge_color['name'] }}
                                </option>
                            @endforeach
                            @error('badge_color')
                                <div class="text-danger m-1">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <button type="submit" class="btn btn-sm btn-success m-1">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
