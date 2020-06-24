@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-4 offset-2">
    <h1 >Add a contact</h1>
    <div>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        <br>
      @endif
      <form method="post" action="{{ route('contacts.store') }}">
        @csrf
        <div class="form-group">
          <label for="first_name">First Name:</label>
          <input type="text" name="first_name" class="form-control">
        </div>

        <div class="form-group">
          <label for="last_name">Last Name:</label>
          <input type="text" name="last_name" class="form-control">
        </div>

        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" name="address" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary-outline">Add</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-primary-outline">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection