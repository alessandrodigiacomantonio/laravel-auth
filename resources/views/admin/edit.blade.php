@extends('layouts.app')
@section('content')
  @if (Auth::user()->privilege == 'admin')
    <div class="container">
      <div class="row justify-content-center">
        <form class="d-flex align-items-center" style="flex-direction:column;" action="{{ route('admin.posts.update',$post->id) }}" method="post">
          @csrf
          <div class="form-group">
            <label for="content">Inserisci il contenuto del post</label>
            <textarea rows="8" class="form-control" id="content" name="content" autfocus required>
              {{$post->content}}
            </textarea>
          </div>
          <div class="form-group justify-content-center" style="flex-direction:column;">
            @foreach ($tags as $tag)
              <div class="ajeje_brazzorf d-flex justify-content-between align-items-center">
                <label for="tags-checklist" style="margin-right:20px;text-transform:capitalize;">{{$tag->theme}}</label>
                <input id="tags-checklist" type="checkbox" name="tags[]" value="{{$tag->id}}" {{ ($post->tags->contains($tag->id)) ? 'checked' : '' }}>
              </div>
            @endforeach
          </div>
          <button style="box-shadow:2px 2px 5px darkgrey;border-radius:5px;" type="submit" class="btn btn-warning">Modifica Post</button>
        </form>
      </div>
    </div>
  @else
    <div class="container">
      <div class="row justify-content-center">
        <p>Non hai i permessi per creare un nuovo post</p>
      </div>
    </div>
  @endif
@endsection
