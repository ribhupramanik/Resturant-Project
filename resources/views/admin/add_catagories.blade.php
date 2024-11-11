@include('admin.include.header')
@include('admin.include.navbar')
@include('admin.include.sidebar')

<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4">Add Catagory Form</h1>
    <form class="border" action="{{url('add_catagory')}}" method="POST">
        @csrf
        <div class="px-4 form-group row">
            <label for="catagory_name" class="col-sm-2 col-form-label">Enter Catagory Name</label>
            <div class="col-sm-10">
            <input type="text" name="catagory_name" placeholder="Enter Catagory Name" class="form-control">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
        <div class="col-sm-10">
            <button class="btn btn-primary">Add New Catagory</button>
        </div>
        </div>
    </form>
    </div>

@extends('admin.include.footer')