<?php
$this->pageTitle=Yii::app()->name;
?>
<style>
.drop-btns{display:none;}
</style>
<div class="row-fluid">
	<div class="span12 well">
	<?php if(Yii::app()->user->role == "Editor"){?>
		<h3>Hello <?php echo $data[0]['full_name'];?></h3>
		<table>
			<tr>
				<td>Username: <?php echo $data[0]['username'];?></td>
				<td>Role: <?php echo $data[0]['role'];?></td>
				<td>Last login time: <?php echo date("h:i:sa");?></td>
			</tr>
	</table>
	<?php }?>
	<?php if(Yii::app()->user->role == "Administrator"){?>
		<h3>Hello <?php echo $data[0]['full_name'];?></h3>
		
	<?php }?>
		
	</div><!--/span-->
</div>
