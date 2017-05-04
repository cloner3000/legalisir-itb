<?php if ($this->uri->segment(3) == "bukti_pembayaran") {
  $title = 'BUKTI PEMBAYARAN';
  $ket = 'Pengambilan dilakukan di loket SITH pada jam kerja dengan membawa bukti pengajuan yang telah selesai pembayarannya.';
  $hidden = '';
  
  $date =  $data[0]->waktu_pengajuan;
  
  $date2 = $data[0]->waktu_bayar;
  } else {
    $title =  'BUKTI PERMOHONAN';
    $ket ='Jika anda telah melakukan pembayaran, anda akan menerima email bahwa anda telah melakukan pembayaran, bila anda sudah melakukan pembayaran namun status belum berubah silahkan datang ke loket dengan membawa tanda bukti pembayaran';
    $hidden = 'style="opacity:0;"';
    $date = $data[0]->waktu_pengajuan;
    $date2 = "-";
    } ?>
<table style="font-family:Helvetica;color:black;" border="0" cellspacing="2" cellpadding="0" width="100%">
<thead>
  <tr>
    <td colspan="4" style="padding:10px;text-align:center;font-weight:bold;color:white;background-color:black;border-radius:5px;">
    <?= $title ?>
    </td>
  </tr>
  <tr>
    <td colspan="2" width="50%" style="padding-bottom:40px;padding-top:40px;padding-left:20px;font-size:13px;"><b>ALIS - SITH ITB</b> <br>Aplikasi Legalisir SITH ITB <br>http://legalisir.sith.itb.ac.id<br> Labtek XI Jalan Ganesha No. 10 Bandung</td>
    <td colspan="2"style="text-align:right;"><img src="http://4.bp.blogspot.com/-h9BBTDq9Jg4/VNYRILbuNRI/AAAAAAAAB-8/0fE95XJOZmQ/s1600/logo-itb-hitam-putih.jpg" width="80px" style="padding-right:20px"; /></td>
  </tr>
  <tr>
    <td rowspan="2" colspan="2"width="50%" style="padding-bottom:20px;font-weight:bold; font-size:20px;padding-left:20px;padding-top:20px;"><?= $data[0]->nama . " - " . $data[0]->email ."<br>" . $data[0]->nim?></td>
    <td style="background-color:#dddddd;border-radius:0.25em;border:1px solid #a1a1a1;padding:3px 0px 3px 10px;">
        No 
    </td>
    <td style="border-radius:0.25em;border:1px solid #a1a1a1;padding:3px 0px 3px 10px;">
      <?= $data[0]->id_pengajuan . '/ALIS.SITH/2017' ?>
    </td>
  </tr>
  <tr style="font-size:75%;">
  <td style="background-color:#dddddd;border-radius:0.25em;border:1px solid #a1a1a1;padding:3px 0px 3px 10px;">
        Tanggal Pengajuan <br> Tanggal Pembayaran
  	</td>
    <td style="border-radius:0.25em;border:1px solid #a1a1a1;padding:3px 0px 3px 10px;">
      <?= $date ?>
      <br> <?= $date2 ?>
    </td>
  </tr>
</thead>

<tbody>
  <tr style="font-size:75%">
    	<th width="25%" style="padding:3px;background-color:#dddddd;border: 1px solid #a1a1a1;border-radius:0.25em;font-size:125%;">Layanan</th>
			<th width="25%" style="padding:3px;background-color:#dddddd;border: 1px solid #a1a1a1;border-radius:0.25em;font-size:125%;">Jumlah</th>
      <th width="25%" style="padding:3px;background-color:#dddddd;border: 1px solid #a1a1a1;border-radius:0.25em;font-size:125%;">Biaya Satuan</th>
      <th width="25%" style="padding:3px;background-color:#dddddd;border: 1px solid #a1a1a1;border-radius:0.25em;font-size:125%;">Subtotal</th>
	</tr>
<?php foreach($data_detail as $item):?>
  <tr>
    	<td style="border-radius:0.25em;border:1px solid #a1a1a1; font-size:75%;padding :3px;"><?= $item->nama_layanan ?></td>
			<td style="border-radius:0.25em;border:1px solid #a1a1a1; font-size:75%;padding :3px;"><?= $item->jumlah ?></td>
			<td style="border-radius:0.25em;border:1px solid #a1a1a1; font-size:75%;padding :3px;">Rp . <?= $this->tools->angka($item->biaya_satuan) ?></td>
			<td style="border-radius:0.25em;border:1px solid #a1a1a1; font-size:75%;padding :3px;">Rp . <?=  $this->tools->angka($item->jumlah * $item->biaya_satuan) ?></td>
	</tr>
<?php endforeach;?>
  <tr>
    <td colspan="4" style="padding:20px;"></td>
  </tr>
  <tr>
    <td colspan="2"width="50%"> </td>
    <td style="padding:3px 0px 3px 10px;background-color:#dddddd;font-size:75%;border-radius:0.25em;border:1px solid #a1a1a1;">     
        Total
  	</td>
    <td style="padding:3px 0px 3px 10px;font-size:75%;border-radius:0.25em;border:1px solid #a1a1a1;">
      Rp . <?= $this->tools->angka($data[0]->total_tagihan)?>
    </td>
  </tr>
  <tr <?= $hidden ?>>
    <td colspan="2"width="50%"> </td>
    <td style="padding:3px 0px 3px 10px;background-color:#dddddd;font-size:75%;border-radius:0.25em;border:1px solid #a1a1a1;" >
        Dibayar
  	</td>
    <td style="padding:3px 0px 3px 10px;font-size:75%;border-radius:0.25em;border:1px solid #a1a1a1;">
      Rp . <?= $this->tools->angka($data[0]->total_tagihan)?>
    </td>
  </tr>
  <tr>
    <td colspan="4" style=";padding:30px 5px 0px 6px;">
      <center>KETERANGAN</center><hr/>
      <p><?= $ket ?></p>
    </td>
  </tr>
</tbody>
</table>
<!-- Bones wuz here
    (ﾉ◕ヮ◕)ﾉ*:･ﾟ✧
-->