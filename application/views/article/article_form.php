<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">AJOUT D'UN ARTICLE</h3>

    </div>
    <div class="box-body">
        <h2 style="margin-top:0px">Article <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="varchar">Code <?php echo form_error('codeArticle') ?></label>
                <input type="text" class="form-control" name="codeArticle" id="codeArticle" placeholder="CodeArticle" value="<?php echo $codeArticle; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Designation <?php echo form_error('designation') ?></label>
                <input type="text" class="form-control" name="designation" id="designation" placeholder="Designation" value="<?php echo $designation; ?>" />
            </div>
            <?php if($_SESSION['user']->idType==1) {?>
            <div class="form-group">
                <label for="int">Stock <?php echo form_error('stock') ?></label>
                <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock" value="<?php echo $stock; ?>" />
            </div>
            <?php } ?>
            <div class="form-group">
                <label for="int">Categorie <?php echo form_error('idCategorie') ?></label>
                <select type="text" class="form-control select2" name="idCategorie" id="idCategorie" value="<?php echo $idCategorie; ?>" >
                   <?php foreach ($listeCategories as $c):?>
                    <option value="<?=$c->id?>"><?=$c->nom?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="int">Fournisseur <?php echo form_error('idFournisseur') ?></label>
                <select type="text" class="form-control select2 " name="idFournisseur" id="idFournisseur" placeholder="Nom du fournisseur" value="<?php echo $idFournisseur; ?>" >
                    <?php foreach ($listeFournisseurs as $f):?>
                    <option value="<?=$f->id?>"><?=$f->nom?></option>
                    <?php endforeach;?>
                </select>
                
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('article') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();


        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker



        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });





    })(jQuery);
</script>