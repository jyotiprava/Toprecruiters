<?php
include_once("../function.php");
if($_POST['editval']=='')
{
    foreach($_POST['field'] as $key=>$value)
    {
        $field=htmlentities($_POST['field'][$key],ENT_QUOTES);
        foreach($_POST["trade$key"] as $k=>$v)
        {
            $trade=htmlentities($v,ENT_QUOTES);
            //echo "insert into `fieldofstudy` set `field`='$field',`trade`='$trade'"."<br/>";
           mysql_query("insert into `fieldofstudy` set `field`='$field',`trade`='$trade'")or die(mysql_error());
        }
    }
}
else
{
    foreach($_POST['field'] as $key=>$value)
    {
        $field=htmlentities($_POST['field'][$key],ENT_QUOTES);
        $trade=htmlentities($_POST['trade'][$key],ENT_QUOTES);
        
        //echo "$field--------------------$trade";
        if($field!='' && $trade!='')
        {
            $qwe=mysql_query("select * from `fieldofstudy` where `field`='$field' and `trade`='$trade'")or die(mysql_error());
            if(mysql_num_rows($qwe)==0)
            {
                mysql_query("insert into `fieldofstudy` set `field`='$field',`trade`='$trade'")or die(mysql_error());
            }
            else
            {
                $res=mysql_fetch_array($qwe);
                mysql_query("update `fieldofstudy` set `field`='$field',`trade`='$trade' where `id`='$res[id]'")or die(mysql_error());
            }
        }
    }
}
$msg="Field Added Successfully";
header("location:field.php?msg=$msg");
?>