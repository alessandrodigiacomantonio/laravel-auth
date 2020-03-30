@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h2 class="card-header-title">
                    Posts
                  </h2>
                @foreach ($posts as $post)
                  <a href="{{ route('home.show', $post) }}" class="card-body" style="box-shadow:2px 2px 5px darkgrey;margin-top:20px;text-decoration:none;color:darkgrey;display:block">
                      @foreach ($post->getAttributes() as $key => $value)
                        <h3>{{$key}}</h3>
                        <p>{{$value}}</p>
                      @endforeach
                  </a>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
