function getDatos()
{
    var nombre = window.prompt("Nombre: ", "");
    var edad = prompt("Edad: ", "");

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: ' + nombre + '</h3>'

    var div1 = document.getElementById('edad');
    div1.innerHTML = '<h3> Edad: ' + edad + '</h3>'
}

// Ejemplo 1: Hola Mundo con document.write()
function mostrarHolaMundo() {
    document.write('Hola Mundo');
}

// Ejemplo 2: Mostrar variables
function mostrarVariables() {
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;

    document.write(nombre + '<br>');
    document.write(edad + '<br>');
    document.write(altura + '<br>');
    document.write(casado + '<br>');
}

// Ejemplo 3: Pedir nombre y edad y mostrarlos
function mostrarSaludo() {
    var nombre = prompt('Ingresa tu nombre:', '');
    var edad = prompt('Ingresa tu edad:', '');

    document.write('Hola ' + nombre + ', así que tienes ' + edad + ' años');
}

// Ejemplo 4: Solicitar dos números y mostrar la suma y el producto
function calcularOperaciones() {
    var valor1 = prompt('Introducir primer número:', '');
    var valor2 = prompt('Introducir segundo número:', '');

    var suma = parseInt(valor1) + parseInt(valor2);
    var producto = parseInt(valor1) * parseInt(valor2);

    document.write('La suma es ' + suma + '<br>');
    document.write('El producto es ' + producto);
                               }

// Ejemplo 5: Evaluar si una persona está aprobada
function evaluarAprobacion() {
    var nombre = prompt('Ingresa tu nombre:', '');
    var nota = prompt('Ingresa tu nota:', '');

    if (nota >= 4) {
        document.write(nombre + ' está aprobado con un ' + nota);
    }
                             }

// Ejemplo 6: Comparar dos números y mostrar el mayor
function mostrarMayor() {
    var num1 = prompt('Ingresa el primer número:', '');
    var num2 = prompt('Ingresa el segundo número:', '');

    num1 = parseInt(num1);
    num2 = parseInt(num2);

    if (num1 > num2) {
        document.write('El mayor es ' + num1);
    } else {
        document.write('El mayor es ' + num2);
    }
                        }

// Ejemplo 7: Calcular promedio de 3 notas y mostrar el estado
function evaluarPromedio() {
    var nota1 = prompt('Ingresa 1ra. nota:', '');
    var nota2 = prompt('Ingresa 2da. nota:', '');
    var nota3 = prompt('Ingresa 3ra. nota:', '');

    // Convertir los valores a enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var promedio = (nota1 + nota2 + nota3) / 3;

    if (promedio >= 7) {
        document.write('Aprobado');
    } else if (promedio >= 4) {
        document.write('Regular');
    } else {
        document.write('Reprobado');
    }
                          }

// Ejemplo 8: Convertir un valor entre 1 y 5 a palabras usando switch
function convertirValor() {
    var valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '');
    
    // Convertir el valor a entero
    valor = parseInt(valor);

    switch (valor) {
        case 1: 
            document.write('uno');
            break;
        case 2: 
            document.write('dos');
            break;
        case 3: 
            document.write('tres');
            break;
        case 4: 
            document.write('cuatro');
            break;
        case 5: 
            document.write('cinco');
            break;
        default:
            document.write('Debe ingresar un valor comprendido entre 1 y 5.');
    }
                         }

 // Ejemplo 9: Cambiar el color de fondo según la elección del usuario
function cambiarColorFondo() {
    var col = prompt('Ingresa el color con que quieres pintar el fondo de la ventana (rojo, verde, azul):', '');
    
    switch (col.toLowerCase()) {
        case 'rojo':
            document.bgColor = '#ff0000'; // Fondo rojo
            break;
        case 'verde':
            document.bgColor = '#00ff00'; // Fondo verde
            break;
        case 'azul':
            document.bgColor = '#0000ff'; // Fondo azul
            break;
        default:
            alert('Por favor, ingresa uno de los colores especificados (rojo, verde, azul).');
    }
                            }

// Ejemplo 10: Mostrar números del 1 al 100 usando un bucle while
function mostrarNumeros() {
    var x = 1;
    var resultado = ''; // Variable para acumular los números y saltos de línea
    while (x <= 100) {
        resultado += x + '<br>'; // Concatenar los números y saltos de línea
        x++;
    }
    // Mostrar el resultado dentro del div 'numeros'
    document.getElementById('numeros').innerHTML = resultado;
                         }
// Ejemplo 11: Sumar cinco valores ingresados por el usuario
function sumarValores() {
    var x = 1;
    var suma = 0;
    var valor;
    while (x <= 5) {
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma += valor; // Sumar el valor ingresado
        x++;
    }
    // Mostrar el resultado en el div 'resultadoSuma'
    document.getElementById('resultadoSuma').innerHTML = "La suma de los valores es " + suma + "<br>";
                        }

// Ejemplo 12: Determinar la cantidad de dígitos de un número ingresado por el usuario
function contarDigitos() {
    var valor;
    do {
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        document.write('El valor ' + valor + ' tiene ');
        if (valor < 10 && valor >= 0) {
            document.write('1 dígito');
        } else if (valor < 100) {
            document.write('2 dígitos');
        } else if (valor < 1000) {
            document.write('3 dígitos');
        } else if (valor < 0) {
            document.write('no es un número válido'); // Para manejar valores negativos
        }
        document.write('<br>');
    } while (valor !== 0);
                        }

// Ejemplo 13: Mostrar números del 1 al 10
function mostrarNumerosFor() {
    var output = ""; // Variable para almacenar la salida
    for (var f = 1; f <= 10; f++) {
        output += f + " "; // Agregar el número seguido de un espacio
    }
    // Mostrar el resultado en el div 'resultadoFor'
    document.getElementById('resultadoFor').innerHTML = output;
                             }

// Ejemplo 14: Mostrar advertencias sobre la entrada del documento
function mostrarAdvertencias() {
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
                              }

// Ejemplo 15: Mostrar advertencia tres veces
function mostrarMensaje() {
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");}
function ejecutarAdvertencias() {
    // Llamamos a mostrarMensaje tres veces
    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();}

// Ejemplo 16: Mostrar rango de números entre dos valores
function mostrarRango(x1, x2) {
    var inicio;
    for (inicio = x1; inicio <= x2; inicio++) {
        document.write(inicio + ' ');
    }                         }

function pedirValoresYMostrarRango() {
    var valor1, valor2;
    valor1 = prompt('Ingresa el valor inferior:', '');
    valor1 = parseInt(valor1);
    valor2 = prompt('Ingresa el valor superior:', '');
    valor2 = parseInt(valor2);
    mostrarRango(valor1, valor2);   }

// Ejemplo 17: Convertir número a palabra en castellano
function convertirCastellano(x)   {
    if (x == 1)
        return "uno";
    else if (x == 2)
        return "dos";
    else if (x == 3)
        return "tres";
    else if (x == 4)
        return "cuatro";
    else if (x == 5)
        return "cinco";
    else
        return "valor incorrecto";}
function pedirValorYConvertir() {
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var resultado = convertirCastellano(valor);
    document.write(resultado);  }

    // Ejemplo 18: Convertir número a palabra en castellano usando switch
function convertirCastellano(x) {
    switch (x) {
        case 1: return "uno";
        case 2: return "dos";
        case 3: return "tres";
        case 4: return "cuatro";
        case 5: return "cinco";
        default: return "valor incorrecto";
    }                          }
function pedirValorYConvertir() {
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var resultado = convertirCastellano(valor);
    document.write(resultado);  }





