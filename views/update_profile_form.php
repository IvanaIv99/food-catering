
<div class="row d-flex justify-content-center">

<div class="col-8">

<form action="" method="post" class="editProfileForm">

  <div class="mt-10">
      <input type="text"  id="fullname" name="fullname" placeholder="Full Name"
        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required
      class="single-input" value="<?=$_SESSION['user']->fullname?>">
      <p class="validation">Invalid fullname.</p>
  </div>

  <div class="mt-10">
    <input type="password" id="password" name="password" placeholder="Password"
      onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required
      class="single-input" >
      <p class="validation">Password must contain at least 8 characters with minimum 1 number.</p>
  </div> 
            
  <div class="row d-flex flex-row justify-content-center mt-10">
  <?php if($_SESSION['user']->gender=="male") :?>  
      <div class="custom-control custom-radio mr-5">
          <input type="radio" id="male" name="radio" class="custom-control-input" value="male" checked>
          <label class="custom-control-label" for="male">Male</label>
      </div>
      <div class="custom-control custom-radio">
          <input type="radio" id="female" name="radio" class="custom-control-input" value="female">
          <label class="custom-control-label" for="female">Female</label> 
      </div>
  <?php endif;?>
  <?php if($_SESSION['user']->gender=="female") :?>  
      <div class="custom-control custom-radio mr-5">
          <input type="radio" id="male" name="radio" class="custom-control-input" value="male" >
          <label class="custom-control-label" for="male">Male</label>
      </div>
      <div class="custom-control custom-radio">
          <input type="radio" id="female" name="radio" class="custom-control-input" value="female" checked >
          <label class="custom-control-label" for="female">Female</label> 
      </div>
  <?php endif;?>    
  </div>
                  
                  
  <div class="mt-10">
    <input type="email" id="email" name="EMAIL" placeholder="Email address"
      onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required
      class="single-input" value="<?=$_SESSION['user']->email?>">
      <p class="validation">e.g. user@domain.com</p>
  </div>
  <div class="input-group-icon mt-10">
      <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
        <input type="text" id="address" name="address" placeholder="Address" onfocus="this.placeholder = ''"
        onblur="this.placeholder = 'Address'" required class="single-input" value="<?=$_SESSION['user']->address?>">
        <p class="validation">Please enter valid address.</p>
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
 
  <div class="input-group mt-10">
  <div class="input-group">
      <div class="custom-file">
        <input type="file" class="custom-file-input bg-light border-0" id="profile_photo">
        <label class="custom-file-label bg-light border-0" for="profile_photo">Upload profile photo</label>
        <p class="validation">Photo must be .jpg , .jpeg or .png</p>
      </div>
    </div>
  </div>  
  
    


  <input type="button" id="update-btn" class="genric-btn primary mt-10" value="Update"/> 
  <h5 class="successMessage" class="text-center mt-5"></h5>


</div>


</form>
</div>
</div>