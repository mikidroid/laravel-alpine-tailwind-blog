<x-app>
    @include('_post-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @foreach ($posts as $post)
          <x-post-card :post="$post"/>
        @endforeach
    </main>

</x-app>
