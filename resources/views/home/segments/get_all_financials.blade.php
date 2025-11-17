<div class="lonyo-section-padding4 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 order-lg-2">
                <div class="lonyo-content-thumb" data-aos="fade-up" data-aos-duration="700">
                    <img src="{{ asset($finance->photo) }}" alt="">
                </div>
            </div>
            <div class="col-lg-7 d-flex align-items-center">
                <div class="lonyo-default-content pr-50" data-aos="fade-right" data-aos-duration="700">

                    <h2
                        id="finance-title"
                        contenteditable="{{ auth()->check() ? 'true' : 'false'}}"
                        data-id="{{ $finance->id }}"
                    >{{ $finance->title }}
                    </h2>

                    <p class="data">{{ $finance->description }}</p>
                    <div class="mt-50">
                        <ul class="tabs">
                            <li class="active-tab">
                                <img src="{{ asset('client/assets/images/v1/tv.svg') }}" alt="">
                                <h4>Unified Dashboard</h4>
                            </li>
                            <li>
                                <img src="{{ asset('client/assets/images/v1/alerm.svg') }}" alt="">
                                <h4>Real-Time Updates</h4>
                            </li>
                        </ul>
                        <ul class="tabs-content">
                            <li>
                                View all your accounts, transactions & investments in one central location. See every credit & debit transaction as it happens across all your accounts. Get a complete view of your expenses with expense categories.
                            </li>
                            <li>
                                This feature ensures you can easily stay on top of your finances by consolidating all updates into a single dashboard.View all your accounts, transactions iew of your expenses with expense categories.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lonyo-content-shape2"></div>
</div>


{{--CSRF TOKEN--}}
<meta name="csrf-token" content="{{ csrf_token() }}">

{{--Load script--}}
<script>
    document.addEventListener("DOMContentLoaded" ,function () {
        const titleElement  = document.getElementById("finance-title");


        function saveChanges(element) {
            let answerId = element.dataset.id;
            let field    = element.id === "finance-title" ? "finances" : "";
            let newValue = element.innerText.trim();

            /*Call an api*/
            fetch(`/edit-finances/${answerId}` ,{

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

