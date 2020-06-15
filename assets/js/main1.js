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
        $("#sortPriceAsc").click(priceSortAsc);
        

        $(".categoriesList").change(function(){
            let categValue=this.value;

            if(categValue=="0"){
                getMenuItems();
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
                error:ajaxErrors
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
                let category=$(".categoriesList").val();
                console.log(category);

                let errorArr=[];
                var data= new FormData();

                let regexNameIngr=/^([\w\s]{3,})+$/;
                let regexPrice=/^\d+(,\d{1,2})?$/;

                let ingredientValues=[];

                var ingredientArray=[];


                $(".meal-ingredient").each(function(index, elem) {
                    ingredientValues.push($(elem).val());
                
                })

                for(let i=0;i<ingredientValues.length;i++){
                    // validationInput(ingredientValues[i],regexNameIngr,2,"MealIngredient");
                    if( !regexNameIngr.test(ingredientValues[i]) ){
                        document.getElementsByClassName("validation")[2].style.display="block";
                        errorArr.push(ingredientValues[i]);
                    }else{
                        document.getElementsByClassName("validation")[2].style.display="none";
                        ingredientArray.push(ingredientValues[i])
                        
                    }

                }
                data.append("ingredients",ingredientArray.join(","));

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

                

                

                if(category=="0"){
                    errorArr.push(category);
                }else{
                    data.append("categoryID",category);
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
                        url:"models/add_meal.php",
                        method:"post",
                        contentType:false,
                        processData:false,
                        data:data,
                        success:function(data,status,mssg){
                            if(mssg.status==201){
                                $("#addMealMessage").html(data.message);
                            }
                        },
                        error: ajaxErrors
                    });
                }
            })
        
            
    }

    if(putanjaIndeks.includes('editmeal')){

        $(".add-new-ingredient").click(function(){
            let ispis =`
            
            <input type="text" id="meal-ingredient" placeholder="Ingredient"
                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingredient'" required
            class="single-input bg-light mt-2 meal-ingredient">
           
        `;
        $(ispis).insertAfter("#divIng");
        
        })

            $("#editBtn").click(function(){
                console.log("edw");
                let menuID=$("#meal-id").val();
                let ingNum=$("#ing-num").val();
                console.log(ingNum)
                let mealName=$("#meal-name").val();
                let mealPrice=$("#meal-price").val();
                let ingredients=$(".meal-ingredient");
                let mealImg=document.getElementById("meal-img").files[0];
                let category=$(".categoriesList").val();
            
                

                let errorArr=[];
                var data= new FormData();
                data.append('MenuID',menuID);
                data.append('IngNum',ingNum);
                let regexNameIngr=/^([\w\s]{3,})+$/;
                let regexPrice=/^\d+(,\d{1,2})?$/;

                let ingredientValues=[];

                var ingredientArray=[];

                $(".meal-ingredient").each(function(index, elem) {
                    ingredientValues.push($(elem).val());
                
                })

                for(let i=0;i<ingredientValues.length;i++){
                    // validationInput(ingredientValues[i],regexNameIngr,2,"MealIngredient");
                    if( !regexNameIngr.test(ingredientValues[i]) ){
                        document.getElementsByClassName("validation")[2].style.display="block";
                        errorArr.push(ingredientValues[i]);
                    }else{
                        document.getElementsByClassName("validation")[2].style.display="none";
                        ingredientArray.push(ingredientValues[i])
                        
                    }

                }
                data.append("ingredients",ingredientArray.join(","));

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


                if(category=="0"){
                    errorArr.push(category);
                }else{
                    data.append("categoryID",category);
                }

                if(mealImg!=undefined){

                    if( document.getElementById("meal-img").files.length == 0 ){
                        document.getElementsByClassName("validation")[3].style.display="block";
                    } 
    
                    let imgExtension=mealImg.name.split('.').pop();
                    let imgFormats=['jpg','jpeg','png'];
    
                    if(imgFormats.indexOf(imgExtension)!==-1){
                        data.append("MealPhoto",mealImg);
                        document.getElementsByClassName("validation")[3].style.display="none";
                    }

                }
                else{
                    let img=document.getElementById("meal-img").value;
                    console.log(img)
                    data.append("MealOld",document.getElementById("meal-img").value);
                }

                console.log(data)
                
                
                data.append("poslato", "true");


                console.log(errorArr);

                for(let d of data){
                    console.log(d,data[d]);
                }

                if(errorArr.length==0){

                    $.ajax({
                        url:"models/update_meal.php",
                        method:"post",
                        contentType:false,
                        processData:false,
                        data:data,
                        success:function(data,status,mssg){
                            if(mssg.status==200){
                                $("#addMealMessage").html("Meal updated!");
                            }
                        },
                        error: ajaxErrors
                    });
                }

            })
       



    }

    if(putanjaIndeks=="index.php?page=admin&section=statistics"){
            pieChart();
    }

    if(putanjaIndeks=="index.php?page=contact"){
        
        $(".button-contactForm").click(function(){

            
            
            let message=$("#message").val();

            let userID=this.dataset.id;
            

            let regex=/^([\w\s]{4,}[\!\.\,\?]?)+$/;

            let errors=[];
            let ok=[];
            
            // if( !regex.test(subject) || subject=="" ){
            //     errors.push("Subject not in format!");
            // }else{
            //     ok.push(subject);
            // }

            if( !regex.test(message) || message=="" ){
                errors.push("Message not in format!");
                console.log("NERADI")
            }else{
                ok.push(message);
            }

            console.log(ok);
            console.log(errors);

            if(errors.length==0){
                $.ajax({
                    url:"models/messages.php",
                    method:"post",
                    type:"json",
                    data:{
                        message:ok[0],
                        userID:userID,
                        send:true
                    },
                    success:function(data,status,response){
                        if(response.status == 201){
                            $(".response").html(data.message);
                        }
                    },
                    error:function(xhr,status,error){
                        console.log(error);
                    }
                })
            }


        })
    }

    if(putanjaIndeks.includes('message_reply')){
        console.log("OKM")
        $("#replySendBtn").click(function(){

            let userID=$("#userIDReply").val();
            let messageID=$("#messageID").val();
            let messageReply=$("#messageReply").val();
            
            let regex=/((?!=|\,|\.).)+(.)$/;

            let errors=[];
            let ok=[];
            
            ok.push(userID); 
            ok.push(messageID);
            console.log(messageID);

            if( !regex.test(messageReply) || messageReply=="" ){
                errors.push("Message is empty or too short!");
                
            }else{
                ok.push(messageReply);
            }

            for(let i=0;i<ok.length;i++){
                console.log(ok[i]);
            }
            
            $.ajax({
                url:"models/reply_messages.php",
                method:"post",
                type:"json",
                data:{
                    userID:ok[0],
                    messageID:ok[1],
                    messageReply:ok[2],
                    send:true
                },
                success:function(data,status,response){
                    if(response.status == 200){
                       
                        $(".replySent").html("Sent!");
                    }
                    
                },
                error:function(xhr,status,error){
                    console.log(xhr);
                }
            })
        })
    }

    // if(putanjaIndeks.includes('orders')){

    //     $("#send_order_btn").click(function(){
    //         console.log("OKK")
    //     })
    // }
    cart();
    

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
                //    console.log(data.message);

                   if(response.status == 201){
                    $(".successMessage").html(`<h5 class="successMessage" class="text-center mt-5 text-success mb-5">`+data.message+`</h5>`);
                   }
                   if(response.status == 204){
                    $(".successMessage").html("You have successfully updated ur profile!");
                   }
                   
                   console.log(status);
                   console.log(response);
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

function cart(){
    $.ajax({
        url :"models/get_menu_items.php",
        dataType:"json",
        success : function(data) {

            
            $(".add-to-cart").click(addToCart);
            

            function addToCart() {
                let id = Number($(this).data("id"));
                
                let numQuantity=Number($(this).prev().children().val());
                
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
                        quantity : numQuantity,
                        
                    });
                    localStorage.setItem("products", JSON.stringify(products));
                }
            
                function updateQuantity() {
                   
                    let products = productsInCart();
                    for(let i in products)
                    {
                        if(products[i].id == id) {
                            products[i].quantity+=numQuantity;
                            break;
                        }      
                    }
            
                    localStorage.setItem("products", JSON.stringify(products));
                }
            
                
            
                function addFirstItemToLocalStorage() {
                    let products = [];
                    products[0] = {
                        id : id,
                        quantity : numQuantity
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
            alert(greska.parseJSON.message);
        }
        else if(greska.status == 400){
            alert('Niste poslali ispravno parametre!')
        }
    
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
                    console.log(data);
                    printMenuItems(data);
                    
                },
                error : function(xhr, error, status) {
                    alert(status);
                }
            });
}
function priceSortAsc(e){
    e.preventDefault();
            $.ajax({
                url : "models/get_menu_items.php",
                method : "GET",
                type : "json",
                success : function(data) {
                    data.sort(function(a,b) {
                        if(a.price == b.price)
                            return 0;
                        return a.price > b.price ? 1 : -1;
                    });
                    console.log(data);
                    printMenuItems(data);
                    
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
    let br=0;
                    for(let p of data){
                        ispis+=`
                        <div class="col-xl-4 col-md-6">
                        <div class="single_order">
                            <div class="order_thumb">
                                <img src="public/images/meals/${p.img}" alt="">
                                <div class="order_prise">
                                    <span>${p.price}</span>
                                </div>
                            </div>
                            <div class="order_info">
                                <h3><a href="#">${p.name}</a></h3>
                                <p class="ingredientsList">
                                    ${get_ingredients(p.menuID,br)}
                                </p>
                                <div class="col-xl-12 col-lg-12 mb-3">
                                    <input type="number"  min="1" max="10" class="quantityInMenu"/>
                                </div>
                                <a href="" class="boxed_btn add-to-cart" data-id="${p.menuID}" data-userid="<?=$p->$_SESSION['user']->userID?>" >ADD TO CART</a>
                                <span class="addedToCartMessage"></span>
                            </div>
                        </div>
                    </div>
                        `;
                        br++;
                    }
                    $(".menuProducts").html(ispis);
                    
}

 function get_ingredients(menuID,br){
    
        $.ajax({
            url:"models/get_ingredients.php",
            method:"post",
            type:"json",
            data:{
                menuID:menuID
            },
            success:function(data){
                console.log(data)
                let ispis="";
                for(var i=0;i<data.length;i++){
                    ispis+=data[i].name + " | ";
                  
                }
                document.getElementsByClassName("ingredientsList")[br].innerHTML+=ispis;
                
            },
            error:function(status){console.log(status)}
        })
    
        return "";
}
