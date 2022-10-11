// --------------------------- INICIO VALIDACIONES ---------------------------

(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form){
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// --------------- EJERCICIO 4 ---------------
$('#buscarAuto').bootstrapValidator({
    feedbackIcons: {
        valid: 'fas fa-check',
        invalid: 'fas fa-times',
        validating: 'fas fa-refresh'
    },
    fields: {
        Patente: {
            validators: {
                notEmpty: {
                    message: 'Debe ingresar la PATENTE. '
                },
                stringLength: {
                    min: 7,
                    message: 'La patente debe llevar 7 caracteres, incluido el espacio. '
                },
                regexp: {
                    regexp: /^[A-Z]{3}\s[0-9]{3}/,
                    message: 'La patente debe llevar solo números 0-9, letras A-Z y espacios. '
                } 
            }
        }
    }
});

// --------------- EJERCICIO 6 Y 9 ---------------
$('#nuevaPersona, #ActualizarPersona').bootstrapValidator({
    feedbackIcons: {
        valid: 'fas fa-check',
        invalid: 'fas fa-times',
        validating: 'fas fa-refresh'
    },
    fields: {
        NroDni: {
            validators: {
                notEmpty: {
                    message: 'Debe ingresar el DNI de la persona. '
                },
                digits: {
                    message: 'Solo ingresar números, no texto ni símbolos. '
                },
                stringLength: {
                    min: 8,
                    message: 'El DNI debe tener un mínimo de 8 caracteres'
                },
            }
        },
        Nombre: {
            validators: {
                notEmpty: {
                    message: 'Debe ingresar un nombre. '
                },
                stringLength: {
                    min: 3,
                    message: 'El nombre debe tener al menos 3 caracteres. '
                },
                regexp: {
                    regexp: /^[a-zA-ZñáéíóúüÁÉÍÓÚÜÑ\s]+$/,
                    message: 'El nombre solo debe llevar letras. '
                } 
            }
        },
        Apellido: {
            validators: {
                notEmpty: {
                    message: 'Debe ingresar un apellido. '
                },
                stringLength: {
                    min: 3,
                    message: 'El apellido debe tener al menos 3 caracteres. '
                },
                regexp: {
                    regexp: /^[a-zA-ZñáéíóúüÁÉÍÓÚÜÑ\s]+$/,
                    message: 'El apellido solo debe llevar letras. '
                } 
            }
        },
        fechaNac: {
        validators: {
            notEmpty: {
                message: 'Debe ingresar una fecha. '
            },
            stringLength: {
                min: 6,
                message: 'El formato de fecha es muy corto. '
            },
            date: {
                format: 'DD/MM/YYYY',
                message: 'La fecha tiene un formato incorrecto. '
            } 
        }
        },
        Telefono: {
            validators: {
                notEmpty: {
                    message: 'Debe ingresar un teléfono. '
                },
            }
        },
        Domicilio: {
            validators: {
                notEmpty: {
                    message: 'Debe ingresar un domicilio'
                },
                stringLength: {
                    min: 5,
                    message: 'El domicilio debe tener al menos 5 caracteres. '
                },
            }
        }
    }
});

$('#BuscarPersona').bootstrapValidator({
    feedbackIcons: {
        valid: 'fas fa-check',
        invalid: 'fas fa-times',
        validating: 'fas fa-refresh'
    },
    fields: {
        dni: {
            validators: {
                notEmpty: {
                    message: 'Debe ingresar el DNI de la persona. '
                },
                digits: {
                    message: 'Solo ingresar números, no texto ni símbolos. '
                },
                stringLength: {
                    min: 8,
                    message: 'El DNI debe tener un mínimo de 8 caracteres'
                },
            }
            },
    }
});

// --------------- EJERCICIO 7 ---------------
$('#nuevoAuto').bootstrapValidator({
    feedbackIcons: {
        valid: 'fas fa-check',
        invalid: 'fas fa-times',
        validating: 'fas fa-refresh'
    },
    fields: {
        Patente: {
        validators: {
            notEmpty: {
                message: 'Debe ingresar la PATENTE. '
            },
            stringLength: {
                min: 6,
                max: 7,
                message: 'La patente debe llevar solo 6 ó 7 caracteres. '
            },
            regexp: {
                regexp: /^[A-Z]{3}\s[0-9]{3}/,
                message: 'La patente debe llevar solo números 0-9 y letras A-Z. '
            } 
        }
        },
        Marca: {
        validators: {
            notEmpty: {
                message: 'Debe ingresar una marca. '
            },
            stringLength: {
                min: 3,
                message: 'La marca debe tener al menos 3 caracteres. '
            },
            regexp: {
                regexp: /^[A-Z]/,
                message: 'Solo mayúsculas. '
            } 
        }
        },
        Modelo: {
        validators: {
            notEmpty: {
                message: 'Debe ingresar el modelo (año). '
            },
            digits: {
                message: 'Solo ingresar números, no texto ni símbolos. '
            },
            regexp: {
                regexp: /^[0-9]{4}/,
                message: 'El modelo debe ser un número de 4 cifras. '
            },
            between: {
                min: 1900,
                max: 2022,
                message: 'Debe ingresar un año entre 1900 y 2022. '
            },
        }
        },
        DniDuenio: {
        validators: {
            notEmpty: {
                message: 'Debe ingresar el DNI del dueño del auto. '
            },
            digits: {
                message: 'Solo ingresar números, no texto ni símbolos. '
            },
            stringLength: {
                min: 8,
                message: 'El DNI debe tener un mínimo de 8 caracteres'
            },
        }
        }
    }
});

// --------------- EJERCICIO 8 ---------------
$('#CambioDuenio').bootstrapValidator({
    feedbackIcons: {
        valid: 'fas fa-check',
        invalid: 'fas fa-times',
        validating: 'fas fa-refresh'
    },
    fields: {
        Patente: {
        validators: {
            notEmpty: {
                message: 'Debe ingresar la PATENTE. '
            },
            stringLength: {
                min: 6,
                max: 7,
                message: 'La patente debe llevar solo 6 ó 7 caracteres. '
            },
            regexp: {
                regexp: /^[A-Z]{3}\s[0-9]{3}/,
                message: 'La patente debe llevar solo números 0-9 y letras A-Z. '
            } 
        }
        },
        DniDuenio: {
        validators: {
            notEmpty: {
                message: 'Debe ingresar el DNI del dueño del auto. '
            },
            digits: {
                message: 'Solo ingresar números, no texto ni símbolos. '
            },
            stringLength: {
                min: 8,
                message: 'El DNI debe tener un mínimo de 8 caracteres'
            },
        }
        }
    }
});


$('#Consulta').bootstrapValidator({
    feedbackIcons: {
        valid: 'fas fa-check',
        invalid: 'fas fa-times',
        validating: 'fas fa-refresh'
    },
    fields:{
        nombre: {
            validators: {
                notEmpty: {
                    message: 'Debe ingresar un nombre. '
                },
                stringLength: {
                    min: 3,
                    message: 'El nombre debe tener al menos 3 caracteres. '
                },
                regexp: {
                    regexp: /^[a-zA-ZñáéíóúüÁÉÍÓÚÜÑ\s]+$/,
                    message: 'El nombre solo debe llevar letras. '
                } 
            }
        },
        apellido: {
            validators: {
                notEmpty: {
                    message: 'Debe ingresar un apellido. '
                },
                stringLength: {
                    min: 3,
                    message: 'El apellido debe tener al menos 3 caracteres. '
                },
                regexp: {
                    regexp: /^[a-zA-ZñáéíóúüÁÉÍÓÚÜÑ\s]+$/,
                    message: 'El apellido solo debe llevar letras. '
                } 
            }
        },
        email:{
            validators: {
                notEmpty: {
                    message: 'Debe ingresar su correo. '
                }
            }
        },
        comentario:{
            validators: {
                notEmpty: {
                    message: 'Debe ingresar una consulta. '
                }
            }
        }
    }
})


//
//  ⢀⡴⠑⡄⠀⠀⠀⠀⠀⠀⠀⣀⣀⣤⣤⣤⣀⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀ 
//  ⠸⡇⠀⠿⡀⠀⠀⠀⣀⡴⢿⣿⣿⣿⣿⣿⣿⣿⣷⣦⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀ 
//  ⠀⠀⠀⠀⠑⢄⣠⠾⠁⣀⣄⡈⠙⣿⣿⣿⣿⣿⣿⣿⣿⣆⠀⠀⠀⠀⠀⠀⠀⠀ 
//  ⠀⠀⠀⠀⢀⡀⠁⠀⠀⠈⠙⠛⠂⠈⣿⣿⣿⣿⣿⠿⡿⢿⣆⠀⠀⠀⠀⠀⠀⠀ 
//  ⠀⠀⠀⢀⡾⣁⣀⠀⠴⠂⠙⣗⡀⠀⢻⣿⣿⠭⢤⣴⣦⣤⣹⠀⠀⠀⢀⢴⣶⣆ 
//  ⠀⠀⢀⣾⣿⣿⣿⣷⣮⣽⣾⣿⣥⣴⣿⣿⡿⢂⠔⢚⡿⢿⣿⣦⣴⣾⠁⠸⣼⡿ 
//  ⠀⢀⡞⠁⠙⠻⠿⠟⠉⠀⠛⢹⣿⣿⣿⣿⣿⣌⢤⣼⣿⣾⣿⡟⠉⠀⠀⠀⠀⠀ 
//  ⠀⣾⣷⣶⠇⠀⠀⣤⣄⣀⡀⠈⠻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡇⠀⠀⠀⠀⠀⠀ 
//  ⠀⠉⠈⠉⠀⠀⢦⡈⢻⣿⣿⣿⣶⣶⣶⣶⣤⣽⡹⣿⣿⣿⣿⡇⠀⠀⠀⠀⠀⠀ 
//  ⠀⠀⠀⠀⠀⠀⠀⠉⠲⣽⡻⢿⣿⣿⣿⣿⣿⣿⣷⣜⣿⣿⣿⡇⠀⠀⠀⠀⠀⠀ 
//  ⠀⠀⠀⠀⠀⠀⠀⠀⢸⣿⣿⣷⣶⣮⣭⣽⣿⣿⣿⣿⣿⣿⣿⠀⠀⠀⠀⠀⠀⠀ 
//  ⠀⠀⠀⠀⠀⠀⣀⣀⣈⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠇⠀⠀⠀⠀⠀⠀⠀ 
//  ⠀⠀⠀⠀⠀⠀⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠃⠀⠀⠀⠀⠀⠀⠀⠀ 
//  ⠀⠀⠀⠀⠀⠀⠀⠹⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠟⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀ 
//  ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⠛⠻⠿⠿⠿⠿⠛⠉
//