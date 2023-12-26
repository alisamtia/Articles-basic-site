<x-layout>
    <x-slot name="data">

{!! $post->body !!}


Release Date: <b>{{ $post->date }}</b><br>
<a href="/">Go Back</a>
</data>

    </x-slot>
</x-layout>