<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>KGS | Pro format</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    
    <body onload="window.print();">
        <div class="wrapper">
            <!-- Main content -->
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> KATANGA GOLDEN SERVICES  &nbsp;  &nbsp; Pro forma
                            <small class="pull-right">Date: <?php echo date('d/m/Y') ?></small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                      
                        <address>
                            <strong>KATANGA GOLDEN SERVICES</strong><br>
                            infos@katangagoldenservices.com</br>
                            RCCM 13-A-0726 - IDNAT6-93-N7084U</br>
                            impot A1302680D / TVA 1528/2013</br>
                            Bank account: Ets KATANGA GOLDEN SERVICES</br>
                            1230-0159471-00-22
                            TRUST MERCHANT BANK S.A.R.L </br>
                            SWIFT : TRMSCD3L</br>
                            1029 AV DES EMETTEURS</br>
                            Phone (+243)991307129/0811689520</br>
                            LUBUMBASHI, HAUT KATANGA</br>
                            République Démocratique du Congo</br>                                    
                            
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                       Informations sur le client
                        <address>
                            <strong><?=$client->nom?></strong><br>
                            <?=$client->adresse?><br>
                            <?=$client->email?><br>
                            <?=$client->tel?><br>
                     
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Numero de la facture <?=$numFacture?></b><br>
                        <br>
                        <img src="<?= base_url('assets/dist/img/logo.png')?>">
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                
                 <table id="example2" class="table table-striped table-bordered table-responsive">
                      <thead>   
                     <tr>
                       
                            <th>No</th>
                      
                            <th>Designation</th>
                       
                            <th>Prix</th>
                  
                            <th>Quantite </th>
                            <th>Total </th>
                        

                        </tr>
                      </thead>
                            <?php
                        $start = 0;
                        foreach ($chart as $article) {
                            // var_dump($article). die()
                            ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                               
                                <td><?php echo $article['designation'] ?></td>
                              
                                <td><?php echo $article['prix'] ?></td>
                              
                                <td><?php echo $article['quantite'] ?></td>
                                <td><?php echo ($article['quantite']) * ($article['prix']) ?></td>
                               

                            </tr>
                            <?php
                        }
                        ?>
                       
                    </table>
                    <table id="example2" class="table table-bordered table-hover table-responsive table-striped" style="margin-top: 10px">
                        <tr>
                            <th>SUBTOTAL: </th>
                            <td><?= $total *(1- $discount/100) ?> $</td>
                        </tr>
                        <tr>
                            <th>Discount: </th>
                            <td><?=$discount?> %</td>
                        </tr>
                        <tr>
                            <th>TVA (16%): </th>
                            <td><?= $total *(1- $discount/100) * 0.16 ?>  $</td>
                        </tr>
                        <tr>
                            <th>TOTAL:</th>
                            <td><?= $total*1.16*(1- $discount/100)    ?> $</td>
                        </tr>
                    </table>
          
                <!-- /.row -->

     
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- ./wrapper -->
    </body>
</html>
