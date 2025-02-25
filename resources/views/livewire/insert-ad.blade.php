<div>
    {{-- @dd($this->categories) --}}
    <div class="container">
        <h2 class="text-center p-5">Inserisci Annuncio</h2>
        <div class="row justify-content-center">
            <x-success />
            <div class="col-12 col-md-6">
                {{-- <x-error /> --}}
                <form wire:submit='adCreate'>
                    <div class="mb-3">
                        <label class="form-label">Titolo</label>
                        <input type="text" class="form-control" wire:model.blur='title'>
                        @error('title')
                            <div class="text-danger fst-italic"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prezzo</label>
                        <input type="number" class="form-control" wire:model.blur='price'>
                        @error('price')
                            <div class="text-danger fst-italic"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Descrivi brano" wire:model.blur='description'></textarea>
                        <label for="floatingTextarea">Descrizione</label>
                        @error('description')
                            <div class="text-danger fst-italic"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="categories">Seleziona categoria</label>
                        <select wire:model="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger fst-italic"> {{ $message }} </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Pubblica annuncio</button>
                </form>
            </div>
        </div>

    </div>
</div>
