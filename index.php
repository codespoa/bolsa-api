<?php
    require_once __DIR__ ."/config.php";
    require_once __DIR__ ."/app/modules/HgApi.php";

    $hg = new HgApi(API_KEY);
    $dolar = $hg->DollarQuotation();
    $euro = $hg->EuroQuotation();

    if($hg->IsError() == false) {
        $variation = ($dolar->variation < 0 ? "danger" : "success");
    }

    // echo "<pre>";
    // var_dump($hg);die;

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <title><?= TITLE ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">

    <!-- WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- CSS -->
    <?= css('assets/css/main') ?>
  </head>
  <body>

    <div class="container-full bg-image">
    <div class="container">
        <div class="row">
            <div class="col-12 one-col">
                <h1>Bolsa api</h1>
            </div>

            <div class="all-quotations">
                <div class="box box-dollar">
                    <h6>Informação</h6>
                    <div class="box-value money">
                        <img src="/app/assets/image/icon/money.png" alt="">
                        <div>
                            <p class="text-center">Moeda</p>
                            <p class="text-center"><?= $dolar->name ?></p>
                        </div>
                    </div>
                    <div class="box-value value-compra">
                        <img src="/app/assets/image/icon/compra.png" alt="">
                        <div>
                            <p class="text-center">Preço de compra</p>
                            <p class="bg-info text-center"><strong><?= number_format($dolar->buy, 2, ",", ".") ?></strong></p>
                        </div>
                    </div>
                    <div class="box-value value-venda">
                        <img src="/app/assets/image/icon/venda.png" alt="">
                        <div>
                            <p class="text-center">Preço de venda</p>
                            <p class="bg-info text-center"><strong><?= number_format($dolar->sell, 2, ",", ".") ?></strong></p>
                        </div>
                    </div>
                    <div class="box-value value-variacao">
                        <img src="/app/assets/image/icon/variacao.png" alt="">
                        <div>
                            <p class="text-center">variação</p>
                            <p class="bg-<?=$variation ?> px-2 text-center"><strong><?= $dolar->variation ?></strong></p>
                        </div>
                    </div>
                </div>
                <!-- EURO -->
                <div class="box box-euro">
                    <h6>Informação</h6>
                    <div class="box-value money">
                        <img src="/app/assets/image/icon/money.png" alt="">
                        <div>
                            <p class="text-center">Moeda</p>
                            <p class="text-center"><?= $euro->name ?></p>
                        </div>
                    </div>
                    <div class="box-value value-compra">
                        <img src="/app/assets/image/icon/compra.png" alt="">
                        <div>
                            <p class="text-center">Preço de compra</p>
                            <p class="bg-info text-center"><strong><?= number_format($euro->buy, 2, ",", ".") ?></strong></p>
                        </div>
                    </div>
                    <div class="box-value value-venda">
                        <img src="/app/assets/image/icon/venda.png" alt="">
                        <div>
                            <p class="text-center">Preço de venda</p>
                            <p class="bg-info text-center test"><strong><?= number_format($euro->sell, 2, ",", ".") ?></strong></p>
                        </div>
                    </div>
                    <div class="box-value value-variacao">
                        <img src="/app/assets/image/icon/variacao.png" alt="">
                        <div>
                            <p class="text-center">variação</p>
                            <p class="bg-<?=$variation ?> px-2 text-center"><strong><?= $euro->variation ?></strong></p>
                        </div>
                        <!-- <div>
                            <p class="text-center">converter em reais</p>
                            <form method="POST" name="euro-form">
                                <input type="text" class="convert">
                                <button onclick="calculate(<?= $euro->buy ?>)">Converter</button>
                            </form>
                            <p>ss</p>
                        </div> -->
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="social">
            <div class="box-social">
                <a href="https://www.linkedin.com/in/eduardo-alves-157576189/" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="mailto:codespoa@gmail.com" target="_blank"><i class="fas fa-envelope-open-text"></i></a>
                <a href="https://github.com/codespoa" target="_blank"><i class="fab fa-github-square"></i></a>
            </div>
            <div class="name">
                <p>Code's - Eduardo Alves <?= date('Y') ?></p>
            </div>
        </div>
    </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/eebb89246c.js" crossorigin="anonymous"></script>
    <?= js('assets/js/main'); ?>
  </body>
</html>