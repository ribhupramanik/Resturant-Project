@include('admin.include.header')
@include('admin.include.navbar')
@include('admin.include.sidebar')

<div class="container-fluid px-4">
    @if (isset($editInfo))
    <h1 class="mt-4 mb-4">Update Form</h1>
    <form class="border" action="{{url('/edit_catagory_program')}}" method="POST">
        @csrf
        <input type="hidden" name="hid" value="{{$editInfo->id}}">
        <div class="px-4 form-group row">
            <label for="catagory_name" class="col-sm-2 col-form-label">Enter Catagory Name</label>
            <div class="col-sm-10">
            <input type="text" name="catagory_name" class="form-control" value="{{$editInfo->CatagoryName}}">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
        <div class="col-sm-10">
            <button class="btn btn-primary">Update Catagory</button>
        </div>
        </div>
    </form>
    @endif
    </div>

@extends('admin.include.footer')