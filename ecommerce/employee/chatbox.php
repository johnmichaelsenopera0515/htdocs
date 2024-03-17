<?php include 'includes/session.php'; ?>
 
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
	 
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		
	    <div class="container">
		<section class="content-header">
			<h1>
				Messages
			</h1>
			<ol class="breadcrumb">
				<!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li>Products</li> -->
				<!-- <li class="active">Messages</li> -->
			</ol>
		</section>
	      <!-- Main content -->
	      <section class="content">
	        <div class=" ">
				<div class="card chat-app">
					<div id="plist" class="people-list col-4">
						<!-- <div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-search"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="Search...">
						</div> -->
						<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close</span></a>
						<ul class="list-unstyled chat-list mt-2 mb-0">
							
						<?php
								$conn = $pdo->open(); 
								try{
								$now = date('Y-m-d');
								

								$stmt = $conn->prepare("SELECT users.*,products.name AS job_order,job_order.id AS job_id FROM job_order LEFT JOIN chatbox ON job_order.id = chatbox.order_id JOIN  users ON job_order.user_id = users.id JOIN products ON job_order.product_id = products.id WHERE job_order.status <> 'P' AND job_order.emp_assigned_id=".$employee['id']." GROUP BY job_order.id order by chatbox.created_date ASC");
								$stmt->execute();
								 
								foreach($stmt as $row){ 
									$job_id = $row["job_id"];
									$photo = (!empty($row['photo'])) ? '../images/'.$row['photo'] : 'images/profile.jpg';  
									echo '
									<li class="clearfix clickChatbox" data-id='.$row["job_id"].'>
										<img src="'.$photo.'" alt="avatar">
										<div class="about"> 
											<div class="name">'.$row["firstname"].'</div>
											<div class="status">'.$row["company"].'</div>
											<div class="status">'.$row["job_order"].'</div>                                    
										</div>
									</li>
									';
									
									// <td>PHP ".number_format($row['price'], 2)."</td> 
								}
								}
								catch(PDOException $e){
								echo $e->getMessage();
								}

								$pdo->close();
							?>  
							<!-- <li class="clearfix active">
								<img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
								<div class="about">
									<div class="name">Aiden Chavez</div>
									<div class="status"> <i class="fa fa-circle online"></i> online </div>
								</div>
							</li>   -->
						</ul>
					</div>
					<div class="chat  col-8">
					<button class="openbtn" id="openbtn" onclick="openNav()"><span class='fa fa-bars'></span></button> 
						<div class="chat-header clearfix header">
							<div class="row">
								<div class="col-lg-6">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
										<img id="selected_profile" src='' alt="avatar">
									</a>
									<div class="chat-about">
										<h6 class="m-b-0" id='emp'></h6>
										<!-- <small>Last seen: 2 hours ago</small> -->
									</div>
								</div> 
							</div>
						</div>
						<div class="chat-history" id="chat-history">
							<ul class="m-b-0" id="history_details">
								<!-- <li class="clearfix">
									<div class="message-data text-right">
										<span class="message-data-time">10:10 AM, Today</span>
										<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
									</div>
									<div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div>
								</li> -->
								<!-- <li class="clearfix">
									<div class="message-data">
										<span class="message-data-time">10:12 AM, Today</span>
									</div>
									<div class="message my-message">Are we meeting today?</div>                                    
								</li>                               
								<li class="clearfix">
									<div class="message-data">
										<span class="message-data-time">10:15 AM, Today</span>
									</div>
									<div class="message my-message">Project has been already finished and I have results to show you.</div>
								</li> -->
							</ul>
						</div>
						<div class="box-footer"> 
							<div class="input-group"  style="z-index:0;">
							<input type="text" name="message" placeholder="Type Message ..." class="form-control" id="message">
								<span class="input-group-btn">
									<button class="btn btn-primary btn-flat clickSendMessage"  data-id="<?php echo $job_id; ?>">Send</button>
								</span>
							</div> 
						</div>
					</div>
				</div> 
	        </div>
	      </section>
	     
	    </div>
	  </div>
   
</div>

<?php include 'includes/scripts.php'; ?>
<script> 
$(function(){
	localStorage.setItem("job_id","")
	setInterval(function () { fetchMsg(atob(localStorage.getItem("job_id"))); }, 1000); 
	$(document).on('click', '.clickChatbox', function(e){ 
		e.preventDefault();
		var id = $(this).data('id');   
		localStorage.setItem("job_id",btoa(id))
		fetchMsg(id)
	});

	function fetchMsg(id){ 
		var container = document.getElementById("chat-history"); 
		if(container.scrollHeight != localStorage.getItem("scrollHeight")){ 
			container.scrollTop = container.scrollHeight; 
			localStorage.setItem('scrollHeight',container.scrollHeight)
		}  

		// console.lchatbox_messagesog(container.scrollHeight,document.getElementById("scrollHeight"))
		$.ajax({
			type: 'POST',
			url: 'chatbox_messages.php',
			data: {id:id},
			dataType: 'json',
			success: function (response) { 
				if (response) { 
					$('#history_details').html(response.list);
					$('#emp').text(response.name)
					// alert(response.photo)
					// $('#selected_profile').attr("src", '../'+response.photo); 
					if(response.photo != ""){ 
						$('#selected_profile').attr("src", '../'+response.photo);  
					}else{ 
						$('#selected_profile').attr("src", "../images/profile.jpg");  
					}
				} else {
					console.log('Empty response or invalid JSON');
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log("AJAX Error: " + errorThrown);
			}
		});
	}

	$(document).on('click', '.clickSendMessage', function(e){
		e.preventDefault();
		var id = $(this).data('id'); 
		var message = $('#message').val(); 
 
		var form = {
			job_id:atob(localStorage.getItem("job_id")),
			message:message
		} 

		if(message == ""){
			return
		}
		
		if(!parseInt(atob(localStorage.getItem("job_id")))){ 
			Swal.fire("First you must select user!",'Error');
			return
		}else{
			$.ajax({
			type: 'POST',
			url: 'chatbox_send_message.php',
			data: form,
			dataType: 'json',
			success: function (response) {
				 
				if (response) {   
					fetchMsg(response)
				} else {
					console.log('Empty response or invalid JSON');
				}
				$('#message').val("")
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log("AJAX Error: " + errorThrown);
			}
		});
		} 
	});
});
function openNav() { 
	document.getElementById("openbtn").style.display = "none"; 
	document.getElementById("plist").style.width = "300px";
	document.getElementById("plist").style.right = "0px"; 
}

function closeNav() { 
	document.getElementById("openbtn").style.display = "block"; 
	document.getElementById("plist").style.width = "0";  
	document.getElementById("plist").style.right = "-50px"; 
  
}
</script>
<style>

body{
    background-color: #f4f7f6; 
}
.card {
    background: #fff;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}
.chat-app{
	/* display: grid; */
	/* grid-template-columns: 25% 70% ; */
	/* grid-template-rows: 100px 300px; */
}
.chat-app .people-list {
    /* width: 280px; 
    left: 0;
    top: 0;
    padding: 20px; 
	max-height:100vh;
	overflow: auto; */

	width: 0;
	position: fixed;
	z-index: 1;
	height: 100vh;
	top:44px;
	right: -50px;
	background-color: #fff;
	overflow-x: hidden;
	transition: 0.5s;
	padding-top: 60px;
}

.chat-app .chat {
    /* margin-left: 280px; */
    border-left: 1px solid #eaeaea; 
	 
}

.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s
}

.people-list .chat-list{
	overflow: auto !important;
}


.people-list .chat-list li {
    padding: 10px 15px;
    list-style: none;
    border-radius: 3px
}

.people-list .chat-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
    padding: 20px;
    border-bottom: 2px solid #fff; 
	max-height:70vh;
	overflow:auto;
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}

.chat .chat-history .message-data {
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .chat-history .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .my-message {
    background: #efefef
}

.chat .chat-history .my-message:after {
    bottom: 100%;
    left: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #efefef;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .other-message {
    background: #e8f1f3;
    text-align: right
}

.chat .chat-history .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 93%
}

.chat .chat-message {
    padding: 20px;
	 
}

.online,
.offline,
.me {
    margin-right: 2px;
    font-size: 8px;
    vertical-align: middle
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    color: #1d8ecd
}

.float-right {
    float: right
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}
.closebtn{ 
	display:flex;
	padding:5px; 
	text-align:center;
	font-size:30px;
	justify-content: center;
	background-color:#efefef;
	
}

@media only screen and (max-width: 1110px) {
    .chat-app .people-list {
        /* height: 465px;
        width: 50%;
        overflow-x: auto;
        background: #fff;
        display: absolute; 
        left: -400px;
		overflow:auto; */
		width: 0;
		position: fixed;
		z-index: 1;
		height: 100vh;
		top:44px;
		right: -50px;
		background-color: #fff;
		overflow-x: hidden;
		transition: 0.5s;
		padding-top: 60px;
    }
    .chat-app .people-list.open {
        left: 0
    }
    .chat-app .chat {
        margin: 0
    }
    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0;
		display:flex;
		
    }
    .chat-app .chat-history {
        /* height: 300px; */
		max-height:70vh;
        overflow-x: auto
    }
	.chat-app{
		display: block; 
	}
}

/* @media only screen and (min-width: 791px) and (max-width: 1100px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    } 
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    
	.chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
	.container{
		padding:0px;
		margin:0px;
	}
} */
</style>
</body>

</html>