<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Information sur l'utilisateur</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <h2 style="margin-top:0px">Utilisateur Read</h2>
                    <table class="table">
                        <tr><td>Nom</td><td><?php echo $nom; ?></td></tr>
                        <tr><td>Prenom</td><td><?php echo $prenom; ?></td></tr>
                        <tr><td>DateNaissance</td><td><?php echo $dateNaissance; ?></td></tr>
                        <tr><td>Tel</td><td><?php echo $tel; ?></td></tr>
                        <tr><td>Email</td><td><?php echo $email; ?></td></tr>
                        <tr><td>Pwd</td><td><?php echo $pwd; ?></td></tr>
                        <tr><td>IdType</td><td><?php echo $idType; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('utilisateur') ?>" class="btn btn-default">Cancel</a></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>