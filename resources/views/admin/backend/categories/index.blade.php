@extends('admin.master')

@section('admin')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#standard-modal">
                Add Category
            </button>
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
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key=> $category)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>

                                    <td class="d-flex align-items-center gap-2">
                                        <button
                                            id="{{ $category->id }}"
                                            onclick="categoryEdit(this.id)"
                                            type="button" class="btn btn-success btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#category-modal">
                                            Edit
                                        </button>
{{--                                        <a href="{{ route('categories.edit', $category->id) }}"--}}
{{--                                           class="btn btn-success btn-sm">Edit</a>--}}

                                        <form action="{{ route('categories.destroy',$category) }}"
                                              method="POST"
                                              class="delete-form"
                                              onsubmit="return confirm('Are you sure you want to delete this categories?');"
                                              style="margin: 0;">
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

<!-- Default Modal -->
<div class="modal fade" id="standard-modal" tabindex="-1" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="standard-modalLabel">Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('categories.store') }}" >
                    @csrf
                        <div class="form-group mb-3 row">
                            <label class="form-label">Name</label>
                            <div class="col-lg-12 col-xl-12">
                                <input
                                    name="name"
                                    class="form-control"
                                    type="text">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>
            </div><!--end card-body-->

        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="category-modal" tabindex="-1" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="standard-modalLabel">Edit Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('categories.update', 0)  }}" >
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="cat_id" id="cat_id">

                    <div class="form-group mb-3 row">
                        <label class="form-label">Name</label>
                        <div class="col-lg-12 col-xl-12">
                            <input
                                id="cat_name"
                                name="name"
                                class="form-control"
                                type="text">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div><!--end card-body-->

        </div>
    </div>
</div>

<script>
    function categoryEdit(id) {
        $.ajax({
            type: 'GET',
            url: '/categories/' + id + '/edit',
            dataType: 'json',

            success:function (data) {
                console.log(data);

                $('#cat_name').val(data.name)
                $('#cat_id').val(data.id)
            }
        })
    }
</script>
@endsection
