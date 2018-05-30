<section class="content">
      <!-- Small boxes (Stat box) -->
    <?php include_once 'dash.php';?>
  <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">LISTE D'ARTICLES</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                           
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 8px" id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-1 text-right">
                        </div>
                        <div class="col-md-3 text-right">
                            <form action="<?php echo site_url('admin/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                    <span class="input-group-btn">
                                        <?php
                                        if ($q <> '') {
                                            ?>
                                            <a href="<?php echo site_url('admin/index'); ?>" class="btn btn-default">Reset</a>
                                            <?php
                                        }
                                        ?>
                                        <button class="btn btn-primary" type="submit">Rechercher</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <th>No</th>
                            <th>CodeArticle</th>
                            <th>Designation</th>
                            <th>Stock</th>
                            <th>Prix</th>
                            <th>Categorie</th>
                            <th>Fournisseur</th>
                            <th>Details</th>
                           
                     
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
                                <td><?= anchor(site_url('article/read/' . $article->id), 'Details'); ?> <i class="fa fa-eye"></i> </td>
                           
                                   
                               
                            </tr>
                            <?php
                        }
                        ?>
                    </table>


                </div>
                <div class="box-footer">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-primary  ">Total : <?php echo $total_rows ?></a>
                       
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </section>







