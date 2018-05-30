<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Choix du client</h3>

    </div>
    <div class="box-body">

        <form action="<?= site_url().'/achat/chooseClient'?>" method="post">
            <div class="form-group">
                <label for="varchar">Nom <?php echo form_error('nom') ?></label>
                <select type="text" class="form-control" name="idClient" id="nom"  >
                    <?php foreach ($listeClient as $client):?>
                    <option value="<?= $client->id?>"><?= $client->nom?></option>
                    <?php endforeach;?>
                </select>
            </div>

           
            <button type="submit" class="btn btn-primary">Valider </button> 
           
        </form>
    </div>
</div>
