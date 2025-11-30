@extends('admin.master')

@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <a href="{{ route('media.create') }}" class="btn btn-primary">Upload Image</a>
            </div>
            <!-- Datatables  -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">All Images </h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            @if($photos)
                                <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Image</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($photos as $media)
                                        <tr>
                                            <td>{{ $media->id }}</td>
                                            <td>
                                                <img src="{{ asset('media/' . $media->file) }}" alt="" width="50" height="50">
                                            </td>
                                            <td>{{ $media->created_at ? $media->created_at : 'no date' }}</td>

                                            <td>
                                                <form action="{{  route('media.destroy', $media ) }}"
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
                            @endif
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
