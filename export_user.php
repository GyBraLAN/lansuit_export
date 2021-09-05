<?php
$db_host = "localhost";
$db_database = "lansuite";
$db_user = "lansuite";
$db_pwd = "MySecretPwd";

$pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pwd);
file_put_contents("user_data.json", "");
foreach ($pdo->query('Select email, username, firstname, name FROM ls_user;') as $row) {
        $user_data = [
                'email_address' => $row['email'],
                'screen_name' => str_replace([' ', '@'],['_', '[at]'], $row['username']),
                'last_name' => $row['name'],
                'first_names' => $row['firstname']
        ];
        file_put_contents("user_data.json", json_encode($user_data, true).PHP_EOL, FILE_APPEND);
}
?>
