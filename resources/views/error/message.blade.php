@if(Session::has('success'))
<div class="alert alert-success">
	<a style="cursor: pointer;" class="close" data-dismiss="alert">×</a>{!!Session::get('success')!!}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger">
	<a style="cursor: pointer;" class="close" data-dismiss="alert">×</a>{!!Session::get('error')!!}
</div>
@endif
