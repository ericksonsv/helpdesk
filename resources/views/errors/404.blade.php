<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Page Not Found - {{ config('app.name') }}</title>
	<style>
		body, html { height: 100%; }
		body {
			margin: 0px;
			font-family: Arial, Helvetica, sans-serif;
			display: flex;
			-ms-align-items: center;
			align-items: center;
			justify-content: center;
			flex-direction: column;
		}
		.button {
		  background-color: #4CAF50; /* Green */
		  border: none;
		  color: white;
		  padding: 10px 25px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		}
		img { margin-bottom: 1rem; }
		h1 { margin: 0px; }
		a { margin-top: 1rem; }
	</style>
</head>
<body>
	<img src="{{ asset('images/error-404.png') }}" alt="Error">
	<h1>{{ config('app.name') }}</h1>
	<h1>404 Page Not Found</h1>
	<a href="/" class="button">{{ __('Go Home') }}</a>
</body>
</html>