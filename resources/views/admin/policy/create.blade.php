@extends('layouts.admin')

@section('head')
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
@endsection

@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Add Policy</h4>
                <p></p>
            </div>
            <div class="pull-right">
                <a href="{{ url('admin/policy') }}" class="btn btn-danger btn-sm scroll-click" rel="content-y"
                   role="button" aria-expanded="true"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <form action="{{ url('admin/policy') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Customer Policy</label>
                <textarea name="customer_policy" class="form-control"></textarea>
                @error('customer_policy')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Shipping Policy</label>
                <textarea name="shipping_policy" class="form-control"></textarea>
                @error('shipping_policy')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Return Policy</label>
                <textarea name="return_policy" class="form-control"></textarea>
                @error('return_policy')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-12 mb3">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        CKEDITOR.replace('customer_policy');
        CKEDITOR.replace('shipping_policy');
        CKEDITOR.replace('return_policy');
    </script>
@endsection
