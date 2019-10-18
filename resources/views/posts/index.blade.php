@extends('layouts.app')

@section('content')

<div class="container col-6">

@foreach($posts as $post)
<div class="card mt-5" style="width: 40rem;">
  <div class="card-body">  
 	<img src="{{$post->user->profile->ProfilePhoto()}}" class="rounded-circle float-left">
	<a href="/profile/{{$post->user->id}}"><h4> {{$post->user->name}} </h4></a>
 </div>
<img src="/storage/{{$post->image}}" class="w-100" alt="">
     <div class="card-body">
     <a href="/profile/{{$post->user->id}}"><h5 class="card-title float-left"><strong>{{$post->user->name}}</strong></h5></a>
	<p>&nbsp;{{$post->caption}}</p>

  </div>
</div>
@endforeach


<div class="card mt-5" style="width: 40rem;">
    <div class="card-body">  
 	<img src="" class="rounded-circle float-left">
 <a href="/profile/1"><h4> anthony inabo </h4></a>
 </div>
	<img src="/storage/explained/firefox_VYNYhlH9O4.png" class="w-100" alt="">
	<p><span class="h3"> 1 </span>Acceder à votre profile ici.</p>
	<img src="/storage/explained/firefox_9T4KvYLa5k.png" class="w-100" alt="">
	<p><span class="h3"> 2 </span>Vous pourrez editer votre profile.</p>
	<img src="/storage/explained/firefox_yRmMhxRNZZ.png" class="w-100" alt="">
	<p><span class="h3"> 3 </span>Vous pourrez poster vos photos.</p>
	<img src="/storage/explained/firefox_6aWORcDQig.png" class="w-100" alt="">
	<p><span class="h3"> 4 </span>Vous pourrez également rechercher d'autres utilisateurs. (indice: Tapez "1")  :-)</p>
 </div>

</div>
@endsection