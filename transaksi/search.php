<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.7/jquery.autocomplete.min.js"></script>


<style>
   .autocomplete-suggestions {
       border: 1px solid #999;
       background: #FFF;
       overflow: auto;
   }
   .autocomplete-suggestion {
       padding: 2px 5px;
       white-space: nowrap;
       overflow: hidden;
   }
   .autocomplete-selected {
       background: #F0F0F0;
   }
   .autocomplete-suggestions strong {
       font-weight: normal;
       color: #3399FF;
   }
   .autocomplete-group {
       padding: 2px 5px;
   }
   .autocomplete-group strong {
       display: block;
       border-bottom: 1px solid #000;
   }
</style>



<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand text-white" href="index.php">
    Dewan Komputer
  </a>
</nav>
 
<div class="container">
  <h3 align="center" class="mt-3 mb-5">Cara Membuat Autocomplete dengan Plugin pada PHP</h3>
  <div class="row">
    <div class="col-sm-6 offset-sm-3">
      <label>Nama Provinsi</label>  
      <input type="text" name="provinsi" id="provinsi" class="form-control" placeholder="Tulis Nama Provinsi Indonesia" />  
    </div>
  </div>
</div>
 
<div class="fixed-bottom text-center mt-5">© <?php echo date('Y'); ?> Copyright:
  <a href="https://dewankomputer.com/"> Dewan Komputer</a>
</div>



 <script type="text/javascript">
      $(document).ready(function() {
        $( "#provinsi" ).autocomplete({
          serviceUrl: "search.php",   // Kode php untuk prosesing data
          dataType: "JSON",           // Tipe data JSON
          onSelect: function (suggestion) {
              $( "#provinsi" ).val(suggestion.nama);
          }
        });
      })
  </script>


<?php 
  header("Content-Type: application/json; charset=UTF-8");
  include 'koneksi.php';
  
  if(isset($_GET["query"])){
    $key = "%".$_GET["query"]."%";
    $query = "SELECT * FROM provinsi WHERE nama LIKE ? LIMIT 10";
    $dewan1 = $db1->prepare($query);
    $dewan1->bind_param('s', $key);
    $dewan1->execute();
    $res1 = $dewan1->get_result();
 
    while ($row = $res1->fetch_assoc()) {
        $output['suggestions'][] = [
            'value' => $row['nama'],
            'nama'  => $row['nama']
        ];
    }
 
    if (! empty($output)) {
        echo json_encode($output);
    }
  }
?>

