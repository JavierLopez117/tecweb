// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/imagen.png"         
    };

    function checarnombre(nombre) {
    if (nombre.value == ''){     alert('Introduce un nombre'); }
    else if (nombre.lenght >= 100) {
        alert('Introduce un nombre menor o igual a 100 caracteres');     }           
         }


function buscarID(k) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    k.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            let template = '';
           // let descripcion = '';
            for(var i=0; i<productos.length; i++ ){
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
           // if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos[i].precio+'</li>';
                    descripcion += '<li>unidades: '+productos[i].unidades+'</li>';
                    descripcion += '<li>modelo: '+productos[i].modelo+'</li>';
                    descripcion += '<li>marca: '+productos[i].marca+'</li>';
                    descripcion += '<li>detalles: '+productos[i].detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                //let template = '';
                    template += `
                        <tr>
                            <td>${productos[i].id}</td>
                            <td>${productos[i].nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("id="+id);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    k.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    
    if(finalJSON['precio'] < 99.99 ){
        alert('Introduce un precio mayor a 99.99');
    }
    parseInt(finalJSON['unidades']);
    if(finalJSON['unidades'] <= 0 ){
        alert('Introduce un numero entero');
    }
    if(finalJSON['modelo'] == ''){
        alert('Introduce un modelo');
    }
    if(finalJSON['marca'] == ''){
        alert('Introduce una marca');
    }
    if(finalJSON['detalles'].length > 250){
        alert('Ingresa detalles con menos de 250 caracteres');
    }
    if(finalJSON['imagen'] == ''){
        finalJSON['imagen'] = 'img/imagen.png';
    }

    finalJSON['nombre'] = document.getElementById('name').value;

    productoJsonString = JSON.stringify(finalJSON,null,2);

    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200) {
            console.log(client.responseText);
            window.alert(client.responseText);
        }
    };
    client.send(productoJsonString);
}

function getXMLHttpRequest() {
    var objetoAjax;
    try{  objetoAjax = new XMLHttpRequest();
    }catch(err1){
        try{
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{  objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;}