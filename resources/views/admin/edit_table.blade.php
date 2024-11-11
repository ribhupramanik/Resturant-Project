@include('admin.include.header')
@include('admin.include.navbar')
@include('admin.include.sidebar')

<div class="container-fluid px-4">
    @if (isset($editInfo))
    <h1 class="mt-4 mb-4">Update Table Form</h1>
    <form class="border" action="{{url('/edit_tables_program')}}" method="POST">
        @csrf
        <input type="hidden" name="hid" value="{{$editInfo->Id}}">
        <div class="px-4 form-group row">
            <label for="table_number" class="col-sm-2 col-form-label">Enter Table Number</label>
            <div class="col-sm-10">
            <input type="text" name="table_number" class="form-control" value="{{$editInfo->TableNumber}}">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
            <label for="status" class="col-sm-2 col-form-label">Change Reservation Status</label>
            <div class="col-sm-2 form-check pt-3">
            <input type="radio" name="status" class="form-check-inline" value="Unreserved"@if ($editInfo->Status=='Unreserved')checked @endif
            >
            <label class="form-check-label" for="status">Unreserved</label>
            </div>
            <div class="col-sm-2 form-check pt-3">
            <input type="radio" name="status" class="form-check-inline" value="Reserved"@if ($editInfo->Status=='Reserved')checked @endif
            >
            <label class="form-check-label" for="status">Reserved</label>
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