<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ config('app.name', 'Laravel') }}</title>
		<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/datepicker3.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/jquery.dataTables.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/dataTables.bootstrap.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
		<!--Icons-->
		<script src="{{ asset('/js/lumino.glyphs.js') }}"></script>
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		<!-- Scripts -->
		<script>
		window.Laravel = <?php echo json_encode([
		'csrfToken' => csrf_token(),
		]); ?>
		</script>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><span>Sistem</span> Kependudukan</a>
					<ul class="user-menu">
						@if (Auth::guest())
						<li><a href="{{ url('/login') }}">Login</a></li>
						@else
						<li class="dropdown pull-right">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
								<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
								<li>
									<a href="{{ url('/logout') }}"
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
									<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout
								</a>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
						@endif
					</li>
				</ul>
			</div>
			
			</div><!-- /.container-fluid -->
		</nav>
		
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
			<ul class="nav menu">
				<li class="{{ url('/home') == request()->url() ? 'active' : '' }}">
					<a href="{{ url('/home') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a>
				</li>
				<li class="{{ route('penduduk.index') == request()->url() ? 'active' : '' }}">
					<a href="{{ route('penduduk.index') }}"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Penduduk</a>
				</li>
				{{-- <li class="{{ route('pendatang.index') == request()->url() ? 'active' : '' }}">
					<a href="{{ route('pendatang.index') }}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Pendatang</a>
				</li>
				<li class="{{ route('pindah.index') == request()->url() ? 'active' : '' }}">
					<a href="{{ route('pindah.index') }}"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Pindah</a>
				</li> --}}
				<li class="{{ route('kk.index') == request()->url() ? 'active' : '' }}">
					<a href="{{ route('kk.index')}}"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Kepala Keluarga</a>
				</li>
				{{-- <li class="{{ route('kelahiran.index') == request()->url() ? 'active' : '' }}">
					<a href="{{ route('kelahiran.index')}}"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> kelahiran</a>
				</li> --}}
				{{-- <li class="{{ route('kematian.index') == request()->url() ? 'active' : '' }}">
					<a href="{{ route('kematian.index') }}"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Kematian</a>
				</li>
				<li class="{{ route('kematian.index') == request()->url() ? 'active' : '' }} ">
					<a href="{{ route('kematian.index') }}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Laporan</a>
				</li> --}}
			</ul>
		</li>
	</ul>
	</div><!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		@yield('breadcrumb')
		<br>
		<div class="row">
			@include('layouts._flash')
			@yield('content')
		</div>
	</div>
</div>
<script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/chart.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/js/responsive.bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/custom.js') }}"></script>
<script>
	$('.datepicker').datepicker({
	});
	!function ($) {
	$(document).on("click","ul.nav li.parent > a > span.icon", function(){
	$(this).find('em:first').toggleClass("glyphicon-minus");
	});
	$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
	}(window.jQuery);
	$(window).on('resize', function () {
	if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
	})
	$(window).on('resize', function () {
	if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
	})
</script>
@yield('scripts')
</body>
</html>