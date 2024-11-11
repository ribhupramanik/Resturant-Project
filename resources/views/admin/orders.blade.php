@include('admin.include.header')
@include('admin.include.navbar')
@include('admin.include.sidebar')

<div class="container-fluid px-4">
<h1 class="mt-4 mb-4">Orders</h1>
@if (isset($allInfo))
            <table class="table table-hover table-bordered" >
                <tr align="center">
                    <td>Order No</td>
                    <td>Food Name</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Table Number</td>
                    <td>Order Date</td>
                    <td>Actions</td>
                </tr>
               @foreach ($allInfo->all() as $all)
                <tr align="center">
                    <td>{{$all->order_no}}</td>
                    <td>
                        @foreach(explode('.', $all->name) as $row)
                            <span>{{ $row }}</span><br>
                         @endforeach
                    </td>
                    <td>
                        @foreach(explode('.', $all->quantity) as $row)
                            <span>{{ $row }}</span><br>
                         @endforeach
                    </td>
                    <td>{{$all->total_price}}</td>
                    <td>{{$all->table_number}}</td>
                    <td>{{$all->DateOfCreation}}</td>
                    <td><a href="{{url('delete_orders')}}{{$all->id}}"><button type="button" class="btn btn-success">Mark as Completed</button></a>
                    </td>
                </tr>
                @endforeach
            </table> 
@endif  
   
</div>

@extends('admin.include.footer')