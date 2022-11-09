@extends('layouts.admin')

@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Edit Slider</h4>
                <p></p>
            </div>
            <div class="pull-right">
                <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm scroll-click" rel="content-y"
                   role="button" aria-expanded="true"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Title</label>
                <input name="title" type="text" class="form-control"
                       value="{{$slider->title}}">
                @error('title')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control"
                >{{$slider->description}}</textarea>
                @error('description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Image</label>
                        <input name="image" type="file" class="form-control-file form-control height-auto"
                        >
                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <img class="p-2" src="{{asset("$slider->image")}} " style="width: 70px;height: 70px;" alt="">
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label class="weight-600">Status</label>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input name="status" type="checkbox" class="custom-control-input"
                                           id="customCheck1-1" {{$slider->status == 0?'checked':''}}
                                    >
                                    <label class="custom-control-label" for="customCheck1-1"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb3">
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
