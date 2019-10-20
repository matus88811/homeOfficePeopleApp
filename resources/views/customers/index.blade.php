@extends('layout')
@section('content')
<div class="group info-wrapper">
	@if($customers->count() > 0)
	<div class="row">
		<div class="col-md-4">
			@include('flash::message')
		</div>
	</div>
    <div class="left">
        <h3 class="top-gap">List of Customers </h3>
    </div> 
     <div class="add-customer left">
         <a class="add-customer-button"href="/customers/create">Add new customer</a>
     </div>
     @else
     <p class="empty-content"> Start here to add new customer <a class="add-customer-button left-gap"href="/customers/create">New customer</a> </p>
     @endif
</div>
@if($customers->count() > 0)
 <table class="customer-table">
     <thead>
         <tr>
           <th>Name</th>
           <th>Country</th>
           <th>Email</th>
           <th>Number</th>
           <th>Birthday</th>
          </tr>
       </thead>
        <tbody>
          @foreach($customers as $customer)
           <tr>
            <td>{{$customer->name}}</td>
            <td>{{$customer->country}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->number}}</td>
            <td>{{$customer->birthday->format('d.m.Y')}}</td>
            <td><a class="customer-button update"href="customers/{{$customer->id}}/edit">Update</a>
            	<form class="delete-customer" action="/customers/{{$customer->id}}" method="post">
            		@csrf
            		@method('delete')
            	<button type="submit" class="customer-button delete">x</button>
            	</form>
            </td>
           </tr>
           @endforeach
          </tbody>
    </table>
    {{$customers->links()}}
    @endif
@endsection