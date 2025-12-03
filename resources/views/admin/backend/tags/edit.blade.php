@extends('admin.master')

@section('admin')
    @include('admin.backend.tags.form', [
        'route' => route('tags.update' , $tag),
        'method' => 'PUT',
        'title' => 'Edit Tag',
        'back' => route('tags.index')
    ])
@endsection
