<?php
include '../conf/conf.php'; 

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<title>查询自助结算信息</title>
	</head>
	<body>
		<form method="post" action="sendQuerySelfSettleInfo.php" accept-charset="UTF-8">
			<table width="80%" border="0" align="center" cellpadding="10" cellspacing="0" style="border:solid 1px #107929">
				<tr>
					<th align="center" height="20" colspan="5" bgcolor="#6BBE18">
				   查询自助结算信息
					</th>
				</tr> 
							<tr>
				<td width="15%" align="left">&nbsp;商户编号</td>
				<td width="5%"  align="center"> : </td> 
				<td width="50%" align="left">  <?php echo $merchantNo;?> </td>
				<td width="5%"  align="center"> - </td> 
				<td width="25%" align="left">ppM</td> 
			</tr>
				
				<tr >
					<td width="20%" align="left">&nbsp;</td>
					<td width="5%"  align="center">&nbsp;</td> 
					<td width="55%" align="left"> 
						<input type="submit" value="单击查询" />
					</td>
					<td width="5%"  align="center">&nbsp;</td> 
					<td width="15%" align="left">&nbsp;</td> 
				</tr>
			</table>
		</form>
	</body>
</html>
