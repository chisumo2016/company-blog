@extends('admin.master')

@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Comment Details</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <div class="card-body">

                            @if($reply)

                                <table class="table table-bordered dt-responsive table-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Author</th>
                                        <th>Email</th>
                                        <th>Body</th>
                                        <th>View Post</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <tr>
                                        <td>1</td> {{-- Only one row on show page --}}
                                        <td>{{ $reply->author->name ?? 'Unknown Author' }}</td>
                                        <td>{{ $reply->email }}</td>
                                        <td>{{ $reply->body }}</td>

                                        <td>

                                        </td>

                                        {{-- Toggle Active/Inactive --}}
                                        <td class="text-center">
                                            <form action="{{ route('replies.update', $reply->id) }}"
                                                  method="POST" class="d-inline-block">
                                                @csrf
                                                @method('PATCH')

                                                <button class="btn btn-sm {{ $commentReply->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                    {{ $commentReply->is_active ? 'Active' : 'Inactive' }}
                                                </button>
                                            </form>
                                        </td>

                                        {{-- Delete --}}
                                        <td class="text-center">
                                            <form action="{{ route('replies.destroy', $commentReply->id) }}"
                                                  method="POST"
                                                  class="delete-form"
                                                  onsubmit="return confirm('Are you sure you want to delete this comment reply?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                            @else
                                <h2 class="text-center">No Comment Found</h2>
                            @endif

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
