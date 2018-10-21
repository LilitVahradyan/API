<?php 
    header("Content-type: application/json");
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'yotta';

    try{
        $pdo = new PDO('mysql:host='.$servername.';dbname='. $dbname, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo ('Created successfully');
    }catch(PDOExecption $e){
        echo $e->getMessage();die;
    }

    $method = $_SERVER['REQUEST_METHOD'];
    
    if($method = 'GET'){
        if(isset($_GET['id']) && isset($_GET['title']) && isset($_GET['authors']) && isset($_GET['image']) 
            && isset($_GET['description']) && isset($_GET['publisher'])){
            $result = $pdo->prepare('SELECT * FROM  `books` WHERE id:=id, title:=title, authors:=authors, image:=image, 
                                     description:=description, publisher:=publisher');
            $result->bindparam(':id',$_GET['id']);
            $result->bindparam(':title',$_GET['title']);
            $result->bindparam(':authors',$_GET['authors']);
            $result->bindparam(':image',$_GET['image']);
            $result->bindparam(':description',$_GET['description']);
            $result->bindparam(':publisher',$_GET['publisher']);
        }else{
            $result = $pdo->prepare('SELECT `id`, `title`, `authors`, `image`, `description`, `publisher` FROM `books` LIMIT 9');
        }
        $result->execute();
        $yotta = $result->fetchAll(PDO::FETCH_ASSOC);
         die(responce($yotta, 200, 'success'));
    }else{
         die(json_encode(['error=>Method is not allowed']));
    }

    function responce($data, $code, $status){

        return json_encode([
            'status'=>$status,
            'code'=>$code,
            'data'=>$data,
            
        ]);  
     }
?>