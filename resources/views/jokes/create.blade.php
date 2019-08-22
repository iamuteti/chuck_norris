@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Joke
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('jokes.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <select class="form-control" name="categories[]" multiple="multiple">
                <option>Select categories</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">
                      {{ $category->name }}
                  </option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" name="date"/>
          </div>

          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
