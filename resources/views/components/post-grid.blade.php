@props(['posts'])
 @if ($posts->count())
        <x-post-featured-card :post="$posts[0]"/>

        @if ($posts->count()>1)
            <div class="lg:grid lg:grid-cols-6">
                @foreach ($posts->skip(1) as $post)
                    <x-post-card :post="$post" class="{{$loop->iteration > 4?'col-span-2':'col-span-3'}}"/>
                @endforeach

            </div>
        @endif
    @else
        <p>No posts yet! Check back later.</p>
    @endif
