
/**Funciones Boletos */
function buscarBoleto() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("buscarBoleto");
  filter = input.value.toUpperCase();
  ul = document.getElementById("boletos");
  li = ul.getElementsByTagName("li");

  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].classList.remove("visibleB");
    } else {
      li[i].classList.add("visibleB");
    }
  }
  var cantidadOcultos = document.querySelectorAll('#boletos .visibleB').length;
  var total = ul.getElementsByTagName("li").length;
  var mensaje = document.getElementById("mensaje");
  if (cantidadOcultos == total) {
    mensaje.style.display = "";
  } else {
    mensaje.style.display = "none";
  }
  console.log(cantidadOcultos);
  console.log(total);
}
var clic = 0;
let nums = [];
let ids = [];
let oportunidades = [];

function selBoleto(a, b, c) {
  clic++;
  if (!nums.includes(a)) {
    nums.push(a);
    oportunidades.push(b);
    ids.push(c);
  } else {
    alert("Numero seleccionado previamente");
    return;
  }
  var numeroBoletos = nums.length;
  if (clic == 1) {
    document.getElementById("seleccionBoletos").innerHTML +=
      "<button type='button' class='btn btn-success m-1' style='background-color:#5c9f24' data-bs-toggle='modal' data-bs-target='#modalApartar' style='margin-bottom: .5rem; overflow: hidden; position: relative; z-index: 1;'>Apartar</button>" +
      "<div class='modal fade' id='modalApartar' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>" +
      "<div class='modal-dialog modal-dialog-centered d-flex justify-content-center'>" +
      "<div class='modal-content w-85'>" +
      "<div class='modal-header'>" +
      "<h5 class='modal-title'>Apartar Boleto</h5>" +
      "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>" +
      "</div>" +
      "<div class='modal-body p-4'>" +
      "<form method='POST' action='assets/php/apartar-boleto.php'>" +
      "<p style='margin-bottom: 0.5rem'>COMPLETA TUS DATOS Y DA CLICK EN APARTAR</p>" +
      "<p id='modalCantidadBol' style='margin-bottom: 0.5rem'>" + numeroBoletos + " Boleto(s) Seleccionado(s)</p>" +
      "<div class='form-outline mb-4'>" +
      "<input type='text' id='nombre' name='nombre' onkeyup=\"soloLetras(\'nombre\')\" class='form-control' placeholder='Nombre(s)' required />" +
      "<label class='form-label' style='display: block; margin-bottom: -.5rem;' for='nombre' data-error='Ingresa solo letras' data-success='right'></label>" +
      "</div>" +
      "<div class='form-outline mb-4'>" +
      "<input type='text' id='apellido' name='apellido' onkeyup=\"soloLetras2(\'apellido\')\" class='form-control' placeholder='Apellidos' required />" +
      "<label class='form-label' style='display: block; margin-bottom: -.5rem;' for='apellido' data-error='Ingresa solo letras' data-success='right'></label>" +
      "</div>" +
      "<div class='form-outline mb-4'>" +
      "<input type='text' inputmode='numeric' maxlength='10' id='telefono' name='telefono' onkeyup=\"soloTelefono(\'telefono\')\" class='form-control' placeholder='Número WhatsApp (10 dígitos)' required />" +
      "<label class='form-label' style='display: block; margin-bottom: -.5rem;' for='telefono' data-error='Número a 10 dígitos' data-success='right'></label>" +
      "</div>" +
      "<div class='form-outline mb-4'>" +
      "<select id='estado' name='estado' class='form-select' required>" +
      "<option value='0'>SELECCIONA ESTADO</option>" +
      "<option value='AGUASCALIENTES'>AGUASCALIENTES</option>" +
      "<option value='BAJA CALIFORNIA'>BAJA CALIFORNIA</option>" +
      "<option value='BAJA CALIFORNIA SUR'>BAJA CALIFORNIA SUR</option>" +
      "<option value='CAMPECHE'>CAMPECHE</option>" +
      "<option value='CIUDAD DE MÉXICO'>CIUDAD DE MÉXICO</option>" +
      "<option value='COAHUILA'>COAHUILA</option>" +
      "<option value='COLIMA'>COLIMA</option>" +
      "<option value='CHIAPAS'>CHIAPAS</option>" +
      "<option value='CHIHUAHUA'>CHIHUAHUA</option>" +
      "<option value='DURANGO'>DURANGO</option>" +
      "<option value='ESTADO DE MÉXICO'>ESTADO DE MÉXICO</option>" +
      "<option value='GUANAJUATO'>GUANAJUATO</option>" +
      "<option value='GUERRERO'>GUERRERO</option>" +
      "<option value='HIDALGO'>HIDALGO</option>" +
      "<option value='JALISCO'>JALISCO</option>" +
      "<option value='MICHOACÁN'>MICHOACÁN</option>" +
      "<option value='MORELOS'>MORELOS</option>" +
      "<option value='NAYARIT'>NAYARIT</option>" +
      "<option value='NUEVO LEÓN'>NUEVO LEÓN</option>" +
      "<option value='OAXACA'>OAXACA</option>" +
      "<option value='PUEBLA'>PUEBLA</option>" +
      "<option value='QUERÉTARO'>QUERÉTARO</option>" +
      "<option value='QUINTANA ROO'>QUINTANA ROO</option>" +
      "<option value='SAN LUIS POTOSÍ'>SAN LUIS POTOSÍ</option>" +
      "<option value='SINALOA'>SINALOA</option>" +
      "<option value='SONORA'>SONORA</option>" +
      "<option value='TABASCO'>TABASCO</option>" +
      "<option value='TAMAULIPAS'>TAMAULIPAS</option>" +
      "<option value='TLAXCALA'>TLAXCALA</option>" +
      "<option value='VERACRUZ'>VERACRUZ</option>" +
      "<option value='YUCATÁN'>YUCATÁN</option>" +
      "<option value='ZACATECAS'>ZACATECAS</option>" +
      "</select>" +
      "</div>" +
      "<div class='form-outline mb-4'>" +
      "<input type='text' id='referido' name='referido' class='form-control' placeholder='Código de Referido'/>" +
      "</div>" +
      "<p style='margin-bottom: 0.5rem'>¡Al finalizar serás redirigido a WhatsApp para enviar la información de tu boleto!</p>" +
      "<p style='margin-bottom: 0.5rem'>Tu boleto sólo dura 12 horas apartado</p>" +
      "<input type='hidden' id='ids' name='ids' value='" + ids + "'>" +
      "<input type='hidden' id='cantidad' name='cantidad' value='" + numeroBoletos + "'>" +
      "<input type='hidden' id='oportunidades' name='oportunidades' value='" + oportunidades + "'>" +
      "<div class='form-check'>" +
      "<input style='margin-left: -1em; border: solid 2px;' class='form-check-input' type='checkbox' name='acepto' value='1' id='acepto'>" +
      "<label style='color: black; margin-left: -1.5em;' class='form-check-label' for='acepto'>HE LEÍDO Y ACEPTO LOS <a target='_blank' href='terminos-y-condiciones.php'>TÉRMINOS Y CONDICIONES</a>" +
      "</label>" +
      "</div>" +
      "<input type='submit' id='apartarSub' onClick='return val()' value='Apartar' class='btn btn-primary btn-block'>" +
      "<div id='mostrar' style='display:none; color: red; font-weight: bolder;'>Redirigiendo</div>" +
      "<div id='loadingGif' style='display:none'><img src='assets/img/loading.gif'></div>" +
      "</form>" +
      "</div>" +
      "</div>" +
      "</div>" +
      "</div>" +
      "<h2 id='numeroSel' style='margin-bottom: .5rem;'>" + numeroBoletos + "<br><span style='font-size: 1rem;'>boleto(s)</span><br><span style='font-size: 1rem;'>seleccionado(s)</span></h2>" +
      "<p style='margin-bottom: .5rem; color: red;'>Para eliminar haz click en el numero de boleto</p>" +
      "<p style='margin-bottom: .5rem; color: #0c91cf'>Cada boleto incluye 4 números:</p>" +
      "<h3 style='margin-bottom: .5rem;' id='" + a + "' onclick=\"borrar(\'" + a + "\'," + c + ",\'" + b + "\')\">" + b + "</h3>";
  }
  if (clic > 1) {
    var h2 = document.getElementById("numeroSel");
    h2.innerHTML = numeroBoletos + "<br><span style='font-size: 1rem;'>boleto(s)</span><br><span style='font-size: 1rem;'>seleccionado(s)</span></h2>";
    var p = document.getElementById("modalCantidadBol");
    p.innerHTML = numeroBoletos + " Boleto(s) Seleccionado(s)</p>";
    document.getElementById("seleccionBoletos").innerHTML +=
      "<h3 style='margin-bottom: .5rem;' id='" + a + "' onclick=\"borrar(\'" + a + "\'," + c + ",\'" + b + "\')\">" + b + "</h3>";
    var input = document.getElementById("ids");
    input.value = ids;
    var inputCantidad = document.getElementById("cantidad");
    inputCantidad.value = numeroBoletos;
    var inputOportunidades = document.getElementById("oportunidades");
    inputOportunidades.value = oportunidades;

  }

}

function val() {
  var nombre = document.getElementById('nombre');
  var apellido = document.getElementById('apellido');
  var telefono = document.getElementById('telefono');
  var estado = document.getElementById('estado').value;
  var acepto = document.getElementById('acepto').checked;
  console.log(acepto);
  if (nombre.value == "" || apellido.value == "" || telefono.value == "" || estado == 0) {
    alert('Todos los campos son requeridos');
    return false;
  } else {
    if (!acepto) {
      alert('Acepta los términos y condiciones');
      return false;
    } else {
      validar();
      if (!validar()) {
        return false;
      } else {
        showDiv();
        return true;
      }
    }
  }
}

function showDiv() {
  document.getElementById('apartarSub').style.display = "none";
  document.getElementById('loadingGif').style.display = "block";
  setTimeout(function () {
    document.getElementById('loadingGif').style.display = "none";
    document.getElementById('mostrar').style.display = "block";
  }, 3000);
}


function borrar(id, id2, op) {
  for (var i = nums.length - 1; i >= 0; i--) {
    if (nums[i] == id) {
      nums.splice(i, 1);
    }
  }
  for (var i = ids.length - 1; i >= 0; i--) {
    if (ids[i] == id2) {
      ids.splice(i, 1);
    }
  }
    for (var i = oportunidades.length - 1; i >= 0; i--) {
      console.log(oportunidades[i]);
      console.log(op);
      if (oportunidades[i] == op) {
        oportunidades.splice(i, 1);
      }
    }
    const element = document.getElementById(id);
    element.remove();
    var h3 = document.getElementById("numeroSel");
    h3.innerHTML = nums.length + "<br><span style='font-size: 1rem;'>boleto(s)</span><br><span style='font-size: 1rem;'>seleccionado(s)</span></h2>";
    var p = document.getElementById("modalCantidadBol");
    p.innerHTML = nums.length + " Boleto(s) Seleccionado(s)</p>";
    var input = document.getElementById("ids");
    input.value = ids;
    var inputOp = document.getElementById("oportunidades");
    inputOp.value = oportunidades;
    if (nums.length == 0) {
      var div = document.getElementById("seleccionBoletos");
      div.innerHTML = "";
      clic = 0;
    }
}

function boletoRandom() {
  var li = document.getElementById('boletos').getElementsByTagName('li');
  var rand = Math.floor(Math.random() * li.length);
  var numeroA = li[rand].getAttribute('data-a');
  var numeroB = li[rand].getAttribute('data-b');
  var numeroC = li[rand].getAttribute('data-c');
  if (numeroA != null || numeroB != null || numeroC != null) {
    selBoleto(numeroA, numeroB, numeroC);
  } else {
    boletoRandom();
  }
}
/*******************RIFA EXPRESS ********************************/
function selBoleto2(a, b, c) {
  clic++;
  var num = a;
  oportunidades = b;
  var id = c;
  if (clic == 1) {
    document.getElementById("seleccionBoletos").innerHTML +=
      "<button type='button' class='btn btn-success m-1' style='background-color:#5c9f24' data-bs-toggle='modal' data-bs-target='#modalApartar' style='margin-bottom: .5rem; overflow: hidden; position: relative; z-index: 1;'>Apartar</button>" +
      "<div class='modal fade' id='modalApartar' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>" +
      "<div class='modal-dialog modal-dialog-centered d-flex justify-content-center'>" +
      "<div class='modal-content w-85'>" +
      "<div class='modal-header'>" +
      "<h5 class='modal-title'>Apartar Boleto</h5>" +
      "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>" +
      "</div>" +
      "<div class='modal-body p-4'>" +
      "<form method='POST' action='assets/php/apartar-express.php'>" +
      "<p style='margin-bottom: 0.5rem'>COMPLETA TUS DATOS Y DA CLICK EN APARTAR</p>" +
      //"<p id='modalCantidadBol' style='margin-bottom: 0.5rem'>" + numeroBoletos + " Boleto(s) Seleccionado(s)</p>" +
      "<div class='form-outline mb-4'>" +
      "<input type='text' id='nombre' name='nombre' onkeyup=\"soloLetras(\'nombre\')\" class='form-control' placeholder='Nombre(s)' required />" +
      "<label class='form-label' style='display: block; margin-bottom: -.5rem;' for='nombre' data-error='Ingresa solo letras' data-success='right'></label>" +
      "</div>" +
      "<div class='form-outline mb-4'>" +
      "<input type='text' id='apellido' name='apellido' onkeyup=\"soloLetras2(\'apellido\')\" class='form-control' placeholder='Apellidos' required />" +
      "<label class='form-label' style='display: block; margin-bottom: -.5rem;' for='apellido' data-error='Ingresa solo letras' data-success='right'></label>" +
      "</div>" +
      "<div class='form-outline mb-4'>" +
      "<input type='text' inputmode='numeric' maxlength='10' id='telefono' name='telefono' onkeyup=\"soloTelefono(\'telefono\')\" class='form-control' placeholder='Número WhatsApp (10 dígitos)' required />" +
      "<label class='form-label' style='display: block; margin-bottom: -.5rem;' for='telefono' data-error='Número a 10 dígitos' data-success='right'></label>" +
      "</div>" +
      "<div class='form-outline mb-4'>" +
      "<select id='estado' name='estado' class='form-select' required>" +
      "<option value='0'>SELECCIONA ESTADO</option>" +
      "<option value='AGUASCALIENTES'>AGUASCALIENTES</option>" +
      "<option value='BAJA CALIFORNIA'>BAJA CALIFORNIA</option>" +
      "<option value='BAJA CALIFORNIA SUR'>BAJA CALIFORNIA SUR</option>" +
      "<option value='CAMPECHE'>CAMPECHE</option>" +
      "<option value='CIUDAD DE MEXICO'>CIUDAD DE MÉXICO</option>" +
      "<option value='COAHUILA'>COAHUILA</option>" +
      "<option value='COLIMA'>COLIMA</option>" +
      "<option value='CHIAPAS'>CHIAPAS</option>" +
      "<option value='CHIHUAHUA'>CHIHUAHUA</option>" +
      "<option value='DURANGO'>DURANGO</option>" +
      "<option value='ESTADO DE MEXICO'>ESTADO DE MÉXICO</option>" +
      "<option value='GUANAJUATO'>GUANAJUATO</option>" +
      "<option value='GUERRERO'>GUERRERO</option>" +
      "<option value='HIDALGO'>HIDALGO</option>" +
      "<option value='JALISCO'>JALISCO</option>" +
      "<option value='MICHOACAN'>MICHOACÁN</option>" +
      "<option value='MORELOS'>MORELOS</option>" +
      "<option value='NAYARIT'>NAYARIT</option>" +
      "<option value='NUEVO LEON'>NUEVO LEÓN</option>" +
      "<option value='OAXACA'>OAXACA</option>" +
      "<option value='PUEBLA'>PUEBLA</option>" +
      "<option value='QUERETARO'>QUERÉTARO</option>" +
      "<option value='QUINTANA ROO'>QUINTANA ROO</option>" +
      "<option value='SAN LUIS POTOSI'>SAN LUIS POTOSÍ</option>" +
      "<option value='SINALOA'>SINALOA</option>" +
      "<option value='SONORA'>SONORA</option>" +
      "<option value='TABASCO'>TABASCO</option>" +
      "<option value='TAMAULIPAS'>TAMAULIPAS</option>" +
      "<option value='TLAXCALA'>TLAXCALA</option>" +
      "<option value='VERACRUZ'>VERACRUZ</option>" +
      "<option value='YUCATAN'>YUCATÁN</option>" +
      "<option value='ZACATECAS'>ZACATECAS</option>" +
      "</select>" +
      "</div>" +
      "<div class='form-outline mb-4'>" +
      "<input type='text' id='fb' name='fb' class='form-control' placeholder='Usuario Facebook'/>" +
      "</div>" +
      "<p style='margin-bottom: 0.5rem'>¡Al finalizar serás redirigido a WhatsApp para enviar la información de tu boleto!</p>" +
      "<p style='margin-bottom: 0.5rem'>Tu boleto sólo dura 12 horas apartado</p>" +
      "<input type='hidden' id='id' name='id' value='" + id + "'>" +
      "<input type='hidden' id='num' name='num' value='" + num + "'>" +
      "<input type='hidden' id='oportunidades' name='oportunidades' value='" + oportunidades + "'>" +
      "<div class='form-check'>" +
      "<input style='margin-left: -1em; border: solid 2px;' class='form-check-input' type='checkbox' name='acepto' value='1' id='acepto'>" +
      "<label style='color: black; margin-left: -1.5em;' class='form-check-label' for='acepto'>HE LEÍDO Y ACEPTO LOS <a target='_blank' href='terminos-y-condiciones.php'>TÉRMINOS Y CONDICIONES</a>" +
      "</label>" +
      "</div>" +
      "<input type='submit' id='apartarSub' onClick='return val2()' value='Apartar' class='btn btn-primary btn-block'>" +
      "<div id='mostrar' style='display:none; color: red; font-weight: bolder;'>Redirigiendo</div>" +
      "<div id='loadingGif' style='display:none'><img src='assets/img/loading.gif'></div>" +
      "</form>" +
      "</div>" +
      "</div>" +
      "</div>" +
      "</div>" +
      "<h2 id='numeroSel' style='margin-bottom: .5rem;'>1<br><span style='font-size: 1rem;'>boleto</span><br><span style='font-size: 1rem;'>seleccionado</span></h2>" +
      "<p style='margin-bottom: .5rem; color: red;'>Para eliminar haz click en el numero de boleto</p>" +
      "<p style='margin-bottom: .5rem; color: #0c91cf'>Cada boleto incluye 2 números:</p>" +
      "<h3 style='margin-bottom: .5rem;' id='" + a + "' onclick=\"borrar2(\'" + a + "\')\">" + b + "</h3>";
  }
  if (clic > 1) {
    //var h2 = document.getElementById("numeroSel");
    //h2.innerHTML = numeroBoletos + "<br><span style='font-size: 1rem;'>boleto(s)</span><br><span style='font-size: 1rem;'>seleccionado(s)</span></h2>";
    //var p = document.getElementById("modalCantidadBol");
    //p.innerHTML = numeroBoletos + " Boleto(s) Seleccionado(s)</p>";
    //document.getElementById("seleccionBoletos").innerHTML +=
     // "<h3 style='margin-bottom: .5rem;' id='" + a + "' onclick=\"borrar(\'" + a + "\'," + c + ")\">" + b + "</h3>";
    //var input = document.getElementById("ids");
    //input.value = ids;
    //var inputCantidad = document.getElementById("cantidad");
    //inputCantidad.value = numeroBoletos;
    alert("Solo 1 boleto");

  }
}

function borrar2(id, id2) {
  const element = document.getElementById(id);
  element.remove();
  var div = document.getElementById("seleccionBoletos");
  div.innerHTML = "";
  clic = 0;
}

function val2() {
  var nombre = document.getElementById('nombre');
  var apellido = document.getElementById('apellido');
  var telefono = document.getElementById('telefono');
  var estado = document.getElementById('estado').value;
  var fb = document.getElementById('fb');
  var acepto = document.getElementById('acepto').checked;
  if (nombre.value == "" || apellido.value == "" || telefono.value == "" || fb.value == ""|| estado == 0) {
    alert('Todos los campos son requeridos');
    return false;
  } else {
    if (!acepto) {
      alert('Acepta los términos y condiciones');
      return false;
    } else {
      validar();
      if (!validar()) {
        return false;
      } else {
        showDiv();
        return true;
      }
    }
  }
}