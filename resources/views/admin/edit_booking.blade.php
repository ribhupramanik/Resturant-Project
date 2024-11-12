@include('admin.include.header')
@include('admin.include.navbar')
@include('admin.include.sidebar')

<div class="container-fluid px-4">
    @if (isset($editInfo))
    <h1 class="mt-4 mb-4">Update Booking Form</h1>
    <form class="border" action="{{url('/edit_booking_program')}}" method="POST">
        @csrf
        <input type="hidden" name="hid" value="{{$editInfo->id}}">
        <div class="px-4 form-group row">
            <label for="name" class="col-sm-2 col-form-label">Enter Name</label>
            <div class="col-sm-10">
            <input type="text" name="name" class="form-control" value="{{$editInfo->name}}">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
            <label for="email" class="col-sm-2 col-form-label">Enter Email</label>
            <div class="col-sm-10">
            <input type="email" name="email" class="form-control" value="{{$editInfo->email}}">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
            <label for="time" class="col-sm-2 col-form-label">Enter Date and Time</label>
            <div class="col-sm-10">
            <input type="date" name="time" class="form-control" value="{{$editInfo->time}}">
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
            <label for="people" class="col-sm-2 col-form-label">Select Number of People</label>
            <div class="col-sm-10">
                <select class="form-select" name="people" id="people">
                    <option value="1" {{ $editInfo->people == 1 ? 'selected' : '' }}>People 1</option>
                    <option value="2" {{ $editInfo->people == 2 ? 'selected' : '' }}>People 2</option>
                    <option value="3" {{ $editInfo->people == 3 ? 'selected' : '' }}>People 3</option>
                    <option value="4" {{ $editInfo->people == 4 ? 'selected' : '' }}>People 4</option>
                </select>
            </div>
        </div>

        &nbsp;
        <div class="px-4 form-group row">
            <label for="message" class="col-sm-2 col-form-label">Enter Message</label>
            <div class="col-sm-10">
            <textarea class="form-control" name="message" style="height: 100px">{{$editInfo->message}}</textarea>
            </div>
        </div>
        &nbsp;
        <div class="px-4 form-group row">
        <div class="col-sm-10">
            <button class="btn btn-primary">Update Booking</button>
        </div>
        </div>
    </form>
    @endif
    </div>

@extends('admin.include.footer')