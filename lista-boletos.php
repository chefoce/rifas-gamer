<?php

include('assets/php/constants.php');

?>

<!DOCTYPE html>

<html lang="en">



<head>

  <meta charset="utf-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">



  <title>Rifas Gamer - Lista Boletos</title>



  <?php include('partials/head.php'); ?>



  <section id="hero" style="height: 50vh;">

    <div class="hero-container">

      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">



        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>



        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->

          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);height: 50vh;">

            <div class="carousel-container">

              <div class="carousel-content">

                <h2 class="animate__animated animate__fadeInDown">Emisión 250 Boletos (4 oportunidades por boleto)</h2>

                <p class="animate__animated animate__fadeInUp">1 Boleto por $150​</p>

                <div>

                  <a href="lista-boletos#seleccionBoletos" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lista

                    Boletos</a>

                </div>

              </div>

            </div>

          </div>



          <!-- Slide 2 -->

          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);height: 50vh;">

            <div class="carousel-container">

              <div class="carousel-content">

                <h2 class="animate__animated animate__fadeInDown">Sorteo 30 de Enero</h2>

                <p class="animate__animated animate__fadeInUp">Participas con tu boleto liquidado.</p>

                <div>

                  <a href="lista-boletos#seleccionBoletos" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lista

                    Boletos</a>

                </div>

              </div>

            </div>

          </div>



          <!-- Slide 3 -->

          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);height: 50vh;">

            <div class="carousel-container">

              <div class="carousel-content">

                <h2 class="animate__animated animate__fadeInDown">Sorteo en Base a la Lotería Nacional</h2>

                <p class="animate__animated animate__fadeInUp">Ultimas 3 cifras del premio mayor</p>

                <div>

                  <a href="lista-boletos#seleccionBoletos" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lista

                    Boletos</a>

                </div>

              </div>

            </div>

          </div>



        </div>



        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">

          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>

        </a>



        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">

          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>

        </a>



      </div>

    </div>

  </section><!-- End Hero -->



  <main id="main">

    <section class="services section-bg">

      <div class="container">



        <div class="section-title" id="comprarB">

          <h2>Haz click abajo para seleccionar tu(s) boleto(s)</h2>

          <p><strong>

              IMPORTANTE LOS BOLETOS APARTADOS SE TIENEN QUE PAGAR EN UN LAPSO NO MAYOR A 12 HORAS, DESPUÉS DE ESO SE LIBERAN LOS NÚMEROS

            </strong></p>
            <p><strong>BONO DE PRONTO PAGO PRIMERAS 4 HORAS DESPUÉS DE APARTAR LLÉVATE 16 GB DE RAM MAS</strong></p>
      
            <?php
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
          <div id="seleccionBoletos"></div>

          <h2 class="mt-3">BUSCAR</h2>

          <div class="position-relative mt-5">


            <input style="width: 50%; text-align: center;" id="buscarBoleto" onkeyup="buscarBoleto()" type="text" inputmode='numeric' maxlength='10' class="form-control position-absolute bottom-0 start-50 translate-middle-x" placeholder="# BOLETO">

          </div>



          <button type="button" onclick="boletoRandom()" class="btn btn-success mt-3" style="background-color: #5c9f24;">

            <i class="bx bxs-dice-5"></i> BOLETO AL AZAR

          </button>

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

              $sql = "SELECT * FROM boletos";

              $res = mysqli_query($conn, $sql);

              if ($res == TRUE) {

                $count = mysqli_num_rows($res);

                if ($count > 0) {

                  while ($rows = mysqli_fetch_assoc($res)) {

                    $id_boleto = $rows['id_boleto'];

                    $num1 = $rows['num1'];

                    $num2 = $rows['num2'];

                    $num3 = $rows['num3'];

                    $num4 = $rows['num4'];

                    $vendido = $rows['vendido'];

                    $pagado = $rows['pagado'];

                    $all = $num1 . ", " . $num2 . ", " . $num3 . ", " . $num4;

                    if ($vendido == 0) { ?>

                      <li class="boleto" data-a="<?php echo $num1; ?>" data-b="<?php echo $all; ?>" data-c="<?php echo $id_boleto; ?>" onclick="selBoleto('<?php echo $num1; ?>','<?php echo $all; ?>','<?php echo $id_boleto; ?>')"><a href="#comprarB" class="btn btn-outline-success list__button"><?php echo $num1; ?></a></li><?php

                    } else if ($vendido == 1 || $pagado == 1) { ?>

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