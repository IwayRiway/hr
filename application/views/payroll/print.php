<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
       .hr-tebal{
          margin-top:0px;
          border : 1px solid black;
       }

       .no-margin-top{
          margin-top : -10px;
       }

       .border{
          padding : 5px;
          border : 3px solid black !important;
       }
    </style>
    <title>Slip Gaji</title>
  </head>
  <body>
    <div class="row">
       <div class="col"><h6>PT LOREM IPSUM</h6></div>
       <div class="col text-right"><h6>SLIP GAJI</h6></div>
   </div>
      
   <hr class="hr-tebal">

   <div class="row">
       <div class="col-6">
         <div class="row">
            <div class="col-sm-2"><p>Nama</p></div>
            <div class="col-sm-8"><p><strong>: <?=$karyawan['nama']?></strong></p></div>
         </div>
         <div class="row no-margin-top">
            <div class="col-sm-2"><p>Jabatan</p></div>
            <div class="col-sm-8"><p><strong>: <?=$karyawan['jabatan']?></strong></p></div>
         </div>
         <div class="row no-margin-top">
            <div class="col-sm-2"><p>Department</p></div>
            <div class="col-sm-8"><p><strong>: <?=$karyawan['department']?></strong></p></div>
         </div>
       </div>
   </div>
   
   <hr>
   <div class="row">
      <div class="col-sm-6">
       <h6><strong>PENERIMAAN</strong></h6>
       <hr>
         <div class="row">
            <div class="col-sm-6"><p>Gaji Pokok</p></div>
            <div class="col-sm-6 text-right"><p><strong>: IDR <?=$gaji['gaji_pokok']??0?></strong></p></div>
         </div>
         <div class="row no-margin-top">
            <div class="col-sm-6"><p>Tunjangan Jabatan</p></div>
            <div class="col-sm-6 text-right"><p><strong>: IDR <?=$gaji['tunjangan_jabatan']??0?></strong></p></div>
         </div>
         <div class="row no-margin-top">
            <div class="col-sm-6"><p>Tunjangan Transport</p></div>
            <div class="col-sm-6 text-right"><p><strong>: IDR <?=$gaji['tunjangan_transport']??0?></strong></p></div>
         </div>
         <div class="row no-margin-top">
            <div class="col-sm-6"><p>Tunjangan Lain</p></div>
            <div class="col-sm-6 text-right"><p><strong>: IDR <?=$gaji['tunjangan_lain']??0?></strong></p></div>
         </div>
      </div>

      <div class="col-sm-6">
         <h6><strong>POTONGAN</strong></h6>
         <hr>
            <div class="row">
               <div class="col-sm-6"><p>Potongan Pinjaman</p></div>
               <div class="col-sm-6 text-right"><p><strong>: IDR <?=$potongan['potongan_pinjaman']??0?></strong></p></div>
            </div>
            <div class="row no-margin-top">
               <div class="col-sm-6"><p>Potongan Absen</p></div>
               <div class="col-sm-6 text-right"><p><strong>: IDR <?=$potongan['potongan_absen']??0?></strong></p></div>
            </div>
            <div class="row no-margin-top">
               <div class="col-sm-6"><p>Potongan Lain</p></div>
               <div class="col-sm-6 text-right"><p><strong>: IDR <?=$potongan['potongan_lain']??0?></strong></p></div>
            </div>
      </div>
   </div>
   <hr>
   <div class="row">
      <div class="col-sm-6">
         <div class="row">
            <div class="col-sm-6"><strong><p>Total Penerimaan</p></strong></div>
            <div class="col-sm-6 text-right"><p><strong>: IDR <?=($gaji['gaji_pokok']??0) + ($gaji['tunjangan_jabatan']??0) + ($gaji['tunjangan_transport']??0) + ($gaji['tunjangan_lain']??0)?></strong></p></div>
         </div>
      </div>
      <div class="col-sm-6">
         <div class="row">
            <div class="col-sm-6"><strong><p>Total Potongan</p></strong></div>
            <div class="col-sm-6 text-right"><p><strong>: IDR <?=($potongan['potongan_pinjaman']??0) + ($potongan['potongan_absen']??0) + ($potongan['potongan_lain']??0)?></strong></p></div>
         </div>
      </div>
   </div>
   <hr>
   <div class="row">
      <div class="col-sm-6">
         <div class="row">
            <div class="col-sm-6"><strong><p>Take Home Pay</p></strong></div>
            <div class="col-sm-6 text-right"><p><strong class='border'>: IDR <?=(($gaji['gaji_pokok']??0) + ($gaji['tunjangan_jabatan']??0) + ($gaji['tunjangan_transport']??0) + ($gaji['tunjangan_lain']??0)) - (($potongan['potongan_pinjaman']??0) + ($potongan['potongan_absen']??0) + ($potongan['potongan_lain']??0))?></strong></p></div>
         </div>
      </div>
      <div class="col-sm-6">
         <div class="row">
            <div class="col-sm-6"><strong><p></p></strong></div>
            <div class="col-sm-6 text-right"><p><strong>Jakarta, <?=date('d-m-Y')?></strong></p></div>
         </div>
      </div>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
      //  window.print();
    </script>
  </body>
</html>