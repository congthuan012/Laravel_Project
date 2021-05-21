<!doctype html>
<html class="fixed sidebar-left-xs">
	<head>
        @include('admin.widget.head')
        @yield('title')
	</head>
	<body>
		<section class="body">

			<!-- start: header -->
            @include('admin.widget.header')
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
                @include('admin.widget.siderbar')
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					{{-- start: header right --}}
                    @include('admin.widget.header-right')
                    {{-- end: header right --}}

					<!-- start: page -->
                    @yield('content')
					<!-- end: page -->
				</section>
			</div>

			{{-- start: right siderbar --}}
            @include('admin.widget.sidebar-right')
            {{-- end: right siderbar --}}

		</section>

        @include('admin.widget.js')

        @yield('page-js')
	</body>
</html>
