<!-- Team Container -->
<div class="w3-container w3-padding-64 w3-center" id="team">
    <h2>OUR TEAM</h2>
    <p>Meet the team - our office rats:</p>
    
    <div class="w3-row"><br>
      
      @foreach($staffs as $staff)
      <div class="w3-quarter">
        <img src="{{asset('images/staffs/'.$staff->image)}}" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
        <h3><a href="/staffs/{{$staff->id}}">  {{$staff->name}}  </a></h3>
        <p> {{$staff->designation}} </p>
      </div>

      @endforeach
    
    </div>
    </div>