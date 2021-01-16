@extends('layouts.home')
@section('content')
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Food Items</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <style type="text/css">
      #img{
        width:100%;
        height: 30vh;
      }
    </style>

  </head>

  <body>

    <header style="margin-top:2rem;">
      </header>

    <main role="main">

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">

@foreach($foods as $food)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img id="img" class="card-img-top" src="/images/food/{{$food->image}}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">{{$food->name}}</p>
                  <p class="card-text">BDT: {{$food->price}} /= <small>Per Head</small> </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="/food_item/{{$food->id}}">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </a>
                      <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-shopping-cart"></i></button>
                    </div>
                    <small class="text-muted"> {{$food->created_at->diffForHumans()}} </small>
                  </div>
                </div>
              </div>
            </div>
@endforeach

{{$foods->links()}}       
           

            
            
            

            
            
            
          </div>
        </div>
      </div>

    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
  </body>
@endsection