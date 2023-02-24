<x-app>
    @foreach ($posts as $post)

        <article>
            <a href="/post/{{$post->slug}}">
            <h1>{!!$post->title!!}</h1>
            {!!$post->body!!}
            </a>
        </article>

    @endforeach
</x-app>
