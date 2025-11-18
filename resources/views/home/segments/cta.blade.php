<section class="lonyo-cta-section bg-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="lonyo-cta-thumb" data-aos="fade-up" data-aos-duration="500">
                    <img
                        id="appImage"
                        alt=""
                        src="{{ asset($app->photo) }}"
                        style="cursor: pointer; width:100%; max-height: 300px; ">

                        @if(auth()->check())
                            <input type="file"  id="uploadImage"  style="display: none">
                        @endif

                </div>
            </div>

            <div class="col-lg-6">
                <div class="lonyo-default-content lonyo-cta-wrap" data-aos="fade-up" data-aos-duration="700">

                    <h2
                        class="editable-title"
                        contenteditable="{{ auth()->check() ? 'true' : 'false'}}"
                        data-id="{{ $app->id }}"
                        class="hero-title">{{ $app->title }}</h2>

                    <p
                        class="editable-description"
                        contenteditable="{{ auth()->check() ? 'true' : 'false'}}"
                        data-id="{{ $app->id }}"
                        class="text"> {{ $app->description }}</p>

                    <div class="lonyo-cta-info mt-50" data-aos="fade-up" data-aos-duration="900">
                        <ul>
                            <li>
                                <a href="https://www.apple.com/app-store/">
                                    <img src="{{ asset('client/assets/images/v1/app-store.svg') }}" alt=""></a>
                            </li>
                            <li>
                                <a href="https://playstore.com/">
                                    <img src="{{ asset('client/assets/images/v1/play-store.svg') }}" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{--CSRF TOKEN--}}
<meta name="csrf-token" content="{{ csrf_token() }}">

{{--Load script--}}
<script>
    document.addEventListener("DOMContentLoaded" ,function () {

        function saveChanges(element) {
            let appId = element.dataset.id;
            let field    = element.classList.contains("editable-title") ?  "title" : "description"
            let newValue = element.innerText.trim();

            /*Call an api*/
            fetch(`/update-apps/${appId}` ,{
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

        /*Auto save on losing focus with multiple data**/
        document.querySelectorAll(".editable-title, .editable-description").forEach(el =>{
            el.addEventListener("blur" , function () {
                saveChanges(el);
            });
        });

        /*Image Upload function start Here**/
        let imageElement = document.getElementById("appImage");
        let uploadInput  = document.getElementById("uploadImage");

        //load
        imageElement.addEventListener("click", function () {
            @if(auth()->check())
                uploadInput.click();
            @endif
        });

        uploadInput.addEventListener("change", function (){
            let file = this.files[0];
            if (!file) return;

           //upload image

            let formData = new FormData();
            formData.append("photo", file)
            formData.append("_token", document.querySelector('meta[name = "csrf-token"]').getAttribute("content"));

            //fetch data
            fetch("/update-app-image/1", {
                method : "POST",
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        imageElement.src = data.image_url
                        console.log(`Image updated successfully`)
                    }
                })
                .catch(error =>console.error("Error:" , error))
        });
    });
</script>

