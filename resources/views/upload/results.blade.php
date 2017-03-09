@foreach($students as $student)
	<h1>{{$student->name}}</h1>
	<h1>{{$student->code}}</h1>
	<h1>{{$student->class}}</h1>
	<?php $subjects = json_decode($student->subjects); ?>
	@foreach($subjects as $subject => $score)
		<h2>{{$subject}} ==> {{$score}}</h2>
	@endforeach
	<hr />
@endforeach