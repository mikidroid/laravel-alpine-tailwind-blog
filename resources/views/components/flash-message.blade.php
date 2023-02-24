        @if (session()->has('message'))
           <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed bottom-5 right-3 px-4 mt-6 py-2 rounded-xl bg-green-600">
              <p class="text-white">{{session('message')}}</p>
           </div>
        @elseif (session()->has('error'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed bottom-5 right-3 px-4 mt-6 py-2 rounded-xl bg-red-600">
                <p class="text-white">{{session('error')}}</p>
            </div>
        @endif
