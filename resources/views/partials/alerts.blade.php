@if (session('success'))
	<div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
	  <strong><i class="fas fa-check mr-2"></i></strong> {{ session('success') }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif