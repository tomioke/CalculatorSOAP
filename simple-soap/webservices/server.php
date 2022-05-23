<?php
  // Load SOAP Library
  require 'lib/nusoap.php';
  // Set namespace
  $namespace = 'http://localhost';
  // Create SOAP server object
  $server = new nusoap_server;
  // Setup WSDL file can contain multiple services
  $server->configureWSDL('Calculator Webservice', $namespace);
  $server->wsdl->schemaTargetNamespace = $namespace;
  
  // Register a web service method
  $server->register(
    'ws_tambah',                    # Nama method
    array(                          # Input parameter
      'a' => 'xsd:integer', 
      'b' => 'xsd:integer'
    ),
    array(                          # Output parameter
      'total' => 'xsd:integer'
    ),
    $namespace,
    '$namespace#ws_tambah',
    'rpc',
    'encoded',
    'Menjumlahkan bilangan'               # Documentation
  );

  function ws_tambah ($a, $b)
  {
    return new soapval('return', 'xsd:integer', tambah($a, $b));
  }

  // Implementation of add function
  function tambah ($a, $b) {
    return $a + $b;
  }

  $server->register(
    'ws_kurang',                    # Nama method
    array(                          # Input parameter
      'a' => 'xsd:integer', 
      'b' => 'xsd:integer'
    ),
    array(                          # Output parameter
      'total' => 'xsd:integer'
    ),
    $namespace,
    '$namespace#ws_kurang',
    'rpc',
    'encoded',
    'pengurangan bilangan'               # Documentation
  );

  function ws_kurang ($a, $b)
  {
    return new soapval('return', 'xsd:integer', kurang($a, $b));
  }

  // Implementation of add function
  function kurang ($a, $b) {
    if ($a > $b) {
      return $a - $b;
    } else {
      return $b - $a;
    }
  }

  $server->register(
    'ws_bagi',                    # Nama method
    array(                          # Input parameter
      'a' => 'xsd:integer', 
      'b' => 'xsd:integer'
    ),
    array(                          # Output parameter
      'total' => 'xsd:integer'
    ),
    $namespace,
    '$namespace#ws_bagi',
    'rpc',
    'encoded',
    'pembagian bilangan'               # Documentation
  );

  function ws_bagi ($a, $b)
  {
    return new soapval('return', 'xsd:integer', bagi($a, $b));
  }
  // Implementasi dari fungsi pembagian
  function bagi ($a, $b) {
    return $a / $b;
  }

  $server->register(
    'ws_kali',                    # Nama method
    array(                          # Input parameter
      'a' => 'xsd:integer', 
      'b' => 'xsd:integer'
    ),
    array(                          # Output parameter
      'total' => 'xsd:integer'
    ),
    $namespace,
    '$namespace#ws_kali',
    'rpc',
    'encoded',
    'perkalian bilangan'               # Documentation
  );

  function ws_kali ($a, $b)
  {
    return new soapval('return', 'xsd:integer', kali($a, $b));
  }

  // Implementasi dari fungsi perkalian
  function kali ($a, $b) {
    return $a * $b;
  }

  $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA:'';
  $server->service(file_get_contents("php://input"));
?>
