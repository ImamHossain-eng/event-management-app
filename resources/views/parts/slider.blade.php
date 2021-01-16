<head>
  <style type="text/css">
    .carousel-item{
      height:70vh;
    }
  </style>
</head>
<body>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('images/slider/abc.jpg')}}" alt="First slide">
    </div>
    @foreach($photos as $photo)
    <div class="carousel-item">
      <img class="d-block w-100" src="images/slider/{{$photo->image}}" alt="Second slide">
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  
</body>
