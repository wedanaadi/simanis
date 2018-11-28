
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
    <tr><td colspan="2" align="center" style="font-size:14px;"> <strong> TANDA TERIMA SERVICE  </strong>  </td></tr>
    <tr><td  colspan="2" align="center" style="font-size:8px;"> <?php echo $periode['MulaiPem'].' '.'-'.' '.$periode['AkhirPem'] ?>  </td></tr>
    <tr><td colspan="2" align="left">&nbsp;</td></tr>
</table>

<table id="TabelKonten"  border="1" style="border-collapse: collapse; border-color:#000000; margin-bottom : 130px;"  width="100%"   >
 
    <tbody>
      <?php $total=0; $NoNota =''; $count = 0; $temp=null; foreach ($konten as $row) { ?>
        <?php if ($row->id_penerimaan != $NoNota ) { ?>
          
            <?php if ($count!=0 ) { ?>
                  <tr class="noBorder">
                   <td  >&nbsp;</td>
                   <td colspan="4" >&nbsp;</td>
                  </tr>
                  <tr class="noBorder">
                   <td >&nbsp;</td>
                   <td colspan="4" >&nbsp;</td>
                  </tr> 
            <?php }?>

              <?php if($row->id_penerimaan != $temp)
              {
              ?>
            <tr >
             <td width="15%" style="border-right: 0; border-bottom: 0;"><strong>NO</strong>  </td>
             <td align="left" colspan="5"  style="border-left: 0; border-bottom: 0;">: <?php echo $row->id_penerimaan; ?></td>
            </tr>
            <tr >
             <td style="border-top: 0; border-bottom: 0; border-right: 0;"><strong>Karyawan</strong></td>
             <td colspan="5" align="left" style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;">: <?php echo $row->nama_karyawan;?></td>
            </tr>
            <tr >
             <td style="border-top: 0; border-bottom: 0; border-right: 0;" ><strong>Tanggal</strong></td>
             <td style=" border: 0;" style="border-top: 0; border-bottom: 0; border-left: 0;" colspan="5" align="left" >: <?php echo $row->tgl_penerimaan;?></td>
            </tr>
                  <?php if ($count!=0 ) { ?>
                    <tr align="center" class="header">
                      <td  scope="col"><strong>Id Servis</strong></td>
                      <td  scope="col"><strong>Nama Barang</strong></td>
                      <td  scope="col"><strong>SN</strong></td>
                      <td  scope="col"><strong>Kelengkapan</strong></td>
                      <td  scope="col"><strong>Keluhan</strong></td>
                      <td  scope="col"><strong>Status</strong></td>
                  </tr>
                  <?php } else {?>
                   <tr align="center" class="header">
                      <td  scope="col"><strong>Id Servis</strong></td>
                      <td  scope="col"><strong>Nama Barang</strong></td>
                      <td  scope="col"><strong>SN</strong></td>
                      <td  scope="col"><strong>Kelengkapan</strong></td>
                      <td  scope="col"><strong>Keluhan</strong></td>
                      <td  scope="col"><strong>Status</strong></td>
                  </tr>

                  <?php }?> <?php } ?>


        <?php } ?>

    <tr>
      <td><?php echo $row->id_service; ?></td>
      <td><?php echo $row->nama_barang; ?></td>
      <td><?php echo $row->sn_barang; ?></td>
      <td><?php echo $row->kelengkapan; ?></td>
      <td><?php echo $row->keluhan; ?></td>
      <td><?php echo $row->nama_st; ?></td>
      
    </tr>
    
    <?php $NoNota = $row->id_penerimaan; $count++; $temp = $row->id_penerimaan; } ?>
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


