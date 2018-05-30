<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">INFORMATION SUR LE FOURNISSEUR</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table">
                        <tr><td>Nom</td><td><?php echo $nom; ?></td></tr>
                        <tr><td>Tel</td><td><?php echo $tel; ?></td></tr>
                        <tr><td>Email</td><td><?php echo $email; ?></td></tr>
                        <tr><td>Adresse</td><td><?php echo $adresse; ?></td></tr>
                        <tr><td>NomResponsable</td><td><?php echo $nomResponsable; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('fournisseur') ?>" class="btn btn-default">Cancel</a></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>