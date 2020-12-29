<!-- Pricing Row -->
<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>PACKAGE & PRICING</h2>
    <p>Choose a pricing plan that fits your needs.</p><br>

    @foreach($venues as $venue)
    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme">
          <p class="w3-xlarge"> {{$venue->venue_tag}} </p>
        </li>
        <li class="w3-padding-16"><b> {{$venue->name}} </b> Venue</li>
        <li class="w3-padding-16"><b> {{$venue->capacity}} </b> Capacity</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide"><i class="fa fa-usd"></i> {{$venue->pricing}} </h2>
          <span class="w3-opacity">per day</span>
        </li>
        <li class="w3-theme-l5 w3-padding-24">
          <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Sign Up</button>
        </li>
      </ul>
    </div>

    @endforeach
    
</div>