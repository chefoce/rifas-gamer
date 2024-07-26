<?php

include('assets/php/constants.php');

?>

<!DOCTYPE html>

<html lang="en">



<head>

  <meta charset="utf-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">



  <title>Rifas Gamer - Sorteo Express</title>



  <?php include('partials/head.php'); ?>



  <div style="height: 5vh;">



  </div>



  <main id="main">

    <section class="services section-bg">

      <div class="container">



        <div class="section-title" id="comprarB">

          <h2>SORTEO EXPRESS 19 de DICIEMBRE 2023</h2>
          <h3>Haz click abajo para seleccionar tu boleto</h3>

          <p class="m-2">
            PREMIO: 1 boleto con 4 oportunidades para la rifa de una pc gamer el 30 de enero del 2024.
            SERÁN 5 GANADORES</p>

          <h3 class="m-2">MECÁNICA</h3>
          <ol class="list-group list-group-numbered">
            <li class="list-group-item">Selecciona y aparta tu boleto </li>
            <li class="list-group-item">Sigue los pasos de apartado y envía tu mensaje de apartado por WhatsApp</li>
            <li class="list-group-item">Envía las siguientes capturas el mismo chat de WhatsApp</li>
            <li class="list-group-item">Siguiendo nuestra página de Facebook <a href="https://www.facebook.com/rifasgamermx">@rifasgamermx</a></li>
            <li class="list-group-item">Reacciona y comenta cualquier publicación de nuestra página en Facebook <a href="https://www.facebook.com/rifasgamermx">@rifasgamermx</a></li>
            <li class="list-group-item">Comparte cualquier publicación de nuestra página en Facebook <a href="https://www.facebook.com/rifasgamermx">@rifasgamermx</a></li>
            <li class="list-group-item">Espera por la confirmación</li>
          </ol>

        
          <p class="m-2">SOLO BOLETOS CONFIRMADOS PARTICIPAN.
            SOLO UNA PARTICIPACIÓN POR PERSONA.
          </p>
        
          <div id="seleccionBoletos"></div>
          <?php
          if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
          }
          ?>
          <h2 class="mt-3">BUSCAR</h2>

          <div class="position-relative mt-5">


            <input style="width: 50%; text-align: center;" id="buscarBoleto" onkeyup="buscarBoleto()" type="text" inputmode='numeric' maxlength='10' class="form-control position-absolute bottom-0 start-50 translate-middle-x" placeholder="# BOLETO">

          </div>


          <div class="row">

            <div class="col-md-6 offset-md-3 mt-4">

              <a class="btn btn-outline-success me-2" style="padding: 1rem 2rem;"></a>

              <p style="display: inline-flex;"><strong>Disponibles</strong></p>

            </div>

          </div>

          <div class="mt-3">
            <div>
              <p id="mensaje" style="display: none; color: red;"><strong># de Boleto no Disponible</strong></p>
            </div>

            <ul id="boletos">

              <?php

              $sql = "SELECT * FROM express";

              $res = mysqli_query($conn, $sql);

              if ($res == TRUE) {

                $count = mysqli_num_rows($res);

                if ($count > 0) {

                  while ($rows = mysqli_fetch_assoc($res)) {

                    $id_boleto = $rows['id_express'];

                    $num1 = $rows['num1'];

                    $num2 = $rows['num2'];

                    $vendido = $rows['apartado'];

                    $all = $num1 . ", " . $num2;

                    if ($vendido == 0) { ?>

                      <li class="boleto" data-a="<?php echo $num1; ?>" data-b="<?php echo $all; ?>" data-c="<?php echo $id_boleto; ?>" onclick="selBoleto2('<?php echo $num1; ?>','<?php echo $all; ?>','<?php echo $id_boleto; ?>')"><a href="#comprarB" class="btn btn-outline-success list__button"><?php echo $num1; ?></a></li><?php

                                                                                                                                                                                                                                                                                                                                  } else if ($vendido == 1) { ?>

                      <li class="boleto"><a class="btn btn-outline-success list__button" style="background-color: black;"></a></a></li><?php

                                                                                                                                                                                                                                                                                                                                  }
                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                              }
                                                                                                                                                                                                                                                                                                                            } ?>

            </ul>

          </div>

        </div>

      </div>

    </section>

  </main><!-- End #main -->



  <?php include('partials/footer.php'); ?>







  </body>



</html>