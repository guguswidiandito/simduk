@if (session()->has('flash_notification.message'))
<div class="col-lg-12">
	<div class="alert bg-success alert-{{ session()->get('flash_notification.level') }}">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{!! session()->get('flash_notification.message') !!}
	</div>
</div>
@endif

@if (count($errors) > 0)
	<div class="col-md-12">
		<div class="alert bg-danger alert-danger">
			<ul>
				@foreach ($errors->all() as $e)
					<li>{{ $e }}</li>
				@endforeach	
			</ul>
		</div>
	</div>
@endif