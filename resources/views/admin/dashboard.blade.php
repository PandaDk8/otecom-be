@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <h2>{{session('message')}}</h2>
    @endif
@endsection
