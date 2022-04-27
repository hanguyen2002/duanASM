
<?php
function connect(){
    $host = "localhost" ; 
    $dbname = "123" ; 
    $dbusername = "root" ; 
    $dbpass = "mysql" ; 
    return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername,$dbpass) ; 
}

function select_all($sql){
    $connect = connect();
    $stml = $connect->prepare($sql);
    $stml->execute();
    return $select_all = $stml->fetchAll();
}
?> 
   
