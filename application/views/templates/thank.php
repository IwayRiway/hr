<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>RRI -- HRIS</title>

    <style>
      .outer {
        display: table;
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
      }

      .middle {
        display: table-cell;
        vertical-align: middle;
      }

      .inner {
        margin-left: auto;
        margin-right: auto;
        width: 90%;
        /*whatever width you want*/
      }
    </style>
  </head>
  <body>
    <div class="container">
       <div class="outer">
        <div class="middle">
          <div class="inner">
            <div class="row ">
          <div class="col-sm-12 d-flex justify-content-center">
             <img src="<?=base_url('assets/img/tq.png')?>" alt="" width="20%">
          </div>
          <div class="col-sm-12  d-flex justify-content-center">
            <h4 class="mt-3">Terima Kasih</h4>
          </div>
          <div class="col-sm-12  d-flex justify-content-center text-center">
            <h6>Terima kasih telah mengkonfirmasi pengajuan tersebut.<br>Data berhasil disimpan dalam database.</h6>
          </div>
       </div
          </div>
        </div>
      </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>