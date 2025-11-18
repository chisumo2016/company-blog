@extends('admin.master')

@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Create Answer</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Components</a></li>
                        <li class="breadcrumb-item active">Answer</li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="tab-pane pt-4" id="profile_setting" role="tabpanel">
                                <div class="row">

                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="card border mb-0">

                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h4 class="card-title mb-0">Create Answer</h4>
                                                        </div><!--end col-->
                                                    </div>
                                                </div>

                                                <form method="POST" action="{{ route('answers.store') }}" >
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Title</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input
                                                                    name="title"
                                                                    class="form-control  @error('title') is-invalid @enderror"
                                                                    type="text">
                                                            </div>

                                                            @error('title')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Description</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <textarea name="description" class="form-control  @error('description') is-invalid @enderror" ></textarea>

                                                            </div>
                                                                @error('description')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </div><!--end card-body-->
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- end education -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#photo').change(function (event) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $('#showImage') . attr('src' , event.target.result);

                }
                reader.readAsDataURL(event.target.files['0']);
            })
        })
    </script>
@endsection
