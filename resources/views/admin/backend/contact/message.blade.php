@extends('admin.master')

@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Message </h4>
                </div>
            </div>
            <!-- Datatables  -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">All Contact Message </h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages  as $key=> $message)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>

                                        <td>{{ Str::limit($message->message , 50 , '......') }}</td>

                                        <td class="d-flex align-items-center gap-2">

                                            <form action="{{ route('contact.delete', $message->id) }}"
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
