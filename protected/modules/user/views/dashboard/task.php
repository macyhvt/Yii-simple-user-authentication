<?php 
//print_r($patientData);exit;
?>
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th id="hvtpatient-list-grid_c0">
				<a class="sort-link" href="">ID</a>
			</th>
			<th id="hvtpatient-list-grid_c1">
				<a class="sort-link" href="">Name</a>
			</th>
			<th id="hvtpatient-list-grid_c2">
				<a class="sort-link" href="">Age</a>
			</th>
			<th id="hvtpatient-list-grid_c3">
				<a class="sort-link" href="">Gender</a>
			</th>
			<th id="hvtpatient-list-grid_c4">
				<a class="sort-link" href="">OPD Number</a>
			</th>
			<th id="hvtpatient-list-grid_c5">
				<a class="sort-link" href="">Contact Number</a>
			</th>
			<th id="hvtpatient-list-grid_c5">
				<a class="sort-link" href="">Time</a>
			</th>
			<th id="hvtpatient-list-grid_c5">
				<a class="sort-link" href="">Status</a>
			</th>
		</tr>

	
</thead>
	<tbody>
	<tr class="odd">
		<?php foreach($patientData as $data){?>
		<td><?php echo $data['id'];?></td>
		<td><a class="view" title="View" href="<?php echo $this->createUrl('/admin/hVTPatientList/views/id/'.$data['id']);?><?php //echo $data['id'];?>"><?php echo $data['name'];?></a></td>
		<td><?php echo $data['age'];?></td>
		<td><?php echo $data['gender'];?></td>
		<td><?php echo $data['opdno'];?></td>
		<td><?php echo $data['contactno'];?></td>
		<td><?php echo $data['appointment_time'];?></td>
		<td><?php echo $data['status'];?></td>
	</tr>
		<?Php }?>
	</tbody>
</table>