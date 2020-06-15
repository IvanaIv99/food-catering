
<!-- LOGIN -->

<div class="whole-wrap">
    <div class="container box_1170">
        <div class="section-top-border">
        <div class="row justify-content-center" id="loginRow">
            <div class="col-lg-6 col-md-6 ">
                
                <!-- <h3 class="mb-30 text-center">LOGIN</h3> -->

                <form action="models/login.php" method="post" >
                    <div class="mt-10">
                        <input type="email" name="EMAIL" placeholder="Email address"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required
                            class="single-input">
                        <p class="validation">Invalid email.</p>

                    </div>
                    <div class="mt-10">
                        <input type="password" name="password" placeholder="Password"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required
                            class="single-input">
                        <p class="validation">Invalid password.</p>
                    </div>

                    <input type="submit" name="login-btn" id="login-btn" class="genric-btn primary align-self-center mt-10" value="Log in"/> 


                </div>
                
                </form>
            </div>
        </div>
    </div>
</div>

<!--REGISTER-->

<div class="whole-wrap">
    <div class="container box_1170">
        
        <div class="row justify-content-center" id="registerRow">
            <div class="col-lg-8 col-md-8">
                <!-- <h3 class="mb-30 text-center ">REGISTER</h3> -->
                <form action="#" method="" enctype="multipart/form-data">

                    <div class="mt-10">
                        <input type="text"  id="fullname" name="fullname" placeholder="Full Name"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required
                            class="single-input">
                        <p class="validation">Invalid fullname.</p>
                      
                    </div>

                    <div class="mt-10">
                        <input type="password" id="password" name="password" placeholder="Password"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required
                            class="single-input">
                        <p class="validation">Password must contain at least 8 characters with minimum 1 number.</p>
                    </div> 
                    
                    <div class="row d-flex flex-row justify-content-center mt-10">
                            <div class="custom-control custom-radio mr-5">
                                <input type="radio" id="male" name="radio" class="custom-control-input" value="male" checked>
                                <label class="custom-control-label" for="male">Male</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="female" name="radio" class="custom-control-input" value="female">
                                <label class="custom-control-label" for="female">Female</label>
                            </div>
                    </div>
                    
				
                    <div class="mt-10">
                        <input type="email" id="email" name="EMAIL" placeholder="Email address"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required
                            class="single-input">
                        <p class="validation">e.g. user@domain.com</p>
                    </div>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                        <input type="text" id="address" name="address" placeholder="Address" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Address'" required class="single-input">
                        <p class="validation">Please enter valid address.</p>
                    </div>

                    <div class="input-group mt-10">
                        <div class="input-group">
                            <div class="custom-file bg-light">
                                <input type="file" class="custom-file-input border-0" id="profile_photo">
                                <label class="custom-file-label border-0 bg-light text-secondary" for="profile_photo">Upload profile photo</label>
                            </div>
                        </div>
                    </div>


                    <div class="mt-10">
                        <select class="custom-select my-1 mr-sm-2 bg-light border-0" id="country">
                                <option value="0">Country</option>
                                <?php
                                    $result=$conn->query("SELECT * FROM `countries`");
                                    $countries=$result->fetchAll();
                                    
                                    foreach($countries as $c):?>
                                    <option value="<?=$c->countryID?>"><?=$c->name?></option>
                                    <?php endforeach;?>
                        </select>
                        <p class="validation">Choose country.</p>
                    </div>
                    <div class="mt-10">
                        <select class="custom-select my-1 mr-sm-2 bg-light border-0" id="city">
                            <option value='0' selected>City</option>
                        </select>
                        <p class="validation">Choose city.</p>
                    </div>
                    


                    <!-- <div class="mt-10">
                        <textarea class="single-textarea" id="textarea" placeholder="About me" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'About me'" required></textarea>
                    </div> -->
                    

                    <input type="button" id="register" class="genric-btn primary align-self-center mt-10" value="Register"/> 
                    
                </div>
                <div class="successMessage">

                </div>
                
                </form>
            </div>      
        
    </div>




