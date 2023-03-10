@props(['trigger'])
<div x-data="{ show:false }" @click.away="show=false">
    {{-- TRIGGER --}}
    <div @click="show=!show">
        {{$trigger}}
    </div>

    {{--Links--}}
    <div x-show="show" class="w-full absolute bg-gray-200 py-2 rounded-xl z-50 overflow-auto max-h-52" style="display:none">
        {{$slot}}
    </div>
 </div>
