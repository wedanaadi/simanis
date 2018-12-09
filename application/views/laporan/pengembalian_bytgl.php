
<?php echo $header?>

<style type="text/css">
  #TabelKonten tr td {
    padding-right: 7px;
    padding-left:  7px;
    font-size: 12px;
  }
  tr.noBorder td {
  border: 0;
}
 
</style>

<div style="margin-buttom : 15px;" >
<table width="100%" border="0"  >
    <tr><td colspan="2" align="center" style="font-size:14px;"> <strong> LAPORAN INVOICE SERVICE </strong>  </td></tr>
    <tr><td  colspan="2" align="center" style="font-size:8px;"> <?php echo $periode['MulaiIn'].' '.'-'.' '.$periode['AkhirIn'] ?>  </td></tr>
    <tr><td colspan="2" align="left">&nbsp;</td></tr>
</table>

<table id="TabelKonten"  border="1" style="border-collapse: collapse; border-color:#000000; margin-bottom : 130px;"  width="100%"   >
 
    <tbody>
      <?php $total=0; $ppn=0; $totalfatur=0; $bayar=0; $kembalian=0; $NoNota =''; $count = 0; $temp=null; foreach ($konten as $row) { ?>
        <?php if ($row->id_pengembalian != $NoNota ) { ?>
          
            <?php if ($count != 0 ) { ?>
            <tr >
             <td colspan="4" align="right"  style="border-right: 0; border-bottom: 0;"><strong>&nbsp;</strong>  </td>
             <td width="15%" align="left"  style="border-right: 0; border-left: 0; border-bottom: 0;"><strong>Total</strong>  </td>
             <td align="right"  style="border-left: 0; border-bottom: 0;"> <?php echo number_format($total, 2, '.', '.'); $total =0; ?></td>
            </tr>
            <tr >
             <td colspan="4" align="right" style="border-top: 0;  border-bottom: 0; border-right: 0;"><strong>&nbsp;</strong></td>
             <td  align="left" style="border-top: 0;  border-bottom: 0; border-left: 0; border-right: 0;"><strong>PPN</strong></td>
             <td  align="right" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;"> <?php echo number_format($ppn, 2, '.', '.'); $ppn =0;?></td>
            </tr>
            <tr >
             <td colspan="4" align="right" style="border-top: 0;  border-bottom: 0; border-right: 0;"><strong>&nbsp;</strong></td>
             <td  align="left" style="border-top: 0;  border-bottom: 0; border-left: 0; border-right: 0;"><strong>Total Fatur</strong></td>
             <td  align="right" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;"> <?php echo number_format($totalfatur, 2, '.', '.'); $totalfatur =0;?></td>
            </tr>
            <tr >
             <td colspan="4" align="right" style="border-top: 0;  border-bottom: 0; border-right: 0;"><strong>&nbsp;</strong></td>
             <td  align="left" style="border-top: 0;  border-bottom: 0; border-left: 0; border-right: 0;"><strong>Bayar</strong></td>
             <td  align="right" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;"> <?php echo number_format($bayar, 2, '.', '.'); $bayar =0;?></td>
            </tr>
            <tr >
             <td colspan="4" align="right" style="border-top: 0;  border-right: 0;" ><strong>&nbsp;</strong></td>
             <td align="left" style="border-top: 0;  border-right: 0; border-left: 0;"  ><strong>Kembalian</strong></td>
             <td style=" border: 0;" style="border-top: 0;  border-left: 0;"  align="right" > <?php echo number_format($kembalian, 2, '.', '.'); $kembalian =0;?></td>
            </tr>
            <tr class="noBorder">
              <td >&nbsp;</td>
              <td colspan="5" >&nbsp;</td>
            </tr> 
            <?php }?>


            <tr >
             <td width="15%" style="border-right: 0; border-bottom: 0;"><strong>NO</strong>  </td>
             <td align="left" colspan="5"  style="border-left: 0; border-bottom: 0;">: <?php echo $row->id_pengembalian; ?></td>
            </tr>
            <tr >
             <td style="border-top: 0; border-bottom: 0; border-right: 0;"><strong>Karyawan</strong></td>
             <td colspan="5" align="left" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;">: <?php echo $row->nama_karyawan;?></td>
            </tr>
            <tr >
             <td style="border-top: 0; border-bottom: 0; border-right: 0;" ><strong>Tanggal</strong></td>
             <td style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;" colspan="5" align="left" >: <?php echo $row->tgl_pengembalian;?></td>
            </tr>
                  <?php if ($count !=0 ) { ?>
                    <tr align="center" class="header">
                          <th width="12%">Id Servis</th>
                          <th width="20%" >Nama Barang</th>
                          <th  scope="col">Service</th>
                          <th  width="7%" scope="col">Qty</th>
                          <th  scope="col">Subtotal</th>
                          <th  scope="col">Total</th>
                  </tr>
                  <?php } else {?>
                   <tr align="center" class="header">
                          <th width="12%">Id Servis</th>
                          <th width="20%" >Nama Barang</th>
                          <th  scope="col">Service</th>
                          <th  width="7%" scope="col">Qty</th>
                          <th  scope="col">Subtotal</th>
                          <th  scope="col">Total</th>
                  </tr>

                  <?php }?> 

        <?php } ?> 

          <tr>
            <?php if($row->nama_barang != $temp)
            {
            ?>
            <td align="center" rowspan="<?php echo $row->jumlah ?>"><?php echo $row->id_service ?></td>
            <td rowspan="<?php echo $row->jumlah ?>"><?php echo $row->nama_barang .', '.$row->sn_barang.', '.$row->kelengkapan ?></td>
            <?php } ?>
            <td><?php echo $row->nama_service ?></td>
            <td align="right"><?php echo $row->qty ?></td>
            <td align="right"><?php echo number_format($row->harga,2,",",".") ?></td>
            <td align="right"><?php echo number_format($row->subtotal,2,",",".") ?></td>
          </tr>
              <?php $total=$row->total; $ppn=$row->ppn; $totalfatur=$row->totalfatur; $bayar=$row->bayar; $kembalian=$row->kembalian; $NoNota = $row->id_pengembalian; $count++; $temp = $row->nama_barang; } ?>
            <tr >
             <td colspan="4" align="right"  style="border-right: 0; border-bottom: 0;"><strong>&nbsp;</strong>  </td>
             <td width="15%" align="left"  style="border-right: 0; border-left: 0; border-bottom: 0;"><strong>Total</strong>  </td>
             <td align="right"  style="border-left: 0; border-bottom: 0;"> <?php echo number_format($row->total,2,",",".") ?></td>
            </tr>
            <tr >
             <td colspan="4" align="right" style="border-top: 0;  border-bottom: 0; border-right: 0;"><strong>&nbsp;</strong></td>
             <td  align="left" style="border-top: 0;  border-bottom: 0; border-left: 0; border-right: 0;"><strong>PPN</strong></td>
             <td  align="right" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;"> <?php echo number_format($row->ppn,2,",",".") ?></td>
            </tr>
            <tr >
             <td colspan="4" align="right" style="border-top: 0;  border-bottom: 0; border-right: 0;"><strong>&nbsp;</strong></td>
             <td  align="left" style="border-top: 0;  border-bottom: 0; border-left: 0; border-right: 0;"><strong>Total Fatur</strong></td>
             <td  align="right" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;"> <?php echo number_format($row->totalfatur,2,",",".") ?></td>
            </tr>
            <tr >
             <td colspan="4" align="right" style="border-top: 0;  border-bottom: 0; border-right: 0;"><strong>&nbsp;</strong></td>
             <td  align="left" style="border-top: 0;  border-bottom: 0; border-left: 0; border-right: 0;"><strong>Bayar</strong></td>
             <td  align="right" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;"> <?php echo number_format($row->bayar,2,",",".") ?></td>
            </tr>
            <tr >
             <td colspan="4" align="right" style="border-top: 0;  border-right: 0;" ><strong>&nbsp;</strong></td>
             <td align="left" style="border-top: 0;  border-right: 0; border-left: 0;"  ><strong>Kembalian</strong></td>
             <td style=" border: 0;" style="border-top: 0;  border-left: 0;"  align="right" > <?php echo number_format($row->kembalian,2,",",".")?></td>
            </tr>
    </tbody>

</table>
<table width="30%" align="right" border="0" style="font-size:11px; "  >
    <tr>     
      <td >&nbsp; </td>
    </tr>
     <tr>     
      <td >&nbsp; </td>
    </tr>
  <tr>
     <td align="center" ><strong>ADMIN</strong></td>
    </tr>
    <tr>
      <td >&nbsp; </td>
    </tr>
     <tr>
      <td >&nbsp; </td>
    </tr>
     <tr>
      <td >&nbsp; </td>
    </tr>
     <tr>
      <td ><hr style="color:#000000"> </td>
    </tr>
   
  </table>


