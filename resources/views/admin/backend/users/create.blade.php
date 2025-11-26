@extends('admin.master')

@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="content">

        <!-- Start Content-->
<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Create Role</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Components</a></li>
                <li class="breadcrumb-item active">Roles</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-12 ">
            <div class="card">

                <div class="card-body">

                        <div class="tab-pane pt-4" id="profile_setting" role="tabpanel">
                            <div class="row">

                                <div class="row d-flex  justify-content-center">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="card border mb-0">

                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h4 class="card-title mb-0">Create Role</h4>
                                                    </div><!--end col-->
                                                </div>
                                            </div>

                                            <form id="myForm" method="POST" action="{{ route('roles.store') }}" >
                                                @csrf
                                                <div class="card-body">

                                                    <div class="form-group mb-3 row">

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Name</label>
                                                        <div class="col-lg-12 col-xl-12 form-group">
                                                            <input
                                                                name="name"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                type="text">
                                                        </div>
                                                        @error('name')
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

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    name: {
                        required : true,
                    },

                    position: {
                        required : true,
                    },

                    photo: {
                        required : true,
                    },

                },
                messages :{
                    name: {
                        required : 'Please Enter Your Name',
                    },

                    position: {
                        required : 'Please Enter Your Position',
                    },

                    photo: {
                        required : 'Please Enter Your Photo',
                    },


                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>
@endsection
