<?php
function my_simple_crypt( $string, $action = 'e' ) {
    $secret_key = 'my_simple_secret_key';
    $secret_iv = 'my_simple_secret_iv';
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
    return $output;
}
if(isset($_POST['date'])){
	echo my_simple_crypt($_POST['date'],'e');
}else{
?>
<html>
<head>
	<title>License Key generator for Quickpos</title>
</head>
<body>
	<form action="" method="post">
    <input type="text" name="date" class="form-control">
    <input type="submit" value="Generate">
    </form>
</div>
</body>
</html>
<?php } ?>