
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
 * using mysqli_connect for database connection
 */
date_default_timezone_set("Asia/Jakarta");
$databaseHost       = 'localhost';
$databaseName       = 'ummroom';
$databaseUsername   = 'phpmyadminuser';
$databasePassword   = 'password';
$db = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <title>UMMroom</title>
  </head>
  <body>

<div id="app" class="container">
  <div class="p-2">
    <a href="main.html" class="btn btn-danger"><i class="   fa fa-arrow-circle-o-left"></i> UMMroom</a>
  </div>
  <div class="my-5 text-center">Simulasi Sensor PIR</div>
  <div class="p-2 rounded shadow">
        <div class="p-4 my-2 border border-success rounded">* jika ON maka sensor <b>PIR</b> mendeteksi adanya orang.<br>* jika di setting OFF maka sensor <b>PIR</b> tidak mendeteksi adanya orang.<br>* Data akan dikirim ke Database dengan kondisi boolean (jika 1 = sensor mendeteksi, jika 0 = Sensor tidak mendeteksi)</div>
    <form action=""></form>
    <?php

    $sql = "SELECT * FROM room";
    $res = $db->query($sql);

    while ($data = $res->fetch_array()) {?>

    <div class="row m-1">
      <div class="col-2">Ruang <?php echo $data[1]; ?></div>
      <div class="col-10">
        <?php
          if ($data[2] == 1) {
            echo '<a href="update.php?id='.$data[0].'&s=0" class="btn btn-danger"> Off</a>';
          }else{
            echo '<a href="update.php?id='.$data[0].'&s=1" class="btn btn-success"> On</a>';
          }
        ?>

      </div>
    </div>
    <?php }?>



  </div>
</div>
<div class="p-5 text-center" style="font-size: 12px">Builth with <i class="fa fa-heart text-danger"></i> | 
  Powered By <span class="text-danger"><b>@fazaio</b></span> | 2019
</div>
</body>
</html>

<!-- 
<script>
  new Vue({
  el: '#app',
  data: {
    s416: '',
    s417: '',
    s418: '',
    s419: '',
    s526: '',
    s528a: '',
    s528b: '',
    s530: ''
  },
  methods: {
    getData: function() {
      var vm = this;
      axios.get('data.php').then(function(response) {
        var res = response.data
      }, function(error) {
        console.log(error.statusText);
      });
    },
    send: function(){
      axios.get('data.php?').then(function(response) {
        var res = response.data
      }, function(error) {
        console.log(error.statusText);
      });
    }
  },
  mounted: function() {
    this.getData();
  }
})
</script> -->