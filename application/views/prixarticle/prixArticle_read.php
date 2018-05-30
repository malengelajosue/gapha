<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Information sur le prix</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table">
                        <tr><td>IdArticle</td><td><?php echo $idArticle; ?></td></tr>
                        <tr><td>Prix</td><td><?php echo $prix; ?></td></tr>
                        <tr><td>DateFixation</td><td><?php echo $dateFixation; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('prix') ?>" class="btn btn-default">Cancel</a></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>