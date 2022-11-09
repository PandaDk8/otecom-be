<div>
    To attain knowledge, add things every day; To attain wisdom, subtract things every day.
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Slider Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="destroySlider">
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
                <h4 class="text-blue h4">Slider</h4>
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
            </div>
            <div class="pull-right">
                <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                   role="button" aria-expanded="true"><i class="fa fa-plus"></i> Add Slider</a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($sliders as $slider)
                <tr>
                    <td>{{$slider->id}}</td>
                    <td>{{$slider->title}}</td>
                    <td>{{$slider->description}}</td>
                    <td>
                        <img src="{{asset("$slider->image")}}" style="width: 70px;height: 70px;" alt="slider">
                    </td>
                    <td>{{$slider->status==1?'Hidden':'Visible'}}</td>
                    <td>
                        <a href="{{url('/admin/sliders/'.$slider->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                        <a href="#" wire:click="deleteSlider({{$slider->id}})" class="btn btn-sm btn-danger"
                           data-toggle="modal"
                           data-target="#deleteModal">Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <div>{{$sliders->links()}}</div>
    </div>
    @push('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#deleteModal').modal('hide');
            })
        </script>
    @endpush
</div>
