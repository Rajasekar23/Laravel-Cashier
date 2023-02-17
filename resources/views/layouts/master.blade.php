<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('layouts.head')
</head>
<body class="js">


	<!-- Header -->
	<!--/ End Header -->
	@yield('main-content')

	@include('layouts.footer')

    @push('scripts')

    <script src="{{ Vite::asset('resources/js/jquery.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/popper.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ Vite::asset('resources/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/custom.js') }}"></script>

    @endpush

</body>
</html>
