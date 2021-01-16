@extends('layouts.home')
@section('content')
<head>
	<style type="text/css">
		.main{
			min-height:65vh;
		}
	</style>
</head>
<body><br>
	<!--google map plugin-->
	<div class="google_maps" style="width:100%;margin:auto;">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1899.8456481766193!2d90.61891651941444!3d23.598836424039387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37544d3f00a8ebb3%3A0x6163d1ac69644024!2sNeyamat%20Shukria%20Shopping%20Complex!5e0!3m2!1sen!2sbd!4v1610773511046!5m2!1sen!2sbd" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>
	<div class="main">
		@include('parts.contact')
		
	</div>
</body>
@endsection