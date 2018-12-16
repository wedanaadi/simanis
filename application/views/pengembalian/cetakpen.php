
<?php echo $header?>

<style type="text/css">
  #TabelKonten #tabelharga tr td {
    padding-right: 7px;
    padding-left:  7px;
    font-size: 10px;
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
     <td colspan="2" align="center" style="font-size:14px;"> <strong> INVOICE SERVICE  </strong>  </td>
     <br><br>
   </tr>


 </table>
  <table id="Konten" width="100%" border="0" style="font-size:11px;"  >
    <tr>
      <td width="10%" align="left" ><strong>NO</strong> </td>
      <td align="left">: <?php echo $konten[0]->id_pengembalian;?></td>
      <td width="10%" align="left" ><strong>Customer</strong> </td>
      <td width="25%" align="left" >: <?php echo $konten[0]->nama_customer;?></td>
    </tr>
    <tr>
     <td><strong>Karyawan</strong></td>
     <td align="left">: <?php echo $konten[0]->nama_karyawan;?></td>
     <td align="left"><strong>Telp.</strong> </td>
     <td align="left">: <?php echo $konten[0]->notlp_cus;?></td>
   </tr>
   <tr>
    <td><strong>Tanggal</strong></td>
    <td align="left">: <?php echo $konten[0]->tgl_pengembalian;?></td>
    <td align="left"><strong>Alamat</strong> </td>
    <td align="left">: <?php echo $konten[0]->alamat_cus;?></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td align="left">&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
 </table>

</div>

<table id="TabelKonten"  border="1" cellspacing="10" cellpadding="5" style="border-collapse: collapse; border-color:#000000; margin-bottom : 130px;"  width="100%"   >
  <tbody>
    <tr>
      <!-- <th width="6%">NO</th> -->
      <th width="20%" >Nama Barang</th>
      <th  scope="col">Service</th>
      <th  width="7%" scope="col">Qty</th>
      <th  scope="col">Subtotal</th>
      <th  scope="col">Total</th>
    </tr>
    <?php $i=1; $temp=null; foreach ($konten as $value)
      {
    ?>
    <tr>
      <?php if($value->sn_barang != $temp)
      {
      ?>
      <!-- <td align="center" rowspan="<?php echo $value->jumlah ?>"><?php echo $i ?></td> -->
      <td rowspan="<?php echo $value->jumlah ?>"><?php echo $value->nama_barang .', '.$value->sn_barang.', '.$value->kelengkapan ?></td>
      <?php } ?>
      <td><?php echo $value->nama_service ?></td>
      <td align="right"><?php echo $value->qty ?></td>
      <td align="right"><?php echo number_format($value->harga,2,",",".") ?></td>
      <td align="right"><?php echo number_format($value->subtotal,2,",",".") ?></td>
    </tr>
    <?php
      $temp = $value->sn_barang;
      $i++;
      }
    ?>
    <tr >
      <td colspan="3" align="right" style="border-top: 0;  border-bottom: 0; border-right: 0;"><strong>&nbsp;</strong></td>
      <td  align="left" style="border-top: 0;  border-bottom: 0; border-left: 0; border-right: 0;"><strong>Total</strong></td>
      <td  align="right" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;"><?php echo number_format($value->total,2,",",".")?></td>
    </tr>
    <tr >
      <td colspan="3" align="right" style="border-top: 0;  border-bottom: 0; border-right: 0;"><strong>&nbsp;</strong></td>
      <td  align="left" style="border-top: 0;  border-bottom: 0; border-left: 0; border-right: 0;"><strong>PPN</strong></td>
      <td  align="right" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;"><?php echo number_format($value->ppn,2,",",".") ?></td>
    </tr>
        <tr >
      <td colspan="3" align="right" style="border-top: 0;  border-bottom: 0; border-right: 0;"><strong>&nbsp;</strong></td>
      <td  align="left" style="border-top: 0;  border-bottom: 0; border-left: 0; border-right: 0;"><strong>Total Fatur</strong></td>
      <td  align="right" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;"><?php echo number_format($value->totalfatur,2,",",".") ?></td>
    </tr>
        <tr >
      <td colspan="3" align="right" style="border-top: 0;  border-bottom: 0; border-right: 0;"><strong>&nbsp;</strong></td>
      <td  align="left" style="border-top: 0;  border-bottom: 0; border-left: 0; border-right: 0;"><strong>Total Bayar</strong></td>
      <td  align="right" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;"><?php echo number_format($value->bayar,2,",",".") ?></td>
    </tr>
    <tr >
      <td colspan="3" align="right" style="border-top: 0;  border-right: 0;" ><strong>&nbsp;</strong></td>
      <td align="left" style="border-top: 0;  border-right: 0; border-left: 0;"  ><strong>Kembalian</strong></td>
      <td style=" border: 0;" style="border-top: 0;  border-left: 0;"  align="right" ><?php echo number_format($value->kembalian,2,",",".") ?></td>
    </tr>
  </tbody>
</table>
  <table align="left" width="100%" border="0" style="font-size:11px; "  >
    <tr>
      <td width="15%" >Note : </td>
    </tr>
     <tr>
      <td >Barang yang sudah Dibeli Tidak Dapat Dikembalikan,</td>
    </tr>
    <tr>
      <td >Terima Kasih</td>
    </tr>
  </table>

<table width="100%" border="0" style="font-size:11px; "  >
    <tr>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
    </tr>
     <tr>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
    </tr>

    <tr>
      <td >&nbsp; </td>
     <td  align="center"><strong>PENGIRIM</strong> </td>
     <td >&nbsp; </td>
     <td  align="center"><strong>PENERIMA</strong> </td>
     <td >&nbsp; </td>
     <td  align="center"><strong>TERTANDA</strong></td>
     <td >&nbsp; </td>
    </tr>
    <tr>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
    </tr>
    <tr>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
    </tr>
    <tr>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
    </tr>
     <tr>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
    </tr>
    <tr>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
      <td >&nbsp; </td>
    </tr>
     <tr>
      <td >&nbsp; </td>
     <td align="center"> <hr style="color:#000000"> </td>
     <td >&nbsp; </td>
     <td align="center"> <hr style="color:#000000"></td>
     <td >&nbsp; </td>
     <td align="center"> <hr style="color:#000000"></td>
     <td >&nbsp; </td>
    </tr>
  </table>
