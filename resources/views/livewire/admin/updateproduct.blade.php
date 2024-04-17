
<form>
    <div class="form-group  mb-3">
        <label for="name">Name</label>
        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" />
        @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="categoryImage">Image:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="categoryImage" wire:model="image">
        @error('image') <span class="text-danger">{{ $message }}</span>@enderror
        <img src="{{ asset($previousImagePath) }}" alt="Previous Image" style="max-width: 200px;" />
    </div>
    <div class="form-group mt-2  mb-3">
        <label for="description">Description</label>
        <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror"></textarea>
        @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="category">Category:</label>
        <select wire:model="category" class="form-control @error('category') is-invalid @enderror">
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="update()" class="btn btn-success btn-block">Update</button>
        <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
    </div>
</form>


               