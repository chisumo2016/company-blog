@extends('admin.master')

@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">List of all comments</h4>
                </div>
            </div>
            <!-- Datatables  -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <a href="{{ route('comments.index') }}" class="btn btn-primary">Back</a>
                        </div><!-- end card header -->

                        <div class="card-body">
                            @if(count($comments) > 0)
                                <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Author</th>
                                        <th>Email</th>
                                        <th>Body</th>
                                        <th>Post</th>
                                        <th>Comment</th>
                                        <th>Approved/Unapproved</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $key=> $comment)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $comment->author }}</td>
                                            <td>{{ $comment->email }}</td>
                                            <td>{{ $comment->body }}</td>
                                            <td>
                                                <a href="{{  route('blog.post' , $comment->post->id)}}"> View Post</a>
                                            </td>
                                            <td>
                                                <a href="{{  route('replies.show' , $comment->id)}}"> Comment Replies</a>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                                                    @if($comment->is_active == 1)
                                                        <form action="{{ route('comments.update', $comment->id) }}" method="POST" class="m-0">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="is_active" value="0">
                                                            <button type="submit" class="btn btn-success btn-sm">Un-approve</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('comments.update', $comment->id) }}" method="POST" class="m-0">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="is_active" value="1">
                                                            <button type="submit" class="btn btn-primary btn-sm">Approve</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                                                    <form action="{{ route('comments.destroy', $comment->id) }}"
                                                          method="POST"
                                                          class="m-0"
                                                          onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h1 class="text-center">No Comments</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


