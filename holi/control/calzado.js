var fila, fila2; 
var tablaDetalle;

$(document).ready(function() {
    var idCalzado, opcion, idDetallaCalzado;
    opcion = 4;
    
    tablaUsuarios = $('#tabla').DataTable({  
        ajax:{            
            url: "../modelo/calzado.php", 
            method: 'POST',  
            data:{opcion:opcion}, // opcion 4   SELECT
            dataSrc:""
        },
        columns:[
            {data: "idCalzado"},
            {data: "nombre"},
            {data: "descripcion"},
            {data: 
                "imagen",
                "render": function (data, type, row, meta) {
                    return '<img src="' + data + '" alt="' + "image" + '" style="max-width: 214px"/>';
                }
            },
            {data: "nombreT"},
            {data: "nombreP"},  
            
            
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnVer'><i class='material-icons'>visibility</i></button><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete_sweep</i></button></div></div>"}
        ]
    });  
    
    $.ajax({
        url: "../modelo/tipoCalzado.php",
        type: "POST",
        datatype:"json",
        data:  {opcion:4},
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);
            let select = document.getElementById('idTipoCalzado');
            data.forEach((tipoCalzado) => {
                console.log(tipoCalzado);
                let opt = document.createElement('option');
                opt.value = tipoCalzado.idTipoCalzado;
                opt.innerHTML = tipoCalzado.nombre;
                select.appendChild(opt);
            }); 
        }
    });	

    $.ajax({
        url: "../modelo/tallaCalzado.php",
        type: "POST",
        datatype:"json",
        data:  {opcion:4},
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);
            let select = document.getElementById('idTalla');
            data.forEach((talla) => {
                console.log(talla);
                let opt = document.createElement('option');
                opt.value = talla.idTalla;
                opt.innerHTML = talla.tamaño;
                select.appendChild(opt);
            }); 
        }
    });	

    $.ajax({
        url: "../modelo/proveedor.php",
        type: "POST",
        datatype:"json",
        data:  {opcion:4},
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);
            let select = document.getElementById('idProveedor');
            data.forEach((proveedor) => {
                console.log(proveedor);
                let opt = document.createElement('option');
                opt.value = proveedor.idProveedor;
                opt.innerHTML = proveedor.nombre;
                select.appendChild(opt);
            }); 
        }
    });	

    //CAMBIO  TODA LA LINEA 92
    $('#form').submit(function(e){ 
        e.preventDefault();  
         
        data = {
            idCalzado: idCalzado,
            nombre: $.trim($("#nombre").val()),     
            descripcion: $.trim($("#descripcion").val()),
            imagen: $.trim($("#imagen").val()), 
            idTipoCalzado: $.trim($("#idTipoCalzado").val()),
            idProveedor: $.trim($("#idProveedor").val()),
            

            opcion: opcion
        }    
        $.ajax({
            url: "../modelo/calzado.php",
            type: "POST",
            datatype:"json",  
            data:  data,  
            success: function(data) {
                tablaUsuarios.ajax.reload(null, false);
            }
        });	

        $('#modalCRUD').modal('hide');											     			
    });
            
    $("#btnNuevo").click(function(){
        opcion = 1;//Crear
        idCalzado=null;
        $("#form").trigger("reset");
        $('#modalCRUD').modal('show');
    });
 
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        
        fila = $(this).closest("tr");	        
        
        $.ajax({
            url: "../modelo/calzado.php",
            type: "POST",
            datatype:"json",
            data:  {opcion:5, idCalzado:columna(0)},
            success: function(data) {
                data = JSON.parse(data)[0];
                console.log(data);
                idCalzado=data.idCalzado;
                $("#idCalzado").val(data.idCalzado);
                $("#nombre").val(data.nombre);
                $("#descripcion").val(data.descripcion); 
                $("#imagen").val(data.imagen);
                $("#idTipoCalzado").val(data.idTipoCalzado);
                $("#idProveedor").val(data.idProveedor);  
                

                $('#modalCRUD').modal('show');
            }
        });	
    });

    $(document).on("click", ".btnVer", function(){		 
        opcion = 1;//Crear
        idDetallaCalzado=null;        
       
        fila = $(this).closest("tr");	  
        idCalzado = columna(0);
        $('#tablaDetalles').dataTable().fnDestroy();
        tablaDetalle = $('#tablaDetalles').DataTable({  
            ajax:{            
                url: "../modelo/detalleCalzado.php", 
                method: 'POST',  
                data:{opcion:4, idCalzado:columna(0)}, // opcion 4   SELECT
                dataSrc:""
            },
            columns:[
                {data: "idDetallaCalzado"},
                {data: "idTalla"},
                {data: "tamaño"},
                {data: "color"},
                {data: "precio"},
                {data: "stock"},
                {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-danger btn-sm btnBorrarDetalle'><i class='material-icons'>delete_sweep</i></button></div>"}
            ]
        });  


        $('#modalDetalle').modal('show');
    });

    $('#formDetalle').submit(function(e){ 
        e.preventDefault();     
        console.log("Opción form detalle", opcion);
        if(opcion != 3){
            data = {
                idDetallaCalzado: idDetallaCalzado,
                idCalzado: idCalzado,
                precio: $.trim($("#precio").val()),
                color: $.trim($("#color").val()),
                idTalla: $.trim($("#idTalla").val()),
                stock: $.trim($("#stock").val()),
    
                opcion: opcion
            }                 
            
            $.ajax({
                url: "../modelo/detalleCalzado.php",
                type: "POST",
                datatype:"json",  
                data:  data,  
                success: function(data) {
                    tablaDetalle.ajax.reload(null, false);
                    $("#formDetalle").trigger("reset");
                }
            });										     			
        }
    });

    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        idCalzado = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3;         
        var respuesta = confirm("¿Está seguro de borrar el registro "+idCalzado+"?");
        if (respuesta) {
            $.ajax({
                url: "../modelo/calzado.php",
                type: "POST",
                datatype:"json",
                data:  {opcion:opcion, idCalzado:idCalzado},
                success: function() {
                    tablaUsuarios.row(fila.parents('tr')).remove().draw();
                }
            });	
        }
        return 0;
    });

    $(document).on("click", ".btnBorrarDetalle", function(){
        fila2 = $(this);     
        opcion = 3;      
        idDetallaCalzado = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		        
        var respuesta = confirm("¿Está seguro de borrar el registro "+idDetallaCalzado+"?");
        if (respuesta) {
            $.ajax({
                url: "../modelo/detalleCalzado.php",
                type: "POST",
                datatype:"json",
                data:  {opcion:opcion, idDetallaCalzado:idDetallaCalzado},
                success: function() {
                    tablaDetalle.row(fila2.parents('tr')).remove().draw();
                    opcion = 1;
                }
            });	
        } else{
            opcion = 1;
        }
    });
});    

function columna(col){
    let texto = fila.find('td:eq(' + col + ')').text();
    console.log(texto);
    return texto;
}

function columna2(col){
    let texto = fila2.find('td:eq(' + col + ')').text();
    console.log(texto);
    return texto;
} 