
<x-app>
    <!--Post header-->

    @include('posts._header')
        <!-- main -->
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <x-post-grid :posts="$posts"/>
            {{$posts->links()}}
        </main>


    </x-app>
