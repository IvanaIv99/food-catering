<div class="container">
    <div class="row">
    
        <?php
            if($_SESSION['user']->roleID=="2"){

                $query=$conn->query("SELECT m.*,u.fullname as fullname,u.img as img ,u.email as email FROM messages m INNER JOIN users u ON u.userID=m.userID " );
                $podaci=$query->fetchAll();
                foreach($podaci as $p):?>
    
                <div class="messageDiv pt-3 mt-5 m-auto">
                    <div class="d-flex flex-row">
                        <div class="col-2 ml-4 messageImg mt-1">
                            <img src="public/images/user/smaller-images/smaller_<?=$p->img?>" alt=""/>
                        </div>
                        <div class="col-8 fromMessage">
                            <p class="messageUserName pl-3 mt-4"><?=$p->fullname?> <b>[ <?=$p->email?> ]</b></p>
                            
                        </div>
                    </div>
                    <div class="messageContent mt-3 mb-3">
                        <p><?=$p->message?></p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <p class="messageDate pt-3"><?= date('d F o , H:i', $p->sentDate); ?></p>
                        <a href="index.php?page=admin&section=message_reply&id=<?=$p->userID?>&mid=<?=$p->messageID?>" id="replyBtn" class=" boxed-btn" >Reply</a>
                             
                    </div>
                </div>
    
            <?php endforeach;?>

            <?php } else { ?>

                <?php
                $userID=$_SESSION['user']->userID;
                $query=$conn->query("SELECT * FROM messages m INNER JOIN users u ON u.userID=m.userID WHERE m.userID=$userID");
                $podaci=$query->fetchAll();

                if(count($podaci)==0) echo "<p class='h4 m-auto text-secondary'>There's no messages!</p>";

                foreach($podaci as $p):?>
    
                <div class="messageDiv pt-3 m-auto">

                    <div class="d-flex flex-row">
                       <div class="col-8 fromMessage">

                           <p class="messageUserName pl-3 mt-4">FROM : Administrator</p>
                           
                       </div>
                   </div>

                    <div class="messageContent mt-3 mb-3">
                        
                        <p><?=$p->reply?></p>
                    </div>

                    
                    
                    <div class="d-flex justify-content-around">
                        <p class="messageDate pt-3"><?= date('d F o , H:i', $p->sentDate); ?></p>
                        
                    </div>
                </div>
    
            <?php endforeach;?>

            <?php } ?>
        
    </div>
</div>