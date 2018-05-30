
        <h2>Facture</h2>
        <table class="word-table table table-bordered" >
            <tr style="border: #000 1px solid">
                <th>No</th>
		<th>CodeArticle</th>
		<th>Designation</th>
		<th>Stock</th>
		<th>Categorie</th>
		<th>Fournisseur</th>
		
            </tr><?php
            foreach ($article_data as $article)
            {
                ?>
                <tr style="border: #000 1px solid">
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $article->codeArticle ?></td>
                      
		      <td><?php echo $article->designation ?></td>
		      <td><?php echo $article->stock ?></td>
		      <td><?php echo $article->idCategorie ?></td>
		      <td><?php echo $article->idFournisseur ?></td>	
                </tr>
              
                <?php
            }
            ?>
        </table>
    