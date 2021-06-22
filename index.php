<?php
require_once('config.php');
$db = new Config();
$test = $db->runQuery("SELECT * FROM datates");
$reg = $db->runQuery("SELECT * FROM datates ORDER BY regional ASC");
$kab = $db->runQuery("SELECT * FROM datates ORDER BY kabupaten ASC");
$type = $db->runQuery("SELECT * FROM datates ORDER BY types ASC");
$t = $db->runQuery("SELECT SUM(T) AS T FROM datates ORDER BY id");
$r = $db->runQuery("SELECT SUM(R) AS R FROM datates ORDER BY id");
$a = $db->runQuery("SELECT SUM(A) AS A FROM datates ORDER BY id");
$tm = $db->runQuery("SELECT SUM(Tmonth) AS T FROM datates ORDER BY id");
$rm = $db->runQuery("SELECT SUM(Rmonth) AS R FROM datates ORDER BY id");
$am = $db->runQuery("SELECT SUM(Amonth) AS A FROM datates ORDER BY id");
$ty = $db->runQuery("SELECT SUM(Tyear) AS T FROM datates ORDER BY id");
$ry = $db->runQuery("SELECT SUM(Ryear) AS R FROM datates ORDER BY id");
$ay = $db->runQuery("SELECT SUM(Ayear) AS A FROM datates ORDER BY id");
?>
<html >
<head>
  <meta charset="UTF-8">
  <title>Test Telkom</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/rwd.table.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>
  <h2>Test Nomor 5</h2>
<div class="container">
  <div class="row mb-3">
    <div class="col-sm-12"><h4>Cari</h4></div>
    <div class="col-sm-3">
        <div class="form-group form-inline">
            <label>Regional</label>
            <select name="s_jurusan" id="s_jurusan" class="form-control">
                <option value=""></option>
                <option value="Regional 5">Regional 5</option>
                <option value="Regional 6">Regional 6</option>
                <option value="Regional 7">Regional 7</option>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group form-inline">
            <label>Keyword</label>
            <input type="text" name="s_keyword" id="s_keyword" class="form-control">
        </div>
    </div>
    <div class="col-sm-4">
        <button id="search" name="search" class="btn btn-warning"><i class="fa fa-search"></i> Cari</button>
    </div>
</div>
</div>
 
<div class="data"></div>
<body>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-bordered table-hover display nowrap">
          <thead>
            <tr>
              <th data-priotity="1" rowspan="2" class="center"><p> LOKASI</p></th>
              <th data-priority="2" colspan="3">HARI INI</th>
              <th data-priority="3" colspan="3">BULAN</th>
              <th data-priority="4" colspan="3">TAHUN</th>
            </tr>
            <tr>
              <th>T<th>R<th>A</th>
              <th>T<th>R<th>A</th>
              <th>T<th>R<th>A</th>
            </tr>
          </thead>
           <?php
            if (isset($_GET['regional'])) {
                $unit_kerja=trim($_GET['regional']);
                
                //menampilkan pegawai berdasarkan unit kerja yang dipilih pada combobox
                $tamPeg=mysqli_query($conn, "SELECT * FROM datates WHERE regional='$regional' ORDER BY id ASC");
            
                $no=0;
                while ($tpeg = mysqli_fetch_array($tamPeg)) {
                $no++;
                ?>
            <?php } ?>
            <?php } ?>
          <tbody>
            <tr>
              <?php foreach($test as $row) {?>
              <td><?php echo $row['kabupaten']; ?></td>
              <td><?php echo $row['T']; ?></td>
              <td><?php echo $row['R']; ?></td>
              <td><?php echo $row['A']; ?></td>
              <td><?php echo $row['Tmonth']; ?></td>
              <td><?php echo $row['Rmonth']; ?></td>
              <td><?php echo $row['Amonth']; ?></td>
              <td><?php echo $row['Tyear']; ?></td>
              <td><?php echo $row['Ryear']; ?></td>
              <td><?php echo $row['Ayear']; ?></td>
            </tr>
            <?php }?>
            <tr>
              <td>TOTAL</td>
              <td><?php echo json_encode($t)?></td>
              <td><?php echo json_encode($r)?></td>
              <td><?php echo json_encode($a)?></td>
              <td><?php echo json_encode($tm)?></td>
              <td><?php echo json_encode($rm)?></td>
              <td><?php echo json_encode($am)?></td>
              <td><?php echo json_encode($ty)?></td>
              <td><?php echo json_encode($ry)?></td>
              <td><?php echo json_encode($ay)?></td>
            </tr>
          </tbody>
      </div><!--end of .table-responsive-->
        </table>
    </div>
  </div>
</div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/rwd-table-patterns.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
