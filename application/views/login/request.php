
<?php echo $header?>

<style type="text/css">
  #TabelKonten tr td {
    padding-right: 7px;
    padding-left:  7px;
    font-size: 12px;
  }
</style>
<style type="text/css">
  #Konten tr td {
    vertical-align: top;
  }
</style>

<div style="margin-buttom : 15px;" >
  <table width="100%" border="0"  >
    <tr>
     <td colspan="2" align="center" style="font-size:14px;"> <strong> CEK SERVICE  </strong>  </td>
     <br><br>
   </tr>

   
 </table>
  <table id="Konten" width="100%" border="0" style="font-size:11px;"  >
    <tr>
      <td width="10%" align="left" ><strong>No Nota</strong> </td>
      <td align="left">: <?php echo $konten[0]->id_penerimaan;?></td>
    </tr>
    <tr>
      <td width="10%" align="left" ><strong>Customer</strong> </td>
      <td  align="left" >: <?php echo $konten[0]->nama_customer;?></td>
   </tr>
   <tr>
      <td width="10%" align="left" ><strong>Tanggal</strong> </td>
      <td  align="left" >: <?php echo date('d/m/Y')?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td align="left">&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
 </table>
</div>

<table id="TabelKonten"  border="1" style="border-collapse: collapse; border-color:#000000; margin-bottom : 130px;"  width="100%"   >
  <tbody>
    <tr>
      <th width="6%">NO</th>
      <th width="20%" >Nama Barang</th>
      <th  scope="col">Service</th>
      <th  width="7%" scope="col">Qty</th>
      <th  scope="col">Subtotal</th>
      <th  scope="col">Total</th>
    </tr>

    <?php $i=1; $total=0; $temp=null; foreach ($konten as $value)
      {
    ?>
    <tr>
      <?php if($value->nama_barang != $temp)
      {
      ?>
      <td align="center" rowspan="<?php echo $value->jumlah ?>"><?php echo $i ?></td>
      <td rowspan="<?php echo $value->jumlah ?>"><?php echo $value->nama_barang .', '.$value->sn_barang.', '.$value->kelengkapan ?></td>
      <?php } ?>
      <td><?php echo $value->nama_service ?></td>
      <td align="right"><?php echo $value->qty ?></td>
      <td align="right"><?php echo number_format($value->harga,2,",",".") ?></td>
      <td align="right"><?php echo number_format($value->subtotal,2,",",".") ?></td>
    </tr>
    <?php
      $temp = $value->nama_barang;
      $i++;
      $total+=$value->subtotal;
      }
    ?>
    <?php 
      $PPN = $total*0.1;
      $bayar = $total+$PPN;
    ?>
    <tr >
    	<td colspan="4" align="right" style="border-top: 0;  border-bottom: 0; border-right: 0;"><strong>&nbsp;</strong></td>
    	<td  align="left" style="border-top: 0;  border-bottom: 0; border-left: 0; border-right: 0;"><strong>Total</strong></td>
    	<td  align="right" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;"><?php echo number_format($total,2,",","."); $total=0;?></td>
    </tr>

    <tr >
    	<td colspan="4" align="right" style="border-top: 0;  border-bottom: 0; border-right: 0;"><strong>&nbsp;</strong></td>
    	<td  align="left" style="border-top: 0;  border-bottom: 0; border-left: 0; border-right: 0;"><strong>PPN</strong></td>
    	<td  align="right" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;"> <?php echo number_format($PPN,2,",","."); ?> </td>
    </tr>
    <tr >
    	<td colspan="4" align="right" style="border-top: 0;  border-right: 0;" ><strong>&nbsp;</strong></td>
    	<td align="left" style="border-top: 0;  border-right: 0; border-left: 0;"  ><strong>Total Bayar</strong></td>
    	<td style=" border: 0;" style="border-top: 0;  border-left: 0;"  align="right" ><?php echo number_format($bayar,2,",","."); ?></td>
    </tr>
  </tbody>
</table>
  <table align="left" width="100%" border="0" style="font-size:11px; "  >
    <tr>
      <td width="15%" >Note : </td>
    </tr>
     <tr>
      <td >Jika Nama barang dan Service tidak muncul maka,</td>
    </tr>
    <tr>
      <td >Barang belum selesai di service. Terima Kasih</td>
    </tr>
  </table>




  





