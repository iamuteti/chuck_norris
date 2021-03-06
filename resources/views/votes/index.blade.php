@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <div class="card-header">
      Votes
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
          <td>Joke</td>
          <td>Juror</td>
          <td>Vote</td>
        </tr>
    </thead>
    <tbody>
        @foreach($votes as $vote)
        <tr>
            <td>{{$vote->id}}</td>
            <td>{{$vote->joke->title}}</td>
            <td>{{$vote->juror->first_name}} {{$vote->juror->last_name}}</td>
            <td>
            @if($vote->vote == 1)
                        Yes
                    @elseif ($vote->vote == 2)
                        No
                    @endif
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
