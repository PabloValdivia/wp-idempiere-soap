<?php  
$model_servic_url="http://192.168.15.42:8080/ADInterface/services/ModelADService?wsdl";
$composit_servic_url="http://192.168.15.42:8080/ADInterface/services/compositeInterface?wsdl";
$auth_user_name="WebService";
$auth_user_pass="WebService";
$login_request='<_0:ADLoginRequest>
                <_0:user>'. $auth_user_name .'</_0:user>
			    <_0:pass>'. $auth_user_pass .'</_0:pass>
			    <_0:RoleID>50004</_0:RoleID>
			    <_0:lang>128</_0:lang>
			    <_0:ClientID>11</_0:ClientID>
			    <_0:OrgID>0</_0:OrgID>
			    <_0:WarehouseID>0</_0:WarehouseID>
			    <_0:stage>0</_0:stage>
			    </_0:ADLoginRequest>';

$p_AD_Role_ID=1000000; // the AD_Role_ID of any new users registered
// Request related parameters, for the request created upon a new user registration
$p_R_RequestType_ID=1000000; 
$p_R_Category_ID=1000000;
$p_SalesRep_ID=101;
?>
