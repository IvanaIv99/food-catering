<footer class="footer_area footer-bg zigzag_bg_1">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="heading">
                                    Top Products
                            </h3>
                            <ul>
                                <li><a href="#">Managed Website</a></li>
                                <li><a href="#"> Manage Reputation</a></li>
                                <li><a href="#">Power Tools</a></li>
                                <li><a href="#">Marketing Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="heading">
                                    Quick Links
                            </h3>
                            <ul>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Brand Assets</a></li>
                                <li><a href="#"> Investor Relations</a></li>
                                <li><a href="#">Terms of Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="heading">
                                    Features
                            </h3>
                            <ul>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Brand Assets</a></li>
                                <li><a href="#">Investor Relations</a></li>
                                <li><a href="#">Terms of Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="heading">
                                    Resources
                            </h3>
                            <ul>
                                <li><a href="#">Guides</a></li>
                                <li><a href="#">Research</a></li>
                                <li><a href="#">Experts</a></li>
                                <li><a href="#">Agencies</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="heading">
                                    Newsletter
                            </h3>
                            <p class="offer_text" >You can trust us. we only send promo offers,</p>
                            <form action="#">
                                <input type="text" placeholder="Your email address">
                                <button type="submit"> <i class="ti-arrow-right"></i> </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-md-12 col-lg-8">
                        <div class="copyright">
                                <p class="footer-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-12 col-lg-4">
                        <div class="social_links">
                            <ul>
                                <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-dribbble"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-behance"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    
    <!-- JS here -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="assets/js/main1.js"></script>
    <script src="assets/js/cart.js"></script>

    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/scrollIt.js"></script>
    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/nice-select.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!--contact js-->
    <script src="assets/js/contact.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="assets/js/jquery.form.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/mail-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <!--bootstrap-->
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        
<script>


    $(document).ready(function () {
        
        let products = productsInCart();
        console.log(products);
        if(!products.length || products===null)
            showEmptyCart();
        else
            displayCartData();

        $('.custom-file-input').on('change',function(){
            var fileName = $(this).val();     
            fileName=fileName.replace("C:\\fakepath\\", " ")
        $(this).next('.custom-file-label').html(fileName);
        
        })
    });


    function productsInCart() {
        return JSON.parse(localStorage.getItem("products"));
    }

    function displayCartData() {

        let products = productsInCart();
        var total=0;
        $.ajax({
            url :"models/get_menu_items.php",
            dataType:"json",
            success : function(data) {
                let productsForDisplay = [];
                
                data = data.filter(p => {
                    for(let prod of products)
                    {
                        if(p.menuID == prod.id) {
                            p.quantity = prod.quantity;
                            total += Number(p.price * prod.quantity);
                            $(".totalInCart").html("$"+total);
                            return true;
                            
                        }
                            
                    }
                    return false;
                });
                generateTable(data);
                
            }
        });
        function generateTable(products) {
            
        let html="";
                    
        for(let p of products) {
            html +=` <div class="cart-summary-item cart-summary-prod">
                <button class="delete-cart" onClick="removeFromCart(${p.menuID})" > X </button>
                <h4 class="text-center">${p.name}</h4>
                <div class="cart-summary-prod-img">
                <img src="assets/img/order/${p.img}" alt="img"/>
                </div>
                <h4 class="text-center checkout-price mt-3 ">$ ${p.price} x ${p.quantity} </h4>
                </div>` 
        }

        
        $(".itemsInCart").html(html);
        
        // if(!products.length){
        //      $('.order-table').html("Empty");   
        // }
        
        let html2 = `
                <table class="tableCheckout">
            <thead>
                <tr>
                
                <th>Product Name</th>
                    <th>Base Price</th>
                    <th>Quantity</th>
                <th>Price</th>
                <th>Remove</th>
                </tr>
            </thead>
            <tbody>`;


        for (let p of products) {
        html2 +=`
        <tr class="rem1">
            
            
            <td class="invert">${p.name}</td>
            <td class="invert">$${p.price}</td>
            <td class="invert">${p.quantity}</td>
            <td class="invert">$${p.price * p.quantity}</td>
            <td class="invert">
                <div class="rem">
                    <div class=""><button onclick="removeFromCart(${
                        p.menuID
                    })">X</button> </div>
                </div>
            </td>
        </tr>
        `;
        }
        html2 += `    </tbody>
                </table>`;
        html2 += `<h4 class="text-center mt-5">TOTAL = $${total}</h4> <input type="button" id="send_order_btn" class="send_order_btn align-self-center mt-3 text-center" value="Send Order"/>
        <p class="ReplySent"></p>
        `;

        $('.order-table').html(html2);      

        $("#send_order_btn").click(function(){
            
           let orders=JSON.parse(localStorage.getItem("products"));

            $.ajax({
                url:"models/send_orders.php",
                type:"json",
                method:"post",
                data:{
                    orders:orders
                },
                success:function(data,status,response){
                    
                    if(response.status == 204){
                                           
                         $(".ReplySent").html("Sent!");
                        alert("Sent!");
                        
                   }
                },
                error:ajaxErrors
            })
        })
    }
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



    function showEmptyCart() {
        $(".cartMessage").html("<h4 class='text-center mt-3' >Your cart is empty!</h4>");
        
             $('.order-table').html("<h4 class='text-center mt-3' >Your cart is empty!</h4>");   
        
    }

    function itemsInCart() {
        return JSON.parse(localStorage.getItem("products"));
    }
    function removeFromCart(id) {
        let products = productsInCart();
        let filtered = products.filter(p => p.id != id);
        console.log(filtered);
        localStorage.setItem("products", JSON.stringify(filtered));

        displayCartData();
    }
    function clearCart() {
        let total = 0;
        localStorage.removeItem("products");
    }

</script>