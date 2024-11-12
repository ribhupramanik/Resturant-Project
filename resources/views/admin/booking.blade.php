@include('admin.include.header')
@include('admin.include.navbar')
@include('admin.include.sidebar')

<div class="container-fluid px-4">

<h1 class="mt-4 mb-4">Bookings</h1>
@if (isset($allInfo))
            <table class="table table-hover table-bordered" >
                <tr align="center">
                    <td>Sl.No</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Time</td>
                    <td>People</td>
                    <td>Message</td>
                    <td>Actions</td>
                </tr>
                @foreach ($allInfo->all() as $all)
                    <tr align="center">
                       <td>{{$all->id}}</td>
                       <td>{{$all->name}}</td>
                       <td>{{$all->email}}</td>
                       <td>{{$all->time}}</td>
                       <td>{{$all->people}}</td>
                       <td>{{$all->message}}</td>
                       <td><a href="{{url('/edit_booking')}}{{$all->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                            <a href="{{url('/delete_booking')}}{{$all->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
            </table>
@endif
</div>

@extends('admin.include.footer')



