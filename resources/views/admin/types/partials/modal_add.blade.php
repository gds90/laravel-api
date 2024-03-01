<div class="modal fade" id="modal_type_add" tabindex="-1" aria-labelledby="modal_type_add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Aggiungi nuova tipologia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.types.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name" class="control-label m-1 text-danger ">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Nome della tipologia" value="{{ old('name') }}" required>
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
