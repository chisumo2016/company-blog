@extends('admin.master')

@section('admin')
    @include('admin.backend.posts.form', [
        'route' => route('posts.update' , $post),
        'method' => 'PUT',
        'title' => 'Edit Post',
         'back' => route('posts.index')
    ])
@endsection
