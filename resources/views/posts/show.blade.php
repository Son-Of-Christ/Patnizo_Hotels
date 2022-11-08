@extends('base')
@section('title', 'View')
@section('Main')

)
<div class="card">

   <div class="card-body">
     This is some text within a card body.
     
     @foreach($customers as $customer
    <h3>{{$customer->customerId}}</h3>
    <p>{{$customer->FirstName}}</p>
    <p>{{$customer->LastName}}</p>
    <p>{{$customer->Telephone}}</p>
    <p>{{$customer->Password}}</p>
    @endforeach
</div>
</div>
@endsection   