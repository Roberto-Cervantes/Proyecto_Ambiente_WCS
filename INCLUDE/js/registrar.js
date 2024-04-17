const formularioRegistro = document.getElementById('registroForm');

formularioRegistro.addEventListener('submit', (event) => {
    event.preventDefault(); 

    const nombre = document.getElementById('nombre').value;
    const usuario = document.getElementById('usuario').value;
    const contrasenna = document.getElementById('contrasenna').value;

   
    if (nombre === '' || usuario === '' || contrasenna === '') {
        alert('Todos los campos son obligatorios');
        return;
    }

   
    const inputContrasenna = document.getElementById('contrasenna');
    inputContrasenna.type = 'text'; 
    setTimeout(() => {
        inputContrasenna.type = 'password'; 
    }, 1000);

   
    const datos = {
        nombre: nombre,
        usuario: usuario,
        contrasenna: contrasenna,
        idRol: 1
    };

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'registroUsuario.php'); 
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = () => {
        if (xhr.status === 200) {
            const respuesta = JSON.parse(xhr.responseText);
            if (respuesta.exito) {
                alert('Usuario registrado correctamente!');
               
                window.location.href = "login.php";
            } else {
                if (respuesta.mensaje.includes("ya está en uso")) {
                    alert(respuesta.mensaje); 
                    document.getElementById('usuario').value = ''; 
                    window.location.href = "registrar.php";
                } else {
                    alert(respuesta.mensaje); 
                }
            }
        } else {
            console.error('Error al registrar usuario:', xhr.statusText);
        }
    };
    xhr.send(JSON.stringify(datos));
});
