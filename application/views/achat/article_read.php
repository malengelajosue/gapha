<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Information sur l'article</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <h2 style="margin-top:0px">Article Read</h2>
                    <table class="table">
                        <tr><td>CodeArticle</td><td><?php echo $codeArticle; ?></td></tr>
                        <tr><td>Designation</td><td><?php echo $designation; ?></td></tr>
                        <tr><td>Stock</td><td><?php echo $stock; ?></td></tr>
                        <tr><td>IdCategorie</td><td><?php echo $idCategorie; ?></td></tr>
                        <tr><td>IdFournisseur</td><td><?php echo $idFournisseur; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('article') ?>" class="btn btn-default">Cancel</a></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
