<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">INFORMATION SUR L'ARTICLE</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table table-responsive table-bordered">
                        <tr><td>CodeArticle</td><td><?php echo $codeArticle; ?></td></tr>
                        <tr><td>Designation</td><td><?php echo $designation; ?></td></tr>
                        <tr><td>Stock</td><td><?php echo $stock; ?></td></tr>
                        <tr><td>Categorie</td><td><?php echo $idCategorie; ?></td></tr>
                        <tr><td>Fournisseur</td><td><?php echo $idFournisseur; ?></td></tr>

                    </table>


                </div>
                <div class="box-footer">
                    <a href="<?php echo site_url('article') ?>" class="btn btn-default">Retour</a>
                </div>
            </div>
        </div>
    </div>
</section>
