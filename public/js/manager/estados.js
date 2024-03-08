
document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que se envíe el formulario automáticamente

    var usuario = document.getElementById("usuario").value;
    var password = document.getElementById("password").value;

    // Aquí debes realizar la validación de campos, por ejemplo, verificar si ambos campos no están vacíos

    // Luego, envía los datos del formulario a tu servidor para la autenticación
    // Puedes usar AJAX para esto

    // Ejemplo de código AJAX con XMLHttpRequest
//    var xhr = new XMLHttpRequest();
//    xhr.open("POST", "tu_servidor.php", true);
//    xhr.setRequestHeader("Content-Type", "application/json");

//    xhr.onreadystatechange = function() {
//        if (xhr.readyState === XMLHttpRequest.DONE) {
//            if (xhr.status === 200) {
//                // La autenticación fue exitosa
//                console.log(xhr.responseText);
//            } else {
                // Error de autenticación
//                console.error("Error de autenticación");
//            }
//        }
//    };

    var data = JSON.stringify({ usuario: usuario, password: password });
//    xhr.send(data);
});
