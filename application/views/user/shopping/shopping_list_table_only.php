				  <?php foreach($this->cart->contents() as $r){
				    echo
				    '<tr>
				    <td>'.$r['id'].'</td>
				    <td><img src="http://localhost/6478/uploads/barang/'.$r['image'].'" width="100px" height="100px" />&nbsp;</td>
				    <td>'.$r['name'].'</td>
				    <td>'. $r['price'].'</td>';

					$data = array(
					  'name' => 'jumlahBarang',
					  'id' => $r['rowid'],
					  'class' => 'form-control btnJumlah',
					  'type' => 'number',
					  'value'=>$r['qty'],
					  'min'=>0
					);

				  
				    echo'
				    <td><div class="jumlah">'.form_input($data).'</div></td>
				    <td><div class="subTotal" id="'.$r['rowid'].'">'.$r['subtotal'].'</div></td>';
				    echo '<td>';
					echo form_open('Shopping/deleteItem/'.$r['rowid']);
					echo form_submit('btnDeleteFromCart','Delete From Cart');
					echo form_close();

					echo "</td>.";
					echo '</tr>';
					  } ?>
					<tr>
					        <td colspan="4"> </td>
					        <td class="right"><strong>Total</strong></td>

					        <td colspan="2" id="grandTotal" class="right">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
					</tr>