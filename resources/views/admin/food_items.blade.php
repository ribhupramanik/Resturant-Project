@include('admin.include.header')
@include('admin.include.navbar')
@include('admin.include.sidebar')

<div class="container-fluid px-4">
<h1 class="mt-4 mb-4">Food Items</h1>
@if (isset($allInfo))
            <table class="table table-hover table-bordered" >
                <tr align="center">
                    <td>Sl.No</td>
                    <td>Catagory Name</td>
                    <td>Food Name</td>
                    <td>Price</td>
                    <td>Quantity Available</td>
                    <td>Description</td>
                    <td>Image</td>
                    <td>Actions</td>
                </tr>
               @foreach ($allInfo->all() as $all)
                <tr align="center">
                    <td>{{$all->id}}</td>
                    <td>{{$all->CatagoryName}}</td>
                    <td>{{$all->FoodName}}</td>
                    <td>{{$all->Price}}</td>
                    <td>{{$all->Quantity}}</td>
                    <td width="30%">{{$all->Description}}</td>
                    <td> <img src="{{$all->image}}"height="100px" width="100px"> </td>
                    <td><a href="{{url('/edit_fooditems')}}{{$all->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                        <a href="{{url('delete_fooditems')}}{{$all->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </table> 
@endif  
    <a href="{{url('add_fooditems')}}"><button type="button" class="btn btn-outline-success"><i class="fa fa-plus"></i>Add New Food Item</button></a>
</div>

@extends('admin.include.footer')