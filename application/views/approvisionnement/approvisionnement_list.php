<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">LES APPROVISIONNEMENTS</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('approvisionnement/create'), 'Creer', 'class="btn btn-primary"'); ?>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 8px" id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-1 text-right">
                        </div>
                        <div class="col-md-3 text-right">
                            <form action="<?php echo site_url('approvisionnement/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                    <span class="input-group-btn">
                                        <?php
                                        if ($q <> '') {
                                            ?>
                                            <a href="<?php echo site_url('approvisionnement'); ?>" class="btn btn-default">Reset</a>
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
                            <th>Article</th>
                            <th>Utilisateur</th>
                            <th>Quantite</th>
                            <th>DateAppro</th>
                            <th>Action</th>
                        </tr><?php
                        foreach ($approvisionnement_data as $approvisionnement) {
                            ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $approvisionnement->idArticle ?></td>
                                <td><?php echo $approvisionnement->idUtilisateur ?></td>
                                <td><?php echo $approvisionnement->quantite ?></td>
                                <td><?php echo $approvisionnement->dateAppro ?></td>
                                 <td><?= anchor(site_url('approvisionnement/read/' . $approvisionnement->id), 'Details'); ?> <i class="fa fa-eye"></i> </td>
                               
                               
                                    <?php
                                   // echo anchor(site_url('approvisionnement/read/' . $approvisionnement->id), 'Read');
                                   // echo ' | ';
                                   // echo anchor(site_url('approvisionnement/update/' . $approvisionnement->id), 'Update');
                                   // echo ' | ';
                                   // echo anchor(site_url('approvisionnement/delete/' . $approvisionnement->id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                    ?>
                               
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
                            <?php echo anchor(site_url('approvisionnement/excel'), "Excel <i class='fa fa-download'></i>", 'class="btn btn-primary export_excel"'); ?>
                      
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




