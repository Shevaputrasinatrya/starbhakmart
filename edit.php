<?php
session_start();
require 'koneksi.php';

$id = $_GET['id'];
$barang = query(
    "SELECT * FROM stockbarang WHERE id = $id"
)[0];
if (isset($_POST['submit'])) {
    if (updateAdmin($_POST) > 0) {
        header('Location: tampil.php');
    }else{

    }
}
?>


<!doctype html>
<html lang="en">

  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <!-- Required meta tags -->
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    

    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <!-- j -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <style>
    a {
        color: inherit;
        text-decoration: none;
    }

    .head {
        width: 100%;
        padding-left: 40px;
        padding-right: 40px;
        box-shadow: 2px 2px 8px #FA8231;
        margin-bottom: 30px;
        background: #f1f2f6;
    }

    .head:after {
        content: '';
        display: block;
        clear: both;
    }

    .mart {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-weight: bold;
        float: left;
        margin-top: 5px;
        padding-top: 13px;
        padding-left: 3px;
        font-size: 43px;
        color: #FA8231;
    }

    .head h1 {
        position: relative;
        font-weight: bold;
        font-size: 3vw;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        float: left;
        color: #f1f2f6;
        padding-top: 20px;
        margin-top: 5px;
        -webkit-text-stroke: 0.3vw;
    }

    .head h1:before {
        font-weight: bold;
        content: attr(data-text);
        position: absolute;
        width: 0;
        height: 45px;
        color: #227093;
        -webkit-text-stroke: 0vw #dcdde1;
        border-right: 2px solid #227093;
        overflow: hidden;
        animation: animate 6s linear infinite;
        margin-left: 50px;
    }

    @keyframes animate {

        0%,
        10%,
        100% {
            width: 0;
        }

        50%,
        70% {
            width: 78%;
        }
    }

    h1 svg {
        margin-bottom: 20px;
        color: #227093;
    }

    header ul {
        float: right;
        margin-top: 10px;
    }

    header ul li {
        display: inline-block;
    }

    header ul li a {
        padding: 25px 20px;
        display: inline-block;
        font-weight: bold;
        text-decoration: none;
    }

    header ul li a:hover {
        background-color: #227093;
        color: #fff;
        text-decoration: none;
    }

    .container h2 {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      font-size: 40px;
      padding-top: 50px;
  }

  .container hr {
      background-color: #FA8231;
  }

  .card-header {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: white;
            width: 1091px;
            background-color:  #227093;
    }

    label {
        font-family: 'Times New Roman', Times, serif;
    }

    .form-group button {
          margin-left: 95%;
          width: 100px;
          background-color: #227093;
    }

    .card {
        box-shadow: 2px 2px 8px #FA8231;
        margin-bottom: 70px;
    }

    footer {
          height: 90px;
          background-color: #227093;
          padding-top: 20px;
          font-size: 20px
    }       
    </style>

</style>
<title>Hoodie Strore</title>
</head>

<body>
<header>
    <div class="head">
      <h1 data-text="Starbhak"><svg width="1em" height="1em" viewBox="0 0 16 16"
        class="bi bi-building" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694L1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
        <path
          d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
      </svg> Starbhak</h1>
        <p class="mart">Mart</p>
      <ul>
        <li><a href="index.php">User</a></li>
        <li><a href="tampil.php">Admin</a></li>
      </ul>
    </div>
  </header>

    <div class="container-fluid">
        <div class="row">
            <div class="container" style="margin-top:20px">

            <div class="container">
            <div class="card">
                <h4 class="card-header text-black text-center">Form Edit Data Barang</h4>

            <div class="card-body">
                <form action="" method="POST">
                <input type="text" hidden name="id" value="<?= $barang['id'] ?>">
                    <div class="form-group row justify-content-center">
                        <label for="" class="col-sm-3 col-form-label">Link Gambar</label>
                        <div class="col-sm-6">
                        <input type="text" name="gambar" class="col-md-9" placeholder="Masukkan link gambar" value="<?= $barang['gambar'] ?>">
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="" class="col-sm-3 col-form-label">Nama Barang</label>
                        <div class="col-sm-6">
                        <input type="text" name="nama" class="col-md-9" value="<?= $barang['nama'] ?>">
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="" class="col-sm-3 col-form-label">Stock</label>
                        <div class="col-sm-6">
                        <input type="text" name="stock" class="col-md-9" value="<?= $barang['stock'] ?>">
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="" class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-6">
                        <input type="text" name="harga" class="col-md-9" value="<?= $barang['harga'] ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row justify-content-center">
                        <div class="col-sm-9">
                            <button class="btn mt-5 mb-5 text-white fw-bold" type="submit" name="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
     </div>
        </div>
    </div>
</div>

    <footer class="page-footer font-small mt-1">
    <div class="footer-copyright text-center text-white py-3"> <i class="fas fa-store"></i>
      </svg>Starbhak Mart</div>
  </footer>



    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>