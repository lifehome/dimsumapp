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
            <li><a href="{{ URL::to('dimsum/create') }}">&#26032;&#22686;&#40670;&#24515;</a></li>
            <li class="active"><a href="#">&#28687;&#35261;&#40670;&#24515;&#38917;&#30446;</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
        <h2>&#40670;&#24515;&#38917;&#30446;&#65306;<small>{{ $dimsum->name }} <small>(#{{ $dimsum->id }})</small></small></h2>

        <!-- will be used to show any messages -->
@if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

        <div class="jumbotron">
            <div class="row">
                <div class="col-md-5">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th class="col-md-2" id="dimsum_id">&#40670;&#24515;&#32;&#73;&#68;</th>
                            <td class="col-md-3" id="dimsum_id">{{ $dimsum->id }}</td>
                        </tr><tr>
                            <th class="col-md-2" id="dimsum_name">&#40670;&#24515;&#21517;&#31281;</th>
                            <td class="col-md-3" id="dimsum_name">{{ $dimsum->name }}</td>
                        </tr><tr>
                            <th class="col-md-2" id="dimsum_dishtype">&#40670;&#24515;&#39006;&#21029;</th>
                            <td class="col-md-3" id="dimsum_dishtype">{{ $dimsum->dishtype }}</td>
                        </tr><tr>
                            <th class="col-md-2" id="dimsum_stocks">&#40670;&#24515;&#36008;&#23384;</th>
                            <td class="col-md-3" id="dimsum_stocks">{{ $dimsum->stocks }}</td>
                        </tr><tr>
                            <th class="col-md-2" id="dimsum_price">&#40670;&#24515;&#21806;&#20729;</th>
                            <td class="col-md-3" id="dimsum_price">${{ $dimsum->price }}</td>
                        </tr><tr>
                            <th class="col-md-2" id="dimsum_actions">&#31649;&#29702;&#21205;&#20316;</th>
                            <td class="col-md-3" id="dimsum_actions">{{ Form::open(array('url' => 'dimsum/'.$dimsum->id)) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::button('<i class="fa fa-trash-o"></i>&#32;&#21034;&#38500;', array('type' => 'submit', 'class' => 'btn btn-sm inform-btn btn-danger')) }}
                            {{ Form::close() }}
                            <a href="{{ URL::to('dimsum/'.$dimsum->id.'/edit') }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i>&#32;&#20462;&#25913;</a></td>
                        </tr><tr>
                            <th class="col-md-2" id="dimsum_created-at">&#33756;&#24335;&#24314;&#31435;&#26085;&#26399;</th>
                            <td class="col-md-3" id="dimsum_created-at">{{ $dimsum->created_at }}</td>
                        </tr><tr>
                            <th class="col-md-2" id="dimsum_updated-at">&#26368;&#24460;&#20462;&#25913;&#26085;&#26399;</th>
                            <td class="col-md-3" id="dimsum_updated-at">{{ $dimsum->updated_at }}</td>
                        </tr>
                    </table>
                </div>
                </div>
                <div class="col-md-5">
                    {{ HTML::image($dimsum->pic_path, $dimsum->name.'(#'.$dimsum->id.')', array('class' => 'img-responsive text-center')) }}
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</html>