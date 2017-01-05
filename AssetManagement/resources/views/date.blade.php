<!DOCTYPE html>
{!! csrf_field() !!}
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Template that use Bootstrap</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')               }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.css')             }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')                   }}">
    <script src="{{asset('js/jquery.min.js')                  }}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
  </head>

  <body>
<!--<form method="POST", action="/submit1">-->
<form class="form-horizontal" role="form" method="POST" action="{{ url('/submit1') }}">

  <div id="datetimepicker1" name="datetimepicker1"  class="input-append date">
    <input name="datetimetb" data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  </div>
 
<Button type="submit" id="kk">
<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'pt-BR'
    });
  });
</script>
    
  
  </body>
</html>