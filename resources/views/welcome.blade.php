<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite('resources/js/app.js')

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body id="app">
        <App></App>
    </body>
</html>
