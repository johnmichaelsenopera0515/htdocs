<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
 
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<h1 class="page-header">YOUR CART</h1>
	        		<div class="box box-solid">
	        			<div class="box-body">
		        		<table class="table table-bordered">
		        			<thead>
		        				<th></th>
		        				<th>Photo</th>
		        				<th>Name</th>
		        				<th>Price</th>
		        				<th width="20%">Quantity</th>
		        				<th>Subtotal</th>
		        			</thead>
		        			<tbody id="tbody">
		        			</tbody>
		        		</table>
	        			</div>
	        		</div>
	        		<?php
	        			if(isset($_SESSION['user'])){
	        				// echo "
	        				// 	<div id='paypal-button'></div>
	        				// ";

							echo "
								<div id=paypal-button-container></div>
	        				";
							
	        			}
	        			else{
	        				echo "
	        					<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
	        				";
	        			}
	        		?>
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
var total = 0;
$(function(){
	$(document).on('click', '.cart_delete', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'cart_delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.minus', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		if(qty>1){
			qty--;
		}
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.add', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		qty++;
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	getDetails();
	getTotal();

});

function getDetails(){
	$.ajax({
		type: 'POST',
		url: 'cart_details.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
			getCart();
		}
	});
}

function getTotal(){
	$.ajax({
		type: 'POST',
		url: 'cart_total.php',
		dataType: 'json',
		success:function(response){
			total = response;
		}
	});
}
</script>
<!-- Paypal Express -->
<script>
// paypal.Button.render("#el",{
//     env: 'sandbox', // change for production if app is live,

// 	client: {
//         sandbox:    'AWZU2hO_wiHZT8KdeE4ZPqsXSd7E3Sqb0Xmc90Q22O7ASuMQKVA54cgXkERSzKd4ye5pmsyTvnTE5U3s',
//         //production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
//     },

//     commit: true, // Show a 'Pay Now' button

//     style: {
//     	color: 'gold',
//     	size: 'small'
//     },

//     payment: function(data, actions) {
//         return actions.payment.create({
//             payment: {
//                 transactions: [
//                     {
//                     	//total purchase
//                         amount: { 
//                         	total: total, 
//                         	currency: 'PHP' 
//                         }
//                     }
//                 ]
//             }
//         });
//     },

//     onAuthorize: function(data, actions) {
//         return actions.payment.execute().then(function(payment) {
// 			window.location = 'sales.php?pay='+payment.id;
//         });
//     },

// }, '#paypal-button');

window.paypal
  .Buttons({
	 // Set up your transaction details here
			 createOrder: function(data, actions) {
                return actions.order.create({
					
                    purchase_units: [
                        {
							// reference_id: "d9f80740-38f0-11e8-b467-0ed5f89f718b",
                            amount: {
                                currency_code: 'USD', // Change to your desired currency code
                                value: '10.00' // Change to the transaction amount
                            }
                        }
                    ]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(payment) {
                    window.location = 'sales.php?pay='+payment.id;
                });
            },
            onError: function(err) {
                // Handle any errors that occur during the transaction
                console.error(err);
            }
})
  .render("#paypal-button-container");

// Example function to show a result to the user. Your site's UI library can be used instead.
function resultMessage(message) {
  const container = document.querySelector("#result-message");
  container.innerHTML = message;
}

</script>
</body>
</html>