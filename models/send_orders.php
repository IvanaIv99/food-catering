<?php
header("Content-type:application/json");

    if(isset($_POST['orders'])){
        session_start();
        require_once '../config/connection.php';

        $orders=$_POST['orders'];
        $userID=$_SESSION['user']->userID;
        $time=time();
       
        
        $query=$conn->prepare("INSERT INTO orders VALUES(NULL,?,?)"); 

        try{
            $query->execute( [$userID,$time] );
            http_response_code(204);

            $lastID=$conn->lastInsertId();
          //  echo json_encode($orders[0]['id']);
            foreach($orders as $o){
           
                try{
                    $id=$o['id'];
                    settype($id,"integer");
                
                    $quantity=$o['quantity'];
                    settype($quantity,"integer");

                    
                    
                    $queryMenuPrice="SELECT price FROM menu WHERE menuID=$id";
                    $menuPrice=$conn->query($queryMenuPrice,PDO::FETCH_OBJ)->fetch();

                    settype($menuPrice->price,"integer");
                    $total=$menuPrice->price*$quantity;

                    $query=$conn->prepare("INSERT INTO order_details VALUES (NULL,?,?,?,?)");
                    $query->execute([$lastID,$id,$quantity,$total]);
                }
                catch(PDOException $ex){
                    $conn->rollback();
                }

            }

        }catch(PDOException $ex){
            echo json_encode(['poruka'=> 'Error with database: ' . $ex->getMessage()]);
            http_response_code(500);
        }

        
     
    }


?>