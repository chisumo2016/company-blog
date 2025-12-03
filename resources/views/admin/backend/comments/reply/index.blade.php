@extends('admin.master')

@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">List of all Reply comments</h4>
                </div>
            </div>
            <!-- Datatables  -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <a href="{{ route('replies.index') }}" class="btn btn-primary">Back</a>
                        </div><!-- end card header -->

                        <div class="card-body">
                            @if(count($replies) > 0)
                                <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Author</th>
                                        <th>Email</th>
                                        <th>Body</th>
                                        <th>Post</th>
                                        <th>Approved/Unapproved</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($replies as $key=> $reply)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $reply->author }}</td>
                                            <td>{{ $reply->email }}</td>
                                            <td>{{ $reply->body }}</td>
                                            <td>
                                                <a href="{{ route('blog.post' , $reply->comment->post->id)}}"> View Post</a>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center justify-content-center gap-2">

                                                    @if($reply->is_active == 1)
                                                        <form action="{{ route('replies.update', $reply->id) }}" method="POST" class="d-inline-block m-0">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="is_active" value="0">

                                                            <button type="submit" class="btn btn-success btn-sm">Un-approve</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('replies.update', $reply->id) }}" method="POST" class="d-inline-block m-0">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="is_active" value="1">

                                                            <button type="submit" class="btn btn-primary btn-sm">Approve</button>
                                                        </form>
                                                    @endif

                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center justify-content-center gap-2">

                                                    <form action="{{route('replies.destroy', $reply->id) }}"
                                                          method="POST"
                                                          class="delete-form"
                                                          onsubmit="return confirm('Are you sure you want to delete this Comment reply?');"
                                                          style="display:inline-block; margin: 0;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"  class="btn btn-danger btn-sm show-confirm">
                                                            Delete
                                                        </button>
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


