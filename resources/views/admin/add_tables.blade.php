@include('admin.include.header')
@include('admin.include.navbar')
@include('admin.include.sidebar')

<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4">Add Table Form</h1>
    <form class="border" action="{{url('add_tables')}}" method="POST">
        @csrf
        <div class="px-4 form-group row">
            <label for="table_number" class="col-sm-2 col-form-label">Enter Table Number</label>
            <div class="col-sm-10">
            <input type="number" name="table_number" placeholder="Enter Table Number" class="form-control">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
        <div class="col-sm-10">
            <button class="btn btn-primary">Add New Table</button>
        </div>
        </div>
    </form>
    </div>

@extends('admin.include.footer')