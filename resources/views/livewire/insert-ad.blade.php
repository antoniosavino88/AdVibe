<div>
    {{-- @dd($this->categories) --}}
    <div class="container my-5">
        <h2 class="text-center p-5 text-title">Inserisci Annuncio</h2>
        <div class="row justify-content-center">
            <x-success />
            <div class="col-12 col-md-6">
                {{-- <x-error /> --}}
                <form wire:submit='adCreate' class="shadow rounded p-5">
                    <div class="mb-3">
                        <label class="form-label">Titolo</label>
                        <input type="text" class="form-control" wire:model.blur='title'>
                        @error('title')
                            <div class="text-danger fst-italic"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prezzo</label>
                        <input type="number" step="0.01" class="form-control" wire:model.blur='price'>
                        @error('price')
                            <div class="text-danger fst-italic"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Descrivi annuncio" wire:model.blur='description'></textarea>
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

                    {{-- Inserimento immagini --}}
                    <div class="mb-3">
                        <input type="file" wire:model.live="temporary_images" multiple
                            class="form-control shadow @error('temporary_images.*') is-invalid @enderror"
                            placeholder="Img" />

                        @error('temporary_images.*')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror

                        @error('temporary_images')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p>Photo preview:</p>
                                <div class="row border-preview-custom rounded shadow py-4">
                                    @foreach ($images as $key => $image)
                                        <div class="col d-flex flex-column align-items-center my-3">
                                            <div class="img-preview mx-auto shadow rounded"
                                                style="background-image: url({{ $image->temporaryUrl() }});">
                                            </div>
                                            <button type="button" class="btn mt-1 btn-danger"
                                                wire:click="removeImage({{ $key }})">X</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <button type="submit"
                        class="btn btn-custom transition fs-5 btn-sm my-3 px-3 py-0">Pubblica</button>
                </form>
            </div>
        </div>

    </div>
</div>
