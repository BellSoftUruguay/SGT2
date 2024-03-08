       var DBAccion="";

       /* Obtengo el estado seleccionado de la tabla */
        async function ObtenerEstados() {

            // ObtenerEstados esta en api.php
            await axios.get(import.meta.env.VITE_API_URL + 'ObtenerEstados').then(response => {

                if (response.data.resultado == 200) {
                    this.listaEstados = response.data.estados;
                } else {
                    // Error al recuperar los datos.
                    mensajes.error("Error al recuperar los datos !!!");
                }
            })
        }

        /*********************************
         * Guardar el estado en la base. *
         *********************************/
        async function Guardar() {

            // Obtengo el usuario logueado.
            usuario = localStorage.getItem('usuario');

            try {
                if (this.DBAccion == "Agregar") {
                    // Opcion AGREGAR
                    await axios.post(import.meta.env.API_URL + 'NuevoEstado', this.form).then(response => {

                        if (response.data.resultado == 200) {
                            this.ObtenerEstados();
                            document.getElementById("inputEstado").disabled = true;
                            mensajes.aviso("Datos actualizados.");
                            this.Cancelar();
                        } else {
                            // Error al recuperar los datos.
                            mensajes.error("Ya existe el registro en la base de datos.");
                        }
                    })

                } else if (this.DBAccion == "Modificar") {
                    // Opcion MODIFICAR
                    await axios.post(import.meta.env.API_URL + 'ModificoEstado', this.form).then(response => {

                        if (response.data.resultado == 200) {
                            this.ObtenerEstados();
                            document.getElementById("inputEstado").disabled = true;
                            mensajes.aviso("Datos actualizados.");
                            this.Cancelar();
                        } else {
                            // Error al recuperar los datos.
                            mensajes.error("Ya existe el registro en la base de datos.");
                        }
                    })
                }
            } catch (err) {
                mensajes.error("Conexión fallida con el servidor.");
                return;
            }
        };

        /*********************************
         *   Agrego un registro nuevo.   *
         *********************************/
        function Agregar() {

            DBAccion = 'Agregar';

             // Habilito el campo ESTADO y le paso el foco.
            document.getElementById("inputEstado").disabled = false;

            // Asigno el foco.
            document.getElementById("inputEstado").focus();

            // Habilito boton de Guardar.
            document.getElementById("btnGuardar").disabled = false;

            //  Deshabilito boton Alta, Borrar y Modificar.
            document.getElementById("btnAgregar").disabled=true;
            document.getElementById("btnBorrar").disabled=true;
            document.getElementById("btnModificar").disabled=true;
        };

        /*********************************
         *     Modifico el registro     *
         ********************************/
        async function Modificar() {

            DBAccion = 'Modificar';

            // Obtengo el usuario logueado.
            this.form.usuario = localStorage.getItem('usuario');

            // Habilito el campo.
            document.getElementById("inputEstado").disabled = false;

            // Asigno el foco al campo.
            document.getElementById("inputEstado").focus();

            // Habilito boton de guardar.
            document.getElementById("btnGuardar").disabled = false;

            //  Deshabilito boton de Borrar, Agregar y Modificar.
            document.getElementById("btnBorrar").disabled=true;
            document.getElementById("btnAgregar").disabled=true;
            document.getElementById("btnModificar").disabled=true;
        };

        /*********************************
         * Elimina el estado en la base  *
         *********************************/
        async function Borrar() {

            DBAccion = 'Borrar';

            if (await mensajes.confirma("Eliminar", "¿ Quiere eliminar el estado '" + this.form.campoEstado + "' ?")) {

                // Obtengo el usuario logueado.
                usuario = localStorage.getItem('usuario');

                await axios.post(import.meta.env.VITE_API_URL + 'BorroEstado', this.form).then(response => {

                    if (response.data.resultado == 200) {
                        mensajes.aviso("Datos actualizados.");
                        this.ObtenerEstados();
                        this.Cancelar();
                    } else {
                        // Error al recuperar los datos.
                        mensajes.error("Error al eliminar el estado !!!");
                    }
                })
            } else {
                this.Cancelar();
            }
        };

        /*********************************
         *      Cancela la seleccion     *
         *********************************/
        async function Cancelar() {
            DBAccion = "";
            campoEstado="";

            // Deshabilito campo.
            document.getElementById("inputEstado").disabled = true;

            // Deshabilito los botones.
            document.getElementById("btnGuardar").disabled=true;
            document.getElementById("btnModificar").disabled=true;
            document.getElementById("btnBorrar").disabled=true;

            // Habilito boton de Agregar.
            document.getElementById("btnAgregar").disabled=false;
        }
