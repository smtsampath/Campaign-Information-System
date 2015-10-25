<?php require_once("../layouts/user_header.php"); ?>
<!-- Begin Left Column -->
        <div id="leftcolumn">
        <table width="190" border="0">
          <tr>
            <td bgcolor="#CCCCFF" align="center"><strong>Main Menu</strong></td>
          </tr>
          <tr>
            <td class="td3"><font color="#FF6666">Help!</font></td>
          </tr>
          <tr>
            <td class="td3"><a href="admin.php" onclick="javascript:self.close()";>Home</a></td>
          </tr>
          <tr>
          <td height="10">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="../images/help_1.jpg" width="100%" /></td>
          </tr>
        </table>     
        </div>
        <!-- End Lft Column -->
        
        <!-- Begin Right Column -->
        <div id="rightcolumn" >
        <table width="100%" border="0">
         <tr>
        <td align="center" bgcolor="#CCCCFF" ><strong>Logged in <font color="#FF0000"> Admin</font></strong></td>
     <td  align="right" bgcolor="#CCCCFF"><span id="clock"></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><h1>HELP MANNUAL</h1></td>
  </tr> 
  <tr>
    <td colspan="2" height="80">
    <ul>   
    <li><strong>Reports</strong>
      <ol>
      <li><strong>How do I generate report?</strong>
        <ul>
         <li>In the sales report section, type the product Id (e.g PD001)</li>
         <li>then it will generate all the sales infomation of that perticular product</li>
          <li>In the Campaign summery section, type the campaign Id (e.g CA001)</li>
         <li>then it will generate the summery infomation of that perticular campaign</li>
       </ul>
      </li>
      </ol>
    </li>          
    </ul>
    </td>
  </tr> 
  <tr>
       <td colspan="2" height="80">&nbsp;</td>
	</tr>
</table>

       
        </div>
        <!-- End Right Column --> 

<?php require_once("../layouts/user_footer.php"); ?>