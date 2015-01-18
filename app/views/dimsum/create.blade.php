<!DOCTYPE html>
<html>
<head>
  <title>DimOrder - Dimsum Listing</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  {{ HTML::style('css/dimsums.css') }}  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">DimOrder</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('dimsum') }}">&#40670;&#24515;&#21015;&#34920;</a></li>
            <li class="active"><a href="#">&#26032;&#22686;&#40670;&#24515;</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
        <h2>&#26032;&#22686;&#40670;&#24515;</h2>

@if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
            {{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'dimsum', 'files' => true, 'class' => 'form')) }}
            <div class="form-group">
                {{ Form::label('name', '&#40670;&#24515;&#21517;&#31281;') }}
                {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('dishtype', '&#40670;&#24515;&#39006;&#21029;') }}
                {{ Form::select('dishtype', array('S' => '&#23567;&#40670;', 'M' => '&#20013;&#40670;', 'L' => '&#22823;&#40670;', 'X' => '&#29305;&#40670;', 'D' => '&#29305;&#20729;&#40670;&#24515;'), Input::old('dishtype'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('name', '&#40670;&#24515;&#22294;&#29255;') }}
                {{ Form::file('picture') }}
            </div>

            <div class="form-group">
                {{ Form::label('stocks', '&#40670;&#24515;&#36008;&#23384;') }}
                {{ Form::text('stocks', Input::old('stocks'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('price', '&#40670;&#24515;&#21806;&#20729;') }}
                {{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
            </div>

            {{ Form::submit('Create the dish!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</html>