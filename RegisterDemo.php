<?php

include("BeikelinSdk.php");
$obj = new BeikelinSdk();

#商户入驻接口
//$data['service']     = 'custApply';         # 接口名称
//$data['address'] = '物流港四川纵横农副产品批发市场8号楼';
//$data['email'] = '100002@qq.com';
//$data['busitype'] = '3';
//$data['busiscope'] = '农副产品、水果、蔬菜、百货、工艺品、水产品、家用电器';
//$data['industrycategory1'] = '1100';
//$data['industrycategory2'] = '1101';
//$data['telno'] = '13568844556';
//$data['contactname'] = '蒲洋002';
//$data['custname'] = '接口测试002';
//$data['name'] = '百家农贸市场1226211';
//$data['accountno'] = '3563012000002';
//$data['legalrepresentative'] = '欧阳婉002';
//$data['openbankcode'] = '102301000680';
//$data['mobile'] = '18608255552';
//$data['legalcertno'] = '51090219901';
//$data['licenseno'] = '9151090335623';
//$data['loginpwd'] = 'fb0245810c6bd07';
//$data['companyname'] = '接口测试002';
//$data['credentialsimage2'] = '121321';
//$data['credentialsimage3'] = '121321';
//$data['credentialsimage8'] = '121321';
//$data['accounttype'] = '1';
//$data['custtype'] = '0';
//$data['acctype'] = '1';
//$data['notifyurl'] = 'http://admintest.beikelin.com/222222';
//$data['provinceid'] = '23';
//$data['cityid'] = '242';
//$data['districtid'] = '2099';
//$data['legalcerttype'] = '01';

#商户入驻更新接口
$data['service']     = 'updateApplyCust';         # 接口名称
$data['custid']     = '2833901';
$data['address'] = '物流港四川纵横农副产品批发市场8号楼';
$data['email'] = '123449666@qq.com';
$data['busitype'] = '3';
$data['busiscope'] = '农副产品、水果、蔬菜、百货、工艺品、水产品、家用电器';
$data['industrycategory1'] = '1100';
$data['industrycategory2'] = '1101';
$data['telno'] = '13568844556';
$data['contactname'] = '蒲洋';
$data['custname'] = '百家农贸市场9666';
$data['name'] = '百家农贸市场9666';
$data['accountno'] = '3563012000066';
$data['legalrepresentative'] = '欧阳婉66';
$data['openbankcode'] = '102301000680';
$data['mobile'] = '18608255552';
$data['legalcertno'] = '51090219901';
$data['licenseno'] = '9151090335623';
$data['loginpwd'] = 'fb0245810c6bd07';
$data['companyname'] = '百家农贸市场122666';
$data['credentialsimage2'] = '121321';
$data['credentialsimage3'] = '121321';
$data['credentialsimage8'] = '121321';
$data['accounttype'] = '1';
$data['custtype'] = '0';
$data['acctype'] = '1';
$data['notifyurl'] = 'http://admintest.beikelin.com/966666';
$data['provinceid'] = '23';
$data['cityid'] = '242';
$data['districtid'] = '2099';
$data['legalcerttype'] = '01';


#商户基本信息修改接口
//$data['service']     = 'updateCustInfo';         # 接口名称
//$data['subpartner']     = '2833901';
//$data['address'] = '物流港四川纵横农副产品批发市场8号楼';
//$data['email'] = '1234888@qq.com';
//$data['busitype'] = '3';
//$data['busiscope'] = '农副产品、水果、蔬菜、百货、工艺品、水产品、家用电器';
//$data['industrycategory1'] = '1100';
//$data['industrycategory2'] = '1101';
//$data['telno'] = '13568844556';
//$data['contactname'] = '蒲洋';
//$data['custname'] = '百家农贸市场888';
//$data['name'] = '百家农贸市场888';
//$data['accountno'] = '3563012000088';
//$data['legalrepresentative'] = '欧阳婉';
//$data['openbankcode'] = '102301000680';
//$data['mobile'] = '18608255552';
//$data['legalcertno'] = '51090219901';
//$data['licenseno'] = '9151090335623';
//$data['loginpwd'] = 'fb0245810c6bd07';
//$data['companyname'] = '百家农贸市场122620';
//$data['credentialsimage'] = '121321';
//$data['credentialsimage8'] = '121321';
//$data['credentialsimage11'] = '121321';
//$data['accounttype'] = '1';
//$data['custtype'] = '0';
//$data['notifyurl'] = 'http://admintest.beikelin.com/88888';
//$data['provinceid'] = '23';
//$data['cityid'] = '242';
//$data['districtid'] = '2099';
//$data['legalcerttype'] = '01';

#商户查询接口
//$data['service']     = 'queryApplyCust';         # 接口名称
//$data['custid']  = '2833901';


$res = $obj->api('subpartner',$data);
echo '<pre />';print_r($res);




















