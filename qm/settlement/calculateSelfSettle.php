<?php
 
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<title>自助结算试算</title>
	</head>
	<body>
		<form method="post" action="sendCalculateSelfSettle.php" accept-charset="UTF-8">
			<table width="80%" border="0" align="center" cellpadding="10" cellspacing="0" style="border:solid 1px #107929">
				<tr>
					<th align="center" height="20" colspan="5" bgcolor="#6BBE18">
				   自助结算试算
					</th>
				</tr> 
					<tr >
					<td width="20%" align="left">&nbsp;结算截止时间</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="settleTime" value=""/>
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">settleTime</td> 
				</tr>
				
				 <tr>
                      <td width="20%" align="left">&nbsp;自助结算产品</td>
                     <td width="5%"  align="center"> : &nbsp;</td> 
					 <td width="55%" align="left"> 
                             <select name="settleProduct" required>
                             <option value="T1">T1</option>
                             <option value="D1">D1</option>
                             <option value="D0">D0</option>
                </select> 
            </td>  
               <td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">settleProduct</td> 			</tr>
		   	 
				
				
				<tr >
					<td width="20%" align="left">&nbsp;</td>
					<td width="5%"  align="center">&nbsp;</td> 
					<td width="55%" align="left"> 
						<input type="submit" value="确认" />
					</td>
					<td width="5%"  align="center">&nbsp;</td> 
					<td width="15%" align="left">&nbsp;</td> 
				</tr>
			</table>
		</form>
	</body>
</html>
