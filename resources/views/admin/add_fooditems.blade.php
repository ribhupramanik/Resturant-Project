@include('admin.include.header')
@include('admin.include.navbar')
@include('admin.include.sidebar')

    <div class="container-fluid px-4">
    <h1 class="mt-4 mb-4">Add Food Item Form</h1>
    <form class="border" action="{{url('/add_new_food')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="px-4 form-group row">
            <label for="catagory_name" class="col-sm-2 col-form-label">Enter Catagory Name</label>
            <div class="col-sm-10">
            <input type="text" name="catagory_name" placeholder="Enter Catagory Name" class="form-control">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
            <label for="food_name" class="col-sm-2 col-form-label">Enter Food Name</label>
            <div class="col-sm-10">
            <input type="text" name="food_name" placeholder="Enter Food Name" class="form-control">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
            <label for="price" class="col-sm-2 col-form-label">Enter Price</label>
            <div class="col-md-4">
            <input type="text" name="price" placeholder="Enter Price" class="form-control">
            </div>
            
            <label for="quantity" class="col-sm-2 col-form-label">Enter Quantity</label>
            <div class="col-md-4">
            <input type="text" name="quantity" placeholder="Enter Quatity" class="form-control">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
            <label for="food_description" class="col-sm-2 col-form-label">Enter Food Description</label>
            <div class="col-sm-10">
            <input type="text" name="food_description" placeholder="Enter Food Name" class="form-control">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
            <label for="image" class="col-sm-2 col-form-label">Enter Image</label>
            <div class="col-sm-10">
            <input type="file" name="image" class="form-control">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
        <div class="col-sm-10">
            <button name = "submit_btn" class="btn btn-primary">Add New Food Item</button>
        </div>
        </div>
    </form>
    </div>

@extends('admin.include.footer')