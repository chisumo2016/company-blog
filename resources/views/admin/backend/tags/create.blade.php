@extends('admin.master')

@section('admin')
    @include('admin.backend.tags.form', [
        'route' => route('tags.store'),
         'method' => 'POST',
        'title' => 'Create Tag',
        'back' => route('tags.index')
     ])
@endsection
