@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Juror
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
      <form method="post" action="{{ route('juror-update', $juror->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">First Name:</label>
          <input type="text" class="form-control" name="first_name" value={{ $juror->first_name }} />
        </div>
        <div class="form-group">
                  <label for="name">Last Name:</label>
                  <input type="text" class="form-control" name="last_name" value={{ $juror->last_name }} />
                </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
