<?php
include('assets/php/constants.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rifas Gamer - Verificador</title>

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
                <h2 class="animate__animated animate__fadeInDown">Emisión 250 Boletos (4 números por boleto)</h2>
                <p class="animate__animated animate__fadeInUp">1 BOLETO POR $150​</p>
                <div>
                  <a href="lista-boletos" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lista
                    Boletos</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);height: 50vh;">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Sorteo 30 de enero</h2>
                <p class="animate__animated animate__fadeInUp">Participas con tu boleto liquidado</p>
                <div>
                  <a href="lista-boletos" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lista
                    Boletos</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);height: 50vh;">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Disfruta tus juegos sin perder ningún frame</h2>
                <p class="animate__animated animate__fadeInUp">Con su monitor de 165 hz y un 1 ms de retraso</p>
                <div>
                  <a href="lista-boletos" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lista
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
          <h2>VERIFICADOR DE BOLETOS</h2>
          <p><strong>Introduce tu BOLETO ó CELULAR y haz click en "Verificar"</strong></p>
          <form method='POST'>
            <div class="position-relative mt-5">
              <input style="width: 50%; text-align: center;" name="verificar" type="text" class="form-control position-absolute bottom-0 start-50 translate-middle-x" placeholder="# BOLETO o # CELULAR">
            </div>
            <input type="submit" name='submit' value='Verificar' class="btn btn-success mt-3" style="background-color: #5c9f24;">
            </input>
          </form>
            <div>
                <?php
                if (isset($_POST['submit'])) {
                  $verificar = $_POST['verificar'];
                  $sql = "SELECT bol.id_boleto,bol.num1,bol.num2,bol.num3,bol.num4,bol.pagado,ap.nombre,ap.apellidos,ap.estado FROM apartados_backup ap INNER JOIN boletos bol ON ap.boleto_id = bol.id_boleto WHERE bol.id_boleto = '$verificar' OR bol.num1 = '$verificar' OR bol.num2 = '$verificar' OR bol.num3 = '$verificar' OR bol.num4 = '$verificar' OR ap.telefono = '$verificar'";
                  $sql2 = "SELECT bol.id_boleto,bol.num1,bol.num2,bol.num3,bol.num4,bol.pagado,pa.nombre,pa.apellidos,pa.estado FROM pagados pa INNER JOIN boletos bol ON pa.boleto_id = bol.id_boleto WHERE bol.id_boleto = '$verificar' OR bol.num1 = '$verificar' OR bol.num2 = '$verificar' OR bol.num3 = '$verificar' OR bol.num4 = '$verificar' OR pa.telefono = '$verificar'";
                  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                  $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                  $count1 = mysqli_num_rows($res);
                  $count2 = mysqli_num_rows($res2);
                  if ($count1 > 0) {
                    ?>
                        <div class="table-responsive">
                        <table class="table mt-3">
                          <thead class="table-dark">
                            <tr>
                              <th scope="col">Número</th>
                              <th scope="col">Oportunidades</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Apellido</th>
                              <th scope="col">Estado</th>
                              <th scope="col">Pagado</th>
                            </tr>
                          </thead>
                          <tbody>
                    <?php
                    while ($rows = mysqli_fetch_assoc($res)) {
                      $id_boleto = $rows['id_boleto'];
                      $num1 = $rows['num1'];
                      $num2 = $rows['num2'];
                      $num3 = $rows['num3'];
                      $num4 = $rows['num4'];
                      $pagado = $rows['pagado'];
                      if($pagado==1){
                        $pagado2="SI";
                      }
                      if($pagado==0){
                        $pagado2="NO";
                      }
                      $nombre = $rows['nombre'];
                      $apellidos = $rows['apellidos'];
                      $estado = $rows['estado'];
                      $all = $num1 . ", " . $num2 . ", " . $num3 . ", " . $num4;
                  ?>
              
                            <tr>
                              <th scope="row"><?php echo $id_boleto; ?></th>
                              <td><?php echo $all; ?></td>
                              <td><?php echo $nombre; ?></td>
                              <td><?php echo $apellidos; ?></td>
                              <td><?php echo $estado; ?></td>
                              <?php if($pagado==1){
                                      ?> <td style="background-color: green;"><?php echo $pagado2; ?></td> <?php
                                    }else{
                                      ?> <td style="background-color: red;"><?php echo $pagado2; ?></td> <?php
                                    }?>
                            </tr>
                        <?php
                      }
                        ?> 
                          </tbody>
                        </table>
                        <?php
                    } elseif($count2 > 0) {
                      ?>
                          <div class="table-responsive">
                          <table class="table mt-3">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Número</th>
                                <th scope="col">Oportunidades</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Pagado</th>
                              </tr>
                            </thead>
                            <tbody>
                      <?php
                   while ($rows = mysqli_fetch_assoc($res2)) {
                    $id_boleto = $rows['id_boleto'];
                    $num1 = $rows['num1'];
                    $num2 = $rows['num2'];
                    $num3 = $rows['num3'];
                    $num4 = $rows['num4'];
                    $pagado = $rows['pagado'];
                    if($pagado==1){
                      $pagado2="SI";
                    }
                    if($pagado==0){
                      $pagado2="NO";
                    }
                    $nombre = $rows['nombre'];
                    $apellidos = $rows['apellidos'];
                    $estado = $rows['estado'];
                    $all = $num1 . ", " . $num2 . ", " . $num3 . ", " . $num4;
                ?>
            
                          <tr>
                            <th scope="row"><?php echo $id_boleto; ?></th>
                            <td><?php echo $all; ?></td>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $apellidos; ?></td>
                            <td><?php echo $estado; ?></td>
                            <?php if($pagado==1){
                                    ?> <td style="background-color: green;"><?php echo $pagado2; ?></td> <?php
                                  }else{
                                    ?> <td style="background-color: red;"><?php echo $pagado2; ?></td> <?php
                                  }?>
                          </tr>
                      <?php
                    }
                      ?> 
                        </tbody>
                      </table>
                      <?php
                  } else{
                      ?>
                      <div class="table-responsive">
                        <table class="table mt-3">
                          <thead class="table-dark">
                            <tr>
                              <th scope="col">Número</th>
                              <th scope="col">Oportunidades</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Apellido</th>
                              <th scope="col">Estado</th>
                              <th scope="col">Pagado</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th colspan="6" scope="row">BOLETO NO VENDIDO</th>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                      <?php
                    }
                }
                ?>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <?php include('partials/footer.php'); ?>

</body>

</html>