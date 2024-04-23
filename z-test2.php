<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$version = curl_version();
echo $version . '<br>';

echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';

try {
    $serverName = "tcp:myserver.database.windows.net,1433";
    $databaseName = "Production";
    $uid = "itaffinity";
    $pwd = "%lF5Wu95dLUd5Sdi";
    
    $conn = new PDO("sqlsrv:server = $serverName; Database = $databaseName;", $uid, $pwd);

    // Select Query
    $tsql = "SELECT @@Version AS SQL_VERSION";

    // Executes the query
    $stmt = $conn->query($tsql);
} catch (PDOException $exception1) {
    echo "<h1>Caught PDO exception:</h1>";
    echo $exception1->getMessage() . '<br>PHP_EOL=' . PHP_EOL;
    phpinfo();
}

?>

<h1> Success Results : </h1>

<?php
try {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['SQL_VERSION'] . PHP_EOL;
    }
} catch (PDOException $exception2) {
    // Display errors
    echo "<h1>Caught PDO exception:</h1>";
    echo $exception2->getMessage() . PHP_EOL;
}

unset($stmt);
unset($conn);



/*
function OpenConnection()
    {
        $serverName = "tcp:myserver.database.windows.net,1433";
        $connectionOptions = array("Database"=>"Production",
            "Uid"=>"itaffinity", "PWD"=>"%lF5Wu95dLUd5Sdi");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die('no go!');

        return $conn;
    }

echo 'phase -negative<br>';

function ReadData()
    {
        try
        {
            $conn = OpenConnection();
            $tsql = "SELECT Date1 FROM AtheneProductionApps2";
            $getProducts = sqlsrv_query($conn, $tsql);
            if ($getProducts == FALSE)
                die'no go 2';
            $productCount = 0;
            while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
            {
                echo($row['Date1']);
                echo("<br/>");
                $productCount++;
            }
            sqlsrv_free_stmt($getProducts);
            sqlsrv_close($conn);
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
    }

echo '<br>phase 0--';

ReadData();



// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:aanit.database.windows.net,1433; Database = Production", "itaffinity", "%lF5Wu95dLUd5Sdi");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'PDO connection OK, ?';
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

$Product = 'Athene Agility 10';
$Split = '1';

$params = array($Product, $Split);
$stmt = sqlsrv_prepare($conn, "SELECT * FROM AtheneProductionApps2 WHERE Product_Name = ? AND Split = ?", $params);

sqlsrv_execute($stmt);

try {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['Date1'] . PHP_EOL;
    }
} catch (PDOException $exception2) {
    // Display errors
    echo "<h1>Caught PDO exception:</h1>";
    echo $exception2->getMessage() . PHP_EOL;
}

unset($stmt);
unset($conn);

//mixed PDO::getAttribute ( $attribute );

/*

$user = 'itaffinity';
$pass = '%lF5Wu95dLUd5Sdi';

$dbh = new PDO('sqlserver:host=localhost;dbname=Production', $user, $pass);

// use the connection here
$sth = $dbh->query('SELECT * FROM countries');

// fetch all rows into array, by default PDO::FETCH_BOTH is used
$rows = $stm->fetchAll();

// iterate over array by index and by name
foreach($rows as $row) {

    echo ("$row[0]");
    echo ("$row['id']");

}



/*

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "itaffinity", "pwd" => "%lF5Wu95dLUd5Sdi", "Database" => "Production", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:aanit.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
*/
?>