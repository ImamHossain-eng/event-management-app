@extends('layouts.home')
@section('content')
<body>
    
<!--Header-->
@include('parts.modal')

<!--history-->
@include('parts.our_work')
<!--package price-->
@include('parts.pricing')
<!--Team-->
@include('parts.history')
<!-- Contact Container -->
@include('parts.contact')

<script>
// Script for side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "300px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}

// Close side navigation
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>






</body>
@endsection