<?php
echo '<head>';

echo "<style type='text/css'>
.filebox label {
  display: inline-block;
  padding: .5em .75em;
  color: #999;
  font-size: inherit;
  line-height: normal;
  vertical-align: middle;
  background-color: #fdfdfd;
  cursor: pointer;
  border: 1px solid #ebebeb;
  border-bottom-color: #e2e2e2;
  border-radius: .25em;
}

.filebox input[type='file'] {  /* 파일 필드 숨기기 */
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip:rect(0,0,0,0);
  border: 0;
}
.button {
  display: inline-block;
  color: #999;
  line-height: normal;
  vertical-align: middle;
  background-color: #fdfdfd;
  cursor: pointer;
  border: 1px solid #ebebeb;
  border-bottom-color: #e2e2e2;
  border-radius: .25em;
  font: 14px/100% Arial, Helvetica, sans-serif;
  padding: .5em 2em .55em;
  text-shadow: 0 1px 1px rgba(0,0,0,.2\);
}

</style>";

echo '</head>';
echo '<body onload="parent.iframe_init();">';
echo '<form method="POST" ENCTYPE="multipart/form-data" action="explot.php">
	<font face="Ubuntu">
			<center>
			<div class="filebox">
  			  <label for="ex_file">Click here for Upload Data File</label>
  			  <input type="file" id="ex_file" name="userfile"> 
			</center>
			</div>
			<p></p>
            
            <tr>
			
			    <p></p><strong>Data type :</strong></br> <input type="radio" name="dt" value = 0> 2D Gragph<br/>
			    <input type = "radio" name="dt" value =1> 3D Vector Graph<br/>
			    <input type = "radio" name="dt" value =2> 3D Level Graph</p>
			    <p><strong>Time or Domain include :</strong> <input type ="radio" name ="time" value = 1> Yes
			    <input type ="radio" name ="time" value = 0> No</p><br/>
			   <center>
				  <input type="submit" value="send" class ="button">
			    </center>
            </tr>
	</font>
    </table>
    </form>';
echo '</body>';

?>

