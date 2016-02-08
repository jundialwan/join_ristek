<div class="row">
	<ul class="nav nav-tabs">
		<?php if (!isset($afterSubmit)): ?>
		<li class="active">
		<?php else: ?>
		<li>
		<?php endif; ?>
	  		<a class="ristek-color" data-toggle="tab" href="#beranda">BERANDA</a>
	  	</li>
	  	<?php if (!isset($afterSubmit)): ?>
		<li>
		<?php else: ?>
		<li class="active">
		<?php endif; ?>
		  	<a class="ristek-color" data-toggle="tab" href="#tugas">TUGAS</a>
	  	</li>
	  	<li><a class="ristek-color" data-toggle="tab" href="#wawancara">WAWANCARA</a></li>
	  	<li><a class="ristek-color" data-toggle="tab" href="#kontak">KONTAK</a></li>
	</ul>

	<div class="tab-content">
		<?php if (!isset($afterSubmit)): ?>
		<div id="beranda" class="tab-pane in active">	 
		<?php else: ?>
		<div id="beranda" class="tab-pane">	 
		<?php endif; ?>
	  		<br>
	  		<div class="col-md-12">
	  			<div class="row">	  									
	  				<div class="col-md-7">
	  					<h4>Informasi</h4>
	  					<p class="content-font">
	  						Halo <b><?= $user['username'] ?></b>, terima kasih telah mendaftar sebagai calon anggota Ristek Fasilkom UI!	
							<br>
							Tahap pendaftaran calon anggota kini telah ditutup. Para ketua SIG telah menetapkan para pendaftar yang lolos seleksi tugas. 
							Berikut adalah hasil seleksi tugas Anda. <br><br>
							
							<?php if ($sigprop2->sig != $sigprop1->sig):?>
							Pilihan 1:
							<?php else: ?>
							Pilihan:
							<?php endif; ?>							
							
							<?php if ($isUserQualified->isPil1Qualified == 1): ?>
							<div class="alert alert-success well-sm" role="alert">
								<p><?= $sigprop1->signame ?>: <b>LOLOS SELEKSI TUGAS</b></p>
							</div>
							<?php else: ?>
							<div class="alert alert-danger well-sm" role="alert">
								<p><?= $sigprop1->signame ?>: <b>TIDAK LOLOS SELEKSI TUGAS</b></p>
							</div>
							<?php endif; ?>								
							
							<?php if ($sigprop2->sig != $sigprop1->sig):?>

							Pilihan 2:
							<?php if ($isUserQualified->isPil2Qualified == 1): ?>
							<div class="alert alert-success well-sm" role="alert">
								<p><?= $sigprop2->signame ?>: <b>LOLOS SELEKSI TUGAS</b></p>
							</div>
							<?php else: ?>
							<div class="alert alert-danger well-sm" role="alert">
								<p><?= $sigprop2->signame ?>: <b>TIDAK LOLOS SELEKSI TUGAS</b></p>
							</div>
							<?php endif; ?>

							<?php endif; ?>
							
							Selamat bagi Anda yang lolos tahap seleksi tugas. Silakan mengisi jadwal wawancara di tab wawancara segera.
							Mohon maaf bagi Anda yang belum mendapatkan kesempatan untuk lolos ke tahap wawancara. Kami tunggu partisipasi Anda pada acara-acara Ristek selanjutnya.	
							<br><br>
							Tahap wawancara kini telah dibuka. <br>
							<div class="alert alert-info" role="alert">
							<b>Masa Wawancara adalah <u>9 - 14 Februari 2016</u></b>
							</div> 
							
							Pendaftar dapat melakukan tahap Wawancara <b>jika dan hanya jika lolos seleksi tugas</b>.
							Pendaftar yang lolos ke tahap wawancara dipersilahkan memilih jadwal wawancara yang tersedia pada tab wawancara. <br><br>						
													
							Persiapkan diri Anda pada wawancara kali ini dengan baik. Semoga sukses! <br><br>
							Ristek Fasilkom UI <br>
							<b>#ExploringTechnology</b>
	  					</p>	  					
	  				</div>
  					<div class="col-md-5">			  			
		  				<div class="panel panel-primary info-panel">
		  					<div class="panel-heading info-panel-heading">
		  						<div class="panel-title">SIG/Divisi Plihan</div>
		  					</div>
		  					<div class="panel-body">
		  						<?php if ($sigprop2->sig != $sigprop1->sig):?>
		  						<div class="col-md-6 text-center">
		  							<span class="content-font">Pilihan 1</span><br><br>
		  						<?php else: ?>
								<div class="col-md-12 text-center">
		  							<span class="content-font">Pilihan</span><br><br>
		  						<?php endif; ?>
		  							<img class="img-responsive center-block" src="<?= base_url().($sigprop1->logolink) ?>" alt="CP" width="60" height="80">
									<span class="content-font headline"><b><?= $sigprop1->signame ?></b></span>
		  						</div>
		  						<?php if ($sigprop2->sig != $sigprop1->sig):?>
		  						<div class="col-md-6 text-center">
		  							<span class="content-font">Pilihan 2</span><br><br>
		  							<img class="img-responsive center-block" src="<?= base_url().($sigprop2->logolink) ?>" alt="CP" width="60" height="80">
									<span class="content-font headline"><b><?= $sigprop2->signame ?></b></span>
		  						</div>
		  						<?php endif; ?>
		  					</div>
		  				</div>
		  				<div class="panel panel-primary info-panel">
		  					<div class="panel-heading info-panel-heading">
		  						<div class="panel-title">STATUS SELEKSI TUGAS</div>
		  					</div>
		  					<div class="panel-body">
		  						<?php if ($sigprop2->sig != $sigprop1->sig):?>
		  						<span class="content-font"><b>SIG/Divisi Pilihan 1:</b></span>
		  						<?php else: ?>
		  						<span class="content-font"><b>SIG/Divisi Pilihan:</b></span>
		  						<?php endif; ?>
								
								<?php if ($isUserQualified->isPil1Qualified == 0): ?>
		  						<h4 class="text-danger text-center"><b>TIDAK LOLOS SELEKSI TUGAS</b></h4>
		  						<?php else: ?>
		  						<h4 class="text-success text-center"><b>LOLOS SELEKSI TUGAS</b></h4>
		  						<?php endif; ?>
								
								<?php if ($sigprop2->sig != $sigprop1->sig):?>
		  						<span class="content-font"><b>SIG/Divisi Pilihan 2:</b></span>

		  						<?php if ($isUserQualified->isPil2Qualified == 0): ?>
		  						<h4 class="text-danger text-center"><b>TIDAK LOLOS SELEKSI TUGAS</b></h4>
		  						<?php else: ?>
		  						<h4 class="text-success text-center"><b>LOLOS SELEKSI TUGAS</b></h4>
		  						<?php endif; ?>
		  						<?php endif; ?>

		  					</div>
		  				</div>			  			
			  		</div>		  						
	  			</div>
	  		</div>	  		
	  	</div>

	  	<?php if (!isset($afterSubmit)): ?>
	  	<div id="tugas" class="tab-pane">
	  	<?php else: ?>
	  	<div id="tugas" class="tab-pane in active">
	  	<?php endif; ?>
		  	<br>	 
		  	<div class="col-md-12">
		  		<div class="row">
		    		<div class="col-md-7">
		    			<h4>Petunjuk</h4>
			    		<p class="content-font">
			    			<div class="alert alert-danger" role="alert">
			    				Deadline pengumpulan link tugas adalah <b><u>6 Februari 2016 pukul 23:55</u></b>.
			    			</div>
			    			Submisi link file tugas dan Resume dapat dilakukan lebih dari satu kali dan hanya file dari link terakhir yang dinilai.		    			
			    			Template Resume dan file tugas tersedia pada link dibawah. Resume yang Anda buat harus sesuai dengan template yang kami berikan.							
			    			Pastikan bahwa link yang Anda submit adalah public dan valid, bukan fake link, agar  bisa diakses oleh orang lain. 			    			
							<br><br>
							<b>Format penamaan Resume: Resume_Nama.pdf. <br>Contoh: Resume_Firza Pratama.pdf</b>
							<br><br>
							Selamat mengerjakan tugas :)
			    		</p>
		    			
		    			<div class="panel panel-primary info-panel">
					  		<div class="panel-heading info-panel-heading">
					    		<h5 class="panel-title">Download File Template Resume dan Tugas</h5>
					  		</div>
					  		<div class="panel-body">
					  			<p class="content-font">Download file template resume dan file tugas SIG/Divisi pilihan Anda pada ink dibawah ini:</p>				    
					    		<ul>
					    			<li>
					    				<a href="<?= base_url().'files/template_resume_ristek.docx' ?>">Template Resume</a>
					    			</li>
							    	<li>
							    		<a href="<?= base_url().($sigprop1->tasklink) ?>">Tugas <?= $sigprop1->signame ?></a>							    		
							    	</li>
					    	
							    	<?php if (strcmp((string)$pilihan->sig2, (string)$pilihan->sig1) != 0) : ?>
							    	<li>
							    		<a href="<?= base_url().($sigprop2->tasklink) ?>">Tugas <?= $sigprop2->signame ?></a>							    		
							    	</li>
							    	<?php endif; ?>					    	
					    		</ul>
					  		</div>
						</div>				
					</div>
					<div class="col-md-5">			    		
			    		<div class="panel panel-primary info-panel">
							<div class="panel-heading info-panel-heading">
						    	<h5 class="panel-title">Submisi Link Resume dan Tugas</h5>
						  	</div>
						  	<div class="panel-body">
						  		<?php if (time() > (strtotime('6th February 2016 23:55:00.0')-(21*60+30))): ?>
						  		<div class="well well-lg content-font">Masa pengumpulan tugas sudah berakhir. Anda tidak diperkenankan lagi untuk submit tugas.</div>
						  		<?php else: ?>
						  		
								<?php if ($tugas->essay != NULL):?>
							  	<div class="form-group well-sm list-group-item-success">
							  	<?php else:?>
							  	<div class="form-group well-sm list-group-item-danger">
							  	<?php endif; ?>

							  		<label for="essay_link_input">Link Essay Motivasi</label>	
						  			<p class="content-font"><?= form_error('essay_link_input') ?></p>
						  			<form id="essay_link_form" action="<?= site_url('dashboard') ?>" method="post" class="form-inline">
						  				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							  			<div class="form-group">
							  			   	<div class="input-group">						  			   		
								  				<div class="input-group-addon">http://</div>
											    <input class="form-control" type="text" id="essay_link_input" name="essay_link_input">
											    <input type="hidden" name="which_form" value="essay">
							  			   	</div>
									  		<button type="submit" class="btn btn-primary">Submit Link</button>
									  		<?php if ($tugas->essay != NULL):?>
						    				<a href="<?= $tugas->essay ?>" target="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span></a>		
						    				<?php else: ?>
						    				<a href="<?= $tugas->essay ?>" target="_blank" class="btn btn-primary disabled" role="button"><span class="glyphicon glyphicon-save"></span></a>				    				
						    				<?php endif; ?>
							  			</div>   
							  		</form>								  		
							  	</div>	

							  	<?php if ($tugas->resume != NULL):?>
							  	<div class="form-group well-sm list-group-item-success">
							  	<?php else:?>
							  	<div class="form-group well-sm list-group-item-danger">
							  	<?php endif; ?>

							  		<label for="resume_link_input">Link Resume</label>	
						  			<p class="content-font"><?= form_error('resume_link_input') ?></p>
						  			<form id="resume_link_form" action="<?= site_url('dashboard') ?>" method="post" class="form-inline">
						  				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						  				<div class="form-group">
						  					<div class="input-group">
						  						<div class="input-group-addon">http://</div>
											    <input class="form-control" type="text" id="resume_link_input" name="resume_link_input">
											    <input type="hidden" name="which_form" value="resume">
										  	</div>
										  	<button type="submit" class="btn btn-primary">Submit Link</button>
									  		<?php if ($tugas->resume != NULL):?>
						    				<a href="<?= $tugas->resume ?>" target="_blank" class="btn btn-primary text-center"><span class="glyphicon glyphicon-save"></span></a>		
						    				<?php else: ?>
						    				<a href="<?= $tugas->resume ?>" target="_blank" class="btn btn-primary disabled" role="button"><span class="glyphicon glyphicon-save"></span></a>				    				
						    				<?php endif; ?>
						    			</div>
							  		</form>								  		
							  	</div>					    

							  	<?php if ($tugas->tugas1 != NULL):?>
							  	<div class="form-group well-sm list-group-item-success">
							  	<?php else:?>
							  	<div class="form-group well-sm list-group-item-danger">
							  	<?php endif; ?>	
	
							  		<label for="tugas1_link_input">Link Tugas SIG Pilihan 1</label>
							  		<p class="content-font"><?= form_error('tugas1_link_input') ?></p>					    
							  		<form id="tugas1_link_form" action="<?= site_url('dashboard') ?>" method="post" class="form-inline">	
							  			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">			  							   
							  			<div class="form-group">
							  				<div class="input-group">
							  					<div class="input-group-addon">http://</div>
											    <input class="form-control" type="text" id="tugas1_link_input" name="tugas1_link_input">
											    <input type="hidden" name="which_form" value="tugas1">
											</div>
									  		<button type="submit" class="btn btn-primary">Submit Link</button>
									  		<?php if ($tugas->tugas1 != NULL):?>
						    				<a href="<?= $tugas->tugas1 ?>" target="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span></a>					    				
						    				<?php else: ?>
						    				<a href="<?= $tugas->tugas1 ?>" target="_blank" class="btn btn-primary disabled" role="button"><span class="glyphicon glyphicon-save"></span></a>					    				
						    				<?php endif; ?>
							    		</div>
						  			</form>							  			
							  	</div>
	
							  	<?php if (strcmp((string)$pilihan->sig2, (string)$pilihan->sig1) != 0) : ?>

							  	<?php if ($tugas->tugas2 != NULL):?>
							  	<div class="form-group well-sm list-group-item-success">
							  	<?php else:?>
							  	<div class="form-group well-sm list-group-item-danger">
							  	<?php endif; ?>	

							  		<label for="tugas2_link_input">Link Tugas SIG Pilihan 2</label>					    
							  		<p class="content-font"><?= form_error('tugas2_link_input') ?></p>
							  		<form id="tugas2_link_form" action="<?= site_url('dashboard') ?>" method="post" class="form-inline">	
							  			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">			  							   
							  			<div class="form-group">
							  				<div class="input-group">
												<div class="input-group-addon">http://</div>
											    <input class="form-control" type="text" id="tugas2_link_input" name="tugas2_link_input">
											    <input type="hidden" name="which_form" value="tugas2">
											</div>
									  		<button type="submit" class="btn btn-primary">Submit Link</button>
									  		<?php if ($tugas->tugas2 != NULL):?>
						    				<a href="<?= $tugas->tugas2 ?>" target="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span></a>					    				
						    				<?php else: ?>
						    				<a href="<?= $tugas->tugas2 ?>" target="_blank" class="btn btn-primary disabled" role="button"><span class="glyphicon glyphicon-save"></span></a>	
						    				<?php endif; ?>
						    			</div>
							  		</form>						  			
							  	</div>

								<?php endif; ?> <!-- end of if (sig2 != sig1) -->

								<?php endif; ?> <!-- end of if (tanggal > 6Feb2016 23:55) -->
						  	</div>
						</div>				
			    	</div>	    		    
	    		</div>
		  	</div>		    	
	  	</div>
	  	<div id="wawancara" class="tab-pane">
	  		<div class="col-md-12">
	  			<div class="row">
		  			<div class="col-md-12">
				 		<?php if( (time() < (strtotime('8th February 2016 19:30:00.0')-(21*60+30)) | ($isUserQualified->isPil1Qualified == 0 & $isUserQualified->isPil2Qualified == 0)) & $user['username'] != 'jundi.ahmad'): ?>
				 		<br>
				 		<div class="well well-lg content-font">Masa Wawancara belum dibuka atau Anda tidak lolos seleksi tugas. <br><b>Masa Wawancara adalah <u>9-14 Februari 2016</u></b></div>
				 		<?php else: ?>
				 		
		  				<ul class="nav pagination nav-tabs">

		  					<?php if ($isUserQualified->isPil1Qualified == 1):?>		  				
		  					<li class="active"><a class="ristek-color" data-toggle="tab" href="#ycbm-sig1"><?= $sigprop1->linkname ?></a></li>		  						    					    		
		  					<?php endif; ?>
							
							<?php if ( $pilihan->sig2 != $pilihan->sig1 ) : ?>

		  					<?php if ($isUserQualified->isPil2Qualified == 1):?>
				    		<li><a class="ristek-color" data-toggle="tab" href="#ycbm-sig2"><?= $sigprop2->linkname ?></a></li>				    				    		
				    		<?php endif; ?>

				    		<?php endif; ?>

				 		</ul>
				 		<div class="tab-content">
							
							<?php if ($isUserQualified->isPil1Qualified == 1):?>
				 			<div id="ycbm-sig1" class="tab-pane in active">
				 				<iframe src="<?= ($sigprop1->booklink).'/?noframe=true' ?>" style="width:100%;height:480px;border:0px;background-color:transparent;" frameborder="0" allowtransparency="true" onload="keepInView(this);"></iframe>				 													
								<script>function keepInView(item) {if((document.documentElement&&document.documentElement.scrollTop)||document.body.scrollTop>item.offsetTop)item.scrollIntoView();}</script>
				 			</div>
				 			<?php endif; ?> <!-- end of if (user qualified pilihan 1)-->
				
				 			<?php if ( $pilihan->sig2 != $pilihan->sig1 ) : ?>

				 			<?php if ($isUserQualified->isPil2Qualified == 1):?>
				 			<div id="ycbm-sig2" class="tab-pane">
				 				<iframe src="<?= ($sigprop2->booklink).'/?noframe=true' ?>" style="width:100%;height:480px;border:0px;background-color:transparent;" frameborder="0" allowtransparency="true" onload="keepInView(this);"></iframe>				 				
								<script>function keepInView(item) {if((document.documentElement&&document.documentElement.scrollTop)||document.body.scrollTop>item.offsetTop)item.scrollIntoView();}</script>
				 			</div>
				 			<?php endif; ?> <!-- end of if (user qualified pilihan 2) -->

				 			<?php endif; ?> <!-- end of if (sig2 != sig1) -->

				 		</div>	
				 		<?php endif; ?>
		  			</div>
		  		</div>				  										 		  
	  		</div>		  		
	  	</div>
	  	<div id="kontak" class="tab-pane">
		  	<br>
		  	<div class="col-md-12">
		  		<div class="row">
		  			<div class="col-md-6">
				  		<div class="panel panel-primary info-panel">
					  		<div class="panel-heading info-panel-heading">Head of Human Resources Management Division</div>
					  		<div class="panel-body">Ifa Nasution: +6287887241010</div>
						</div>
			  		</div>
			  		<div class="col-md-6">
				  		<div class="panel panel-primary info-panel">
					  		<div class="panel-heading info-panel-heading">Head of Public Relation Division</div>
					  		<div class="panel-body">Made Nindyatama: +6282120500471</div>
						</div>
			  		</div>
			  	</div>
			  	<div class="row">
		  			<div class="col-md-6">
				  		<div class="panel panel-primary info-panel">
							<!-- Default panel contents -->
							<div class="panel-heading info-panel-heading">Computer System &amp; Computational Intelligence Group</div>			
							<!-- Table -->
							<table class="table">
							    <tbody>
							    	<tr>
							    		<td>Manager</td>
							    		<td>Ammar Fathin Sabili</td>
							    		<td>+6281368837070</td>
							    	</tr>
							    	<tr>
							    		<td>Head of <br>Competitive Programming SIG</td>
							    		<td>Anthony</td>
							    		<td>+6285215976795</td>
							    	</tr>
							    	<tr>
							    		<td>Head of <br>Data Science SIG</td>
							    		<td>Jatmiko Budi</td>
							    		<td>+6281288746324</td>
							    	</tr>
							    	<tr>
							    		<td>Head of <br>Embedded System SIG</td>
							    		<td>Kustiawanto Halim</td>
							    		<td>+6283180144455</td>
							    	</tr>
							    	<tr>
							    		<td>Head of <br>NetSos SIG</td>
							    		<td>Rizki Mubarok</td>
							    		<td>+6289660410425</td>
							    	</tr>			    	
							    </tbody>
							</table>
						</div>	  		    	    	
			  		</div>
			  		<div class="col-md-6">
				  		<div class="panel panel-primary info-panel">
							<!-- Default panel contents -->
							<div class="panel-heading info-panel-heading">Development Group</div>			
							<!-- Table -->
							<table class="table">			    
							    <tbody>
							    	<tr>
							    		<td>Manager</td>
							    		<td>Ilham Fathy</td>
							    		<td>+6287788306182</td>
							    	</tr>
							    	<tr>
							    		<td>Head of <br>Game Development SIG</td>
							    		<td>M. Azmi Malik</td>
							    		<td>+6285724166888</td>
							    	</tr>
							    	<tr>
							    		<td>Head of <br>Mobile Application Development SIG</td>
							    		<td>Teresa Pranyoto</td>
							    		<td>+628974215133</td>
							    	</tr>
							    	<tr>
							    		<td>Head of <br>UI/UX SIG</td>
							    		<td>Shylla Estee</td>
							    		<td>+6281213177791</td>
							    	</tr>
							    	<tr>
							    		<td>Head of <br>Web Development SIG</td>
							    		<td>Rahma Khairunissa</td>
							    		<td>+6281298109806</td>
							    	</tr>			    	
							    </tbody>
							</table>
						</div>	
			  		</div>  
		  		</div>
		  	</div>		  				  					  		    	
	  	</div>
	</div>
</div>