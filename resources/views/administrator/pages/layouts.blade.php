<!DOCTYPE html>
<html lang="en">
<head>
    @include('administrator.pages.toplibrary')
</head>
<body>
	<div class="wrapper">
        @include('administrator.pages.header')
		<!-- Sidebar -->
        @include('administrator.pages.sidebar')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">@yield('title')</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">@yield('menu')</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">@yield('title')</a>
							</li>
						</ul>
					</div>
                    @yield('content')
				</div>
			</div>
            @include('administrator.pages.footer')
		</div>
	</div>
    @include('administrator.pages.bottom')
</body>
</html>
