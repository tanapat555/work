<?php include_once('config.php'); ?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>จัดการผู้ใช้งาน Ethernet</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		.box-title{
			border-radius: 5px;
			box-shadow: 0px 0px 3px 1px gray;
			padding: 10px 0px;
		}
		.error-msg{
			color: #dc3545;
			font-weight: 600;
		}
		.success-msg{
			color: green;
			font-weight: 600;
		}
	</style>
</head>

<body>
	
	<div class="container-fluid">
		<div class="container">
			<div class="row m-3 text-center">
				<div class="col-lg-12">
					<h1 class="box-title">จัดการผู้ใช้งาน Ethernet</h1>
				</div>
			</div>
			<div  class="row justify-content-center">
				<div class="col-lg-6">
				<button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModalCenter" >เพิ่มผู้ใช้งาน</button>	
				</div>
				<div class="col-lg-6">
					<input type="text" id="search" class="form-control" placeholder="ค้นหา">
				</div>
			</div>
			<div class="row mt-5" id="tbl_rec">
		
			</div>
		</div>
	</div>
	
<!-- Insert Design Modal -->
	
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มผู้ใช้งาน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="ins_rec">
	      <div class="modal-body">
			  	<div class="form-group">
					<label><b>ชื่อผู้ใช้งาน</b></label>
					<input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้งาน" id="username" >
					<span class="error-msg" id="msg_1"></span>
			  	</div>
			  	<div class="form-group">
					<label><b>ชื่อนามสกุล</b></label>
					<input type="text" name="email" class="form-control" placeholder="ชื่อนามสกุล">
					<span class="error-msg" id="msg_2"></span>
			  	</div>
				<div class="form-group">
					<label><b>สถานะผู้ใช้</b></label>
					<select class="custom-select" name="country" id="country">
						<option value="" selected>Choose...</option>
						<option value="ผู้ใช้1">ผู้ใช้1</option>
						<option value="ผู้ใช้2">ผู้ใช้2</option>
						<option value="ผู้ใช้3">ผู้ใช้3</option>
					</select>
					<span class="error-msg" id="msg_3"></span>
			  	</div>
				<div class="form-group">
					<label><b>วันหมดอายุบัตร</b></label>
					<input type="date" name="bod" class="form-control">
					<span class="error-msg" id="msg_4"></span>
				  </div>
				<div class="form-group">
					<label class="mr-3"><b>เพศ</b></label>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="gender" value="ชาย" checked>
					  <label class="form-check-label" >ชาย</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="gender" value="หญิง">
					  <label class="form-check-label" >หญิง</label>
					</div>
					<span class="error-msg"  id="msg_5"></span>
				</div>	
				<div class="form-group">
					<label><b>รหัส</b></label>
					<input type="password" name="password" class="form-control">
					<span class="error-msg" id="msg_6"></span>
				  </div>
				  <div class="form-group">
					<label><b>หน่วยงาน</b></label>
					<select class="custom-select" name="department" id="department">
						<option value="" selected>Choose...</option>
						<option value="แพทย์">แพทย์</option>
						<option value="พยาบาล">พยาบาล</option>
						<option value="ศูนย์คอม">ศูนย์คอม</option>
					</select>
					<span class="error-msg" id="msg_7"></span>
				  </div>
				<div class="form-group">
					<span class="success-msg" id="sc_msg"></span>
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" id="close_click" data-dismiss="modal">ยกเลิก</button>
	        <button type="submit" class="btn btn-primary btn-save" value="save">เพิ่มผู้ใช้งาน</button>
	      </div>
      </form>
    </div>
  </div>
</div>

	
<!-- End Insert Modal -->
		
<!-- Update Design Modal -->
	
<div class="modal fade" id="updateModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalCenterTitle">แก้ไข</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="updata">
      <div class="modal-body">
		  	<div class="form-group">
				<label><b>ชื่อผู้ใช้งาน</b></label>
				<input type="text" class="form-control" name="username" id="upd_1" placeholder="ชื่อผู้ใช้งาน">
				<span class="error-msg" id="umsg_1"></span>
		  	</div>
		  	<div class="form-group">
				<label><b>ชื่อนามสกุล</b></label>
				<input type="text" class="form-control" name="email" id="upd_2" placeholder="ชื่อนามสกุล">
				<span class="error-msg" id="umsg_2"></span>
		  	</div>
			<div class="form-group">
				<label><b>สถานะผู้ใช้</b></label>
				<select class="custom-select" id="upd_3" name="country">
					<option value="" selected>Choose...</option>
					<option value="ผู้ใช้1">ผู้ใช้1</option>
					<option value="ผู้ใช้งาน2">ผู้ใช้2</option>
					<option value="ผู้ใช้งาน3">ผู้ใช้3</option>
				</select>
				<span class="error-msg" id="umsg_3"></span>
		  	</div>
			<div class="form-group">
				<label><b>วันหมดอายุบัตร</b></label>
				<input type="date" class="form-control" id="upd_4" name="bod">
				<span class="error-msg" id="umsg_4"></span>
		  	</div>
			<div class="form-group">
				<label><b>เพศ</b></label>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" id="upd_5" name="gender" value="ชาย">
				  <label class="form-check-label" >ชาย</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" id="upd_6" name="gender" value="หญิง">
				  <label class="form-check-label" >หญิง</label>
				</div>
				<span class="success-msg" id="umsg_5"></span>
			</div>
			<div class="form-group">
				<input type="hidden" name="dataval" id="upd_7">
				<span class="success-msg" id="umsg_6"></span>
			</div>
			<div class="form-group">
					<label><b>รหัส</b></label>
					<input type="password" name="password" class="form-control">
					<span class="error-msg" id="msg_6"></span>
				  </div>
				  <div class="form-group">
				<label><b>สถานะผู้ใช้</b></label>
				<select class="custom-select" id="upd_8" name="department">
					<option value="" selected>Choose...</option>
					<option value="แพทย์">แพทย์</option>
					<option value="พยาบาล">พยาบาล</option>
					<option value="ศูนย์คอม">ศูนย์คอม</option>
				</select>
				<span class="error-msg" id="umsg_3"></span>
		  	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="up_cancle">ยกเลิก</button>
        <button type="submit" class="btn btn-primary">แก้ไข</button>
      </div>
      </form>	
    </div>
  </div>
</div>	

	
<!-- End Update Design Modal -->
	
<!-- Delete Design Modal -->
	
<div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalCenterTitle">คุณแน่ใจใช่ไหมว่าจะลบข้อมูลนี้</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <p>ถ้าคุณลบข้อมูลนี้ไปแล้วจะไม่สามารถกู้คืนได้น่ะ</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="de_cancle" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-primary" id="deleterec">ลบ</button>
      </div>
    </div>
  </div>
</div>	
	
<!-- End Delete Design Modal -->
	
<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript">
	
$(document).ready(function (){
	$('#tbl_rec').load('record.php');

	$('#search').keyup(function (){
		var search_data = $(this).val();
		$('#tbl_rec').load('record.php', {keyword:search_data});
	});

	//insert Record

	$('#ins_rec').on("submit", function(e){
		e.preventDefault();
		$.ajax({

			type:'POST',
			url:'insprocess.php',
			data:$(this).serialize(),
			success:function(vardata){

				var json = JSON.parse(vardata);

				if(json.status == 101){
					console.log(json.msg);
					$('#tbl_rec').load('record.php');
					$('#ins_rec').trigger('reset');
					$('#close_click').trigger('click');
				}
				else if(json.status == 102){
					$('#sc_msg').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 103){
					$('#msg_1').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 104){
					$('#msg_2').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 105){
					$('#msg_3').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 106){
					$('#msg_4').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 107){
					$('#msg_5').text(json.msg);
					console.log(json.msg);
				}
				else{
					console.log(json.msg);
				}

			}

		});

	});

	//select data

	$(document).on("click", "button.editdata", function(){
		$('#umsg_1').text("");
		$('#umsg_2').text("");
		$('#umsg_3').text("");
		$('#umsg_4').text("");
		$('#umsg_5').text("");
		$('#umsg_6').text("");
		$('#umsg_7').text("");
		var check_id = $(this).data('dataid');
		$.getJSON("updateprocess.php", {checkid : check_id}, function(json){
			if(json.status == 0){
				$('#upd_1').val(json.username);
				$('#upd_2').val(json.email);
				$('#upd_3').val(json.country);
				$('#upd_4').val(json.bod);
				$('#upd_7').val(check_id);
				$('#upd_8').val(json.department);
				if(json.gender == 'Male'){
					$('#upd_5').prop("checked", true);
				}
				else{
					$('#upd_6').prop("checked", true);
				}
			}
			else{
				console.log(json.msg);
			}
		});
	});

	//Update Record

	$('#updata').on("submit", function(e){
		e.preventDefault();

		$.ajax({

			type:'POST',
			url:'updateprocess2.php',
			data:$(this).serialize(),
			success:function(vardata){

				var json = JSON.parse(vardata);

				if(json.status == 101){
					console.log(json.msg);
					$('#tbl_rec').load('record.php');
					$('#ins_rec').trigger('reset');
					$('#up_cancle').trigger('click');
				}
				else if(json.status == 102){
					$('#umsg_6').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 103){
					$('#umsg_1').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 104){
					$('#umsg_2').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 105){
					$('#umsg_3').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 107){
					$('#umsg_4').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 106){
					$('#umsg_5').text(json.msg);
					console.log(json.msg);
				}

				else{
					console.log(json.msg);
				}

			}

		});

	});

	//delete record

	var deleteid;

	$(document).on("click", "button.deletedata", function(){
		deleteid = $(this).data("dataid");
	});

	$('#deleterec').click(function (){
		$.ajax({
			type:'POST',
			url:'deleteprocess.php',
			data:{delete_id : deleteid},
			success:function(data){
				var json = JSON.parse(data);
				if(json.status == 0){
					$('#tbl_rec').load('record.php');
					$('#de_cancle').trigger("click");
					console.log(json.msg);
				}
				else{
					console.log(json.msg);
				}
			}
		});
	});


});

</script>


</body>
</html>
