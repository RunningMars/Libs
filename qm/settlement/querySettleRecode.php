<?php
 

?>
 
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<title>查询结算记录</title>
	</head>
	<body>
		<form method="post" action="sendQuerySettleRecode.php" accept-charset="UTF-8">
			<table width="80%" border="0" align="center" cellpadding="10" cellspacing="0" style="border:solid 1px #107929">
				<tr>
					<th align="center" height="20" colspan="5" bgcolor="#6BBE18">
				   查询结算记录
					</th>
				</tr> 
					<tr >
					<td width="20%" align="left">&nbsp;结算起始时间</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="settleBeginDate" value=""/>
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">settleBeginDate</td> 
				</tr>
					<tr >
					<td width="20%" align="left">&nbsp;结算截止时间</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="settleEndDate" value=""/>
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">settleEndDate</td> 
				</tr>
				
				 <tr>
                      <td width="20%" align="left">&nbsp;打款状态</td>
                     <td width="5%"  align="center"> : &nbsp;</td> 
					 <td width="55%" align="left"> 
					 <label> 
                     <input type="checkbox" name="statusList[]" value="INIT" >待打款<br>
					 </label> 
					 <label> 
		             <input type="checkbox" name="statusList[]" value="PROCESSING" >待提交银行<br>
					 </label> 
					  <label> 
					 <input type="checkbox" name="statusList[]" value="BANKPROCESS" >银行处理中<br>
					 </label> 
					  <label> 
		             <input type="checkbox" name="statusList[]" value="BANKPROFAILED" >银行处理失败<br>
					 </label> 
					  <label> 
					 <input type="checkbox" name="statusList[]" value="SUCCESS" >打款成功<br>
					 </label> 
					  <label> 
		             <input type="checkbox" name="statusList[]" value="FAILED" >打款失败<br>
					 </label> 
					  <label> 
					 <input type="checkbox" name="statusList[]" value="REFUNDED" >已退回<br>
					 </label> 
					  
		             </label> 
					 
            </td>  
               <td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">statusList</td> 	</tr>
		   	 
					 
				
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
