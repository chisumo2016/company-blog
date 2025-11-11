<div class="lonyo-section-padding position-relative overflow-hidden">
    <div class="container">
        <div class="lonyo-section-title">
            <div class="row">
                <div class="col-xl-8 col-lg-8">

                    <h2
                        id="review-title"
                        contenteditable="{{ auth()->check() ? 'true' : 'false'}}"
                        data-id="{{ $title->id }}"
                    >{{ $title->reviews }}
                    </h2>

                </div>
                <div class="col-xl-4 col-lg-4 d-flex align-items-center justify-content-end">
                    <div class="lonyo-title-btn">
                        <a class="lonyo-default-btn t-btn" href="contact-us.html">Read Customer Stories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lonyo-testimonial-slider-init">



        @foreach($testimonials as $testimonial)
            <div class="lonyo-t-wrap wrap2 light-bg">
                <div class="lonyo-t-ratting">
                    <img src="{{ asset('client/assets/images/shape/star.svg') }}" alt="">
                </div>
                <div class="lonyo-t-text">
                    <p>{{ $testimonial->description }}</p>
                </div>
                <div class="lonyo-t-author">
                    <div class="lonyo-t-author-thumb">
                        <img src="{{ asset($testimonial->photo ) }}" alt="">
                    </div>
                    <div class="lonyo-t-author-data">
                        <p>{{ $testimonial->name }}</p>
                        <span>{{ $testimonial->position }}</span>
                    </div>
                </div>
            </div>
        @endforeach



    </div>
    <div class="lonyo-t-overlay2">
        <img src="{{ asset('client/assets/images/v2/overlay.png') }}" alt="">
    </div>
</div>

{{--CSRF TOKEN--}}
<meta name="csrf-token" content="{{ csrf_token() }}">

{{--Load script--}}
<script>
    document.addEventListener("DOMContentLoaded" ,function () {
        const titleElement  = document.getElementById("review-title");


        function saveChanges(element) {
            let reviewId = element.dataset.id;
            let field    = element.id === "review-title" ? "reviews" : "";
            let newValue = element.innerText.trim();

            /*Call an api*/
            fetch(`/edit-reviews/${reviewId}` ,{

                method : "POST",
                headers : {
                    "X-CSRF-TOKEN" : document.querySelector('meta[ name = "csrf-token"]').getAttribute("content"),
                    "content-type" : "application/json"
                },
                body : JSON.stringify({ [field]:newValue })

            }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log(`${field} updated successfully`)
                    }
                })
                .catch(error =>console.error("Error:" , error))

        }
        /* Update the front into database after enter kye**/
        document.addEventListener("keydown" , function (e) {
            if(e.key === "Enter"){
                e.preventDefault();
                saveChanges(e.target);
            }
        });

        /*Auto save on losing focus**/
        titleElement.addEventListener("blur" , function () {
            saveChanges(titleElement)
        })

    })
</script>
