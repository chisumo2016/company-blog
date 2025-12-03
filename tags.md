# TAGS
    Post <--------Many To Many ---> Tag


                post_tag Table
                    post_id
                    tag_id

    Create the resource controller 
    Create the route web file
    pivot table
        php artisan make:migration create_post_tag_migration_table
    Relationshipt to post model
    Relationshipt to tag model

# ATTACH THE TAGS TO POSTS
    $post = Post::factory()->create();
    tag1 = Tag::create(['name' => 'tag1']);
    $post->tags()->attach($tag1);

     tag2 = Tag::create(['name' => 'tag2']);
     $post->tags()->attach($tag2);

    DATABASE
        post_id         tag_id
            1               1
            1               2

# ATTACH MULTIPLE TAGS TP POSTS
       tag3 = Tag::create(['name' => 'tag3']); 

         $post->tags()->attach([$tag1->id, $tag2->id , $tag3->id ]]);

        DATABSE
            post_id         tag_id
            1               1
            1               2
            1               3

# REMOVE TAGS ALL
         $post->tags()->detach(); 

# REMOVE TAGS SYCN
    $post->tags()->attach([$tag1->id]);
         $post->tags()->syncWithoutDetaching([$tag1->id, $tag2->id , $tag3->id ]); 
                  post_id         tag_id
                    1               1
                    1               2
                    1               3

        
         $post->tags()->sync([$tag2->id , $tag3->id ]); 
            post_id         tag_id
            1               2
            1               3

        $post->tags()->sync([]); 
            post_id         tag_id
            
# DISPLAY  THE POST WITH TAGS
        $post->tags()->sync([$tag2->id , $tag3->id ]); 

        $post->tags;

# FIND THE TAGS AND GET ALL POSTS THROUGH RELATIONSHIP
    $tag = Tag::find(2);
    $tag->posts;

# ATTACH TAGS WHEN WE CREATE A NEW POST 
        - Add the multiple select in post create form , displya
        - Add the multiple select in post edit form  dispaly
        - create method 
                 /**check if we have the tags */
                   if ($request->has('tags')) {
        
                       $post->tags()->attach($request->tags);
                   }
        UI Create
            <select name="tags[]" class="form-control" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        UI EDIT
                <select name="tags[]" class="form-control" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" @selected($post->tags->contains($tag->id))>{{ $tag->name }}</option>
                    @endforeach
                </select>
        - Update methodd
               $post->tags()->sync($request->tags);

# AUTO DETACH TAGS ON POST
        Delete the tags in destroy method 
          $post->tags()->detach();

        OR U can remove this method and add on post_tag migration
             Schema::create('post_tag', function (Blueprint $table) {

          $table->foreignId('post_id')->constrained()->onDelete('cascade');
              $table->foreignId('tag_id')->constrained()->onDelete('cascade');
    
            });
        }

# DISPLAY POST WITH TAGS
    




























