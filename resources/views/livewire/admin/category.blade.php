<div class="container">
    <h1 class="mb-3 mt-3">Categories</h1>
    <form class="mb-3 mt-3" wire:submit.prevent="create">
        <div class="input-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="categoryName" wire:model.defer="name" placeholder="Category Name">
            <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td><button wire:click="delete({{ $category->id }})" class="btn btn-danger">Delete</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
