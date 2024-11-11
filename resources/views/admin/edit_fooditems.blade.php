@include('admin.include.header')
@include('admin.include.navbar')
@include('admin.include.sidebar')

    <div class="container-fluid px-4">
    <h1 class="mt-4 mb-4">Update Food Item Form</h1>
    @if (isset($editInfo))
    <form class="border" action="{{url('/edit_fooditems_program')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="hid" value="{{$editInfo->id}}">
        <div class="px-4 form-group row">
            <label for="catagory_name" class="col-sm-2 col-form-label">Enter Catagory Name</label>
            <div class="col-sm-10">
            <input type="text" name="catagory_name" placeholder="Enter Catagory Name" class="form-control" value="{{$editInfo->CatagoryName}}">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
            <label for="food_name" class="col-sm-2 col-form-label">Enter Food Name</label>
            <div class="col-sm-10">
            <input type="text" name="food_name" placeholder="Enter Food Name" class="form-control" value="{{$editInfo->FoodName}}">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
            <label for="price" class="col-sm-2 col-form-label">Enter Price</label>
            <div class="col-md-4">
            <input type="text" name="price" placeholder="Enter Price" class="form-control" value="{{$editInfo->Price}}">
            </div>
            
            <label for="quantity" class="col-sm-2 col-form-label">Enter Quantity</label>
            <div class="col-md-4">
            <input type="text" name="quantity" placeholder="Enter Quatity" class="form-control" value="{{$editInfo->Quantity}}">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
            <label for="food_description" class="col-sm-2 col-form-label">Enter Food Description</label>
            <div class="col-sm-10">
            <input type="text" name="food_description" placeholder="Enter Food Name" class="form-control" value="{{$editInfo->Description}}">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
            <label for="image" class="col-sm-2 col-form-label">Enter Image</label>
            <div class="col-sm-10">
            <input type="file" name="image" class="form-control">
            <img src="{{$editInfo->image}}"height=100px width=100px>
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
        <div class="col-sm-10">
            <button name = "submit_btn" class="btn btn-primary">Update Food Item</button>
        </div>
        </div>
    </form>
    @endif
    </div>

@extends('admin.include.footer')