<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">INFORMATION SUR L'APPROVISIONNEMENT</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table">
                        <tr><td>IdArticle</td><td><?php echo $idArticle; ?></td></tr>
                        <tr><td>IdUtilisateur</td><td><?php echo $idUtilisateur; ?></td></tr>
                        <tr><td>Quantite</td><td><?php echo $quantite; ?></td></tr>
                        <tr><td>DateAppro</td><td><?php echo $dateAppro; ?></td></tr>
                      
                    </table>
                </div>
                <div class='box-footer'>
                    <a href="<?php echo site_url('approvisionnement') ?>" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</section>
