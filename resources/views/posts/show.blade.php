@extends('layouts.app')

@section('content')

<div class="container"> 
<div class="card-group">
  <div class="card">
    <img class="card-img-top" src="/storage/{{$post->image}}" alt="Card image cap">
  </div>
  <div class="card">
    <div class="card-body">
   <div class="float-left"><img src="{{$post->user->profile->ProfilePhoto()}}" class="rounded-circle" style="height: 40px;"></div>
      <a href="/profile/{{$post->user->id}}"><h5 class="card-title ml-5">{{$post->user->name}}</h5></a>
      <br>
      <hr style="width: 100%; color: black; height: 1px;" />
      <img src="{{$post->user->profile->ProfilePhoto()}}" class="rounded-circle float-left" style="height: 40px;">
      <p class="card-text ml-5">{{$post->caption}}</p>
      	
    </div>
   </div>
  </div>
</div>

@endsection