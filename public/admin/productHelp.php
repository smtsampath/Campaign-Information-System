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
    <td colspan="2" align="center"><h1>PRODUCT HELP MANNUAL</h1></td>
  </tr> 
  <tr>
    <td colspan="2" height="80">
    <ul>
    <li><strong>Product Management</strong>
      <ol>
      <li><strong>How do I add / edit product?</strong>
        <ul>
         <li>Product ID (e.g PD001)</li>
         <li>Product Name (e.g Divithilina)</li>
         <li>Product Type (e.g Life Insurance)</li>
         <li>Product Price (e.g 10000)</li>
         <li>Product Description must be includes.</li>
       </ul>
      </li>
      <li><strong>How do I delete product?</strong>
        <ul>
         <li>Type Product ID in the search box and click 'Search' button</li>
         <li>then it will display all the details of the product</li>
         <li>Click 'delete' button</li>
         <li>It will delete entire records of that given product</li>
       </ul>
      </li>
      </ol>
    </li>    
    </ul>
    </td>
  </tr> 
	<tr>
       <td colspan="2" height="57">&nbsp;</td>
	</tr>  
</table>

       
        </div>
        <!-- End Right Column --> 

<?php require_once("../layouts/user_footer.php"); ?>