 @extends('layouts.app')


@section('content')
 <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST">
@csrf	
@method('PATCH')

<div class="container">
 <div class="form-group row">
 <div class="input-group mb-3 pl-3">
  <div class="custom-file">
    <input name="photo" type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo">
    <label class="custom-file-label col-md-5" for="inputGroupFile02">Choisissez votre photo</label>
  </div>
</div>

    @error('photo')
        <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
       </span>
    @enderror
 </div>

<div class="form-group row">
 <label for="title" class="pl-5 col-form-label">Bio</label>

  <div class="col-4">
     <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

    @error('title')
        <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
       </span>
    @enderror
 </div>
 </div>

<div class="form-group row">
 <label for="description" class="pl-4 col-form-label">URL</label>

  <div class="col-4">
     <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

    @error('description')
        <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
       </span>
    @enderror

 </div>
 </div>
<button type="submit" class="btn btn-secondary">sauvegarder</button>
</div>
</form>

<div class="container d-flex">
  <div class="card mt-5" style="width: 20rem;">
   <div class="card-body">  
   <a href="/profile/1"><h4> anthony inabo </h4></a>
</div>
    <img src="/storage/explained/firefox_iWwRueGP4r.png" class="w-100" alt="">
  <p><span class="h3"> 1 </span>Ajoutez une photo de profile.</p>
</div> 

<div class="card mt-5 ml-5" style="width: 20rem;">
    <div class="card-body">  
    <a href="/profile/1"><h4> anthony inabo </h4></a>
</div>
  <img src="/storage/explained/firefox_hYFQ3Wh7Bi.png" class="w-100" alt="">
  <p><span class="h3"> 2 </span>Ajoutez une bio ou un lien (facultatif).</p>
</div>

</div>
@endsection