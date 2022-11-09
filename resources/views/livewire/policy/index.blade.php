<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Policy Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="destroyPolicy">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this data?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Policy</h4>
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
            </div>
            <div class="pull-right">
                <a href="{{ url('admin/policy/create') }}" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                   role="button" aria-expanded="true"><i class="fa fa-plus"></i> Add Policy</a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Customer Policy</th>
                <th scope="col">Shipping Policy</th>
                <th scope="col">Return Policy</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($policies as $policy)
                <tr>
                    <th scope="row">{{$policy->id}}</th>
                    <td>{{$policy->customer_policy}}</td>
                    <td>{{$policy->shipping_policy}}</td>
                    <td>{{$policy->return_policy}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('admin/policy/'.$policy->id.'/edit')}}">Edit</a>
                        <a class="btn btn-danger" wire:click="deletePolicy({{$policy->id}})" data-toggle="modal"
                           data-target="#deleteModal" href="#">Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    @push('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#deleteModal').modal('hide');
            })
        </script>
    @endpush
</div>
