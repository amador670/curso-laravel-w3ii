@extends("plantilla")
@section("contenido")
<h3>Encriptar contraseña de usuario - Conmutador</h3>

<p>
    Se usa para siempre que guardemos una contraseña sea encritada sin tener que añadir constantemente
</p>


<pre>
        $user = registerUserModel::create($request->all());
        $user->role = "usuario";
        
        //CODIGO para encriptar contraseña
        $user->password = bcrypt($request->password);
        $user->save();
        
        return view("auth.login");
</pre>

Para evitar ese metodo repetitivo añadimos en nuestro archivo Enloquent > User.php


<pre>

    //El nombre de la funcion siempre debe llevar el nombre del atributo que queremos modificar, en este caso "Password" y el parametro sera el valor a guardar
    
    public function setPasswordAttribute($password){
        $this->attribute["password"] = bcrypt($password);
    }
</pre>
	
@stop