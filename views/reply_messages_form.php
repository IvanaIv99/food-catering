<form class="form-contact contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
    <div class="row">
    <div class="col-6  m-auto">

    <?php
        $userID=$_GET["id"];
        $messageID=$_GET["mid"];
        $query=$conn->query("SELECT fullname, email FROM users  WHERE userID=$userID");
        $podatak=$query->fetch();

    ?>

        <form action="" method="post" id="replyForm">
            <div class="col-12">
                    <div class="form-group">
                        <input class="form-control" name="replyTo" id="replyTo" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'To'" placeholder="To" value="<?=$podatak->fullname?>" >
                    </div>
                    <input type="hidden" id="userIDReply" value="<?=$userID?>"/>
                    <input type="hidden" id="messageID" value="<?=$messageID?>"/>
                   
            </div>
            <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="messageReply" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                </div>
                
            </div>
            <div class="form-group mt-3">
            <button type="button" id="replySendBtn" class="button button-contactForm boxed-btn">Reply</button>
            </div>
            <p class="replySent"></p>
        </form>
        
    </div>

    </div>
    
</form>