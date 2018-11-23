
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
     <td colspan="2" align="center" style="font-size:14px;"> <strong> TANDA TERIMA SERVICE  </strong>  </td>
     <br><br>
   </tr>

   
 </table>
  <table id="Konten" width="100%" border="0" style="font-size:11px;"  >
    <tr>
      <td width="10%" align="left" ><strong>NO</strong> </td>
      <td align="left">: <?php echo $konten[0]->id_penerimaan;?></td>
      <td width="10%" align="left" ><strong>Customer</strong> </td>
      <td width="25%" align="left" >: <?php echo $konten[0]->nama_customer;?></td>
    </tr>
    <tr>
     <td><strong>Karyawan</strong></td>
     <td align="left">: <?php echo $this->session->userdata('namauser')?></td>
     <td align="left"><strong>Telp.</strong> </td>
     <td align="left">: <?php echo $konten[0]->notlp_cus;?></td>
   </tr>
   <tr>
    <td><strong>Tanggal</strong></td>
    <td align="left">: <?php echo $konten[0]->tgl_penerimaan;?></td>
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

<table id="TabelKonten"  border="1" style="border-collapse: collapse; border-color:#000000; margin-bottom : 130px;"  width="100%"   >
  <tbody>
    <tr>
      <th  scope="col">NO</th>
      <th  scope="col">Nama Barang</th>
      <th  scope="col">SN</th>
      <th  scope="col">Kelengkapan</th>
      <th  scope="col">Keluhan</th>
      <th  scope="col">Status</th>
    </tr>
    <?php $i=1; foreach ($konten as $k ) { ?>
    <tr>
      <td align="center"><?php echo $i?></td>
      <td ><?php echo $k->nama_barang ?></td>
      <td ><?php echo $k->sn_barang ?></td>
      <td ><?php echo $k->kelengkapan ?></td>
      <td ><?php echo $k->keluhan ?></td>
      <td ><?php echo $k->nama_st ?></td>
    </tr>
   <?php $i++; } ?>
  </tbody>
</table>

<table width="100%" border="0" style="font-size:11px; "  >
    <tr>
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
    </tr>
    
    <tr>
      <td >&nbsp; </td>
     <td  align="center"><strong>YANG MENERIMA</strong> </td>
     <td >&nbsp; </td>
     <td  align="center"><strong>YANG MENYERAHKAN</strong></td>
     <td >&nbsp; </td>
    </tr>
    <tr>
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
    </tr>
    <tr>
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
    </tr>
    <tr>
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
    </tr>
  </table>


  





