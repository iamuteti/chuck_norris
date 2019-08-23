<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chuck Norris</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="{{route('jokes')}}">Chuck Norris</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('jokes')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
              <a class="nav-link" href="{{route('joke-create')}}">Joke Add</span></a>
            </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('categories')}}">Categories</a>
      </li>
            <li class="nav-item">
                    <a class="nav-link" href="{{route('category-create')}}">Category Add</span></a>
                  </li>
      <li class="nav-item">
                    <a class="nav-link" href="{{route('jurors')}}">Jurors</a>
                  </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{route('juror-create')}}">Juror Add</span></a>
                              </li>
            <li class="nav-item">
                          <a class="nav-link" href="{{route('votes-view')}}">Votes</a>
                        </li>
    </ul>

  </div>
</nav>

  <div class="container">
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
