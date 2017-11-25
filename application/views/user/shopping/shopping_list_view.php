<script type="text/javascript">
	$(document).ready(function(){
		var oldVal;
		$('.jumlah .btnJumlah').on('focus',function(event){
			oldVal=$(this).val();
		});
		$('.jumlah .btnJumlah').on('change',function(event){

			var id=$(this).attr('id');
			var jml=$(this).attr('max');
			var val=$(this).val();
			var idBarang=$(this).attr('idBarang');
			var type=val-oldVal;
			$.post(

				"http://localhost/6478/index.php/Shopping/updateItem",
				{update:true,id:id,val:val,jml:jml,idBarang:idBarang,type:type},
				function(data){
					console.log(data);
					if(data==1){
						  window.location="http://localhost/6478/index.php/Shopping/index";
					}
				}

			);
		});
	});

</script>

<div class="test">
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				  <thead>
					<tr>
						<th>ID</th>
						<th> - </th>
						<th>Nama Barang</th>
						<th>Harga Jual</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
						<th>Action</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php foreach($this->cart->contents() as $r){
				    echo
				    '<tr>
				    <td>'.$r['id'].'</td>
				    <td><img src="http://localhost/6478/uploads/barang/'.$r['image'].'" width="100px" height="100px" />&nbsp;</td>
				    <td>'.$r['name'].'</td>
				    <td>'. $r['price'].'</td>';

				    $brg=$this->barang->getBarang($r['id']);
				    $jml=$brg[0]["JUMLAH_BARANG"];
					$data = array(
					  'name' => 'update',
					  'id' => $r['rowid'],
					  'class' => 'form-control btnJumlah',
					  'type' => 'number',
					  'value'=>$r['qty'],
					  'min'=>0,
					  'max'=>$jml+$r['qty'],
					  'idBarang'=>$r['id']
					);

				  
				    echo form_open('Shopping/updateItem');
				    echo form_hidden('id',$r["rowid"]);
				    echo form_hidden('idBarang',$r['id']);
				    echo '<td><div class="jumlah">'.form_input($data).'</div></td>';
				    echo form_close();
				    echo '<td><div class="subTotal" id="'.$r['rowid'].'">'.$r['subtotal'].'</div></td>';
				    echo '<td>';
					echo form_open('Shopping/deleteItem');
					 echo form_hidden('id',$r["id"]);
					  echo form_hidden('rowid',$r["rowid"]);
					   echo form_hidden('nama',$r["name"]);
					    echo form_hidden('harga',$r["price"]);
					     echo form_hidden('jumlah',$r["qty"]);
					echo form_submit('btnDeleteFromCart','Delete From Cart');
					echo form_close();

					echo "</td>.";
					echo '</tr>';
					  } ?>
					<tr>
					        <td colspan="4"> </td>
					        <td class="right"><strong>Total</strong></td>
					       
					        <td colspan="1" id="grandTotal" class="right">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
					        <?php echo form_open('Shopping/payment');?>
					         <td class="right"><button type="submit" name="btnBayar" class="btn btn-success">Bayar</button></td>
					         <?php echo form_close();?>

					</tr>
				  </tbody>
				</table>

			</div>

	</div>

</div>
</div>	
