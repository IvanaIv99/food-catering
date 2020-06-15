
<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row d-flex flex-column">
              <em class="fa fa-xl fa-shopping-cart light-grey m-auto"></em>
              <?php

                    include "models/admin_panel_statistics.php";
               
              ?>
              
							<div class="large m-auto"><?=$totalorders->total?></div>
							<div class="text-muted m-auto">Total orders</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row d-flex flex-column">
              <em class="fa fa-xl fa-dollar-sign light-grey  m-auto"></em>
							<div class="large  m-auto"><?=$profit->profit?></div>
							<div class="text-muted  m-auto">Profit</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row  d-flex flex-column">
              <em class="fa fa-xl fa-users light-grey  m-auto"></em>
							<div class="large m-auto"><?=$allusers->users?></div>
							<div class="text-muted  m-auto">Users</div>
						</div>
					</div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row d-flex flex-column">
              <em class="fa fa-xl fa-search light-grey  m-auto"></em>
							<div class="large  m-auto"><?=$logged->logged?></div>
							<div class="text-muted  m-auto">Active users</div>
						</div>
					</div>
				</div>
        
				
      </div>
			
</div>


<div class="card shadow mb-4 mt-5 mb-5 border-0">
            <div class="card-header py-3 border-0">
                <h6 class="m-0 font-weight-bold text-primary text-center">PAGE VISITS</h6>
          </div>
    </div> 
 
<div class="row">
  
    <div class="card-body col-lg-9 m-auto">
                  
        <h4 class="small font-weight-bold"> Main Page <span class="float-right"><?= $percentMainPage ?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-danger" role="progressbar" style="width:<?= $percentMainPage ?>%" aria-valuenow="<?= $percentMainPage ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold"> About us <span class="float-right"><?= $percentAbout ?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $percentAbout ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold"> Order Meal  <span class="float-right"><?= $percentOrderMeal ?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar" role="progressbar" style="width:<?= $percentOrderMeal ?>%" aria-valuenow="<?= $percentOrderMeal ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold"> My profile <span class="float-right"><?= $percentMyprofile ?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-info" role="progressbar" style="width: <?= $percentMyprofile ?>%" aria-valuenow="<?= $percentMyprofile ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold"> User Messages <span class="float-right"><?= $percentMessages ?>%</span></h4>
        <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" style="width:<?= $percentMessages ?>%" aria-valuenow="><?= $percentMessages ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold mt-3"> Orders <span class="float-right"><?= $percentOrders ?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $percentOrders ?>%" aria-valuenow="<?= $percentOrders ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
            
    </div>       

</div>

<div class="card shadow mb-4  border-0">
                        <div class="card-header py-3 border-0">
                          <h6 class="m-0 font-weight-bold text-primary text-center">PAGE VISITS 24H</h6>
                        </div>
</div>


<div class="row">
    <div class="col-9 m-auto mt-2">
          <div class=" no-padding ">
                            <div class="panel panel-red panel-widget">
                              <div class="row d-flex flex-column">
                                <em class="fa fa-xl fa-search light-grey m-auto"></em>
                                <div class="large  m-auto"><?= $suma ?></div>
                                <div class="text-muted  m-auto">Total Page Views</div>
                              </div>
          </div> 

<div class="au-card au-card--bg-blue au-card-top-countries m-b-30 mt-5 mb-5">
                      <div class="au-card-inner">
                          <div class="table-responsive">
                              <table class="table table-top-countries">
                                  <tbody>
                                      <tr>
                                          <td>Main Page</td>
                                          <td class="text-right"><?=$br_main?></td>
                                      </tr>
                                      <tr>
                                          <td>About us</td>
                                          <td class="text-right"><?=$br_about?></td>
                                      </tr>
                                      <tr>
                                          <td>Order Meal</td>
                                          <td class="text-right"><?=$br_ordermeal?></td>
                                      </tr>
                                      <tr>
                                          <td>My profile</td>
                                          <td class="text-right"><?=$br_myprofile?></td>
                                      </tr>
                                      <tr>
                                          <td>User Messages</td>
                                          <td class="text-right"><?=$br_messages?></td>
                                      </tr>
                                      <tr>
                                          <td>Orders</td>
                                          <td class="text-right"><?=$br_orders?></td>
                                      </tr>
                                      
                                  </tbody>
                              </table>
                          </div>
                      </div>
    </div>

    </div>
</div>

                
     
                     
      
                     
                   
            
       </div>
    </div>
    
    

                  
</div>



                

  


