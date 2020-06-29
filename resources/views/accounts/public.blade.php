@php
  $date_created = $user->created_at;
  $full_name_month = date("F", mktime(0, 0, 0, strtotime($date_created), 1));
  $month = substr($full_name_month, 0, 3);
  $year = $date_created->format('Y');
  $unique = substr(base64_encode(md5( mt_rand() )), 0, 32);
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <div class="jumbotron">
    <h1 class="display-4">{{$user->name}}</h1>
      @if(Auth::check())
        <a href="mailto:{{$user->email}}">{{$user->email}}</a>
        <p class="lead">
          Member since {{$month}} {{$year}}
          {{$unique}}
        </p>
      @else
        <p class="lead">Login to see the email</p>
      @endif
    <hr class="my-4">
  </div>
</div>
@endsection
