async function Login() {

    respuesta = await fetch('http://127.0.0.1:8000/api/Login', {
        method: 'POST',
        body: JSON.stringify({ 'usuario': document.getElementById('usuario').value, 'password': document.getElementById('password').value }),
        headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' },
    });

    data1 = await respuesta.text();
    data2 = JSON.parse(data1);

    /* Si al invocar la funcion de la Api, no retorna error Status = 200, se pregunta por el valor del dato resultado  */
    if (respuesta.status == 200) {

        /*  Si al invocar a la funcion de la Api, se retorna un valor, se analiza cual es el resultado */
        if (data2.resultado == 200) {

            /* Login existoso*/
            localStorage.setItem('usuario', data2.objUsuario.usuario);

            /* Segun la categoria del usuario, abre un menu u otro. */
            if (data2.objUsuario.categoriaUsuario == 9) {
               window.open("file:///C:/xampp/htdocs/SGT2/public/pages/manager/mainMenu.html", "_self");          // Manager - supervisor
            } else {
               window.open("file:///C:/xampp/htdocs/SGT2/public/pages/manager/mainMenu.html", "_self");         // Usuario final.
            }

        } else {
            /* Si la funcion no retorna resultado = 200, se muestra el mensaje que retorna */
            if (data2.resultado == 500){
                alert('Error en la conexión con la base de datos.');
                return;
            }
            alert('El usuario o el password son incorrectos !!!');
            //mensajes.informacion('El usuario o el password son incorrectos !!!');
        }

    } else {
        /* Si al invocar a la funcion se retorna error porque no esta ejecutandose la Api.
            Se pone un mensaje en la variable error1, y automaticamente se muestra en pantalla
        */

        alert("Se produjo un error de comunicacion con el Server.");
        // mensajes.error("Se produjo un error de comunicacion con el Server.");
        return;
    }
}

function cambioIcono(param) {

    const elementoID = document.getElementById("password");
    const imagenIcono = document.getElementById("imagen");

    if (param='PSW'){
        if (elementoID.type === "password") {
            elementoID.type = "text";       // Mostrar la contraseña
            imagenIcono.src= '../../imagenes/Candado abierto.png';
        } else {
            elementoID.type = "password";   // Ocultar la contraseña
            imagenIcono.src= '../../imagenes/Candado cerrado.png';
        }
    }
}
