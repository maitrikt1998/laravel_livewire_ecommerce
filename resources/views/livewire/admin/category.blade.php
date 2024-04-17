<div class="container">
    <h1  class="mb-3 mt-3">Categories</h1>
    <form wire:submit.prevent="create" class="mb-3 mt-3">
        <div class="input-group">
            <input type="text" class="form-control" wire:model="name" placeholder="Category Name">
            <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
    </form>
    
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
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
