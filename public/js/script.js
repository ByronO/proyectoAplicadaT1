
function updateProduct(id, name, price, description) {
    var param = {
        "id": id,
        "name": name,
        "price": price,
        "description": description
    };
    $.ajax(
        {
            data: param,
            url: '?controlador=Product&accion=updateProduct',
            type: 'post',
            beforeSend: function () {
                $("#mensaje").html("Procesando, \n\ espere por favor...");
            },
            success: function (response) {
            }
        }
    );
}

function deleteProduct(id) {
    var param = {
        "id": id
    };
    $.ajax(
        {
            data: param,
            url: '?controlador=Product&accion=deleteProduct',
            type: 'post',
            beforeSend: function () {
                $("#mensaje").html("Procesando, \n\ espere por favor...");
            },
            success: function (response) {
                $("#fila" + id).remove();
            }
        }
    );
}


function verificarUsuario(usuario, contra) {
    var param = {
        "usuario": usuario,
        "contra": contra
    };
    $.ajax(
        {
            data: param,
            url: '?controlador=Usuario&accion=verificar',
            type: 'post',
            beforeSend: function () {
                $("#mensaje").html("Procesando, \n\ espere por favor...");
            },
            success: function (response) {
                if (response == "Este usuario no existe") {
                    window.location.href = "?controlador=Producto&accion=categoriaForm";
                } else {
                    $("#mensaje").html(response);
                }
            }
        }
    );
}


