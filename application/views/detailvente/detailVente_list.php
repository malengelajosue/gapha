<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">LES VENTES</h3>
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
                            <form action="<?php echo site_url('vente/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                    <span class="input-group-btn">
                                        <?php
                                        if ($q <> '') {
                                            ?>
                                            <a href="<?php echo site_url('detailvente'); ?>" class="btn btn-default">Reset</a>
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
                            <th>NumFacture</th>
                            <th>Article</th>
                            <th>Client</th>
                            <th>Quantite</th>
                            <th>Total</th>
                            <th>Utilisateur</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr><?php
                                                            
                        foreach ($detailvente_data as $detailvente) {
                            ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $detailvente->numFacture ?></td>
                                <td><?php echo $detailvente->idArticle ?></td>
                                <td><?php echo $detailvente->idClient ?></td>
                                <td><?php echo $detailvente->quantite ?></td>
                                <td><?php echo $detailvente->total ?></td>
                                <td><?php echo $detailvente->idUtilisateur ?></td>
                                <td><?php echo $detailvente->dateVente ?></td>
                                <td style="text-align:center" width="200px">
                                    <?php
                                    echo anchor(site_url('vente/read/' . $detailvente->id), 'Details');
                                    //echo ' | ';
                                   // echo anchor(site_url('vente/update/' . $detailvente->id), 'Update');
                                   // echo ' | ';
                                    //echo anchor(site_url('vente/delete/' . $detailvente->id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>

                </div>
                <div class="box-footer">
                     <div class="row">
                <div class="col-md-6">
                    <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                    <?php echo anchor(site_url('vente/excel'), "Excel <i class='fa fa-download'></i>", 'class="btn btn-primary export_excel"'); ?>
             
                </div>
                <div class="col-md-6 text-right">
                    <?php echo $pagination ?>
                </div>
            </div>
            </div>
           
        </div>
    </div>
</section>




