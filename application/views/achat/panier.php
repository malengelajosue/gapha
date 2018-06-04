<style>
    .chartBtn{
        border-radius:20px
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">FACTURE</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row" style="margin-bottom: 10px">

                        <div class="col-md-4">
                            <?php echo anchor(site_url('achat/back'), "<i class='fa  fa-arrow-circle-left '></i> Retour ", 'class="btn btn-warning chartBtn"'); ?>
                            
                        </div>
                        <div class="col-md-4 pull-right">
                                <form class="form-inline" action="<?= site_url('achat/reduction')?>" method="post">
                                     <label>Reduction(%)</label>
                                    <span class="input-group-btn">
                                   
                                    <input type="number" class="form-control" name="discount" value="<?=$discount?>"/>
                                    <input type="submit" class=" btn btn-default" value="Appliquer"/>
                                    </span>
                                </form>
                            </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 8px" id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-1 text-right">
                        </div>
                        <div class="col-md-3 text-right">
                            <!--Zone de recherche-->
                        </div>
                    </div>
                    <table id="example2" class="table table-bordered table-hover" style="margin-bottom: 10px">
                        <tr>
                            <th>Client: <?= strtoupper($client) ?></th>

                            <th>Numero de facture: <?= $numFacture ?></th>


                        </tr>
                    </table>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>No</th>
                            <th>CodeArticle</th>
                            <th>Designation</th>
              
                            <th>Prix</th>
                            <th>Categorie</th>
                            <th>Fournisseur </th>
                            <th>Quantite </th>
                            <th>Total </th>
                            <th>Action </th>

                        </tr><?php
                        $start = 0;
                        foreach ($chart as $article) {
                            // var_dump($article). die()
                            ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $article['codeArticle'] ?></td>
                                <td><?php echo $article['designation'] ?></td>
                            
                                <td><?php echo $article['prix'] ?></td>
                                <td><?php echo $article['idCategorie'] ?></td>
                                <td><?php echo $article['idFournisseur'] ?></td>
                                <td><?php echo $article['quantite'] ?></td>
                                <td><?php echo ($article['quantite']) * ($article['prix']) ?></td>
                                <td><?php //echo anchor(site_url('achat/supprimer/' . $article['id']), 'Supprimer') ?></td>

                            </tr>
                            <?php
                        }
                        ?>
                       
                    </table>
                    <table id="example2" class="table table-bordered table-hover" style="margin-top: 10px">
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
                            <td><?= $total*(1- $discount/100) + $total * 0.16   ?> $</td>
                        </tr>
                    </table>

                </div>
                <div class='box-footer'>
                    <div class="row">
                        <div class="col-md-6 ">
                           <?php
                            if (count($chart) > 0 && $validate==false) echo "<a class=' btn btn-warning ' id='validated' href=".site_url('achat/printFacture')."  target='_blank'>Valider la commande <i class='fa fa-cart-arrow-down'></i></a> "?>
                            <a class=' btn btn-default '  href="<?= site_url('achat/printProforma')?>"  target='_blank'>Pro forma <i class='fa fa-print'></i></a> 
                          
                            <?php if (count($chart) > 0 && $validate==false) echo anchor(site_url('achat/cancel'), "Recommencer <i class='fa  fa-refresh'></i>", 'class="btn btn-danger validation" onclick="javasciprt: return confirm(\'Voulez-vous recommencer?\')"'); ?>
                        </div>
                        <div class="col-md-6 text-right">

                        </div>
                    </div> 
                </div>
            </div>

        </div>
    </div>
</section>
<script src="<?php echo base_url()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function () {
       var btnValidate= $('#validated');
       var btnToHide= $('.validation');
       var retour;
       btnValidate.click('click',function(){
           retour= confirm("Voulez-vous vraiment confirmer la commande?");
           if (retour) {
               
               btnToHide.hide();
               btnValidate.hide();
           }
                
            javasciprt:return retour;
       });
       
    });
</script>




