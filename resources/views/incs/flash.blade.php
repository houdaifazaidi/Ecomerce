@if($message=Session::get('success'))

<div class="alert alert-success alert-block" id="successAlert">
    <button type="button" class="close" onclick="document.getElementById('successAlert').style.display='none';">×</button>
    <strong> {{$message}}</strong>
</div>

@endif