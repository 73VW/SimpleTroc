@if ($flash = session('message'))
    <br>
  <div id="alert_message" class="alert alert-success bounceInRight animated">
    {{$flash}}
  </div>
@endif
