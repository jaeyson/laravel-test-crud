@php
  $date_created = $user->created_at;
  $full_name_month = date("F", mktime(0, 0, 0, strtotime($date_created), 1));
  $month = substr($full_name_month, 0, 3);
  $year = $date_created->format('Y');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-2">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active disabled">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{$user->name}}</h5>
          </div>
          <small>Started {{$month}} {{$year}}</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start disabled">
          <small class="text-muted">Profile</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
          <small class="text-muted">Account</small>
        </a>
      </div>
    </div>

    <div class="col-6">
      <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label hidden for="email">Email</label>
            <input type="email" class="form-control" id="email" value="{{$user->email}}">
          </div>
          <div class="form-group col-md-6">
            <label hidden for="name">Full Name</label>
            <input type="text" class="form-control" id="name" value="{{$user->name}}">
          </div>
        </div>
        <div class="form-group">
          <label hidden for="address">Address</label>
          <input type="text" class="form-control" id="address" placeholder="Address">
        </div>
        <h5>TODO</h5>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>
@endsection
