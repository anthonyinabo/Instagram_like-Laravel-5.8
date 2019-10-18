@extends('layouts.app')

@section('content')

<form action="/p" enctype="multipart/form-data" method="post">
@csrf

<div class="container">
 <div class="form-group row">
    <label for="inputPassword" class="col-sm-1 col-form-label">Caption</label>
    <div class="col-sm-10">
      <input name="caption" type="text" class="form-control col-md-5 col-sm-5 col-xs-5 @error('caption') is-invalid @enderror" value="{{ old('caption') }}" id="caption" placeholder="caption" required autocomplete="caption">
    </div>
</div>

 @error('caption')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
     </span>
 @enderror

<div class="input-group mb-3 pl-3">
  <div class="custom-file">
    <input name="image" type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" required autocomplete="image">
    <label class="custom-file-label col-md-5" for="inputGroupFile02">Choisissez une image</label>
  </div>
</div>

  @error('image')
 <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
 </span>
 @enderror

<button type="submit" class="btn btn-secondary">sauvegarder</button>
</div>
</form>

<div class="container d-flex">
<div class="card mt-5" style="width: 50rem;">
    <div class="card-body">  
 <a href="/profile/1"><h4> anthony inabo</h4></a>
 </div>
  <img src="/storage/explained/firefox_HCJiElO4LW.png" class="w-100" alt="">
  <p><span class="h3"> 1 </span>Postez une image sur votre mur.</p>
</div>

<div class="card mt-5 ml-5" style="width: 50rem;">
    <div class="card-body">  
 <a href="/profile/1"><h4> anthony inabo </h4></a>
 </div>
  <img src="/storage/explained/firefox_rBaSjMHYXo.png" class="w-100" alt="">
  <p><span class="h3"> 2 </span>Partagez un petit mot sur cette photo. (caption)</p>
</div> 
</div>
@endsection