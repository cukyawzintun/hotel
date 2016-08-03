	<!-- start header -->
	<?php 
		session_start();
		include 'db_connect.php';
		include '../header.php'; 
	?>
	<style>
		input[type="submit"] {
		    text-transform: capitalize;
		    width: 25% !important;
		    height: 50px;
		    background: #32A2E3;
		    color: #FFF;
		    padding: 8px;
		    border: none;
		    font-size: 1em;
		    transition: 0.5s all;
		    -webkit-transition: 0.5s all;
		    -moz-transition: 0.5s all;
		    -o-transition: 0.5s all;
		    outline: none;
		    cursor: pointer;
		}
		#checkIn , #checkOut {
			font-size: 12px;
			color: red;
			font-weight: bold;
		}
	</style>
	
	<!--start main -->
	<div class="main_bg">
	<div class="wrap">
		<div class="main">
			<div class="res_online">
				<h4>basic information</h4>
				<p class="para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			</div>
			<form action="available_room.php" method="POST">			
				<div class="span_of_2">
					<div class="span2_of_1">
						<h4>check-in: <span id="checkIn"></span></h4>
						<div class="book_date btm">
							<input class="date" id="datepicker" type="text" name="check_in_date" placeholder="DD/MM/YY" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}">
						</div>

						<div class="sel_room">
							<h4>Select Hotel:</h4>
							<select id="country" name="hotel_name" onchange="change_country(this.value)" class=" required">
								<?php 
									$result = mysqli_query($con,"SELECT * FROM hotel");
									while ( $row = mysqli_fetch_array($result)):
							 	?>	
								<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
								<?php endwhile; ?>
			        		</select>
						</div>

						<div class="sel_room left">
							<h4>adults per room:</h4>
							<select name="adult" id="country" onchange="change_country(this.value)" class="frm-field required">
								<option value="1">1</option>
					            <option value="2">2</option>         
					            <option value="3">3</option>
								<option value="4">4</option>
			        		</select>
						</div>
					</div>
					<div class="span2_of_1">
						<h4>check-out: <span id="checkOut"></span></h4>
						<div class="book_date btm">
							<input class="date" id="datepicker1" type="text" name="check_out_date" placeholder="DD/MM/YY" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}">
						</div> 

						 <div class="sel_room">
							<h4>childern:</h4>
							<select id="country" name="childern" onchange="change_country(this.value)" class="frm-field required">
								<option value="0">0</option>
								<option value="1">1</option>
					            <option value="2">2</option>         
					            <option value="3">3</option>
								<option value="4">4</option>
			        		</select>
						</div>	
					
					</div>
					<div class="clear"></div>
				</div>
				<div class="res_btn">
					<input type="submit" id="checkAvailable" value="check available" style="width: 280px;">
				</div>
			</form>	
		</div>
	</div>
	</div>		
	
	<script>
	    $(document).ready(function() {
			$('input').change(function() {
		        var checkInEmpty = false;
		        var checkOutEmpty = false;
		        var checkIn = document.getElementById('datepicker').value;
		        var checkOut = document.getElementById('datepicker1').value;
		        if (checkIn == '' || checkIn == null ) {
		            checkInEmpty = true;
		            document.getElementById("checkIn").innerHTML = "Check In Date Require";
		        }else { document.getElementById("checkIn").innerHTML = ""; }

				if (checkOut == '' || checkOut == null ) {
		        	checkOutEmpty = true;
		            document.getElementById("checkOut").innerHTML = "Check Out Date Require"	
		        }else { document.getElementById("checkOut").innerHTML = ""; }
		
		        if (checkInEmpty || checkOutEmpty) {

		            $('#checkAvailable').attr('disabled', 'disabled');
		            $('#checkAvailable').css('background','grey');
		        } else {
		            $('#checkAvailable').removeAttr('disabled');
		            $('#checkAvailable').css('background','#32A2E3');
		            $('#lock-icon').remove();
		        }
		    });
		    
		    /*form date will be remain when backward button click ,the following script will be load*/

		    var checkInEmpty = false;
		    var checkOutEmpty = false;
		    var checkIn = document.getElementById('datepicker').value;
		    var checkOut = document.getElementById('datepicker1').value;
		    if (checkIn == '' || checkIn == null ) {
		        checkInEmpty = true;
		    }else { document.getElementById("checkIn").innerHTML = ""; }

			if (checkOut == '' || checkOut == null ) {
		        checkOutEmpty = true;	
		    }else { document.getElementById("checkOut").innerHTML = ""; }
		
		    if (checkInEmpty || checkOutEmpty) {
		        $('#checkAvailable').attr('disabled', 'disabled');
		        $('#checkAvailable').css('background','grey');
		    } else {
		        $('#checkAvailable').removeAttr('disabled');
		        $('#checkAvailable').css('background','#32A2E3');
		        $('#lock-icon').remove();
		    }    
		});  
	</script>

	<!-- start footer -->
	<?php include '../footer.php'; ?>
</body>
</html>