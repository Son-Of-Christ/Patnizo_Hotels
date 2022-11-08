@extends('base')
 
@section('title', 'Welcome to First Page')
 
@section('Main')
<a href="{{route('posts.create')}}" class="btn btn-success" >Create New</a>
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success mt-3">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>

<table class="table mt-3" >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Email</th>
      <th scope="col">Telephone</th>
      <th scope="col">Password</th>
      <th scope="col">created_at</th>
      <th scope="col">updated_at</th>
    </tr>
  </thead>
  <tbody>
  @foreach($customers as $customer)
    <tr>
      <th scope="row">{{$customer->customerId}}</th>
      <td>{{$customer->FirstName}}</td>
      <td>{{$customer->LastName}}</td>
      <td>{{$customer->Email}}</td>
      <td>{{$customer->Telephone}}</td>
      <td>{{$customer->Password}}</td>
      <td>{{$customer->created_at}}</td>
      <td>{{$customer->updated_at}}</td>
     
      
      <td>
        <a href="{{route('posts.show',$customer->customerId)}}" class="btn btn-success">View</a>
        <a href="{{route('posts.edit',$customer->customerId)}}" class="btn btn-primary"  >Update</a>
        <form action="{{route('posts.destroy',$customer)}}"method="POST" style="display: contents;">
         @csrf
         @method('DELETE')
        <button type="submit "id="detbut"  class="btn btn-danger" >Delete</button>
        </form>
      </td>
    </tr>
   @endforeach
</tbody>
</table>
@endsection

