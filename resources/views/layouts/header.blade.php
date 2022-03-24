<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="currentUser" content="{{Auth::user()}}">

<!-- Title -->
<title>{{ config('app.name') }}</title>



<!-- Styles -->
<!--
<link href="../public/css/app.css" rel="stylesheet">
<link href="../public/css/main/menu.css" rel="stylesheet">
<link href="../public/css/main/common.css" rel="stylesheet">
-->

<link href="{{ asset('css/app.css') }}" rel="stylesheet">


<!--fullCalendar-->
<link href="{{ asset('fullcalendar/main.css') }}" rel='stylesheet' />
<script src="{{ asset('fullcalendar/main.js') }}"></script>
<script src="{{ asset('fullcalendar/locales-all.js') }}"></script>
<!--
<link href="{{ asset('css/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
-->

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <!--<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css"> -->



