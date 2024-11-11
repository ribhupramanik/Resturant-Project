@include('admin.include.header')
@include('admin.include.navbar')
@include('admin.include.sidebar')

<div class="container-fluid px-4">

<h1 class="mt-4 mb-4">Food Catagories</h1>
@if (isset($allInfo))
            <table class="table table-hover table-bordered" >
                <tr align="center">
                    <td>Sl.No</td>
                    <td>Catagory Name</td>
                    <td>Date of Creation</td>
                    <td>Actions</td>
                </tr>
                @foreach ($allInfo->all() as $all)
                    <tr align="center">
                       <td>{{$all->id}}</td>
                       <td>{{$all->CatagoryName}}</td>
                       <td>{{$all->Date}}</td>
                       <td><a href="{{url('/edit_catagory')}}{{$all->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                            <a href="{{url('/delete_catagory')}}{{$all->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
            </table>
@endif
<a href="{{url('add_catagory')}}"><button type="button" class="btn btn-outline-success"><i class="fa fa-plus"></i>Add New Catagory</button></a>
</div>

@extends('admin.include.footer')



