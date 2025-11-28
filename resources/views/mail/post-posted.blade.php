<h2>
    {{ $post->title }}
</h2>

<p>
    Congrats Your post is now live on our website .
</p>

<p>
{{--    <a href="/posts/{{ $post->id }}">View Your JobListings</a>--}}
{{--    <a href="{{ url('/posts/' . $post->id)  }}">View Your PostListings</a>--}}
    <a href="{{ route('posts.show', $post->id) }}">View Your Post</a>
