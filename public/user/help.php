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
            <td class="td3"><a href="user.php" onclick="javascript:self.close()";>Home</a></td>
          </tr>
          <tr>
          <td height="90">&nbsp;</td>
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
     <td colspan="2" align="right" bgcolor="#CCCCFF"><span id="clock"></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><h1>HELP MANNUAL</h1></td>
  </tr> 
  <tr>
    <td colspan="2" height="80">
    <ul>
    <li><strong>Campaign Progress</strong>
      <ol>
      <li><strong>How do I enter progress?</strong>
        <ul>
         <li>Campaign ID (e.g CA001)</li>
         <li>Product ID (e.g PD001)</li>
         <li>Archived Sales: (e.g 100)</li>
         <li>Achived Budget (e.g 100000)</li>
         <li>Achived Dat (e.g May-19-2011)</li>
       </ul>
      </li>
      </ol>
    </li> 
    <br/><br/>
    <li><strong>Product</strong>
      <ol>
      <li><strong>How do I search product?</strong>
        <ul>
         <li>Type Product ID in the search box and click 'Search' button</li>
         <li>then it will display all the details of the product</li>
       </ul>
      </li>
      </ol>
    </li> 
    <br/><br/>
    <li><strong>Campaign</strong>
      <ol>
      <li><strong>How do I search Campaign?</strong>
        <ul>
         <li>Type Campaign ID in the search box and click 'Search' button</li>
         <li>then it will display all the details of the Campaign</li>
       </ul>
      </li>
      </ol>
    </li> 
    </ul>
    </td>
  </tr> 
</table>

       
        </div>
        <!-- End Right Column --> 

<?php require_once("../layouts/user_footer.php"); ?>