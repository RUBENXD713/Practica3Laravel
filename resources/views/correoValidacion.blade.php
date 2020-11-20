<html>
  <head>
  </head>
  <body>
  <h1>Bienvenido {{$user->name}}</h1>
  <h3>Para la vadilacion de tu correo {{$user->email}}</h3>
  <h3>Deberas de dar clic en este <a href='http://127.0.0.1:8000/api/Validar/{{$user->id}}'> enlace </a></h3>
  <h3>Una vez Validada podras realizar acciones que no podias</h3>
  </body>
</html>