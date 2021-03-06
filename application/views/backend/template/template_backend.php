<?php
    $userAktif= $this->M_Auth->detail($this->session->userdata('user_id'));
    $site = $this->M_Konfigurasi->get();
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?=base_url('assets/uploads/logo/'.$site->icon) ?>" rel="shortcut icon">
    <title><?=$title?></title>
    <!-- <link href="" rel="shortcut icon"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/fontawesome/css/all.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css'); ?>" />

    <!-- JS -->
  
   <script src="<?=base_url('assets/tinymce/js/tinymce/tinymce.min.js')?>"></script>
   <script>
   tinymce.init({
      selector:'#tinymce',
      height:800,
      plugins: [
			 "advlist autolink lists link image charmap print preview hr anchor pagebreak",
			 "searchreplace wordcount visualblocks visualchars code fullscreen",
			 "insertdatetime nonbreaking save table contextmenu directionality",
			 "emoticons template paste textcolor colorpicker textpattern"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager",
		automatic_uploads: true,
		image_advtab: true,
		images_upload_url: "<?php echo base_url("Tinymce/tinymce_upload")?>",
		file_picker_types: 'image', 
		paste_data_images:true,
		relative_urls: false,
		remove_script_host: false,
		  file_picker_callback: function(cb, value, meta) {
			 var input = document.createElement('input');
			 input.setAttribute('type', 'file');
			 input.setAttribute('accept', 'image/*');
			 input.onchange = function() {
				var file = this.files[0];
				var reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function () {
				   var id = 'post-image-' + (new Date()).getTime();
				   var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
				   var blobInfo = blobCache.create(id, file, reader.result);
				   blobCache.add(blobInfo);
				   cb(blobInfo.blobUri(), { title: file.name });
				};
			 };
			 input.click();
		  }
      });

      tinymce.init({
         selector: '#konfigurasi1',
         height: 300
      });

      tinymce.init({
         selector: '#konfigurasi2',
         height: 200
      });

      tinymce.init({
         selector: '#konfigurasi3',
         height: 300
      });

      tinymce.init({
         selector: '#konfigurasi4',
         height: 300
      });
   
   </script>

  
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav-atas">
      <div class="container-fluid">
      <button type="button" id="sidebarCollapse" class="btn btn-info">
         <i class="fas fa-align-left"></i>
      </button>
      <a href="#" class="navbar-brand menu-item"><?=$site->namaweb?></a>
         <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
               <li class="nav-item ">
                  <a class="nav-link btn btn-info text-white menu-icon" href="<?=base_url('myprofil')?>">  <i class="fas fa-user-tie"></i><span class="ml-2"><?=$userAktif->nama??''?></span></a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link btn btn-success text-white menu-icon" href="<?=base_url()?>" target="blank"><i class="fas fa-home"></i><span class="ml-2">HomePage</span></a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link btn btn-danger text-white menu-icon" href="<?=base_url('logout_u');?>"><i class="fas fa-sign-out-alt"></i><span class="ml-2">Logout</span></a>
               </li> 
            </ul>
         </div>
      </div>
   </nav>


   <!-- Sidebar -->
    <nav id="sidebar">
         <ul class="list-unstyled">
         <?php if ($userAktif->status == 'superadmin'): ?>
            <li>
               <a href="<?=base_url('dashboard-web');?>" class="<?=menuAktif('dashboard')?>">
                  <i class="fas fa-tachometer-alt fa-fw"></i><span class="ml-3">DASHBOARD</span>
               </a>
            </li>


            <li>
               <a href="#artikel" data-toggle="collapse" class="dropdown-toggle <?= ($this->uri->segment(1) == 'list-berita' || $this->uri->segment(1) == 'list-kategori' ) ? 'active' :''; ?>" aria-expanded="false">
                  <i class="fas fa-newspaper"></i><span class="ml-3">BERITA</span>
               </a>
               <ul class="collapse list-unstyled" id="artikel">
                  <li>
                        <a href="<?=base_url('kategori-berita');?>" class="<?=menuAktif('k_berita')?>">
                           <i class="fa fa-tags"></i><span class="ml-3">KATEGORI BERITA</span>
                        </a>
                  </li>
                  <li>
                        <a href="<?=base_url('list-berita');?>" class="<?=menuAktif('berita')?>">
                           <i class="fas fa-list"></i><span class="ml-3">BERITA</span>
                        </a>
                  </li>
               </ul>
            </li>

            <li>
               <a href="<?=base_url('list-katalog');?>" class="<?=menuAktif('katalog')?>">
                  <i class="fas fa-seedling"></i><span class="ml-3">KATALOG SPESIES</span>
               </a>
            </li>

            <li>
               <a href="<?=base_url('list-admin');?>" class="<?=menuAktif('admin')?>">
                  <i class="fas fa-user-cog"></i><span class="ml-3">USER</span>
               </a>
            </li>

            <li>
               <a href="<?=base_url('list-banner');?>" class="<?= menuAktif('banner')?>">
                  <i class="fas fa-flag"></i><span class="ml-3">BANNER</span>
               </a>
            </li>


            <li>
               <a href="<?=base_url('konfigurasi-web');?>" class="<?=menuAktif('konfigurasi')?>">
                  <i class="fas fa-tools"></i><span class="ml-3">KONFIGURASI</span>
               </a>
            </li>
         <?php endif; ?>

         <?php if ($userAktif->status == 'admin'): ?>
            <li>
               <a href="<?=base_url('dashboard-web');?>" class="<?=menuAktif('dashboard')?>">
                  <i class="fas fa-tachometer-alt fa-fw"></i><span class="ml-3">DASHBOARD</span>
               </a>
            </li>

            <li>
                  <a href="<?=base_url('list-berita');?>" class="<?=menuAktif('berita')?>">
                     <i class="fas fa-list"></i><span class="ml-3">BERITA</span>
                  </a>
            </li>

            <li>
               <a href="<?=base_url('list-katalog');?>" class="<?=menuAktif('katalog')?>">
                  <i class="fas fa-seedling"></i><span class="ml-3">KATALOG SPESIES</span>
               </a>
            </li>
         <?php endif; ?>


        </ul>
    </nav>
    <!-- /Sidebar -->

         
      <!-- CONTENT -->
      <div id="content">   
         <?php 
            if($isi){
               $this->load->view($isi);
            }else{
               echo "
                  <h1>Data Masih Kosong </h1>
               ";
            }
         ?>   
      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="<?= base_url('assets/js/jquery-3.5.1.min.js');?>"></script>
    <script src="<?=base_url('assets/js/popper.min.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('assets/DataTables/datatables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script>
       //  CKEDITOR
      //  var editor = CKEDITOR.replace('editor',{
      //     height : 1200
      //  });
      //  CKFinder.setupCKEditor(editor);

      //  var editor2 = CKEDITOR.replace('editor2', {
      //     height: 800
      //  });
      //  CKFinder.setupCKEditor(editor2);


      //FILE BROWSER 
       $('document').ready(function(){
         $('#table').DataTable();

         $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            // SIDEBAR
          $('#sidebarCollapse').click(function(){
             $('#sidebar').toggleClass('active');
             $('#content').toggleClass('active');
          });
       });
    </script>
  </body>
</html>