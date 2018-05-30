
        <h2>Categorie List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nom</th>
		<th>Description</th>
		
            </tr><?php
            foreach ($categorie_data as $categorie)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $categorie->nom ?></td>
		      <td><?php echo $categorie->description ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   