<!-- <script type="text/javascript">
// To conform clear all data in cart.
function clear_cart() 
{
    var result = confirm('Are you sure want to clear all bookings?');
    if (result) 
    {
        window.location = "<?php echo base_url(); ?>index.php/shopping/remove/all";
    } 
    else 
    {
return false; // cancel button
}
}
</script> -->

<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item active">My Cart</li>
                </ol>
                <h1 class="h2">My Cart</h1>


                <div class="card table-responsive">
                    <table class="table table-nowrap mb-0 table--elevated">

                        <span style="text-align:center;font-size:1.5em;margin:20px;">
                            <?php $cart_check = $this->cart->contents();
                            if(empty($cart_check)) 
                            {
                                echo 'Your cart is empty!';
                            } ?>
                        </span> 
                        <?php
                        if ($cart = $this->cart->contents()): 
                            ?> 
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width:30px;">#</th>
                                    <th style="width:200px;">Name</th>
                                    <th>Price</th>
                                    <th>Tenure</th>
                                    <th>Amount</th>
                                    <th>Cancel</th>
                                </tr>
                            </thead>
                            <?php
                            echo form_open('shopping/update_cart');
                            $grand_total = 0;
                            $i = 1;
                            foreach ($cart as $item):
                                echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $i++; ?>
                                        </td>
                                        <td><?php echo $item['name']; ?></td>
                                        <td>₹ <?php echo number_format($item['price'], 2); ?></td>
                                        <td>
                                            <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
                                        </td>
                                        <?php $grand_total = $grand_total + $item['subtotal']; ?>
                                        <td>
                                            ₹ <?php echo number_format($item['subtotal'], 2) ?>
                                        </td>
                                        <td>
                                            <?php
                                            $path = "<img src='https://cdn3.iconfinder.com/data/icons/ui-icons-5/16/cross-small-01-512.png' width='25px' height='20px'>";
                                            echo anchor('shopping/remove/' . $item['rowid'], $path); ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="5" align="right">
                                        <button class="btn btn-success ml-auto" type="submit"value="Update Cart">Update Cart &nbsp;<i class="fa fa-cart-plus"></i></button>
                                        &nbsp;
                                        <button class="btn btn-success ml-auto" type="submit"value="Update Cart"><a href="<?php echo base_url('razorpay/cartCheckout/');?>" style="text-decoration:none;color:#fff;">Pay Now &nbsp;<i class="fa fa-credit-card"></i></a></button>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <a href="<?php echo base_url('student_controller/search_course/index');?>" class="btn btn-white">Back to Courses</a>
                                    </td>
                                    <td colspan="5" align="right">
                                        <b>Subtotal: ₹<?php

                                        echo number_format($grand_total, 2); ?></b>
                                    </td>

                                </tr>

                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>


            </div>

        </div>




        <?php $this->load->view('include/sidebar')?>

        <style type="text/css">
            div#add_button {
                /*margin-top: 18px;*/
                margin-left: 20px;
                margin-bottom:20px;
            }
            span#go_back {
                margin-left: 245px;
            }

            .fg-button{
                position: relative;
                top: 0;
                border-radius: 4;
                font-size: 18px;
                padding: 8px 28px;
                text-decoration: none;
                border: 0px solid;
                cursor: pointer;
                border-bottom-width: 3px;
                outline: none;
                -webkit-transition: 0.3s background;
                -moz-transition: 0.3s background;
                transition: 0.3s background;
            }
            .fg-button:active{
                top: 2px;
            }
            .fg-button.teal{
                color: #fff;
                border-color: #66bb6a;
                background-color:#66bb6a;
            }
            .fg-button.teal:hover{
                background: #0ACFCB;
            }
            .fg-button.teal:active{
                background: #09cbc7;
                top: 2px;
                border-bottom-width: 1px;
            }
        </style>

        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>

        var razorpay_options = {
            key: "<?php echo $key_id; ?>",
            amount: "<?php echo $total; ?>",
            name: "<?php echo $name; ?>",
            description: "Order # <?php echo $merchant_order_id; ?>",
            netbanking: true,
            currency: "<?php echo $currency_code; ?>",
            prefill: {
                name:"<?php echo $card_holder_name; ?>",
                email: "<?php echo $email; ?>",
                contact: "<?php echo $phone; ?>"
            },
            notes: {
                soolegal_order_id: "<?php echo $merchant_order_id; ?>",
                plan_name: "<?php echo $productinfo; ?>",
                amount: "<?php echo $amount; ?>",
                stdudent_id:"<?php echo $stdid;?>",
            },
            handler: function (transaction) {
                document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
                document.getElementById('razorpay-form').submit();
            },
            "modal": {
                "ondismiss": function(){
                    location.reload()
                }
            }
        };
        var razorpay_submit_btn, razorpay_instance;

        function razorpaySubmit(el){
            if(typeof Razorpay == 'undefined'){
                setTimeout(razorpaySubmit, 200);
                if(!razorpay_submit_btn && el){
                    razorpay_submit_btn = el;
                    el.disabled = true;
                    el.value = 'Please wait...';  
                }
            } else {
                if(!razorpay_instance){
                    razorpay_instance = new Razorpay(razorpay_options);
                    if(razorpay_submit_btn){
                        razorpay_submit_btn.disabled = false;
                        razorpay_submit_btn.value = "Pay Now";
                    }
                }
                razorpay_instance.open();
            }
        }  
    </script>