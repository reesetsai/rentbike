<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>計算機</title>
</head>
<?php
 	ini_set('display_errors', '1');
	if(isset($_POST["num1"]) && isset($_POST["num2"]))
	{
		if(empty(($_POST["num1"]))){
			echo "第一個數字不得為空<br>";
		}
		if(empty(($_POST["num2"]))){
			echo "第二個數字不得為空<br>";
		}
	$oper = $_POST["oper"];
	$num1 = $_POST["num1"];
	$num2 = $_POST["num2"];
}

?>

<body>
		<table border="1" width = 400 align ="center">
		    <form action ="" class="cal" method="post">
			<caption><h2>簡易計算機</h2></caption>
			<tr>
				<td>
					<input type = "text" size="20" name="num1">
				</td>
				<td>
					<select name = "oper">
						<option value = "+">+</option>
						<option value = "-">-</option>
						<option value = "*">x</option>
						<option value = "/">/</option>
					</select>
				</td>
				<td>
					<input type = "text" name="num2" size="20">
				</td>
				<td>
				<input type ="submit" value="計算" name="submit">
				</td>
			</tr>
			
					
		<?php

				function cal($oper,$num1,$num2){
					global $sum;
					switch ($oper) {
						case '+':
							$sum = $num1 + $num2;
							break;
						case '-':
							$sum = $num1 - $num2;
							break;
						case '*':
							$sum = $num1 * $num2;
							break;
						case '/':
							$sum = $num1 / $num2;
							break;
					} var_dump($sum);
					return $sum;
				}				
				if(isset($_POST["submit"]) && empty($_POST["submit"])){
					cal();
					$sum = cal($oper,$num1,$num2);
					
		}
		?>
					
					<tr><td colspan="4" align="center">
					<?php
					echo "計算結果: $num1 $oper $num2 '=' $sum";
					?>
					</td><tr>					
			</form>
		</table>
	</body>
</html>