<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Crud</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
       <div class="container">
           <div class="row">
               <div class="col-sm-10 mx-auto">
               <div class="card border-0 shadow mt-3">
                   <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                           <ul>
                               @foreach($errors->all() as $error)
                                <li> {{ $error }} </li>
                               @endforeach
                            </ul>
                        </div>
                        @endif
                       <form class="form-inline" action="{{ route('users.store') }}" method="post">
                               <div class="form-group col-sm-3">
                                   <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
                               </div>
                               
                               <div class="form-group col-sm-3">
                                   <input type="email" name="email" class="form-control" placeholder="email" value="{{ old('email') }}">
                               </div>

                               <div class="form-group col-sm-3">
                                   <input type="password" name="password" class="form-control" placeholder="password">
                                </div>

                                <div class="form-group col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                       </form>
                   </div>
               </div>
               <table class="table">
                   <caption> User List</caption>
                    <thead>
                        <tr>
                            <th id="id">Id</th>
                            <th id="name">Nombre</th>
                            <th id="email">Email</th>
                            <th id="option">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm(`¿Desea eliminar el usuario?`)">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               </div>
           </div>
       </div>


       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    </body>
</html>
