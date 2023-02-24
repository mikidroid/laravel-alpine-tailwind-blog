<x-app>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 border border-gray-200 p-6 rounded-xl">
            <h1 class="font-bold text-center text-xl">Login!</h1>

            <form action="/login" method="POST" class="mt-10">
                @csrf

                <div class="mb-6">
                    <label for="username" class="mb-2 block text-gray-700 uppercase font-bold text-xs">
                        Email
                    </label>
                    <input type="email" value="{{old('email')}}" name="email" id="email" class="border border-gray-400 p-1 w-full" required>
                    <x-input-error :input="'email'"/>
                </div>
                <div class="mb-8">
                    <label for="username" class="mb-2 block text-gray-700 uppercase font-bold text-xs">
                        Password
                    </label>
                    <input type="password" name="password" id="password" class="border border-gray-400 p-1 w-full" required>
                </div>
                <div class="mb-8">
                    <button type="submit" class="bg-blue-400 py-2 px-4 rounded hover:bg-blue-500 text-white border border-gray-400 p-1 w-full" required>Login</button>
                </div>

            </form>

        </main>
    </section>

</x-app>
