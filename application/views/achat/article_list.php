<style>
    .chartBtn{
        border-radius:20px;

    }
</style>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">LES ARTICLES</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('achat/panier'), 'Voir la facture ', 'class="btn btn-warning chartBtn"'); ?><i class="fa fa-2x fa-opencart"></i><?php if ($chart > 0) { ?><span class="label label-success" style="margin-left: 2px; border-radius: 14px"><?= $chart ?></span><?php } ?>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 8px" id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-1 text-right">

                        </div>
                        <div class="col-md-3 text-right">



                            <form action="<?php echo site_url('achat/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                    <span class="input-group-btn">
                                        <?php
                                        if ($q <> '') {
                                            ?>
                                            <a href="<?php echo site_url('achat'); ?>" class="btn btn-default">Reset</a>
                                            <?php
                                        }
                                        ?>
                                        <button class="btn btn-primary" type="submit">Rechercher</button>
                                    </span>
                                </div>
                            </form>
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
                            <th>Article</th>
                            <th>Designation</th>
                            <th>Stock</th>
                            <th>Prix</th>
                            <th>Categorie</th>
                            <th>Fournisseur </th>
                            <th>Quantite </th>

                        </tr><?php
                        foreach ($article_data as $article) {
                            ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $article->codeArticle ?></td>
                                <td><?php echo $article->designation ?></td>
                                <td><?php echo $article->stock ?></td>
                                <td><?php echo $article->prix ?></td>
                                <td><?php echo $article->idCategorie ?></td>
                                <td><?php echo $article->idFournisseur ?></td>
                                <td>
                                    <form class='form-group ' method="post" action="<?= base_url() . 'achat/addToChart' ?>">
                                        <!--les elements a cacher -->
                                        <input type="hidden" name="chart_id" value="<?= $article->id ?>" />
                                        <input type="hidden" name="chart_codeArticle" value="<?= $article->codeArticle ?>" />
                                        <input type="hidden" name="chart_designation" value="<?= $article->designation ?>" />
                                        <input type="hidden" name="chart_idCategorie" value="<?= $article->idCategorie ?>" />
                                        <input type="hidden" name="chart_idFournisseur" value="<?= $article->idFournisseur ?>" />
                                        <input type="hidden" name="chart_prix" value="<?= $article->prix ?>" />
                                        <!--les elements a cacher -->


                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <select class="form-control" name="chart_quantite">
                                                        <?php for ($i = 1; $i <= $article->stock; $i++) { ?>
                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                        <?php } ?>
                                                    </select>

                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <button type="submit" class="btn btn-warning <?php if ($article->stock == 0) echo 'disabled'; ?>">Ajouter<i class="fa fa-shopping-cart"></i></button>
                                                </div>

                                            </div>

                                    </form>
                                </td>

                            </tr>
                            <?php
                        }
                        ?>
                    </table>


                </div>
                <div class='box-footer'>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary ">Total : <?php echo $total_rows ?></a>
                           <?php echo anchor(site_url('achat/changeClient'),'Changer de client','class="btn btn-danger "') ?> 

                        </div>
                        <div class="col-md-6 text-right">
                            <?php echo $pagination ?>
                        </div>
                    </div> 
                </div>

            </div>

        </div>
    </div>
</section>




