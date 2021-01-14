<!-- Pricing Row -->
<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>PACKAGE & PRICING</h2>
    <p>Choose a pricing plan that fits your needs.</p><br>

    @foreach($packages as $package)
    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme">
          <p class="w3-xlarge"> {{$package->type}} </p>
        </li>
        <li class="w3-padding-16"><b> {{$package->name}} </b> Venue</li>
        <li class="w3-padding-16"><b> {{$package->people}} </b> People</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide"><i class="fa fa-usd"></i> {{ number_format($package->amount, 2)}} </h2>
          <span class="w3-opacity">per day</span>
        </li>
        <li class="w3-theme-l5 w3-padding-24">
          <a href="/login">
            <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i>Sign Up</button>
          </a>
        </li>
      </ul>
    </div>

    @endforeach
    
</div>