# Backend Usability Section
        CRUD Operation
        php artisan make:model Usability -m
        php artisan make:controller Backend/UsabilityController

# Usability Down Section Setup
        php artisan make:model Connect -m
        php artisan migrate
        php artisan make:request UpdateConnectRequest
        php artisan make:request StoreConnectRequest

# UPDATE FROM FRONT END

        <div class="lonyo-process-title">
            <h4
                class="editable-title"
                contenteditable="{{ auth()->check() ? 'true' : 'false'}}"
                data-id="{{ $connect->id }}"
            >{{ $connect->title }}
            </h4>
        </div>
        <div class="lonyo-process-data">
            <p
                class="editable-description"
                contenteditable="{{ auth()->check() ? 'true' : 'false'}}"
                data-id="{{ $connect->id }}"
            >{{ $connect->description }}</p>
        </div>

    {{--CSRF TOKEN--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{--Load script--}}
        <script>
            document.addEventListener("DOMContentLoaded" ,function () {
                const titleElement  = document.getElementById("editable-title");
                const  descElement  = document.getElementById("editable-description");
        
                function saveChanges(element) {
                    let connectId = element.dataset.id;
                    let field    = element.classList.contains("editable-title") ?  "title" : "description"
                    let newValue = element.innerText.trim();
        
                    /*Call an api*/
                    fetch(`/update-connect/${connectId}` ,{
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
            })
        </script>


             public function updateConnect(Request $request ,$id)
                {
                    $connect = Connect::findOrFail($id) ;
            
                    $connect->update($request->only(['title','description']));
            
                    return response()->json([
                        'success' => true,
                        'message' => 'Connect Updated Successfully'
                    ]);
                 }

              Route::post('/update-connect/{id}' , [ConnectController::class, 'updateConnect']);


