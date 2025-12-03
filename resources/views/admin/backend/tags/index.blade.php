@extends('admin.master')

@section('admin')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <a  href="{{ route('tags.create') }}" class="btn btn-primary" >
                Add Tag
            </a>
        </div>
        <!-- Datatables  -->
        <div class="row">
            <div class="col-6 col-md-6">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">All Tags </h5>
                    </div><!-- end card header -->


                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tags as $key => $tag)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $tag->name }}</td>

                                    <td>
                                        <a href="{{ route('tags.edit', $tag) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('tags.destroy',$tag) }}"
                                              method="POST"
                                              class="delete-form"
                                              onsubmit="return confirm('Are you sure you want to delete this tag?');"
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
