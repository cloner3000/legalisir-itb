	<div class="jumbotron"  style="background-image: url(<?php echo base_url('images/ilustrasi.jpg')?>);background-repeat: no-repeat; background-position: right;">
      <div class="container" style="background-color:rgba(239,239,239,0.5);">
        <h2>Aplikasi Legalisir Ijazah SITH (ALIS)</h2>
        <p>Sekarang anda bisa mengajukan legalisir ijazah SITH-ITB via web ini. <br />Web ini dapat dibuka melalui perangkat mobile.</p>        
      </div>
    </div>

    <div class="container" style="padding-top:0px;margin-top:0px">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-3">
          <h2>1. Registrasi/ Login</h2>
          <p style="text-align: justify">
		  	Silahkan lakukan <a href="<?php echo base_url('registrasi')?>">registrasi</a> terlebih dahulu jika belum pernah mengakses aplikasi ini atau aplikasi repositori.
			Jika sudah melakukan registrasi, atau pernah login di situs repositori, lakukan login menggunakan NIM dan password anda.
		  </p>          
        </div>
        <div class="col-md-3">
          <h2>2. Pengajuan</h2>
          <p style="text-align: justify">Anda dapat melakukan pengajuan legalisir ijazah setelah melengkapi form-tracer-studi. Untuk saat ini, legalisir tidak dibatasi jumlah nya. 
		  </p>          
        </div>
        <div class="col-md-3">
          <h2>3. Bayar ke loket</h2>
          <p style="text-align: justify">Selanjutnya, lakukan pembayaran secara tunai ke loket SITH, sesuai jumlah yang harus dibayarkan dengan membawa bukti pengajuan.</p>          
       </div>
        <div class="col-md-3">
          <h2>4. Ambil ijazah</h2>
          <p style="text-align: justify">Anda akan menerima notifikasi via web ini dan email jika permohonan legalisir anda telah siap untuk diambil. Pengambilan dilakukan di loket SITH pada jam kerja dengan membawa bukti pengajuan yang telah selesai pembayarannya.</p>          
        </div>
      </div>
	  <div class="row" style="height:100%;">
	  	<div class="col-md-12" style="background-color: #efefef;padding:10px 20px 3px 20px;">
			<h4 style="padding:0px;margin:0px">Berikut ini NIM yang telah diverifikasi</h4>
			Nim berikut sudah dapat login dan mengajukan legalisir. Anda dapat menggunakan pencarian pada browser (Ctrl+F) untuk mencari NIM anda.
			
			<br />
			<div class="col-md-12" style="margin-bottom:10px; overflow:auto;height: 100%;padding:15px;">
				<ol>
					<?php if($verified->num_rows()>0): $i=0;?>
					<?php foreach($verified->result() as $mhs): ?>
						<li class="<?php echo $i%2!=0?'odd':'even'?>"><span class="col-md-2"><?php echo $mhs->nim?></span> <span class="col-md-4"><?php echo $mhs->nama?></span> <span class="col-md-2"><?php echo $mhs->prodi?></span> </span></li>
					<?php $i++;endforeach; ?>
					<?php endif; ?>
				</ol>
			</div>
		</div>
	  </div>
	 </div>