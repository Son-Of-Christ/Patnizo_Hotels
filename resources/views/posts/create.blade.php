@extends('base')
 @section('title', 'Register')
 
@section('Main')


<div>
@if($errors->any())
<ul>
<div class="div" class="alert alert-danger">
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif

<form method="POST" action="{{route('posts.store')}}">
    @csrf
<div class="mb-3">
    <label for="" class="form-label">FirstName</label>
    <input type="text" class="form-control" id="fn" name="firstname">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">LastName</label>
    <input type="text" class="form-control" id="ln" name="lastname">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="em" name="customeremail">
  </div>
  <div class="mb-3">
    <label for="telephone" class="form-label">Telephone</label>
    <input type="telephone" class="form-control" id="tel" name="telephone">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="pass" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection

