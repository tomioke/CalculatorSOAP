<?php
  // Include file library nusoap
  require 'lib/nusoap.php'; 

  // Membuat instance object dari soap client ke client
  $wsdl = "http://localhost/simple-soap/webservices/server.php?wsdl";
  $client = new nusoap_client($wsdl, 'wsdl');

    $params = array(
      $bilangan_1 = 35,
      $bilangan_2 = 85
    );

    $error = $client->getError();
    if ($error) {
      echo $error;
    }
  
  $result_tambah = $client->call('ws_tambah', $params);
  echo "<p>Hasil penjumlahan ".$bilangan_1." dan ".$bilangan_2." adalah ".$result_tambah."</p>";

  $result_kurang = $client->call('ws_kurang', $params);
  echo "<p>Hasil pengurangan ".$bilangan_1." dan ".$bilangan_2." adalah ".$result_kurang."</p>";

  $result_bagi = $client->call('ws_bagi', $params);
  echo "<p>Hasil pembagian ".$bilangan_1." dan ".$bilangan_2." adalah ".$result_bagi."</p>";

  $result_kali = $client->call('ws_kali', $params);
  echo "<p>Hasil perkalian ".$bilangan_1." dan ".$bilangan_2." adalah ".$result_kali."</p>";

  
  
  
