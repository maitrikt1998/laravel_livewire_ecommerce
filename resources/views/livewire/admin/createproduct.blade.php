{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">{{ $updateProduct ? 'Edit Product' : 'Create Product' }}</div>
                <div class="card-body"> --}}
                    <form wire:submit.prevent="{{ $updateProduct ? 'update' : 'store' }}">
                        <div class="form-group  mb-3">
                            <label for="name">Name</label>
                            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" />
                            @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="categoryImage">Image:</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="categoryImage" wire:model="image">
                            @error('image') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group mt-2  mb-3">
                            <label for="description">Description</label>
                            <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label for="category">Category</label>
                            <select wire:model="category" class="form-control @error('category') is-invalid @enderror">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ $updateProduct ? 'Update Product' : 'Create Product' }}</button>
                        @if($updateProduct)
                            <button type="button" wire:click="cancel" class="btn btn-secondary">Cancel</button>
                        @endif
                    </form>
                {{-- </div>
            </div>
        </div>
    </div>
</div> --}}
