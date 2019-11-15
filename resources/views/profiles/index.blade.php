@extends('layouts.app')

@section('content')
<div class="container">
  
<img src="{{$user->profile->Profilephoto()}}" class="rounded-circle float-left" style="height: 200px; margin-left: 2cm;">

<div class="row">
  <h1>{{$user->name}}</h1>

@cannot('update', $user->profile)
<follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
@endcannot

@can('update', $user->profile)
<a href="/profile/{{$user->id}}/edit" class="btn btn-primary ml-3">editer le profile</a>
@endcan

</div>

<div class="row col-6">
  <h2><div class="pr-3" style="padding-top: 40px;"><span class="h4">{{$postsCount}}</span> postes</div></h2>
  <h2><div class="pr-3" style="padding-top: 40px;"><span class="h4">{{$followersCount}}</span> abonnés</div></h2>
  <h2><div class="pr-3" style="padding-top: 40px;"><span class="h4">{{$followingCount}}</span> abonnemments</div></h2>
</div>

<div class="container col-6">
  <p>{{$user->profile->title}}</p>
  <a href="https://{{$user->profile->description}}">{{$user->profile->description}}</a>
</div>

  <div class="container-fluid mt-5">
    <div class="mx-auto" style="width: 200px;">
@can('update', $user->profile)
      <a href="/p/create" class="btn btn-secondary">poster <i class="fa fa-camera"></i></a>
@endcan
    </div>
  </div>

<div class="row pt-5">
@foreach($user->posts as $post)
  <div class="col-4 pr-3 mt-3">
    <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100"></a>
  </div>
@endforeach
</div>

</div>
@endsection
