@extends('layouts.admin')

@section('title') | Modifica post @endsection

@section('content')
<div class="container">
    
  <h1>
    Modifica di : {{$post->title}}
  </h1>

  @forelse($post->tags as $tag)
    <span class="badge bg-primary">{{$tag->name}}</span>
  @empty
    ---
  @endforelse


  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif

  
  <form style="width:300px" class="my-5"
  action="{{ route('admin.post.update', $post) }}"
  method="POST">
  @csrf
  @method('PUT')
    
    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" 
      value="{{old('title', $post->title)}}"
      name="title" class="form-control"
      id="title" placeholder="Titolo">
    </div>
    
    <div class="my-4">
      <label for="text" class="form-label">Testo</label>
      <textarea type="text" 
    
      name="content" class="form-control"
      
      id="content" placeholder="Testo del post">{{old('content', $post->content)}}</textarea>
    </div>

    <div>
      <label for="text" class="form-label">Categoria</label>
      <select 
      name="category_id" id="category_id"
      class="form-select">
        <option>Selezionare la categoria</option>
          @foreach ($categories as $category)
            <option 
            @if($category->id == old('category_id', $post->category_id)) selected @endif 
            value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        
        
      </select>
    </div>

    <div class="form-check p-0 mt-5">
      <h4>Tag</h4>
      @foreach ($tags as $tag)

      <div class="mx-3 d-inline-block">
        <input class="form-check-input" 
        type="checkbox" 
        name="tags[]" 
        value="{{$tag->id}}" 
        id="tag{{$loop->iteration}}"
        @if (!$errors->any() && $post->tags->contains($tag->id))
          checked
        @elseif ($errors->any() && in_array($tag->id, old('tags', [])))
          checked
        @endif
        >
      
        <label class="form-check-label" for="tag{{$loop->iteration}}">
          {{$tag->name}}
        </label>
      </div>
        
      @endforeach
    </div>

    <button type="submit" class="btn btn-primary my-5 mx-2">Invia</button>
    <button type="reset" class="btn btn-danger my-5 mx-2">Reset</button>
    
    
</div>
@endsection
