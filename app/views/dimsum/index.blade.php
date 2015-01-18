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
            <li class="active"><a href="#">&#40670;&#24515;&#21015;&#34920;</a></li>
            <li><a href="{{ URL::to('dimsum/create') }}">&#26032;&#22686;&#40670;&#24515;</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
        <h1>&#40670;&#24515;&#21015;&#34920;</h1>

        <!-- will be used to show any messages -->
@if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td id="dimsum_id">&#40670;&#24515;&#32;&#73;&#68;</td>
                        <td id="dimsum_name">&#40670;&#24515;&#21517;&#31281;</td>
                        <td id="dimsum_dishtype">&#40670;&#24515;&#39006;&#21029;</td>
                        <td id="dimsum_stocks">&#40670;&#24515;&#36008;&#23384;</td>
                        <td id="dimsum_price">&#40670;&#24515;&#21806;&#20729;</td>
                    </tr>
                </thead>
                <tbody>
@foreach($dimsums as $key => $value)
                    <tr>
                        <td id="dimsum_id">#{{ $value->id }}
                            {{ Form::open(array('url' => 'dimsum/'.$value->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::button('<i class="fa fa-trash-o"></i>', array('type' => 'submit', 'class' => 'btn btn-xs inform-btn btn-danger')) }}
                            {{ Form::close() }}
                            <a href="{{ URL::to('dimsum/'.$value->id.'/edit') }}" class="btn btn-xs inform-btn btn-info"><i class="fa fa-pencil-square-o"></i></a>
                        </td>
                        <td id="dimsum_name"><a href="{{ URL::to('dimsum/'.$value->id) }}">{{ $value->name }}</a></td>
                        <td id="dimsum_dishtype">{{ $value->dishtype }}</td>
                        <td id="dimsum_stocks">{{ $value->stocks }}</td>
                        <td id="dimsum_price">${{ $value->price }}</td>
                    </tr>
@endforeach
                </tbody>
            </table>
        </div>
        <nav class="text-center">
            {{ $dimsums->links() }}
        </nav>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</html>