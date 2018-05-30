<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">INFORMATION SUR LA VENTE</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table">
                        <tr><td>Numero</td><td><?php echo $numFacture; ?></td></tr>
                        <tr><td>Article</td><td><?php echo $idArticle; ?></td></tr>
                        <tr><td>Client</td><td><?php echo $idClient; ?></td></tr>
                        <tr><td>Quantite</td><td><?php echo $quantite; ?></td></tr>
                        <tr><td>Total</td><td><?php echo $total; ?></td></tr>
                        <tr><td>Date</td><td><?php echo $dateVente; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('vente') ?>" class="btn btn-default">Retour</a></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

