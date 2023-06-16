<!DOCTYPE html>
<html>
<head>
  <title>Cetak ID Card</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    .id-card {
      border: 1px solid #ccc;
      padding: 20px;
      width: 300px;
    }
    .id-card img {
      width: 100%;
    }
    .id-card .name {
      font-size: 18px;
      font-weight: bold;
      margin-top: 10px;
    }
    .id-card .job-title {
      font-size: 14px;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="id-card">
          <img src="foto_karyawan/Update-Bonita-123.jpg" alt="ID Card">
          <div class="name">John Doe</div>
          <div class="job-title">Web Developer</div>
        </div>
        <button class="btn btn-primary mt-3" onclick="printIDCard()">Cetak</button>
      </div>
    </div>
  </div>

  <script>
    function printIDCard() {
      window.print();
    }
  </script>
</body>
</html>
