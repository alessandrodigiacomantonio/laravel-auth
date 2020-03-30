@extends('layouts.app')
@section('content')
  @if (Auth::user()->privilege == 'admin')
    <div class="container">
      <div class="row justify-content-center">
        <form action="{{ route('admin.posts.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="content">Inserisci il contenuto del post</label>
            <textarea  placeholder="stocastico" rows="5" class="form-control" id="content" name="content" autfocus required>
            </textarea>
          </div>
          <button type="submit" class="btn btn-primary">Crea Post</button>
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
