@extends('layouts.app')
@section('content')

    @foreach ($posts as $post)

        <article>
            <a href="/post/{{$post->id}}">
              <h1>{!!$post->title!!}</h1>
            </a>

            <p>By <i style="color: blue"><a href="/{{$post->user->name}}/posts"> {{$post->user->name}} </a></i>in <a style="color:blue" href="/category/{{$post->category->name??'error'}}"> {{$post->category->name ?? ''}}</p></a>


            {!!$post->body!!}

        </article>

    @endforeach

@endsection
