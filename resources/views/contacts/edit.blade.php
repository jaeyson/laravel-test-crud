@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="row justify-content-center">
  <div class="col-sm-4">
<h5>{{$title}}</h5>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <br>
    @endif

    <form method="post" action="{{ route('contacts.update', $contact->id) }}">
      @method('PATCH')
      @csrf

      <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="{{ $contact->first_name }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="{{ $contact->last_name }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ $contact->address }}" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">update</button>
      <a href="{{ route('contacts.index') }}" class="btn btn-primary-outline">cancel</a>
    </form>
  </div>
</div>
@endsection