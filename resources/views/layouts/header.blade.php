<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="currentUser" content="{{Auth::user()}}">

<!-- Title -->
<title>{{ config('app.name') }}</title>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!--fullCalendar-->
<link href="{{ asset('fullcalendar/main.css') }}" rel='stylesheet' />
<script src="{{ asset('fullcalendar/main.js') }}"></script>
<script src="{{ asset('fullcalendar/locales-all.js') }}"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 
