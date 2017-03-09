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
			<img src="{{URL::to('/images/logo.jpg')}}" class="img-responsive logo" />
			<div class="input-holder">
				<form action="{{URL::to('/search')}}" method="post" class="input_form text-center">
					{{ csrf_field() }}
					<h3>أدخل كود الطالب</h3>
					<input type="number" name="search_input" class="student_code" />
					<input type="submit" value="بحث" />
				</form>				
			</div>

	    <!-- jQuery -->
	    <script src="{{URL::to('/js/jquery.js')}}"></script>

	    <!-- Bootstrap Core JavaScript -->
	    <script src="{{URL::to('/js/bootstrap.min.js')}}"></script>
	</body>

</html>