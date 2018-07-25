<!DOCTYPE HTML>
<html>
	<?php if($this->session->flashdata('data_daftar_masuk'))
    {
    ?>
    <script>
        alert("Data Anda Telah Tersimpan");
    </script>
        
    <?php
    }
    ?>
    <?php if($this->session->flashdata('data_daftar_gagal'))
    {
    ?>
    <script>
        alert("Data Anda Gagal Tersimpan");
    </script>
        
    <?php
    }
    ?>
<!-- Mirrored from www.gadjian.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Jul 2018 09:09:32 GMT -->
<head>
		<!-- Meta Tags -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="google-site-verification" content="8Heh9MWrxl7nbVy_l3HtDZNV7GQ8RwG566EYf_bHRKk" />

		<!-- Mengganti halaman ketika user menonaktifkan javascript
	    <noscript>
	        <style>html{display:none;}</style>
	        <meta http-equiv="refresh" content="0.0;url=home/errorPage.html">
	    </noscript>-->

		<title>
			Sistem Informasi Sekolah		</title>

        <link rel="shortcut icon" href="<?php echo base_url();?>template/font-awesome/images/logo_putih.png" type="image/png">

		<!-- Start CSS Code -->
			 <link href="<?php echo base_url();?>template/font-awesome/css/gjskin/social_icons.css" rel='stylesheet' type='text/css' media='screen'  id='BNS-Corner-Logo-Style-css' />
            <link href="<?php echo base_url();?>template/font-awesome/css/gjskin/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
            <link href="<?php echo base_url();?>template/font-awesome/css/gjskin/font-awesome.min.css" rel='stylesheet'  />
            <link href="<?php echo base_url();?>template/font-awesome/css/gjskin/jquery.fullpage.min.css" rel='stylesheet'  />
            <link href="<?php echo base_url();?>template/font-awesome/css/gjskin/style1a570.css?version=3.1" rel='stylesheet' type='text/css' media='all' />
            <link href="<?php echo base_url();?>template/font-awesome/css/gjskin/maina9af.css?version=4.3" rel='stylesheet' type='text/css' media='all' />
            <link href="<?php echo base_url();?>template/font-awesome/css/gjskin/price069b.css?version=1.1" rel='stylesheet' type='text/css' media='all' />
            <link href="<?php echo base_url();?>template/font-awesome/css/gjskin/pricing069b.css?version=1.1" rel='stylesheet' type='text/css' media='all' />
		 
        <link href="<?php echo base_url();?>template/font-awesome/css/font-awesome.min.css" rel='stylesheet' type='text/css' />
        

		<!-- End CSS Code -->

		<!-- Start Javascript -->
		<script src="<?php echo base_url();?>template/font-awesome/js/jquery.min.js"> </script>
        <script src="<?php echo base_url();?>template/font-awesome/js/bootstrap.min.js"> </script>
		<!-- End Javascript -->

    
		
	</head>

	<body id="home">
		<!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MHQJDXR"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
	
<div class="header">
	<div id="header_bg" class="header_bg">
		<div class="wrap">
			<div class="header">
				<div class="logo" style="position:relative">
						<img src="<?php echo base_url();?>template/font-awesome/images/logo.png" class="logo_gadjian" alt="" />
				
				</div>
				<div class="cssmenu">
					<ul id="nav">
						<li class="current" >
							<!--<a class="btn-website" href="#">
								Beranda							</a>-->
						</li>
					   	<li  >
					   	       <!-- tambahan fitur-->
					   	</li>
					   	<li  >
					   		<!-- tambahan fitur-->
					   	</li>
						<li  >
					   		<!-- tambahan fitur-->
					   	</li>
					   	<li  >
					   		<!-- tambahan fitur-->
					   	</li>
			 		   	<li>
			 		   			<button class="btn btn-website btn-warning btn-md btn-gadjian btn-daftar">
					 		   		DAFTAR						 		</button>
						 	</a>
                           
						</li>
			 		   	<li>
							<button class="btn btn-website btn-success btn-md btn-gadjian btn-login">
								MASUK							</button>
			 		   	</li>
					   	<div class="clear"></div>
                        
                
                        <script>
                            
                            var valueModal = $("#valueModal").val();
                            <?php if($this->session->flashdata('message_name') && $data == 1)
                             {
                            ?>
                                $(window).load(function(){
                                    $('#modal_log_in').modal('show');
                                    $("a[href='#masuk_user']").trigger('click');
                                });
                            <?php
                             }
                             ?>
                            <?php if($this->session->flashdata('message_name') && $data == 2)
                             {
                            ?>
                                $(window).load(function(){
                                    $('#modal_log_in').modal('show');
                                    $("a[href='#masuk_siswa']").trigger('click');
                                });
                            <?php
                             }
                             ?> 
                            <?php if($this->session->flashdata('message_name') && $data == 3)
                             {
                            ?>
                                $(window).load(function(){
                                    $('#modal_log_in').modal('show');
                                    $("a[href='#masuk_ortu']").trigger('click');
                                });
                            <?php
                             }
                             ?>
                        </script>
                        
					</ul>
				</div>
				<div class="clear"></div>
			<div class="clear"></div>
			</div>
		</div>
	</div>
</div>

		<div class="header-bottom">
			<div class="wrap">
				<div class="bigtitle">
					<h2>Sistem Informasi Sekolah</h2>
					<h1 class="desc">
										</h1>
				</div>
				
	   		</div>
	  	</div>



		<!-- Start Fitur Section
	  	<section id="fitur">
	  		<div class="container">
	  			<div class="row">
	  				<div class="col-sm-11 col-centered">
						<div class="row">
			  				<div class="col-lg-12 text-center">
			  					<h2>Cara Gadjian membantu perusahaan Anda:</h2>
			  				</div>
			  			</div>
			  			<div class="row table-row">
			  				<div class="col-sm-4">
			  					<a class="btn-website" href="features/data-karyawan.html">
				  					<div class="row">
				  						<div class="col-sm-4 col-sm-offset-4">
				  							<img src="static/images/icon_01.png" alt="" class="img-responsive center-block"/>
				  						</div>
				  					</div>
				  					<div class="row">
				  						<div class="col-sm-12 text-center">
				  							<h3>Mengelola Data Karyawan</h3>
											<p>Kelola data karyawan di satu tempat: mulai dari ulang tahun, nomor rekening bank, jenjang karir, hingga remunerasi (gaji dan tunjangan lainnya). Punya karyawan kontrak (PKWT)? Gadjian bisa mengingatkan jika kontrak karyawan akan habis.</p>
				  						</div>
				  					</div>
			  					</a>
			  				</div>
			  				<div class="col-sm-4">
			  					<a class="btn-website" href="features/absensi-karyawan.html">
				  					<div class="row">
				  						<div class="col-sm-4 col-sm-offset-4">
				  							<img src="static/images/icon_03.png" alt="" class="img-responsive center-block"/>
				  						</div>
				  					</div>
				  					<div class="row">
				  						<div class="col-sm-12 text-center">
				  							<h3>Mencatat Absensi Karyawan</h3>
											<p>Punya mesin fingerprint maupun belum tidak jadi soal. Sistem pencatatan absensi di Gadjian terhubung langsung dengan penghitungan penggajian karyawan. Hitung gaji jadi hemat waktu! 									

</p>
				  						</div>
				  					</div>
			  					</a>
			  				</div>
			  				<div class="col-sm-4">
			  					<a class="btn-website" href="features/shift-kerja.html">
				  					<div class="row">
				  						<div class="col-sm-4 col-sm-offset-4">
				  							<img src="static/images/icon_12.png" alt="" class="img-responsive center-block img-feature-home"/>
				  						</div>
				  					</div>
				  					<div class="row">
				  						<div class="col-sm-12 text-center">
				  							<h3>Pola Kerja (Shift & Roster)</h3>
											<p>Memantau dan mengelola shift dan jadwal kerja karyawan menjadi ringan dengan Gadjian karena  jadwal kerja, shift dan peraturan jam kerja dapat termonitor secara otomatis.</p>
				  						</div>
				  					</div>
			  					</a>
			  				</div>
			  			</div>
			  			<div class="row table-row">
							<div class="col-sm-4">
			  					<a href="features/aplikasi-software-gaji-online.html">
				  					<div class="row">
				  						<div class="col-sm-4 col-sm-offset-4">
				  							<img src="static/images/icon_02.png" alt="" class="img-responsive center-block"/>
				  						</div>
				  					</div>
				  					<div class="row">
				  						<div class="col-sm-12 text-center">
				  							<h3>Menghitung Penggajian & THR Karyawan</h3>
											<p>Gadjian menghitung gaji mingguan, bulanan, lembur, THR bahkan bonus dan insentif secara otomatis dan akurat. Formula lembur pemerintah dan hitungan prorata gaji & THR juga sudah terakomodasi.</p>
				  						</div>
				  					</div>
			  					</a>
			  				</div>
			  				<div class="col-sm-4">
			  					<a class="btn-website" href="features/izin-sakit-karyawan.html">
				  					<div class="row">
				  						<div class="col-sm-4 col-sm-offset-4">
				  							<img src="static/images/icon_04.png" alt="" class="img-responsive center-block"/>
				  						</div>
				  					</div>
				  					<div class="row">
				  						<div class="col-sm-12 text-center">
				  							<h3>Memudahkan Pengajuan Sakit & Izin Karyawan</h3>
											<p>Pengajuan sakit dan izin karyawan dapat dicatat dan dihitung secara online di Gadjian. Simple dan paperless.
</p>
				  						</div>
				  					</div>
			  					</a>
			  				</div>
			  				<div class="col-sm-4">
			  					<a class="btn-website" href="features/cuti.html">
				  					<div class="row">
				  						<div class="col-sm-4 col-sm-offset-4">
				  							<img src="static/images/icon_05.png" alt="" class="img-responsive center-block"/>
				  						</div>
				  					</div>
				  					<div class="row">
				  						<div class="col-sm-12 text-center">
				  							<h3>Mengelola Pencatatan dan Penghitungan Cuti</h3>
											<p>Pengajuan dan perhitungan cuti karyawan dikelola secara online dan otomatis. Sistem Gadjian mengakomodasi periode cuti bersama maupun individu, termasuk perhitungan carry forward.</p>
				  						</div>
				  					</div>
			  					</a>
			  				</div>
			  			</div>
			  			<div class="row table-row">
			  				<div class="col-sm-4">
			  					<a class="btn-website" href="features/kasbon.html">
				  					<div class="row">
				  						<div class="col-sm-4 col-sm-offset-4">
				  							<img src="static/images/icon_06.png" alt="" class="img-responsive center-block"/>
				  						</div>
				  					</div>
				  					<div class="row">
				  						<div class="col-sm-12 text-center">
				  							<h3>Mencatat Pinjaman Karyawan</h3>
											<p>Anda dapat mencatat kas bon karyawan dan mengatur jadwal pembayarannya di Gadjian.</p>
				  						</div>
				  					</div>
			  					</a>
			  				</div>
			  				<div class="col-sm-4">
			  					<a class="btn-website" href="features/hitung-pph-21.html">
				  					<div class="row">
				  						<div class="col-sm-4 col-sm-offset-4">
				  							<img src="static/images/icon_07.png" alt="" class="img-responsive center-block"/>
				  						</div>
				  					</div>
				  					<div class="row">
				  						<div class="col-sm-12 text-center">
				  							<h3>Menghitung PPh 21 & Pembetulan PPh 21</h3>
											<p>Gadjian menghitung otomatis PPh 21 karyawan, baik karyawan tetap maupun karyawan tidak tetap, dengan metode penghitungan PPh 21 Gross, Gross Up, dan Nett. Tersedia juga file csv untuk diimpor ke e-SPT PPh 21 dan Form 1721 A1 bagi karyawan tetap. Cari payroll software yang bisa pembetulan PPh 21? Cuma Gadjian yang bisa!</p>
				  						</div>
				  					</div>
			  					</a>
			  				</div>
			  				<div class="col-sm-4">
			  					<a class="btn-website" href="features/bpjs.html">
				  					<div class="row">
				  						<div class="col-sm-4 col-sm-offset-4">
				  							<img src="static/images/icon_08.png" alt="" class="img-responsive center-block"/>
				  						</div>
				  					</div>
				  					<div class="row">
				  						<div class="col-sm-12 text-center">
				  							<h3>Menghitung BPJS Karyawan</h3>
											<p>Serahkan penghitungan BPJS Ketenagakerjaan dan BPJS Kesehatan karyawan pada Gadjian. Cepat, tepat, dan akurat!</p>
				  						</div>
				  					</div>
			  					</a>
			  				</div>
			  			</div>
						<div class="row table-row">
							<div class="col-sm-4">
			  					<a class="btn-website" href="features/portal-karyawan.html">
				  					<div class="row">
				  						<div class="col-sm-4 col-sm-offset-4">
				  							<img src="static/images/icon_10.png" alt="" class="img-responsive center-block"/>
				  						</div>
				  					</div>
				  					<div class="row">
				  						<div class="col-sm-12 text-center">
				  							<h3>Menyediakan Portal Karyawan (Employee Self Service)</h3>
											<p>Gadjian menyediakan portal khusus bagi karyawan untuk memudahkan mereka melihat data pribadi, slip gaji, mengajukan cuti, dan melihat rekaman kehadiran (absensi) secara online. </p>
				  						</div>
				  					</div>
			  					</a>
			  				</div>
			  				<div class="col-sm-4">
			  					<a class="btn-website" href="features/jurnal-gaji.html">
				  					<div class="row">
				  						<div class="col-sm-4 col-sm-offset-4">
				  							<img src="static/images/icon_11.png" alt="" class="img-responsive center-block"/>
				  						</div>
				  					</div>
				  					<div class="row">
				  						<div class="col-sm-12 text-center">
				  							<h3>Memudahkan Pembukuan Gaji </h3>
											<p>Gadjian menghasilkan Jurnal Beban Gaji dan Jurnal Pembayaran Gaji (saat ini tersedia untuk software akunting Zahir) sehingga memudahkan pekerjaan bagian akunting.</p>
				  						</div>
				  					</div>
			  					</a>
			  				</div>
			  				<div class="col-sm-4">
			  					<a class="btn-website" href="features/multi-level-approval.html">
				  					<div class="row">
				  						<div class="col-sm-4 col-sm-offset-4">
				  							<img src="static/images/icon_13.png" alt="" class="img-responsive center-block"/>
				  						</div>
				  					</div>
				  					<div class="row">
				  						<div class="col-sm-12 text-center">
				  							<h3>Multi Approval												<span class="label label-danger" style="font-size:12px !important; color: #fff">PREMIUM</span>
				  							</h3>
											<p>Fitur ini memungkinkan perusahaan mengelola proses persetujuan (approval) atas pengajuan cuti, sakit, izin, dan unpaid leave karyawan dari beberapa level yang berbeda sesuai dengan struktur perusahaan Anda.</p>
				  						</div>
				  					</div>
			  					</a>
			  				</div>
			  			</div>
	  				</div>
	  			</div>
	  		</div>
	  	</section>
	  	<!-- End Fitur Section -->


<script>
$(document).ready(function() {
	$("ul.submenu li").removeClass("current");
    $(document).on('click', '.btn-login', function(){
        if($('.tab-user').hasClass('active')){
            $('.log_in #user_username').focus();
        } else{
            $('.log_in #personalia_username').focus();
        }
    });
    $(document).keypress(function(e) {
        if(e.which == 13) {
            if($('.tab-user').hasClass('active')){
                $('#toUser').trigger('click');
            } else{
                $('#toPersonalia').trigger('click');
            }
        }
    });
    $('.masuk_user').unbind('click').click(function(){
        $(this).dblclick();
        $('.log_in #user_username').focus();
    });
    $('.masuk_personalia').unbind('click').click(function(){
        $(this).dblclick();
        $('.log_in #personalia_username').focus();
    });
    $('.btn-login').on('click', function(){
    	$('#modal_log_in').modal('show')
    });
    
    $('.btn-daftar').on('click', function(){
    	$('#modal_daftar').modal('show')
    });


});

</script>
<div class="modal log_in" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true" id="modal_log_in">
    <div class="modal-dialog modal-md">
      	<div class="modal-content">
      		<div class="modal-header">
      			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<img src="<?php echo base_url();?>template/font-awesome/images/logo_putih.png" alt="" class="center-block logo_gadjian">
      		</div>
      		<div class="modal-body">
      			<div>
				  	<ul class="nav nav-border nav-tabs" role="tablist">
				    	<li role="presentation" class="tab-user active" id="tab_user">
				    		<a href="#masuk_user" class="masuk_user" aria-controls="masuk_user" role="tab" data-toggle="tab">
				    			<span class=" hidden-xs">
				    				Login Sekolah
				    			</span>
				    			<span class="hidden-sm hidden-md hidden-lg">
				    				Sekolah
				    			</span>
				    		</a>
				    	</li>
				    	<li role="presentation" class="tab-siswa" id="tab_siswa">
				    		<a href="#masuk_siswa" class="masuk_personalia" aria-controls="masuk_personalia" role="tab" data-toggle="tab">
				    			<span class=" hidden-xs">
				    				Login Siswa
				    			</span>
				    			<span class="hidden-sm hidden-md hidden-lg">
				    				Siswa			</span>
				    		</a>
				    	</li>
                        <li role="presentation" class="tab-orangtua" id="tab_orangtua">
				    		<a href="#masuk_ortu" class="masuk_personalia" aria-controls="masuk_personalia" role="tab" data-toggle="tab">
				    			<span class=" hidden-xs" >
				    				Login OrangTua / Wali
				    			</span>
				    			<span class="hidden-sm hidden-md hidden-lg">
				    				Orang Tua / Wali				    			</span>
				    		</a>
				    	</li>
				  	</ul>

				  <!-- Tab panes -->
				  	<div class="tab-content margin_tabContent">
					    <div role="tabpanel" class="tab-pane active" id="masuk_user">
					    	
                            <form action="<?php echo base_url();?>index.php/auth/chek_login" method="POST" class="form-horizontal">
					          	<div class="container-fluid">
				          			<div class="form-group">
				              			<div class="col-xs-12">
                                            <br><br>
						              		<input type="text" class="form-control" name="sekolah_username" id="sekolah_username" placeholder="Email" id="user_username">
                                            <div class="sekolah_username_message" style="color:red">
                                        Username tidak boleh kosong
                                        </div>
						              	</div>
                                        
						            </div>
                                    
				            		<div class="form-group">
					              		<div class="col-xs-12">
					              			<div class="input-group">
								    			<input type="password" class="form-control password" id="sekolah_password" name="sekolah_password" placeholder="Password">
                                               
								      			<span class="input-group-addon">
									        		<div class="checkbox">
											    		<label>
											      			<input type="checkbox" class="showPassword"> Lihat											    		</label>
											  		</div>
								      			</span>
								    		</div>
                                           <div class="sekolah_password_message" style="color:red">
                                            Password tidak boleh kosong
                                        </div>
					              		</div>
					              	</div>
				              		<div class="row">
				        				<div class="col-xs-12">
						        			<a href="https://user.gadjian.com/forgetpass">
						        				<span class="pull-right">Lupa password												</span>
						        			</a>
				        				</div>
				        			</div>
						            <div class="row">
						              	<div class="col-xs-12">
						              		<button type="submit" id="submit" name="submit" class="btn btn-sukses form-control btn-gadjian" id="toUser">
						              			<span id="normalToUser">
						              				LOGIN
						              			</span>
						              			<i class="fa fa-spinner fa-pulse" id="loadingToUser"></i>
                                                
						              			<i class="fa fa-check" id="successToUser"></i>
						              			<span id="failToUser">
						              				<i class="fa fa-exclamation-triangle"></i>
						              				
						              			</span>
                                        
						              		</button>
                                            <center>
                                                <?php echo $this->session->flashdata('message_name')?>
                                                <?php echo $this->session->flashdata('kolom_kosong')?>
                                                
                                                
                                            </center>
						              	</div>
						            </div>
						            <div class="row">
						            	<!--<div class="col-xs-12 text-center">
						            		<p>Belum punya akun ? <a href="signup.html">Daftar sekarang !</a></p>
						            	</div>-->
						            </div>
						        </div>
							</form>
					    </div>
                        
                        
					    <div role="tabpanel" class="tab-pane" id="masuk_siswa">
					    	 <form action="<?php echo base_url();?>index.php/auth/chek_login_siswa" method="POST" class="form-horizontal">
					          	<div class="container-fluid">
				          			<div class="form-group">
				              			<div class="col-xs-12">
                                            <br><br>
						              		<input type="text" class="form-control" name="siswa_username" id="siswa_username" placeholder="NISN" id="siswa_username">
                                            <div class="siswa_username_message" style="color:red">
                                        Username tidak boleh kosong
                                        </div>
						              	</div>
                                        
						            </div>
                                    
				            		<div class="form-group">
					              		<div class="col-xs-12">
					              			<div class="input-group">
								    			<input type="password" class="form-control password" id="siswa_password" name="siswa_password" id="siswa_password" placeholder="Password">
                                               
								      			<span class="input-group-addon">
									        		<div class="checkbox">
											    		<label>
											      			<input type="checkbox" class="showPassword"> Lihat											    		</label>
											  		</div>
								      			</span>
								    		</div>
                                           <div class="siswa_password_message" style="color:red">
                                            Password tidak boleh kosong
                                        </div>
					              		</div>
					              	</div>
						            <div class="row">
						              		<div class="col-xs-12">
						              		<button type="submit" id="submit_siswa" name="submit" class="btn btn-sukses form-control btn-gadjian" id="toUser">
						              			<span id="normalToUser">
						              				LOGIN
						              			</span>
						              			<i class="fa fa-spinner fa-pulse" id="loadingToUser"></i>
                                                
						              			<i class="fa fa-check" id="successToUser"></i>
						              			<span id="failToUser">
						              				<i class="fa fa-exclamation-triangle"></i>
						              				
						              			</span>
                                        
						              		</button>
                                            <center>
                                                <?php echo $this->session->flashdata('message_name')?>
                                                <?php echo $this->session->flashdata('kolom_kosong')?>
                                                
                                            </center>
						              	</div>
						            </div>
						            <div class="row">
						            	<div class="col-xs-12 text-center">
						            		<p><br></p>
						            	</div>
						            </div>
						        </div>
							</form>
					    </div>
                        
                        <!-form ORTU-->
                        <div role="tabpanel" class="tab-pane" id="masuk_ortu">
					    	<form action="<?php echo base_url();?>index.php/auth/chek_login_ortu" method="POST" class="form-horizontal">
					          	<div class="container-fluid">
				          			<div class="form-group">
				              			<div class="col-xs-12">
                                            <br><br>
						              		<input type="text" class="form-control" name="ortu_username" id="ortu_username" placeholder="NISN" id="ortu_username">
                                            <div class="ortu_username_message" style="color:red">
                                        Username tidak boleh kosong
                                        </div>
						              	</div>
                                        
						            </div>
                                    
				            		<div class="form-group">
					              		<div class="col-xs-12">
					              			<div class="input-group">
								    			<input type="password" class="form-control password" id="ortu_password" name="ortu_password" id="ortu_password" placeholder="Password">
                                               
								      			<span class="input-group-addon">
									        		<div class="checkbox">
											    		<label>
											      			<input type="checkbox" class="showPassword"> Lihat											    		</label>
											  		</div>
								      			</span>
								    		</div>
                                           <div class="ortu_password_message" style="color:red">
                                            Password tidak boleh kosong
                                        </div>
					              		</div>
					              	</div>
						            <div class="row">
						              		<div class="col-xs-12">
						              		<button type="submit" id="submit_ortu" name="submit" class="btn btn-sukses form-control btn-gadjian" id="toUser">
						              			<span id="normalToUser">
						              				LOGIN
						              			</span>
						              			<i class="fa fa-spinner fa-pulse" id="loadingToUser"></i>
                                                
						              			<i class="fa fa-check" id="successToUser"></i>
						              			<span id="failToUser">
						              				<i class="fa fa-exclamation-triangle"></i>
						              				
						              			</span>
                                        
						              		</button>
                                            <center>
                                                <?php echo $this->session->flashdata('message_name')?>
                                                <?php echo $this->session->flashdata('kolom_kosong')?>
                                                
                                            </center>
						              	</div>
						            </div>
						            <div class="row">
						            	<div class="col-xs-12 text-center">
						            		<p><br></p>
						            	</div>
						            </div>
						        </div>
							</form>
					    </div>
				  	</div>
				</div>
      		</div>
      	</div><!-- end modal-content -->
    </div><!-- end modal-dialog modal-md -->
</div><!-- end modal fade log_in -->

<div class="modal log_in" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true" id="modal_daftar">
    <div class="modal-dialog modal-md">
      	<div class="modal-content">
      		<div class="modal-header">
      			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<img src="<?php echo base_url();?>template/font-awesome/images/logo_putih.png" alt="" class="center-block logo_gadjian">
      		</div>
      		<div class="modal-daftar">
      			<!-- Tab panes -->
				  	<div class="tab-content margin_tabContent">
					    <div role="tabpanel" class="tab-pane active" id="masuk_user">
					    	
                            <form method="post" action="<?php echo base_url();?>index.php/daftar/add" autocomplete="off" novalidate class="form_daftar">

										
					<!-- Start The First Part of The Form -->
						<div class="daftar">
							<div class="col-sm-8 col-sm-offset-2 text-center">
								<h4>SIGN UP YOUR SCHOOL
														</h4>
                            </div>
						</div>
						<div class="daftar">
							<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
								<div class="form-group">
									<div class="input-group">
									  	<span class="input-group-addon" id="basic-addon1">
									  		<i class="fa fa-user"></i>
									  	</span>
									  	<!-- pattern="^[a-zA-Z1-9\' \-.]+$"  -->
										 <input name="nama_lengkap" pattern="^[A-Za-z\' \-.]+$" data-validation-pattern-message="<i>&#xf071;</i> Maaf, karakter yang Anda masukkan tidak valid " placeholder="Nama lengkap" required data-validation-required-message="<i>&#xf071;</i> Tolong isi kotak di atas" type="text" class="form-control">
									</div>
									<p class="help-block text-right"></p>
								</div>
							</div>
						</div>


						<div class="daftar">
							<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
								<div class="form-group">
									<div class="input-group">
									  	<span class="input-group-addon" id="basic-addon1">
									  		<i class="fa fa-envelope"></i>
									  	</span>
									  	<input name="email" type="email" autocomplete="off" class="form-control" id="email" placeholder="Email" aria-describedby="basic-addon1" required data-validation-required-message="<i>&#xf071;</i> Tolong isi kotak di atas" data-validation-ajax-ajax="https://user.gadjian.com/cek-email/" data-validation-ajax-message="" data-validation-email-message="<i>&#xf071;</i> Alamat email tidak valid">
									</div>
									<p class="help-block text-right"></p>
								</div>
							</div>
						</div>

						<div class="daftar">
							<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
								<div class="form-group">
									<div class="input-group">
									  	<span class="input-group-addon" id="basic-addon1">
									  		<i class="fa fa-key"></i>
									  	</span>
									  	<input type="password" class="form-control" autocomplete="off" name="password" id="password" placeholder="Password" aria-describedby="basic-addon1" minlength="6" required data-validation-required-message="<i>&#xf071;</i> Tolong isi kotak di atas" data-validation-minlength-message="<i>&#xf071;</i> Terlalu pendek: Minimal '6' karakter">
									</div>
									<p class="help-block text-right"></p>
								</div>
							</div>
						</div>

						<div class="daftar">
							<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
								<div class="form-group">
									<div class="input-group">
									  	<span class="input-group-addon" id="basic-addon1">
									  		<i class="fa fa-key"></i>
									  	</span>
									  	<input name="password_confirm" type="password" class="form-control" id="confirm_password" placeholder="Confirm password" aria-describedby="basic-addon1" data-validation-match-match="password" data-validation-match-message="<i>&#xf071;</i> Kedua password harus sama" required data-validation-required-message="<i>&#xf071;</i> Tolong isi kotak di atas">
									</div>
									<p class="help-block text-right"></p>
								</div>
							</div>
						</div>

						<div class="daftar">
							<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
								<div class="form-group">
									<div class="input-group">
									  	<span class="input-group-addon" id="basic-addon1">
									  		<i class="fa fa-building"></i>
									  	</span>
									  	<input name="school_name"  type="text" class="form-control" id="school_name" pattern="^[a-zA-Z].*" minlength="3" placeholder="Nama Sekolah" aria-describedby="basic-addon1" required data-validation-required-message="<i>&#xf071;</i> Tolong isi kotak di atas"
								data-validation-minlength-message="<i>&#xf071;</i> Terlalu pendek: Minimal '3' karakter"
								data-validation-pattern-message="<i>&#xf071;</i> Karakter pertama harus huruf">
									</div>
									<p class="help-block text-right"></p>
								</div>
							</div>
						</div>

						<div class="daftar">
							<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">
									  		<i class="fa fa-building"></i>
									  	</span>
										<select name="jenjang" class="form-control">
											<option value="">Jenjang Sekolah</option>
											<option value="4">TK</option>
											<option value="1">SD/MI</option>
											<option value="2">SMP/MTs</option>
											<option value="3">SMA/MA</option>
										</select>
										<p class="help-block text-right"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="daftar">
							<div class="col-md-4 col-md-offset-4 col-sm-9 col-sm-offset-3">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">
									  		+<span class="kodeNegara">62</span>
									  	</span>
									  	<input name="no_hp" type="text" class="form-control hanyaAngka" id="no_tlp2" pattern="^[0-9]*$" data-validation-pattern-message="Maaf, karakter yang Anda masukkan tidak valid" placeholder="No. Handphone									  	" required data-validation-required-message="<i>&#xf071;</i> Tolong isi kotak di atas" aria-describedby="basic-addon1">
									</div>
									<p class="help-block text-right"></p>
								</div>
							</div>
						</div>

					<!-- End The First Part of The Form -->
						<div class="daftar">
							<div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
								<button type="submit" name="submit" class="btn btn-warning btn-block btn-gadjian">
									Buat akun								</button>
							</div>
						</div>
					<!-- End The Second Part of The Form -->
				</form>
					    </div>
				  	</div>
				</div>
      		</div>
      	</div><!-- end modal-content -->
    </div><!-- end modal-dialog modal-md -->
</div>


<!--<div class="modal modal-konfirmasi" id="modalValidasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<img src="static/images/gg.png" alt="" class="center-block">
			</div>
			<div class="modal-body">
				<div class="col-xs-12 ">
					<p class="text-center"></p>
				</div>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>-->
    
    <input type="hidden" id="valueModal" value="0">

<!-- Start Javascript Core -->
    <script src="<?php echo base_url();?>template/font-awesome/js/corejs.min.js"> </script>
<!-- End Javascript Core -->

<script>
	$(document).ready(function(){
        $("#tab_orangtua").click(function(){
            document.getElementById("valueModal").value = "1";
            //alert($("#valueModal").val());
        });
        
         $("#tab_user").click(function(){
            document.getElementById("valueModal").value = "2";
            //alert($("#valueModal").val());
        });
        
         $("#tab_siswa").click(function(){
            document.getElementById("valueModal").value = "3";
            //alert($("#valueModal").val());
        });
        
        
        $(".sekolah_username_message").hide();
        $(".sekolah_password_message").hide();
        
        $(".siswa_username_message").hide();
        $(".siswa_password_message").hide();
        
        $(".ortu_username_message").hide();
        $(".ortu_password_message").hide();
        
        
        $("#submit").click(function(){
           var username_user    = $("#sekolah_username").val();
           var password_user    = $("#sekolah_password").val();
            
            
         if((username_user != null && username_user != "") && (password_user != null && password_user != ""))
             {
                 return true;
             }
            
        if(username_user == null || username_user == "")
            {
                $(".sekolah_username_message").show();
            }
            else{
                 $(".sekolah_username_message").hide();
            }
            
         if(password_user == null || password_user == "")
            {
                $(".sekolah_password_message").show();
            }
            else{
                $(".sekolah_password_message").hide();
            }
        
            
        return false;
        });
        
        $("#submit_siswa").click(function(){
           var username_siswa   = $("#siswa_username").val();
           var password_siswa   = $("#siswa_password").val();
            
            
         if((username_siswa != null && username_siswa != "") && (password_siswa != null && password_siswa != ""))
             {
                 return true;
             }
            
        if(username_siswa == null || username_siswa == "")
            {
                $(".siswa_username_message").show();
            }
            else{
                 $(".siswa_username_message").hide();
            }
            
         if(password_siswa == null || password_siswa == "")
            {
                $(".siswa_password_message").show();
            }
            else{
                $(".siswa_password_message").hide();
            }
            
        
        
            
        return false;
        });
        
        $("#submit_ortu").click(function(){
           var username_ortu   = $("#ortu_username").val();
           var password_ortu   = $("#ortu_password").val();
            
            
         if((username_ortu != null && username_ortu != "") && (password_ortu != null && password_ortu != ""))
             {
                 return true;
             }
            
        if(username_ortu == null || username_ortu == "")
            {
                $(".ortu_username_message").show();
            }
            else{
                 $(".ortu_username_message").hide();
            }
            
         if(password_ortu == null || password_ortu == "")
            {
                $(".ortu_password_message").show();
            }
            else{
                $(".ortu_password_message").hide();
            }
            
        
        
            
        return false;
        });
        
       
		$('#successToUser,#failToUser,#loadingToUser').hide();
		loading_user = $('#loadingToUser');


		function login(emailInput, passInput, tombol)
		{
			$.ajax({
				type: 'GET',
				url: 'https://user.gadjian.com/Guest/verifylogin/web/'+escape(emailInput)+'/'+escape(passInput)+'/',
				data: {},
				dataType: 'jsonp',
				crossDomain: true,
				jsonpCallback: 'loginfromgadjian',
			}).done(function(response){ // Sukses
				console.log(response);

				if(response.status == 1) // Jika login sukses
					{
					tombol.off("click");
					// redirect ke halaman user
					setTimeout(function(){
						loading_user.fadeOut(500);
					},2000);

					setTimeout(function(){
						$("#successToUser").fadeIn(500);
					},2500);

					setTimeout(function(){
						window.location = 'https://user.gadjian.com/depan';
					},3000);
				}
				else // Jika login gagal
				{
					// Mendisableskan klik tombol login agar tidak bentrok dengan klik yang sebelumnya ketika klik berkali2
						tombol.off("click");
					setTimeout(function(){
						loading_user.fadeOut(500);
					},2000);

					setTimeout(function(){
						$("#failToUser").fadeIn(500);
					},2500);

					setTimeout(function(){
						$("#failToUser").fadeOut(500);
					},4500);

					setTimeout(function(){
						$("#normalToUser").fadeIn(500);
						// Mengenablekan kembali klik yang telah didisabledkan
							clickToUser();
					},5000);

				}



			}).fail(function(error){ // Gagal
				console.log(error.statusText);
				console.log(error);

			});


		}


		function clickToUser(){
			$("#toUser").on("click",function(){
				var ini =$(this);
				var emailInput = $("#user_username").val();
				var passInput = $("#user_password").val();
				// Mengganti text button ketika ajax sedang loading / berproses
				$(document)
				  .on("ajaxStart",function () { // Ketika ajax baru dimulai
				    loading_user.show();
				    $("#toUser span").hide();
				  })
				  .on("ajaxStop",function () { // Ketika ajax selesai
				  });
				// Call login function
				login(emailInput, passInput, ini);

			});
		}

		clickToUser();

		$('#successToPersonalia,#failToPersonalia,#loadingToPersonalia').hide();
		loading_personalia = $('#loadingToPersonalia');

		function loginPersonalia(emailInput, passInput, tombol)
		{
			$.ajax({
				type: 'GET',
				url: 'https://personalia.gadjian.com/Guest/verifylogin/web/'+escape(emailInput)+'/'+escape(passInput)+'/',
				data: {},
				dataType: 'jsonp',
				crossDomain: true,
				jsonpCallback: 'loginfromgadjian',
			}).done(function(response){ // Sukses
				console.log(response);
				// callback(response);

				if(response.status == 1) // Jika login sukses
					{
					tombol.off("click");
					// redirect ke halaman Personalia
					setTimeout(function(){
						loading_personalia.fadeOut(500);
					},2000);

					setTimeout(function(){
						$("#successToPersonalia").fadeIn(500);
					},2500);

					setTimeout(function(){
						window.location = 'https://personalia.gadjian.com/depan';
					},3000);
				}
				else // Jika login gagal
				{
					// Mendisableskan klik tombol login agar tidak bentrok dengan klik yang sebelumnya ketika klik berkali2
						tombol.off("click");
					setTimeout(function(){
						loading_personalia.fadeOut(500);
					},2000);

					setTimeout(function(){
						$("#failToPersonalia").fadeIn(500);
					},2500);

					setTimeout(function(){
						$("#failToPersonalia").fadeOut(500);
					},4500);

					setTimeout(function(){
						$("#normalToPersonalia").fadeIn(500);
						// Mengenablekan kembali klik yang telah didisabledkan
							clickToPersonalia();
					},5000);
				}

			}).fail(function(error){ // Gagal
				console.log(error.statusText);
				console.log(error);
					tombol.off("click");
					setTimeout(function(){
						loading_personalia.fadeOut(500);
					},2000);

					setTimeout(function(){
						$("#failToPersonalia").fadeIn(500);
					},2500);

					setTimeout(function(){
						$("#failToPersonalia").fadeOut(500);
					},4500);

					setTimeout(function(){
						$("#normalToPersonalia").fadeIn(500);
						// Mengenablekan kembali klik yang telah didisabledkan
							clickToPersonalia();
					},5000);

			});


		}


		function clickToPersonalia(){
			$("#toPersonalia").on("click",function(){
				var ini =$(this);
				var emailInput = $("#personalia_username").val();
				var passInput = $("#personalia_password").val();
				// Mengganti text button ketika ajax sedang loading / berproses
				$(document)
				  .on("ajaxStart",function () { // Ketika ajax baru dimulai
				    loading_personalia.show();
				    $("#toPersonalia span").hide();
				  })
				  .on("ajaxStop",function () { // Ketika ajax selesai
				  });
				// Call login function
				loginPersonalia(emailInput, passInput, ini);

			});
		}

		clickToPersonalia();
	});
</script>

		<!-- Start Javascript Code -->

			<!-- Start Javascript Plugin -->
				<script src="<?php echo base_url();?>template/font-awesome/js/easyResponsiveTabs"  type="text/javascript"> </script>
                <script src="<?php echo base_url();?>template/font-awesome/js/jqBootstrapValidation"  type="text/javascript"> </script>
			<!-- End Javascript Plugin -->

			<!-- Start Javascript that Mahesa M. Elba made -->
				<script src="<?php echo base_url();?>template/font-awesome/js/global.js"  type="text/javascript"> </script>
                <script src="<?php echo base_url();?>template/font-awesome/js/sign_up.js"  type="text/javascript"> </script>
				<script>
					$(document).ready(function() {
				         $('.carousel').carousel({
				             interval: 4000,
										 pause: "false"
				         })
				    });
				</script>
			<!-- End Javascript that Mahesa M. Elba made -->
		<!-- End Javascript Code -->
			<script>
			  (function (w,i,d,g,e,t,s) {w[d] = w[d]||[];t= i.createElement(g);
			    t.async=1;t.src=e;s=i.getElementsByTagName(g)[0];s.parentNode.insertBefore(t, s);
			  })(window, document, '_gscq','script','../widgets.getsitecontrol.com/101062/script.js');
			</script>
	</body>

<!-- Mirrored from www.gadjian.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Jul 2018 09:10:20 GMT -->
</html>
