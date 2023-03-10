<x-app>

    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{$post->created_at->diffForHumans()}}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            <a href="/?author={{$post->user->name}}">{{$post->user->name}}</a>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                        class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                    <div class="space-x-2">
                       <x-category-button :category="$post->category"/>
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{$post->title}}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    {!!$post->body!!}
                </div>
            </div>

            <section class="mt-10 col-span-8 col-start-5 space-y-6">
                
                @auth
                    <x-panel>
                        <form action="/post/{{$post->id}}/comment" method="post">
                            @csrf
                            <header class="flex items-center">
                                <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="" class="rounded-xl" width="40" height="40">
                                <h2 class="ml-3">Want to comment?</h2>
                            </header>

                            <div class="mt-6">
                                <textarea name="body" id="" placeholder="You got something to say?" class="focus:outline-none  w-full p-3 rounded-lg" cols="30" rows="5"></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="mt-2 px-6 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-full font-bold text-xs ">submit</button>
                            </div>
                        </form>
                    </x-panel>
                @endauth

                @foreach ($comments as $comment)
                   <x-post-comments :comment="$comment"/>
                @endforeach


            </section>
        </article>
    </main>



</x-app>
