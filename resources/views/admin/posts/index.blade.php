@extends('layouts.admin')

@section('title') | Elenco post @endsection

@section('content')
<div class="container">
    <div class="row">
        <h1>
          Elenco posts
        </h1>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">TITOLO</th>
              <th scope="col">TESTO</th>
              <th scope="col">CATEGORIA</th>
              <th scope="col">TAG</th>
              <th scope="col">MOSTRA</th>
              <th scope="col">MODIFICA</th>
              <th scope="col">ELIMINA</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
              <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td> 
                  @if($post->category)
                    {{$post->category->name}}
                  @else 
                  ---
                  @endif
                </td>
                <td>
                  @forelse($post->tags as $tag)
                    <span class="badge bg-primary">{{$tag->name}}</span>
                  @empty
                    ---
                  @endforelse
                </td>
                <td>
                  <button type="button" class="btn btn-warning">
                    <a href="{{route('admin.post.show', $post)}}" style="color: white; text-decoration:none;"> Mostra</a>
                   </button>
                </td>

                <td>
                  <button type="button" class="btn btn-success">
                    <a href="{{route('admin.post.edit', $post)}}" style="color: white; text-decoration:none;"> Modifica</a>
                   </button>
                </td>
                
                <td>

                  <form 
                  action="{{route('admin.post.destroy', $post)}}" method="POST"
                  onsubmit = "return confirm('Confermi di eliminare {{$post->title}}?')">
                  @csrf
                  @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                  </form>
                  

                </td>
              </tr> 
            @endforeach
            
          </tbody>
        </table>

        <div>
          @foreach ($categories as $category)
            <h3>{{$category->name}}</h3>
            <ul>
              @forelse ($category->posts as $post_category)
                <li>
                  <a href="{{route('admin.post.show', $post_category)}}">{{$post_category->title}}</a>
                </li>
                
              @empty
                <li>Nessun post presente</li>
              @endforelse
            </ul>
              
          @endforeach
        </div>
        

    </div>
</div>
@endsection
