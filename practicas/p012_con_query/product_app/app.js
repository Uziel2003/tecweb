// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};
$(document).ready(function() {
    init();
    $('#search-form').on('submit', buscarProducto);
    $('#product-form').on('submit', agregarProducto);
});


function init() {
    var JsonString = JSON.stringify(baseJSON, null, 2);
    $("#description").val(JsonString);
    listarProductos();
}

// FUNCIÓN CALLBACK AL CARGAR LA PÁGINA O AL AGREGAR UN PRODUCTO
function listarProductos() {
    $.ajax({
        url: './backend/product-list.php',
        method: 'GET',
        dataType: 'json',
        success: function (productos) {
            if (productos.length > 0) {
                let template = '';
                productos.forEach(producto => {
                    let descripcion = `
                        <li>precio: ${producto.precio}</li>
                        <li>unidades: ${producto.unidades}</li>
                        <li>modelo: ${producto.modelo}</li>
                        <li>marca: ${producto.marca}</li>
                        <li>detalles: ${producto.detalles}</li>
                    `;
                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger" onclick="eliminarProducto(event)">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;
                });
                $("#products").html(template);
            }
        }
    });
}

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarProducto(e) {
    e.preventDefault();
    var search = $('#search').val(); // Verifica que este campo tenga el valor correcto

    console.log("Buscando producto: ", search); // Debug

    $.ajax({
        url: './backend/product-search.php',
        method: 'GET',
        data: { search: search },
        dataType: 'json',
        success: function (productos) {
            console.log("Productos encontrados: ", productos); // Debug

            if (productos.length > 0) {
                let template = '';
                let template_bar = '';

                productos.forEach(producto => {
                    let descripcion = `
                        <li>precio: ${producto.precio}</li>
                        <li>unidades: ${producto.unidades}</li>
                        <li>modelo: ${producto.modelo}</li>
                        <li>marca: ${producto.marca}</li>
                        <li>detalles: ${producto.detalles}</li>
                    `;
                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger" onclick="eliminarProducto(event)">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;
                    template_bar += `<li>${producto.nombre}</li>`;
                });
                $("#product-result").addClass("card my-4 d-block");
                $("#container").html(template_bar);
                $("#products").html(template);
            } else {
                $("#products").html('<tr><td colspan="4">No se encontraron productos.</td></tr>'); // Mensaje si no se encuentran productos
            }
        },
        error: function (xhr, status, error) {
            console.error("Error en la búsqueda: ", error); // Debug
        }
    });
}



// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();
    
    let productoJsonString = $('#description').val();
    let finalJSON = JSON.parse(productoJsonString);
    finalJSON['nombre'] = $('#name').val();
    productoJsonString = JSON.stringify(finalJSON, null, 2);

    $.ajax({
        url: './backend/product-add.php',
        type: 'POST',
        contentType: "application/json;charset=UTF-8",
        data: productoJsonString,
        success: function(respuesta) {
            let template_bar = `<li style="list-style: none;">status: ${respuesta.status}</li>
                                <li style="list-style: none;">message: ${respuesta.message}</li>`;
            
            $('#product-result').addClass('d-block');
            $('#container').html(template_bar);
            listarProductos();
        }
    });
}


// FUNCIÓN CALLBACK DE BOTÓN "Eliminar"
function eliminarProducto() {
    if (confirm("¿De verdad deseas eliminar el Producto?")) {
        let id = $(event.target).closest('tr').attr('productId');
        
        $.ajax({
            url: './backend/product-delete.php',
            type: 'GET',
            data: { id: id },
            dataType: 'json',
            success: function(respuesta) {
                let template_bar = `<li style="list-style: none;">status: ${respuesta.status}</li>
                                    <li style="list-style: none;">message: ${respuesta.message}</li>`;
                
                $('#product-result').addClass('d-block');
                $('#container').html(template_bar);
                listarProductos();
            }
        });
    }
}


// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}
