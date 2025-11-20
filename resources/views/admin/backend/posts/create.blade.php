@extends('admin.master')

@section('admin')
    @include('admin.backend.posts.form', ['route' => route('posts.store'), 'method' => 'POST'])
@endsection
