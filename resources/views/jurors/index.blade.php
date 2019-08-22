@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <div class="card-header">
      Jurors
  </div>

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($jurors as $juror)
        <tr>
            <td>{{$juror->id}}</td>
            <td>{{$juror->first_name}}</td>
            <td>{{$juror->last_name}}</td>
            <td><a href="{{ route('jurors.edit',$juror->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('jurors.destroy', $juror->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
