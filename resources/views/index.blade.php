<x-layout>
<x-slot name="data">
@foreach($posts as $post)

    <article>

<a href="posts/{{$post->slug}}"><h1>{{$post->title}}</h1></a>
    <span>Date: <b>{{$post->date}}</b></span>
<p>{{$post->excerpt}}</p>
    </article>

@endforeach;
</x-slot>
</x-layout>