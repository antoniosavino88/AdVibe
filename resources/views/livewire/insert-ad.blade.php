<div > 
    {{-- @dd($this->categories) --}}
    <div>
        <h2 class="display-3">Inserisci Annuncio</h2>
        <form wire:submit='adCreate'>
            <div class="mb-3">
                <label class="form-label">Titolo</label>
                <input type="text" class="form-control" wire:model.blur='title'>
            </div>
            <div class="mb-3">
                <label  class="form-label">Prezzo</label>
                <input type="number" class="form-control" wire:model.blur='price'>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Descrivi brano" wire:model.blur='description'></textarea>
                <label for="floatingTextarea">Descrizione</label>
            </div>
            <div class="form-group">
                <label for="categories">Seleziona i film</label>
                <select wire:model="category_id" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Invia canzone</button>
        </form>
    </div>
</div>
