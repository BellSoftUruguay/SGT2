// Definir la estructura del menú
function crearMenu() {

    var menuItems;

    /*  Descricpión
        campo 1 = nivel del menu
        campo 2 = texto desplegado en el menu
        campo 3 = URL de la opcion del menu. Si no tiene URL se agrega el array del submenu.
    */
    menuItems = [ {descripcion: "Tickets", url: "tickets.html", subMenu: [] },
                  {descripcion: "Informes", url: "#", subMenu: [{descripcion: "Informe 1", url: "Informe1"},
                                                                {descripcion: "Informe 2", url: "Informe2"},
                                                                {descripcion: "Informe 3", url: "Informe3"} ] },
                  {descripcion: "Mantenimientos", url: "#", subMenu: [{descripcion: "Estados", url: "file:///C:/xampp/htdocs/SGT2/public/pages/manager/mantEstados.html"},
                                                                      {descripcion: "Prioridades", url: "file:///C:/xampp/htdocs/SGT2/public/pages/manager/mantPrioridades.html"},
                                                                      {descripcion: "Sectores", url: "sectores"},
                                                                      {descripcion: "Tipos de ticket", url: "tiposTkt"},
                                                                      {descripcion: "Usuarios", url: "usuarios"} ] },
                  {descripcion: "Acerca de...", url: "about.html", subMenu: [] }
    ]; // Corchete de inicio.

    var menu = document.getElementById('menu');

    for (var i = 0; i < menuItems.length; i++) {

        var li = document.createElement('li');

        if (menuItems[i].subMenu.length > 0) {
            li.className = 'dropdown';

            var btn = document.createElement('a');
            btn.className = 'dropdown-btn';
            btn.textContent = menuItems[i].descripcion;
            li.appendChild(btn);

            var dropdownContent = document.createElement('div');
            dropdownContent.className = 'dropdown-content';

            for (var j = 0; j < menuItems[i].subMenu.length; j++) {
                var a = document.createElement('a');
                a.href = menuItems[i].subMenu[j].url;
                a.textContent = menuItems[i].subMenu[j].descripcion;
                dropdownContent.appendChild(a);
            }
            li.appendChild(dropdownContent);

        } else {

            var a = document.createElement('a');
            a.href = menuItems[i].url;
            a.textContent = menuItems[i].descripcion;
            li.appendChild(a);
        }
        menu.appendChild(li);
    }
};
