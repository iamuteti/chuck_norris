@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Vote
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
      <form method="post" action="{{ route('votes.store') }}">
          <div class="form-group">
              @csrf
              <select class="form-control" name="vote">
                              <option>Choose vote</option>
                              <option value="1">Yes</option>
                              <option value="2">No</option>
                            </select>
          </div>
            <div class="form-group">
              <select class="form-control" name="joke_id">
                <option>Select joke</option>
                @foreach ($jokes as $joke)
                  <option value="{{ $joke->id }}">
                      {{ $joke->title }}
                  </option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
                        <select class="form-control" name="juror_id">
                          <option>Select juror</option>
                          @foreach ($jurors as $juror)
                            <option value="{{ $juror->id }}">
                                {{ $juror->first_name }} {{ $juror->last_name }}
                            </option>
                          @endforeach
                        </select>
                    </div>

          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
