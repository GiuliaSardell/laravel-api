@extends('layouts.admin')

@section('content')

  <div class="container">
    <h1>Titolo: {{$posts->title}}</h1>

    @forelse($posts->tags as $tag)
      <span class="badge bg-primary">{{$tag->name}}</span>
    @empty
      
    @endforelse
    <br>
    <a href="{{route('admin.post.index')}}" type="button" class="btn btn-warning my-2">Indietro</a>


    <div style="width: 400px" class="div my-5">
    <h5>Descrizione:</h5>
    <p>{{$posts->content}}</p>
    </div> 

    <div class="div my-3">
      
    <h5>Categoria:</h5>
      @if ($posts->category)
        {{$posts->category->name}}
      @else
        ---
      @endif
    </div> 

  </div>

@endsection