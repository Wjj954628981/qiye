<?php 
use yii\helpers\Html;
?>

<div>
	<?php
		echo $title.'<br>';
		echo $test['title'].'<br>';
		echo $test['name'].'<br>';
		foreach ($query->each() as $rows) {
			echo $rows['material_out_orderid'].'<br>';
			echo $rows['employee_id'].'<br>';
			echo $rows['department_id'].'<br>';
			echo $rows['material_out_ordertime'].'<br>';
			echo $rows['material_out_orderstate'].'<br>';
			echo $rows['material_out_orderremark'].'<br>';
		}
	?>
</div>