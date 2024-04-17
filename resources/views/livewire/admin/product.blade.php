<div>
    <div class="col-md-12 mb-2">
        <div class="card">
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success')}}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error')}}
                    </div>
                @endif

                @if($updateProduct)
                    @include('livewire.admin.updateproduct')
                @else
                    @include('livewire.admin.createproduct')
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($products) > 0)
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td><img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="height: 100px;width:100px;"></td>
                                    <td>{{ $product->category_id }}</td>
                                    <td><button wire:click="edit({{ $product->id }})" class="btn btn-primary btn-sm">Edit</button></td>
                                    <td><button wire:click="delete({{ $product->id }})" class="btn btn-danger btn-sm">Delete</button></td>
                                
                                </tr>
                                @endforeach

                            @else
                            <tr>
                                <td colspan="3" align="center">
                                    No Product Found
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
