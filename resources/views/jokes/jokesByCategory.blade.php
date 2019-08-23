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
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
