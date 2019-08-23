@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <div class="card-header">
      Jokes
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
          <td>Title</td>
          <td>Categories</td>
          <td>Date</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($jokes as $joke)
        <tr>
            <td>{{$joke->id}}</td>
            <td>{{$joke->title}}</td>
            <td>
            @foreach($joke->categories as $category)
                {{ $category->name }},
                @endforeach
            </td>
            <td>{{$joke->date}}</td>
            <td><a href="{{ route('joke-edit', ['joke' => $joke->id])}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('joke-destroy', $joke->id)}}" method="post">
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
