@extends('layouts.app')

@section('title', 'Search' )

@section('content')
  <div class="container py-5">
    <form action="{{ url('/search') }}" method="POST" role="search" class="dropdown-item form-inline mt-2">
      {{ csrf_field() }}
      <p>New Search!</p>
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
      <button class="btn btn-outline-danger btn-sm my-2 my-sm-0" type="submit">Search</button>
    </form>
    <small>Enter keyword</small>
  </div>

@if(isset($posts))
<!-- return search terms -->
  <p class="mb-4"> The results of your search for:
    @foreach($terms as $term)
        <b>{{ $term }}</b>
    @endforeach
  </p>
  <hr>
<!-- return search results -->
    @foreach($posts as $post)
        @foreach ($terms as $term)
          @php
// highlight search terms inside text
            $highlighted_text = "<span style='font-weight:bold;'>$term</span>";
            $text = strip_tags(html_entity_decode($post->body));
            $text = str_ireplace($term, $highlighted_text, $text);
            $title = strip_tags(html_entity_decode($post->title));
            $title = str_ireplace($term, $highlighted_text, $title);
          @endphp
        @endforeach
        <h5 class="handwriting"><a href="{{ url('/posts/'.$post->id) }}">{!! $title !!}</a></h5>
        <p>{!! $text !!}</p>
        <hr>
    @endforeach

@endif
</div>
@endsection
