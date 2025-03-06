<div>
    {{-- @dd($this->categories) --}}
    <div class="container-fluid p-5 bg-page-form bg-page-form">
        <h1 class="text-center p-5 text-title display-4 fw-semibold">{{ __('ui.insertAd') }}</h1>
        <div class="row justify-content-center">
            <x-success />
            <div class="col-12 col-md-6 py-5">
                {{-- <x-error /> --}}
                <form wire:submit='adCreate' class="shadow rounded-4 p-5 bg-form mb-5">
                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.title') }}</label>
                        <input type="text" class="form-control" wire:model.blur='title'>
                        @error('title')
                            <div class="text-danger fst-italic"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.price') }} €</label>
                        <input type="number" step="0.01" class="form-control" wire:model.lazy="price" wire:blur="formatPrice">
                        @error('price')
                            <div class="text-danger fst-italic"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="{{ __('ui.describeAd') }}" wire:model.blur='description'></textarea>
                        <label for="floatingTextarea">{{ __('ui.description') }}</label>
                        @error('description')
                            <div class="text-danger fst-italic"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="categories">{{ __('ui.selectCategory') }}</label>
                        <select wire:model="category_id" class="form-control">
                            <option value="1">---</option>
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
                        <p class="text-muted mb-0">{{ __('ui.file_load') }}</p>
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
                                <p>{{ __('ui.preview') }}:</p>
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
                        class="btn btn-custom transition fs-5 btn-sm my-3 px-3 py-0">{{ __('ui.publish') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
