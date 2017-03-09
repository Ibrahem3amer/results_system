<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <title>Higher Energy Institute</title>
	    <link href="https://fonts.googleapis.com/css?family=Amiri" rel="stylesheet"> 
	    <!-- Bootstrap Core CSS -->
	    <link href="{{URL::to('/css/bootstrap.min.css')}}" rel="stylesheet">
	    <!-- Custom CSS -->
		<link href = "{{URL::to('/css/styles.css')}}" rel = "stylesheet">
		<link href = "{{URL::to('/css/font-awesome.min.css')}}" rel = "stylesheet">
	</head>
	<body>
		<div id = "wrapper" class = "container-fluid"> 
		</div>
			<a href="{{URL::to('/')}}">
				<img src="{{URL::to('/images/logo.jpg')}}" class="img-responsive logo" />
			</a>
			<div class="input-holder">
			    <h3>الكود: {{$user->code}}</h3>
			    <h3>الاسم: {{$user->name}}</h3>
			    <div class="table-responsive">
					<table class="table table-striped" style="direction: ltr;">
					  <tr>
					  	@foreach($subjects as $name => $value)
					    <td>{{$name}}</td>
					    @endforeach
					  </tr>
					  <tr>
					  	@foreach($subjects as $name => $value)
					    <td>{{$value}}</td>
					    @endforeach
					  </tr>
					</table>
			    </div>					
			  	<h3>المجموع النهائي: {{$user->total}}</h3>
			  	<h3>النسبة المئوية: {{$user->percentage}}%</h3>
			</div>

	    <!-- jQuery -->
	    <script src="{{URL::to('/js/jquery.js')}}"></script>

	    <!-- Bootstrap Core JavaScript -->
	    <script src="{{URL::to('/js/bootstrap.min.js')}}"></script>
	</body>

</html>
