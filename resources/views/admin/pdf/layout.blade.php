<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!--begin::Fonts -->
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!--end::Fonts -->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

  <style>
    @page { margin: 80px 50px; }
    #header 
    { 
      position: fixed; 
      left: 0px; 
      top: -80px; 
      right: 0px; 
      height: 80px; 
      background-color: orange; 
      text-align: center; 
    }
    #footer 
    { 
      position: fixed; 
      left: 0px; 
      bottom: -80px; 
      right: 0px; 
      height: 80px; 
      background-color: lightblue; 
    }
    #footer .page:after { content: counter(page, upper-roman); }
    *{
      font-size: 12px;
      font-family: 'Roboto';
    }
  </style>
</head>
<body>

  <div id="header">
    <h1>Widgets Express</h1>
  </div>
  <div id="footer">
    <p class="page">Page </p>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
       @yield('content')
     </div>
   </div>
 </div>
</body>
</html>