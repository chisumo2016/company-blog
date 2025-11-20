<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Create Posts</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Components</a></li>
                    <li class="breadcrumb-item active">Post</li>
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
                                                        <h4 class="card-title mb-0">Create Post</h4>
                                                    </div><!--end col-->
                                                </div>
                                            </div>

                                            <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                                                @csrf

                                                @if($method === 'PUT')
                                                    @method('PUT')
                                                @endif
                                                <div class="card-body">
                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Title</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <input
                                                                name="title"
                                                                value="{{ old('title', $post->title ?? '') }}"
                                                                class="form-control"
                                                                type="text">
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-3 row">
                                                        <div class="col-lg-12 col-xl-12">
                                                            <label class="form-label">Select Category</label>
                                                            <select name="category_id" class="form-control">
                                                                @foreach($categories as $category)
                                                                    <option
                                                                        value="{{ $category->id }}"
                                                                        {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Excerpt</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <textarea
                                                                name="excerpt"
                                                                class="form-control">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Description</label>
                                                        <div class="col-lg-12 col-xl-12">

                                                            <textarea name="description" id="description" style="display: none;"></textarea>
                                                            <div
                                                                id="quill-editor"
                                                                style="height: 200px;">
                                                                {!!  old('description', $post->description ?? '') !!}
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Photo</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <input
                                                                name="thumbnail"
                                                                id="photo"
                                                                class="form-control"
                                                                type="file">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label"></label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <img
                                                                id="showImage"
                                                                width="120"
                                                                src="{{ (!empty($post->thumbnail)) ? url($post->thumbnail) : url('upload/no_image.jpg') }}"
                                                                class="rounded-circle avatar-xxl img-thumbnail float-start"
                                                                alt="image profile">
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Status</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <input
                                                                type="checkbox"
                                                                name="is_published"
                                                                value="1" {{ old('is_published', $post->is_published ?? false) ? 'checked' : '' }}> Publish
                                                        </div>
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
    document.getElementById('photo').addEventListener('change', function(e) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('showImage').src = e.target.result;
        };
        reader.readAsDataURL(e.target.files[0]);
    });



</script>

<script type="text/javascript">
    document.querySelector('form').onsubmit = function(){
        var description = document.querySelector('#description');
        description.value = quill.root.innerHTML
    }
</script>
