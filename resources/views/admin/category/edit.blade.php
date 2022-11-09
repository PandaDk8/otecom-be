@extends('layouts.admin')

@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Edit Category</h4>
                <p></p>
            </div>
            <div class="pull-right">
                <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                   role="button" aria-expanded="true"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Name</label>
                <input name="name" value="{{$category->name}}" type="text" class="form-control">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control"> {{$category->description}} </textarea>
                @error('description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Images</label>
                        <input name="images" type="file" value="{{$category->images}}"
                               class="form-control-file form-control height-auto">
                        @if($category->images != null)
                            <img src="{{ asset('/uploads/category/'.$category->images) }}" alt="" width="100px"
                                 height="100px">
                        @endif

                        @error('images')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label class="weight-600">Status</label>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input name="status" {{$category->status == 1?'':'checked'}} type="checkbox"
                                           class="custom-control-input"
                                           id="customCheck1-1">
                                    <label class="custom-control-label" for="customCheck1-1"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>SEO Tag</h4>
            <div class="form-group">
                <label>Meta Title</label>
                <input name="meta_title" value="{{$category->meta_title}}" class="form-control" type="text">
                @error('meta_title')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Meta Keyword</label>
                <textarea name="meta_keyword" class="form-control">{{$category->meta_keyword}}</textarea>
                @error('meta_keyword')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Meta Description</label>
                <textarea name="meta_description" class="form-control">{{$category->meta_description}}</textarea>
                @error('meta_description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-12 mb3">
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
