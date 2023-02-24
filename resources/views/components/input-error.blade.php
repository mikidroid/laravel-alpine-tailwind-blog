@props(['input'])

@error($input)
<p class="text-red-500 text-sm">{{$message}}</p>
@enderror

