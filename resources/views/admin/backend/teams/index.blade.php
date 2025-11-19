@extends('admin.master')

@section('admin')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Teams</h4>
            </div>
        </div>
        <!-- Datatables  -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">All Teams</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teams as $key=> $team)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->position }}</td>
                                    <td>
                                        <img
                                            src="{{ asset($team->photo) }}"
                                            style="width: 70px; height: 40px;" alt="">
                                    </td>

                                    <td class="d-flex align-items-center gap-2">
                                        <a href="{{ route('teams.edit', $team->id) }}"
                                           class="btn btn-success btn-sm">Edit</a>

                                        <form action="{{ route('teams.destroy', $team->id) }}"
                                              method="POST"
                                              class="delete-form"
                                              onsubmit="return confirm('Are you sure you want to delete this testimonial?');"
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
@endsection
