@extends('admin.master')

@section('admin')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <a  href="{{ route('posts.create') }}" class="btn btn-primary" >
                Add Post
            </a>
        </div>
        <!-- Datatables  -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">All Categories </h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Excerpt</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img
                                            src="{{ asset($post->thumbnail) }}"
                                            style="width: 70px; height: 40px;" alt="">
                                    </td>
                                    <td>{{ Str::limit($post->title ,20 , '......') }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->excerpt }}</td>
                                    <td>{{ $post->author->name }}</td>
{{--                                    <td>{!!  Str::limit($post->description, 50 , '......' ) !!}</td>--}}
                                    <td>{{ $post->is_published ? 'Published' : 'Draft' }}</td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('posts.destroy',$post) }}"
                                              method="POST"
                                              class="delete-form"
                                              onsubmit="return confirm('Are you sure you want to delete this Post?');"
                                              style="display:inline-block; margin: 0;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-danger btn-sm show-confirm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
