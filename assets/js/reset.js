var serverUrl="http://localhost/catering/index.php?page=menu";


var putanja=window.location.href;
var putanjaNiz=putanja.split("/");
var putanjaIndeks=putanjaNiz[putanjaNiz.length-1];
var ispisiPag=false;

$(document).ready(ucitavanje);


function ucitavanje(){
    
        


    if(putanjaIndeks=="index.php?page=login_register"){
         
        document.getElementById("registerRow").style.display="none";   
        $('#registerLink').click(function(e){
            e.preventDefault();
            document.getElementById("loginRow").style.display="none";
            document.getElementById("registerRow").style.display="block";   
        })
        
        getCountriesCities();

        //VALIDATION 
        
        
        $("#register").click(function(){
            
            validation("register.php");

                            
        })

        
       
    }

    if(putanjaIndeks=="index.php?page=user&section=editprofile"){
        
        getCountriesCities();

        $("#update-btn").click(function(){

           validation("update-profile.php");
               
            
        })
    }

    if(putanjaIndeks=="index.php?page=menu"){
        
        $("#sortPriceDesc").click(priceSortDesc);

        $(".categoriesList").change(function(){
            let categValue=this.value;

            if(categValue=="0"){
                getMenuItems()
            }

            $.ajax({
                url:"models/get_menu_from_categories.php",
                method:"post",
                data:{
                    categID:categValue
                },
                success:function(data){
                    printMenuItems(data);
                },
                error:function(xhr,status,error){
                    console.log(status);
                }
            })
        })
    }


if(putanjaIndeks=="index.php?page=admin&section=addnewmeal"){

        $(".add-new-ingredient").click(function(){
            let ispis =`
            <input type="text" id="meal-ingredient" placeholder="Ingredient"
                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingredient'" required
            class="single-input bg-light mt-2 meal-ingredient">
        </div>
        `;
        $(".ingredients-div").append(ispis);
    

        })

        $("#add-meal-btn").click(function(){

            let mealName=$("#meal-name").val();
            let mealPrice=$("#meal-price").val();
            let ingredients=$(".meal-ingredient");
            let mealImg=document.getElementById("meal-img").files[0];

            let errorArr=[];
            var data= new FormData();

            let regexNameIngr=/^([\w\s]{3,})+$/;
            let regexPrice=/^\d+(,\d{1,2})?$/;

            let ingredientValues=[];

            $(".meal-ingredient").each(function(index, elem) {
                ingredientValues.push($(elem).val());
               
            })

 
            function validationInput(id,regex,classNumber,string){
                if( !regex.test(id) ){
                    document.getElementsByClassName("validation")[classNumber].style.display="block";
                    errorArr.push(id);
                }else{
                    document.getElementsByClassName("validation")[classNumber].style.display="none";
                    data.append(string,id);
                }
            }
            

            validationInput(mealName,regexNameIngr,0,"MealName");
            validationInput(mealPrice,regexPrice,1,"MealPrice");

            var ingredientArray=[];

            for(let i=0;i<ingredientValues.length;i++){
                // validationInput(ingredientValues[i],regexNameIngr,2,"MealIngredient");
                if( !regexNameIngr.test(ingredientValues[i]) ){
                    document.getElementsByClassName("validation")[2].style.display="block";
                    errorArr.push(ingredientValues[i]);
                }else{
                    document.getElementsByClassName("validation")[2].style.display="none";
                    ingredientArray.push(ingredientValues[i])
                    data.append("ingredients",ingredientArray.join(","));
                }

            }

            if( document.getElementById("meal-img").files.length == 0 ){
                document.getElementsByClassName("validation")[3].style.display="block";
            } 

            let imgExtension=mealImg.name.split('.').pop();
            let imgFormats=['jpg','jpeg','png'];

            if(imgFormats.indexOf(imgExtension)!==-1){
                data.append("MealPhoto",mealImg);
                document.getElementsByClassName("validation")[3].style.display="none";
            }
            
            
            data.append("poslato", "true");


            console.log(errorArr);
            for(let d of data){
                console.log(d,data[d]);
            }

            if(errorArr.length==0){

                $.ajax({
                    url:"models/update_mealplan.php",
                    method:"post",
                    contentType:false,
                    processData:false,
                    data:data,
                    success:function(data,status,mssg){
                        // if(mssg.status==201){
                        //     $("#addMealMessage").html(data.message);
                        // }
                    },
                    error: function(greska){
                        // alert(greska.responseJSON.message);
                    }
                });
            }
        })
       
        
}

if(putanjaIndeks=="index.php?page=admin&section=editmealplan"){

        $(".edit_meal").click(function(){
            
            let menuID=this.dataset.id;
            $.ajax({
                url:"views/edit_meal_form.php",
                method:"post",
                type:"json",
                data:menuID,
                success:function(data){},
                error:function(xhr,status,error){
                    console.log(error);
                }
            })
        })
}

if(putanjaIndeks=="index.php?page=admin&section=statistics"){
        pieChart();
}




    addToCart();
    

}

function validation(filename){
            const fullname=$("#fullname").val();
            const password=$("#password").val();
            const email=$("#email").val();
            const address=$("#address").val();
            const country=$("#country").val();
            const city=$("#city").val();
            const radio = $("input[type=radio]");

            const profilePhoto=document.getElementById("profile_photo").files[0];
            
            const regexFullname=/^([\w]{3,})+\s+([\w\s]{3,})+$/;
            const regexPassword=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
            const regexEmail=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            const regexAddress=/\w+(\s\w+){1,}/;

            var user= new FormData();
            
            var errorArr=[]; 

            function validationInput(id,regex,classNumber,string){
                if( !regex.test(id) ){
                    document.getElementsByClassName("validation")[classNumber].style.display="block";
                    errorArr.push(id);
                }else{
                    document.getElementsByClassName("validation")[classNumber].style.display="none";
                    user.append(string,id);
                }
            }
            function validationSelect(id,classNumber,string){
                if(id==="0"){
                    document.getElementsByClassName("validation")[classNumber].style.display="block";
                    errorArr.push(id);
                }else{
                    document.getElementsByClassName("validation")[classNumber].style.display="none";
                    user.append(string,id);
                }
            }

            validationInput(fullname,regexFullname,0,"fullname");
            
            validationInput(password,regexPassword,1,"password");
            validationInput(email,regexEmail,2,"email");
            validationInput(address,regexAddress,3,"address");

            validationSelect(country,4,"country")
            validationSelect(city,5,"city");

            for(var i=0;i<radio.length;i++){
                if(radio[i].checked){
                    user.append("radio",radio[i].value);
                  break;
                }
              }
           
            user.append("photo",profilePhoto);
            user.append("poslato","true");

            $.ajax({
                url:"models/"+filename,
                method:"post",
                type:"json",
                contentType:false,
                processData:false,
                data:user,
                success:function(data,status,response){
                    // $(".successMessage").html(data.message);
                   console.log(data.message);

                   if(response.status == 201){
                    $(".successMessage").html(data.message);
                   }
                   if(response.status == 204){
                    $(".successMessage").html(data.message);
                   }
                   
                },
                error:ajaxErrors
            });

            
}
function getCountriesCities(){

    $("#country").change(function(){

        let country=Number(this.value);
        
        $.ajax({
            url:"models/cities.php",
            method:"post",
            type:"json",
            data:{country:country},
            success:function(data){
                ispis="<option value='0' selected>City</option>";
               for(let c of data){
                 ispis+=`<option value='${c.cityID}'>${c.name}</option>`;
               }
              document.getElementById("city").innerHTML=ispis;
             
            },
            error:function(xhr,status,error){
             alert(error);
           }
        })

    })
}

function addToCart(){
    $.ajax({
        url :"models/get_menu_items.php",
        dataType:"json",
        success : function(data) {

            
            $(".add-to-cart").click(addToCart);
            

            function addToCart() {
                let id = $(this).data("id");
                
                var products = productsInCart();
                console.log(products);
                if(products) {
                    if(productIsAlreadyInCart()) {
                        updateQuantity();
                    } else {
                        addToLocalStorage();
                    }
                } else {
                    addFirstItemToLocalStorage();
                }
            
                alert("Cart successfully updated!");
                
                function productIsAlreadyInCart() {
                    return products.filter(p => p.id == id).length;
                }
            
                function addToLocalStorage() {
                    let products = productsInCart();
                    products.push({
                        id : id,
                        quantity : 1
                    });
                    localStorage.setItem("products", JSON.stringify(products));
                }
            
                function updateQuantity() {
                    let products = productsInCart();
                    for(let i in products)
                    {
                        if(products[i].id == id) {
                            products[i].quantity++;
                            break;
                        }      
                    }
            
                    localStorage.setItem("products", JSON.stringify(products));
                }
            
                
            
                function addFirstItemToLocalStorage() {
                    let products = [];
                    products[0] = {
                        id : id,
                        quantity : 1
                    };
                    localStorage.setItem("products", JSON.stringify(products));
                }

                
            }
            function productsInCart() {
                return JSON.parse(localStorage.getItem("products"));
            }
            
            function clearCart() {
                localStorage.removeItem("products");
            }
            

            
        }
    })
}

function ajaxErrors(greska, status, statusText){
    
        if(greska.status == 500){
            console.log(greska.parseJSON);
            alert(greska.parseJSON.poruka);
        }
        else if(greska.status == 400){
            alert('Niste poslali ispravno parametre!')
        }
    
}

function pieChart(){
    var ctxP = document.getElementById("labelChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
    
    type: 'pie',
    data: {
        labels: ["Serbia", "India", "Bangladesh", "Italy", "England"],
        datasets: [{
        data: [20,30,50,60,10],
        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
    },
    options: {
        responsive: true,
        legend: {
        position: 'right',
        labels: {
            padding: 20,
            boxWidth: 10
        }
        },
        plugins: {
        datalabels: {
            formatter: (value, ctx) => {
            let sum = 0;
            let dataArr = ctx.chart.data.datasets[0].data;
            dataArr.map(data => {
                sum += data;
            });
            let percentage = (value * 100 / sum).toFixed(2) + "%";
            return percentage;
            },
            color: 'white',
            labels: {
            title: {
                font: {
                size: '16'
                }
            }
            }
        }
        }
        }
    });
}

function priceSortDesc(e){
    e.preventDefault();
            $.ajax({
                url : "models/get_menu_items.php",
                method : "GET",
                type : "json",
                success : function(data) {
                    data.sort(function(a,b) {
                        if(a.price == b.price)
                            return 0;
                        return a.price > b.price ? -1 : 1;
                        
                    });
                    
                    
                },
                error : function(xhr, error, status) {
                    alert(status);
                }
            });
}

function getMenuItems(){
    $.ajax({
        url:"models/get_menu_items.php",
        type:"json",
        method:"get",
        success:function(data) {
            printMenuItems(data);
        },
        error:function(status){
            console.log(status);
        }
        
    })
}
function printMenuItems(data){
    let ispis="";
                    for(let p of data){
                        ispis+=`
                        <div class="col-xl-4 col-md-6">
                        <div class="single_order">
                            <div class="order_thumb">
                                <img src="assets/img/order/${p.img}" alt="">
                                <div class="order_prise">
                                    <span>${p.price}</span>
                                </div>
                            </div>
                            <div class="order_info">
                                <h3><a href="#">${p.name}</a></h3>
                                <p class="ingredientsList">
                                    ${get_ingredients(p.menuID)}
                                </p>
                                <div class="col-xl-12 col-lg-12 mb-3">
                                    <input type="number" value="1" min="1" max="4" class="quantityInMenu"/>
                                </div>
                                <a href="" class="boxed_btn add-to-cart" data-id="${p.menuID}" data-userid="<?=$p->$_SESSION['user']->userID?>" >ADD TO CART</a>
                                <span class="addedToCartMessage"></span>
                            </div>
                        </div>
                    </div>
                        `;
                    }
                    $(".menuProducts").html(ispis);
}

function get_ingredients(menuID){

        $.ajax({
            url:"models/get_ingredients.php",
            method:"post",
            type:"json",
            data:{
                menuID:menuID
            },
            success:function(data){
                
                var ispis="";
                for(let i=0;i<data.length;i++){
                    ispis+=data[i].name + " | ";
                    
                }
                $(".ingredientsList").html(ispis);
            },
            error:function(status){console.log(status)}
        })
    
    
}


