<?php 
	$cfg 	            = $this->Cfg->get_data();
	$scripts          = array();
	$data['title'] 	= 'Dashboard Perhitungan Cepat'; 
	$this->load->view('themes/admin/Header', $data);
?>
<style>
   border-radius: 5px;
   cursor: pointer;
   transition: 0.3s;
   }

   #myImg:hover {
      opacity: 0.7;
   }

   /* The Modal (background) */
   .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      padding-top: 100px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.9);
      /* Black w/ opacity */
   }

   /* Modal Content (image) */
   .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
   }

   /* Caption of Modal Image */
   #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
   }

   /* Add Animation */
   .modal-content,
   #caption {
      -webkit-animation-name: zoom;
      -webkit-animation-duration: 0.6s;
      animation-name: zoom;
      animation-duration: 0.6s;
   }

   @-webkit-keyframes zoom {
      from {
         -webkit-transform: scale(0)
      }

      to {
         -webkit-transform: scale(1)
      }
   }

   @keyframes zoom {
      from {
         transform: scale(0)
      }

      to {
         transform: scale(1)
      }
   }

   /* The Close Button */
   .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
   }

   .close:hover,
   .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
   }

   /* 100% Image Width on Smaller Screens */
   @media only screen and (max-width: 700px) {
      .modal-content {
         width: 100%;
      }
   }
</style>
<div id="page-loader" class="fade show"><span class="spinner"></span></div>
<div id="header" class="header navbar-inverse">
   <div class="navbar-header">
      <a href="<?php echo base_url();?>" class="navbar-brand"><span class="navbar-logo"></span> <b>Pemutakhiran </b>
         <?php echo $cfg['desa'];?></a>
      <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </button>
   </div>
   <ul class="navbar-nav navbar-right">
   </ul>
</div>
<div class="container">
   <div class="widget bg-silver widget-rounded m-b-30 m-t-20">
      <div class="widget-header">
         <h3 class="widget-header-title text-indigo">QuickCOUNT Pemutakhiran 
            <span class="text-muted pull-right f-s-12">Penetapan keputusan berdasarkan penghitungan plano panitia
               Pemutakhiran </span></h3>
      </div>
      <div class="p-20 p-t-0">
         <?php foreach ($calon->result_array() as $key => $value) {  ?>
         <div class="row align-items-center p-b-1">
            <div class="col-lg-3 col-md-5 col-xs-12">
               <div class="row">
                  <div class="col-3 p-10">
                     <img id="myImg" src="<?php 
                                    $src = base_url('assets/img/user/c'. $value['nomor'] .'.png'); 
                                    if($value['photo']!=""){
                                       $src = base_url('assets/img/calon/80/'. $value['photo']); 
                                    }
                                    echo $src;
                                    ?>" width="width:100%;max-width:300px">
                  </div>
                  <div class="col-9 p-10">
                     <div class="text-truncate"><?php echo $value['nomor'];?></div>
                     <div class="text-truncate text-primary m-b-2 f-s-14 f-w-700"><?php echo $value['nama_calon'];?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-9 col-md-7 col-xs-12">
               <div class="row">
                  <?php foreach ($dapil->result_array() as $ky => $row) { ?>
                  <div class="col p-10">
                     <div class="m-b-2 text-truncate"><?php echo substr($row['dapil'],0,7);?>
                        <div class="ml-2 f-s-11 f-w-700 width-40 text-indigo pull-right text-right"><span
                              id="rest<?php echo $value['id'].$row['id'];?>"></span>%</div>
                     </div>
                     <div class="d-flex pull-right m-b-2">
                        <div class="text-green f-s-16 f-w-700 m-b-0 text-right text-truncate"
                           id="show_info<?php echo $value['id'].$row['id'];?>">-</div>
                     </div>
                  </div>
                  <?php } ?>
                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 p-10">
                     <div class="m-b-2 text-truncate">Perolehan
                        <div class="ml-2 f-s-11 f-w-700 width-40 text-indigo pull-right text-right"><span
                              id="rest_tot<?php echo $value['id'];?>"></span>%</div>
                     </div>
                     <div class="d-flex pull-right m-b-2">
                        <div class="text-green f-s-16 f-w-700 m-b-0 text-truncate text-right"
                           id="show_info_tot<?php echo $value['id'];?>">-</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <hr class="bg-black-transparent-2 m-t-2 m-b-2">
         <?php } ?>
         <span class="col m-t-5">app Pemutakhiran  ini dikembangkan oleh warga <span class="pull-right">Data akan direfresh
               <span id="second_n">20</span> detik</span></span>
      </div>
   </div>
</div>
</div>
<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
      class="fa fa-angle-up"></i></a>
<script src="<?php echo base_url();?>themes/plugins/jquery/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo base_url();?>themes/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/js-cookie/js.cookie.js"></script>
<script src="<?php echo base_url();?>themes/js/theme/default.min.js"></script>
<script src="<?php echo base_url();?>themes/js/apps.min.js"></script>

<script src="<?php echo base_url();?>themes/plugins/sweetalert/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/d3/d3.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/nvd3/build/nv.d3.js"></script>
<script src="<?php echo base_url();?>themes/plugins/gritter/js/jquery.gritter.js"></script>
<script src="<?php echo base_url();?>themes/plugins/isotope/jquery.isotope.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/lightbox/js/lightbox.min.js"></script>
<script src="<?php echo base_url();?>assets/js/gallery.demo.js"></script>
<script>
   $(document).ready(function () {
      App.init();
      Gallery.init();
   });
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
<script src="<?php echo base_url();?>assets/js/jquery.number.js"></script>
<script src="<?php echo base_url();?>assets/js/d_hitung.js"></script>
</body>

</html>