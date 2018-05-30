

        <h2>PrixArticle List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>IdArticle</th>
		<th>Prix</th>
		<th>DateFixation</th>
		
            </tr><?php
            foreach ($prixarticle_data as $prixarticle)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $prixarticle->idArticle ?></td>
		      <td><?php echo $prixarticle->prix ?></td>
		      <td><?php echo $prixarticle->dateFixation ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    