@extends('layouts.app')
@section('content')
@guest
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">
                    <h2 class="card-header-title">
                      Posts
                    </h2>
                    <div class="card-body" style="box-shadow:2px 2px 5px darkgrey;margin-top:20px;">
                      @foreach ($post->getAttributes() as $key => $value)
                        <h3>{{$key}}</h3>
                        <p>{{$value}}</p>
                      @endforeach
                        <div class="ajeje_brazzorf" style="margin-bottom:40px;">
                          <h4>
                            Tags
                          </h4>
                          @foreach ($post->tags as $tag)
                          <span style="display:inline-block;margin-right:20px;box-shadow:1px 1px 5px darkgrey;border-radius:8px;padding: 10px; background-color: tan;color:linen;text-transform:capitalize;">
                            {{ $tag->theme }}
                          </span>
                          @endforeach
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endguest
@auth
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">
                    <h2 class="card-header-title">
                      Posts
                    </h2>
                    <div class="card-body" style="box-shadow:2px 2px 5px darkgrey;margin-top:20px;">
                      @foreach ($post->getAttributes() as $key => $value)
                        <h3>{{$key}}</h3>
                        <p>{{$value}}</p>
                      @endforeach
                      <div class="ajeje_brazzorf" style="margin-bottom:40px;">
                        <h4>
                          Tags
                        </h4>
                        @foreach ($post->tags as $tag)
                        <span style="display:inline-block;margin-right:20px;box-shadow:1px 1px 5px darkgrey;border-radius:8px;padding: 10px; background-color: tan;color:linen;text-transform:capitalize;">
                          {{ $tag->theme }}
                        </span>
                        @endforeach
                      </div>
                        @if (Auth::user()->privilege == 'admin')
                          <form style="display:inline-block;margin-right:20px;box-shadow:2px 2px 5px darkgrey;border-radius:5px;" action="{{ route('admin.posts.edit', $post) }}" method="post">
                            @csrf
                            <input type="submit" class="btn btn-warning" value="Modifica Post">
                          </form>
                          <form style="display:inline-block;box-shadow:2px 2px 5px darkgrey;border-radius:5px;" action="{{ route('admin.posts.delete', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Elimina Post">
                          </form>
                        @endif
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endauth
@endsection
