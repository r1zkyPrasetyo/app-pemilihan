<?php
	$get 			= $this->Query->select_where('config', array('*'), array(),0,1,'id ASC')->row();
	$desa 		= $get->desa;
	$kec 			= $get->kec;
	$kabkot 		= $get->kabkot;
	$sis_pem 	= $get->sis_pem;
	$sis_kabkot = $get->sis_kabkot;
	$logo_kab 	= $get->logo_kab;
	$logo_fav 	= $get->logo_fav;
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8" />
<title>PEMDES | <?php echo $desa;?></title>
<meta name="description" content="Web Informasi Pilkades PILKADES <?php echo $sis_pem . ' '. $desa . ' Kecamatan '. $kec . ' '. $sis_kabkot . $kabkot;?>">

<!-- Google / Search Engine Tags -->
<meta itemprop="name" content="PEMDES | <?php echo $desa;?>">
<meta itemprop="description" content="Web Informasi PILKADES <?php echo $sis_pem . ' '. $desa . ' Kecamatan '. $kec . ' '. $sis_kabkot . $kabkot;?>">
<meta itemprop="image" content="<?php echo base_url();?>assets/img/kegiatan/400/02029138-5e62-40b9-bdca-97cefed55e8c.jpg">

<!-- Facebook Meta Tags -->
<meta property="og:url" content="<?php echo base_url('home');?>">
<meta property="og:type" content="website">
<meta property="og:title" content="PEMDES | <?php echo $desa;?>">
<meta property="og:description" content="Web Informasi PILKADES <?php echo $sis_pem . ' '. $desa . ' Kecamatan '. $kec . ' '. $sis_kabkot . $kabkot;?>">
<meta property="og:image" content="<?php echo base_url();?>assets/img/kegiatan/400/02029138-5e62-40b9-bdca-97cefed55e8c.jpg">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="PEMDES | <?php echo $desa;?>">
<meta name="twitter:description" content="Web Informasi PILKADES <?php echo $sis_pem . ' '. $desa . ' Kecamatan '. $kec . ' '. $sis_kabkot . $kabkot;?>">
<meta name="twitter:image" content="<?php echo base_url();?>assets/img/kegiatan/400/02029138-5e62-40b9-bdca-97cefed55e8c.jpg">
	
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<link href="<?php echo base_url();?>themes/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>themes/plugins/font-awesome/css/all.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>themes/plugins/animate/animate.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>themes/plugins/fancybox-master/dist/jquery.fancybox.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>themes/frontend/css/one-page-parallax/style.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>themes/frontend/css/one-page-parallax/style-responsive.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>themes/frontend/css/one-page-parallax/theme/default.css" id="theme" rel="stylesheet" />
<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo/'.$logo_fav);?>">

<script src="<?php echo base_url();?>themes/plugins/pace/pace.min.js"></script>
</head>
<body data-spy="scroll" data-target="#header" data-offset="51">
		<?php if($data_pemilih->num_rows()>0){ ?>
		<div id="cek_pemilih" class="content bg-silver-lighter" data-scrollview="true">
			<!-- begin container -->
			<div class="container">
				<h2 class="content-title">Cek Data Pemilih</h2>
				<p class="content-desc">
					Pastikan anda terdaftar sebagai pemilih, isikan NIK KTP dan ENTER
				</p>
				<div class="row">
					<div class="col-md-4 form-col" data-animation="true" data-animation-type="fadeInRight">
						<form id="form_cek" autocomplete="off" action="<?php echo base_url('home/cek_pemilih');?>" class="form-horizontal" method="POST">
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3 text-md-right">NIK <span class="text-theme">*</span></label>
								<div class="col-md-9">
									<input type="text" class="form-control form-control-lg" placeholder="NIK KTP" name="nik_ktp" />
								</div>
							</div>
							<div id="data_cecker"></div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3 text-md-right"></label>
								<div class="col-md-9 text-left">
									<button id="btn_form" type="submit" class="btn btn-theme btn-block">Cek Data</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-8" data-animation="true" data-animation-type="fadeInLeft">
						<h3><b>Data Pemilih Sementara Pemutakhiran Data <?php echo date('Y') ?></b></h3>
						<table class="table">
							<thead>
								<tr>
									<td><b>NO</b></td>
									<td><b>DUSUN</b></td>
									<td class="text-right"><b>LAKI-LAKI</b></td>
									<td class="text-right"><b>PEREMPUAN</b></td>
									<td class="text-right"><b>JUMLAH</b></td>
								</tr>
							</thead>
							<tbody>
								<?php 
									
									$i=1;	$tot_p=0;$tot_l=0;$total=0;
									foreach ($data_pemilih->result_array() as $key => $value) { ?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $value['dusun'];?></td>
									<td class="text-right"><?php echo number_format($value['jml_lk']);?></td>
									<td class="text-right"><?php echo number_format($value['jml_pr']);?></td>
									<td class="text-right"><?php echo number_format($value['jumlah']);?></td>
								</tr>
							<?php 
								$tot_p +=$value['jml_pr'];
								$tot_l +=$value['jml_lk'];
								$total +=$value['jumlah'];
								$i++; 
							} ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="2" class="text-right"><b>TOTAL</td>
									<td class="text-right"><b><?php echo number_format($tot_l);?></b></td>
									<td class="text-right"><b><?php echo number_format($tot_p);?></b></td>
									<td class="text-right"><b><?php echo number_format($total);?></b></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if($berkas->num_rows()>0){ ?>
		<?php } ?>
		<?php if($dok_kegiatan->num_rows()>0){ ?>
		<?php } ?>
		<div id="footer" class="footer">
			<div class="container">
				<div class="footer-brand">
					<div class=""><img src="<?php echo base_url('assets/img/logo/'.$logo_kab);?>"  alt="icon-kabupaten-<?php echo strtolower($kabkot);?>" width="80px"></div>
					<?php echo $desa;?>
				</div>
				<p>
					&copy; Copyright Pemutakhiran Data <?php echo $desa;?>
				</p>
				<p class="social-list">
					<a href="#"><i class="fab fa-facebook-f fa-fw"></i></a>
					<a href="#"><i class="fab fa-instagram fa-fw"></i></a>
					<a href="#"><i class="fab fa-twitter fa-fw"></i></a>
					<a href="#"><i class="fab fa-youtube fa-fw"></i></a>
				</p>
			</div>
		</div>
		
	</div>
	
	<script src="<?php echo base_url();?>themes/plugins/jquery/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url();?>themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url();?>themes/plugins/js-cookie/js.cookie.js"></script>
	<script src="<?php echo base_url();?>themes/plugins/scrollMonitor/scrollMonitor.js"></script>
	<script src="<?php echo base_url();?>themes/plugins/paroller/jquery.paroller.min.js"></script>
	<script src="<?php echo base_url();?>themes/plugins/fancybox-master/dist/jquery.fancybox.min.js"></script>
	<script src="<?php echo base_url();?>themes/frontend/js/one-page-parallax/apps.min.js"></script>
	<script>    
		$(document).ready(function() {
			App.init();
		});
	</script>
	<script type="text/javascript">
		$(document).on('submit', '#form_cek', function(e){
			var form = $("#form_cek");
			var btn = $("#btn_form");

		    $("#data_cecker").empty();
		    btn.html('<i class="fa fa-spinner fa-spin text-center"></i>');
		    btn.attr('disabled', true);
			e.preventDefault();
			$.post(form.attr('action'), form.serialize(), function(json){
				if(json.sts==true){
					$("#data_cecker").html(json.data);
				}else{
					$("#data_cecker").html(json.msg);
				}

	        btn.removeAttr('disabled');

				btn.html('Cek Data');
			},'json');
			return false;
		});
	</script>
</body>
</html>
