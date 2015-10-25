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
          <td height="20">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="../images/help_1.jpg" width="100%" /></td>
          </tr>
          <tr>
          <td height="10">&nbsp;</td>
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
    <td colspan="2" align="center"><h1>USER HELP MANNUAL</h1></td>
  </tr> 
  <tr>
    <td colspan="2" height="80">
    <ul>
    <li><strong>User Management</strong>
     <ol>
      <li>How do I create user?
        <ul>
         <li>Username (e.g careem)</li>
         <li>Password is randomly generate(e.g b9r5wCBE)</li>
         <li>Group ID (e.g GP01)</li>
       </ul>
      </li>
      <li><strong>How do I edit / delete User?</strong>
        <ul>
         <li>Type Username in the search box and click 'Search' button</li>
         <li>then it will display the details of that perticular user</li>
         <li>Click 'edit' / 'delete' link and go to each page.</li>
       </ul>
      </li>
      </ol>
    </li>    
    </ul>
    </td>
  </tr> 
	<tr>
       <td colspan="2" height="106">&nbsp;</td>
	</tr>  
</table>

       
        </div>
        <!-- End Right Column --> 

<?php require_once("../layouts/user_footer.php"); ?>