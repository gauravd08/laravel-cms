@if(session()->has('level'))
<div class="col-lg-12 sm-p-t-15">
    <div class="alert alert-{{ session('level') }}"> 
        {{session('content')}}
    </div>
</div>
@endif