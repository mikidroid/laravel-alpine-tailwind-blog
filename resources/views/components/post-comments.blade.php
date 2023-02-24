@props(['comment'])
<x-panel>
    <article class="flex space-x-4">
        
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{$comment->id}}" alt="" class="rounded-xl" width="60" height="60">
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">
                    {{$comment->user->name}}
                </h3>
                <p class="text-xs">Posted  <time>{{$comment->created_at->diffForHumans()}}</time></p>
            </header>

            <p>{{$comment->body}}</p>
        </div>

    </article>
</x-panel>
