<!DOCTYPE html>
<html lang="en">
<head>

 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Euro App</title>

</head>
<body data-target="spy-scroll-id">
 <!--<nav class="navbar navbar-inverse">
 <div class="container-fluid">
 <div class="navbar-header">
 <a class="navbar-brand" href="{{url('/home')}}">Home</a>
 </div>
 <div>
 <ul class="nav navbar-nav">
 <li> <a href="{{url('/view')}}">View All</a></li>
 <li> <a href="{{url('/new')}}">Add New</a></li>
 <li> <a href="{{url('/edit')}}">Edit/Delete</a></li>
 <li> <a href="{{url('/viewRoom')}}">View Room</a></li>
 <li> <a href="{{url('/newRoom/0')}}">New Room</a></li>
 <li> <a href="{{url('/editRoom')}}">Room</a></li>
 </ul>
 </div>
 </div>
 </nav>-->
 <nav class="navbar navbar-inverse">
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Auto hiding navbar</a>
        </div>
        <div class="navbar-collapse collapse" id="spy-scroll-id">
          <ul class="nav navbar-nav">
            <li><a href="{{url('/home')}}">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="{{url('/contact')}}">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Room <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="active"> <a href="{{url('/editRoom')}}">View</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li> <a href="{{url('/newRoom/0')}}">New Room</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Default</a></li>
          </ul>
        </div>
      </div>
    </div>
     </nav>
	@if(Session::has('flash_message'))
		<div class="alert alert-success">
			{{ Session::get('flash_message') }}
		</div>
	@endif

	@if( count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some errors with yours input.<br><br>
			<ul>
				@foreach( $errors->all() as $error)
					<li>{{ $error }} </li>
				@endforeach
			</ul>
		</div>
	@endif

<div class="container">
 @yield('content')
</div>
<script>
//window.alert(window.location.pathname);
</script>
<!-- online links -->
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</body>
</html>