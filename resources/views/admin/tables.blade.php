@include('admin.include.header')
@include('admin.include.navbar')
@include('admin.include.sidebar')

<div class="container-fluid px-4">

<h1 class="mt-4 mb-4">Tables</h1>
@if (isset($allInfo))
            <table class="table table-hover table-bordered" >
                <tr align="center">
                    <td>Sl.No</td>
                    <td>Table Number</td>
                    <td>Date of Creation</td>
                    <td>Status</td>
                    <td>Actions</td>
                </tr>
                @foreach ($allInfo->all() as $all)
                    <tr align="center">
                       <td>{{$all->Id}}</td>
                       <td>{{$all->TableNumber}}</td>
                       <td>{{$all->DateOfCreation}}</td>
                       <td>{{$all->Status}}</td>
                       <td><a href="{{url('/edit_table')}}{{$all->Id}}"><button type="button" class="btn btn-success">Edit</button></a>
                            <a href="{{url('/delete_table')}}{{$all->Id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
            </table>
@endif
<a href="{{url('add_tables')}}"><button type="button" class="btn btn-outline-success"><i class="fa fa-plus"></i>Add New Table</button></a>
</div>

@extends('admin.include.footer')



