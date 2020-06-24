@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
    <div class="display-3">update a contact</div>

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

      <button type="submit" class="btn btn-primary-outline">update</button>
      <a href="{{ route('contacts.index') }}" class="btn btn-primary">cancel</a>

    </form>
  </div>
</div>
@endsection