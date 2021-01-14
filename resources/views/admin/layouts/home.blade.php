<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">


<!--Sidebar-->


<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  @if(Auth::user()->id===7)
  <a href="/admin/register" class="w3-bar-item w3-button">Create New Admin</a>
  @endif
  <a href="/admin/list" class="w3-bar-item w3-button">Show Admin List</a>
  <a href="/admin/staffs" class="w3-bar-item w3-button">All Staff List</a>
  <a href="/admin/feedback" class="w3-bar-item w3-button">Feedbacks</a>
  <a href="/admin/foods" class="w3-bar-item w3-button">Foods</a>
  <a href="/admin/venues" class="w3-bar-item w3-button">Venues</a>
  <a href="/admin/photos" class="w3-bar-item w3-button">Photography</a>
  <a href="/admin/sounds" class="w3-bar-item w3-button">Sounds & Lighting</a>
  <a href="/admin/stages" class="w3-bar-item w3-button">Stages</a>  
  <a href="/admin/images" class="w3-bar-item w3-button">Photos</a>
  <a href="/admin/packages" class="w3-bar-item w3-button">Packages</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
  <div>
        <a class="w3-bar-item w3-button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> 
            {{ csrf_field() }}
        </form>
  </div>
</div>

<div id="main">

<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <h3>{{ Auth::user()->name}}</h3>
    <p>{{ Auth::user()->created_at->diffForHumans() }}</p>
  </div>

</div>

<div class="container">
    @yield('content')
</div>



</div>
</div>
<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>

<!--editor javascript-->
<script src="{{asset('ckeditor.js')}}"></script>
<script>
		var ckview = document.getElementById("ckview");
		CKEDITOR.replace(ckview,{
			language:'en-gb'
		});
</script>


</body>
</html>