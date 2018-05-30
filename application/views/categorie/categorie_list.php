<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">LES CATEGORIES</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('categorie/create'), 'Creer', 'class="btn btn-primary"'); ?>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 8px" id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-1 text-right">
                        </div>
                        <div class="col-md-3 text-right">
                            <form action="<?php echo site_url('categorie/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                    <span class="input-group-btn">
                                        <?php
                                        if ($q <> '') {
                                            ?>
                                            <a href="<?php echo site_url('categorie'); ?>" class="btn btn-default">Reset</a>
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
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr><?php
                        foreach ($categorie_data as $categorie) {
                            ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $categorie->nom ?></td>
                                <td><?php echo $categorie->description ?></td>
                                 <td><?= anchor(site_url('categorie/read/' . $categorie->id), 'Details'); ?> <i class="fa fa-eye"></i> </td>
                                <td><?= anchor(site_url('categorie/update/' . $categorie->id), 'Modifier'); ?> <i class="fa fa-pencil"></i></td>
                                <td><?= anchor(site_url('categorie/delete/' . $categorie->id), 'Supprimer', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?> <i class="fa fa-trash-o"></i></td>
                             
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
                            <?php echo anchor(site_url('categorie/excel'), "Excel <i class='fa fa-download'></i>", 'class="btn btn-primary export_excel"'); ?>
                            
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




