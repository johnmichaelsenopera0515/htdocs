<?php
 include("../template/header.php");
?>
 <style>          
 #navlist li
	{
		float:left;
		display: inline;
		list-style-type: none;
		padding-right: 20px;
	}
</style>
 
 <form name="search_frm" id="search_frm" method="post">
    <div class="portlet-body">
     <div class="table-responsive">	
        <table align="right">
              <TR>
                <TD  nowrap="nowrap">
                  <?php
                      $hash    =  getTableFieldsName("referrals");
                      $hash    = array_diff($hash,array("id"));
                  ?>
                  <select   name="field_name" id="field_name"  class="form-control">
                    <option value="">--Select--</option>
                    <?php
                    foreach($hash as $key=>$value)
                    {
                    ?>
                    <option value="<?=$key?>" <?php if($_SESSION['field_name']==$key) echo "selected"; ?>><?=str_replace("_"," ",$value)?></option>
                    <?php
                    }
                  ?>
                  </select>
                </TD>
                <TD  nowrap="nowrap" align="right">
                   <input type="text"    name="field_value" id="field_value" value="<?=$_SESSION["field_value"]?>" class="form-control"></TD>
                <td nowrap="nowrap" align="right">
                  <input type="hidden" name="cmd" id="cmd" value="search_users" >
                  <input type="submit" name="btn_submit" id="btn_submit"  value="Search" class="btn btn-primary" />
                </td>
              </TR>
            </table>
    </div>
    </div>
  </form>
     	
<div class="row">
    <div class="col">
        <section class="card">
            <header class="card-header">
                <div class="card-actions">
                    <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                    <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                </div>

                <h2 class="card-title">Referrals</h2>
            </header>
            <div class="card-body">
                <table class="table table-bordered table-striped mb-0" id="datatable-default">
                    <tbody>
							<tr bgcolor="#ABCAE0">
                                <td>Affiliate Users</td>
                                <td>Buyer Users</td>
                                <td>Products</td>
                                <td>Commission</td>
                                <td>Date Created</td>                                
							</tr>
						 <?php
								
								if($_SESSION["search"]=="yes")
								  {
									$whrstr = " AND ".$_SESSION['field_name']." LIKE '%".$_SESSION["field_value"]."%'";
								  }
								  else
								  {
									$whrstr = "";
								  }
								  
								  $whrstr .= " AND affiliate_users_id='".$_SESSION['users_id']."'";
						 
								$rowsPerPage = 10;
								$pageNum = 1;
								if(isset($_REQUEST['page']))
								{
									$pageNum = $_REQUEST['page'];
								}
								$offset = ($pageNum - 1) * $rowsPerPage;  
						 
						 
											  
								$info["table"] = "referrals";
								$info["fields"] = array("referrals.*"); 
								$info["where"]   = "1   $whrstr ORDER BY id DESC  LIMIT $offset, $rowsPerPage";
													
								
								$arr =  $db->select($info);
								
								for($i=0;$i<count($arr);$i++)
								{
								
						 ?>
							<tr>
							  <td>
		                            <?php
									    unset($info2);        
										$info2['table']    = "users";	
										$info2['fields']   = array("email");	   	   
										$info2['where']    =  "1 AND id='".$arr[$i]['affiliate_users_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['email'];	
					                ?>
							   </td>
			                   <td>
		                            <?php
									    unset($info2);        
										$info2['table']    = "users";	
										$info2['fields']   = array("email");	   	   
										$info2['where']    =  "1 AND id='".$arr[$i]['buyer_users_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['email'];	
					                ?>
							   </td>
			 				   <td>
		                            <?php
									    unset($info2);        
										$info2['table']    = products;	
										$info2['fields']   = array("product_name");	   	   
										$info2['where']    =  "1 AND id='".$arr[$i]['products_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['product_name'];	
					                ?>
							   </td>
                              <td><?=$arr[$i]['commission']?></td>
                              <td><?=$arr[$i]['date_created']?></td>
							</tr>
						<?php
								  }
						?>
						
						<tr>
						   <td colspan="10" align="center">
							  <?php              
									  unset($info);
					
									   $info["table"] = "referrals";
									   $info["fields"] = array("count(*) as total_rows"); 
									   $info["where"]   = "1  $whrstr ORDER BY id DESC";
									  
									   $res  = $db->select($info);  
					
												
										$numrows = $res[0]['total_rows'];
										$maxPage = ceil($numrows/$rowsPerPage);
										$self = 'index.php?cmd=list';
										$nav  = '';
										
										$start    = ceil($pageNum/5)*5-5+1;
										$end      = ceil($pageNum/5)*5;
										
										if($maxPage<$end)
										{
										  $end  = $maxPage;
										}
										
										for($page = $start; $page <= $end; $page++)
										//for($page = 1; $page <= $maxPage; $page++)
										{
											if ($page == $pageNum)
											{
												$nav .= "<li>$page</li>"; 
											}
											else
											{
												$nav .= "<li><a href=\"$self&&page=$page\" class=\"nav\">$page</a></li>";
											} 
										}
										if ($pageNum > 1)
										{
											$page  = $pageNum - 1;
											$prev  = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Prev]</a></li>";
									
										   $first = "<li><a href=\"$self&&page=1\" class=\"nav\">[First Page]</a></li>";
										} 
										else
										{
											$prev  = '<li>&nbsp;</li>'; 
											$first = '<li>&nbsp;</li>'; 
										}
									
										if ($pageNum < $maxPage)
										{
											$page = $pageNum + 1;
											$next = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Next]</a></li>";
									
											$last = "<li><a href=\"$self&&page=$maxPage\" class=\"nav\">[Last Page]</a></li>";
										} 
										else
										{
											$next = '<li>&nbsp;</li>'; 
											$last = '<li>&nbsp;</li>'; 
										}
										
										if($numrows>1)
										{
										  echo '<ul id="navlist">';
										   echo $first . $prev . $nav . $next . $last;
										  echo '</ul>';
										}
									?>     
						  </td>
						</tr>
                        </tbody>
						</table>
		 </div>
        </section>
    </div>
</div>			
				
<?php
include("../template/footer.php");
?>
















