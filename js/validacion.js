$(document).ready(function(){

    $.validator.setDefaults({
        highlight: function(element){
            $(element).next().addClass('glyphicon-remove icono-rojo').removeClass('glyphicon-ok icono-verde');
            $(element).addClass('invalido').removeClass('valido');
        },
        unhighlight: function(element){
            $(element).next().addClass('glyphicon-ok icono-verde').removeClass('glyphicon-remove icono-rojo');
            $(element).addClass('valido').removeClass('invalido');
        }
    });

    $.validator.addMethod('validarNombre',function(value, element){
        return this.optional(element) || /^[a-záéíóúÁÉÍÓÚ\s]{2,50}$/i.test(value);
    }, '“Nombre(s)” solo puede usar letras, espacios y debe de tener de 2 a 50 caracteres.');

    $.validator.addMethod('validarApellido',function(value, element){
        return this.optional(element) || /^[a-záéíóúÁÉÍÓÚ\s]{2,50}$/i.test(value);
    }, '“Apellidos” solo puede usar letras, espacios y debe de tener de 2 a 50 caracteres.');

    $.validator.addMethod('validarUsuario',function(value, element){
        return this.optional(element) || /^[a-z][\w]{2,30}$/i.test(value);
    }, '“Nombre de usuario” debe de tener un mínimo de tres caracteres y comenzar con una letra. Solo puede usar letras, guion bajo y números.');

    $.validator.addMethod('validarEmail',function(value, element){
        return this.optional(element) || /^[a-z]+[\w-\.]{2,}@([\w-]{2,}\.)+[\w-]{2,4}$/i.test(value);
    }, '"Correo electrónico" debe de ser en un formato valido, ej. “algo@correo.com”.');

    $.validator.addMethod('validarClave',function(value, element){
      return this.optional(element) || /(?=^[\w\!@#\$%\^&\*\?a-záéíóúA-ZÁÉÍÓÚ0-9\s]{8,30}$)^./.test(value);
    }, '“Contraseña” no valida. La contraseña debe tener únicamente letras minúsculas y mayúsculas sin acentos (a-z, A-Z) y números (0-9).');

    $.validator.addMethod('validarUsuariEmail',function(value, element){
        return this.optional(element) || /(?=^[a-z]+[\w@\.]{2,50}$)/i.test(value);
    }, 'Ingrese un “Nombre de usuario” o “Correo electrónico” valido.');

    $("#formulario-editar").validate({
        errorPlacement: function(error, element){
            if(element.attr('type')=='checkbox'){
                error.insertAfter(element.parent('label').parent('div').parent('div'))
            }
            else{
                error.insertAfter(element.parent().parent())
            }
        },
        // errorLabelContainer: '.errores',
        // wrapper: 'li',
        rules:{
            nombre:{
                required: true,
                validarNombre: true
            },
            apellido:{
                required: true,
                validarApellido: true
            },
            usuario:{
                required: true,
                validarUsuario: true
            },
            email:{
                required: true,
                validarEmail: true
            },
            clave:{
                required: true,
                validarClave: true
            },
            reclave:{
                required: true,
                validarClave: true,
                equalTo: "#clave"
            }
        },
        messages:{
            nombre:{
                required: '"Nombre(s)" es un campo requerido.'
            },
            apellido:{
                required: '"Apellidos" es un campo requerido.'
            },
            usuario:{
                required: '"Nombre de usuario" es un campo requerido.'
            },
            email:{
                required: '"Correo electrónico" es un campo requerido.'
            },
            clave:{
                required: '"Contraseña" es un campo requerido.'
            },
            reclave:{
                required: '"Re-Contraseña" es un campo requerido.',
                equalTo: 'Las contraseñas proveídas no son iguales.'
            }
        }
    });
    
    $("#formulario-login").validate({
        rules:{
            usuarioOEmail:{
                required: true,
                validarUsuariEmail: true
            },
            clave:{
                required: true,
                validarClave: true
            }
        },
        messages:{
            usuarioOEmail:{
                required: '"Nombre de usuario" o "Correo electrónico" es requerido.'
            },
            clave:{
                required: '"Contraseña" es requerida.'
            }
        }
    });
    
    $("#formulario-registro").validate({
        errorPlacement: function(error, element){
            if(element.attr('type')=='checkbox'){
                error.insertAfter(element.parent('label').parent('div').parent('div'))
            }
            else{
                error.insertAfter(element.parent().parent())
            }
        },
        // errorLabelContainer: '.errores',
        // wrapper: 'li',
        rules:{
            nombre:{
                required: true,
                validarNombre: true
            },
            apellido:{
                required: true,
                validarApellido: true
            },
            usuario:{
                required: true,
                validarUsuario: true
            },
            email:{
                required: true,
                validarEmail: true
            },
            clave:{
                required: true,
                validarClave: true
            },
            reclave:{
                required: true,
                validarClave: true,
                equalTo: "#clave"
            },
            terminos:{
                required: true
            }
        },
        messages:{
            nombre:{
                required: '"Nombre(s)" es un campo requerido.'
            },
            apellido:{
                required: '"Apellidos" es un campo requerido.'
            },
            usuario:{
                required: '"Nombre de usuario" es un campo requerido.'
            },
            email:{
                required: '"Correo electrónico" es un campo requerido.'
            },
            clave:{
                required: '"Contraseña" es un campo requerido.'
            },
            reclave:{
                required: '"Re-Contraseña" es un campo requerido.',
                equalTo: 'Las contraseñas proveídas no son iguales.'
            },
            terminos:{
                required: '"Acepto" es un campo requerido.'
            }
        }
    });
});

