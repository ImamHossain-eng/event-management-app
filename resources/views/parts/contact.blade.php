<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Gazaria, Munshigonj-1510</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +00 1757438542</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  test@test.com</p>
    </div>
    <div class="w3-col m7">

      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="/" method="POST">
        {{csrf_field()}}
      <div class="w3-section">      
        <label>Name</label>
        <input class="w3-input" type="text" name="name" required>
      </div>
      <div class="w3-section">      
        <label>Email</label>
        <input class="w3-input" type="text" name="email" required>
      </div>
      <div class="w3-section">      
        <label>Message</label>
        <input class="w3-input" type="text" name="message" required>
      </div>  
      <input class="w3-check" type="checkbox" checked name="like">
      <label>I Like it!</label>
      {{ Form::submit('Send', ['class' => 'w3-button w3-right']) }}
      {{ Form::close() }}
    </div>
  </div>
</div>
