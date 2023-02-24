<x-app>
    <section class="py-8 px-6">

        <x-panel class="max-w-xl mx-auto">
            <form action="/admin/post" method="post" enctype="multipart/form-data" >
                @csrf
                <header class="mb-8 items-center">
                    <h2 class="text-xl">Make A Post</h2>
                </header>
                <div class="mb-6 ">

                    <label for="title" class="mb-2 block text-gray-700 uppercase font-bold text-xs">
                       Title
                    </label>
                    <input type="text" value="{{old('title')}}" name="title" id="title" class="focus:outline-none border rounded-lg border-gray-300 p-1 w-full" required>
                    <x-input-error :input="'title'"/>
                </div>
                <div class="mb-6">
                    <label for="excerpt" class="mb-2 block text-gray-700 uppercase font-bold text-xs">
                        Excerpt
                    </label>
                    <textarea name="excerpt" id="" placeholder="" class="focus:outline-none border rounded-lg border-gray-300 p-3 w-full" cols="30" rows="2">{{old('body')}}</textarea>
                    <x-input-error :input="'excerpt'"/>
                </div>

                <div class="mb-6">
                    <textarea name="body" id="" placeholder="You got something to say?" class="focus:outline-none border rounded-lg border-gray-300 p-3 w-full" cols="30" rows="5">{{old('body')}}</textarea>
                </div>
                <div class="mb-6">
                    <label for="excerpt" class="mb-2 block text-gray-700 uppercase font-bold text-xs">
                        Category
                    </label>

                     <select name="category_id" id="category">
                        @php
                            $categories = App\Models\Category::all();
                        @endphp
                        @foreach ($categories as $category)
                           <option value="{{$category->id}}" {{old('category_id')==$category->id?'selected':''}}>{{ucwords($category->name)}}</option>
                        @endforeach
                     </select>

                    <x-input-error :input="'category'"/>
                </div>
                <div class="mb-6 ">

                    <label for="upload" class="mb-2 block text-gray-700 uppercase font-bold text-xs">
                       Upload Thumbnail
                    </label>
                    <input type="file" value="{{old('thumbnail')}}" name="thumbnail" class="focus:outline-none border rounded-lg border-gray-300 p-1 w-full" required>
                    <x-input-error :input="'thumbnail'"/>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="mt-2 px-6 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-full font-bold text-xs ">submit</button>
                </div>
            </form>
        </x-panel>

    </section>
</x-app>
