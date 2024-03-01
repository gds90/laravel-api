<div class="modal fade" id="modal_type_edit-{{ $type->slug }}" tabindex="-1" aria-labelledby="modal_type_edit"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modifica nome tipologia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.types.update', ['type' => $type->slug]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="name" class="control-label m-1 text-danger ">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Nome della tipologia" value="{{ old('name') ?? $type->name }}"
                            required>
                        @error('name')
                            <div class="text-danger m-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                    <button type="submit" class="btn btn-success">Salva</button>
                </div>
            </form>
        </div>
    </div>
</div>
