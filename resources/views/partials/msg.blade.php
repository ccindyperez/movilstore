@if (\session::get("success"))
    <div class="alert alert-success">
      <p>{{\session::get("success")}}</p>  
    </div>
@endif