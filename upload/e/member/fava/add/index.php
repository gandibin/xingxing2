<?php
require("../../../class/connect.php");
require("../../../class/q_functions.php");
require("../../../class/db_sql.php");
require("../../../data/dbcache/class.php");
require("../../class/user.php");
require('../../class/favfun.php');
$link=db_connect();
$empire=new mysqlquery();
$editor=2;
eCheckCloseMods('member');//�ر�ģ��
$user=islogin();
$id=(int)$_GET['id'];
$classid=(int)$_GET['classid'];
if(!$id||!$classid||!$class_r[$classid][tbname])
{
	printerror("ErrorUrl","",1);
}
//����
$r=$empire->fetch1("select isurl,titleurl,classid,id,title from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' limit 1");
if(empty($r['id'])||$r['classid']!=$classid)
{
	printerror("ErrorUrl","",1);
}
$titleurl=sys_ReturnBqTitleLink($r);
//���ط���
$cid=(int)$_GET['cid'];
$select=ReturnFavaClass($user[userid],$cid);
$from=EcmsGetReturnUrl();
//����ģ��
require(ECMS_PATH.'e/template/member/AddFava.php');
db_close();
$empire=null;
?>