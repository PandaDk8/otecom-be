<div>
    <!-- Modal -->
    <divv wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="destroyProduct">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this data?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ">Yes. Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </divv>

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Product</h4>
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
            </div>
            <div class="pull-right">
                <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                   role="button" aria-expanded="true"><i class="fa fa-plus"></i> Add Product</a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>
                        @if($product->category)
                            {{$product->category->name}}
                        @else
                            No category
                        @endif
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->selling_price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->status == '1'?'Hidden':'Active'}}</td>
                    <td>
                        <a href="{{url('admin/products/'.$product->id.'/edit')}}"
                           class="btn btn-sm btn-success">Edit</a>
                        <a href="#" wire:click="deleteProduct({{$product->id}})"
                           class="btn btn-sm btn-danger"
                           data-toggle="modal" data-target="#deleteModal"
                        >Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No products available</td>
                </tr>
            @endforelse

            </tbody>
        </table>
        {{$products->links()}}
    </div>
    @push('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#deleteModal').modal('hide');
            })
        </script>

    @endpush
</div>
