<?php 
include(dirname(__FILE__).'/functions.php');
$userId = getUserId(true);
$content = '';
$fileName = '';
if(isset($_GET['file'])) {
	   $content = file_get_contents($_GET['file']); 
	   $fileName = explode('/',$_GET['file']);
	   $fileName = str_replace('.txt','',$fileName[count($fileName) - 1]);
}
include('../lib/main-header.php');
include('../lib/generator-header.php');

?><head>
<title>Template & Calculator Generator - SOAPnote.org</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
</head>

<ul class="breadcrumb">
	<li><a href="/">Home</a></li>
	<li class="active">Form Generator</li>
</ul>

<div class="container">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
               <div class="row">
               <div class="col-sm-8 col-xs-12">
               <div class="col-sm-3 col-xs-12">
               
                <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn-block" type="button" data-toggle="dropdown">Open File
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a  href="#"><button id="open_btn1" class="btn btn-link ">Local File</button></a></li>
    <li><a  href="#"><button id= "archive_btn" class="btn btn-link" data-toggle="modal" data-target="#myModal">Archived Files</button></a></li>
    <li><a href="#"><button id= "public_btn" class="btn btn-link" data-toggle="modal" data-target="#publicModal">Public Files</button></a></li>
    <li><a href="#"><button id= "gist_btn" class="btn btn-link" data-toggle="modal" data-target="#gistModal">Gist Files</button></a></li>
	<li><a href="#"><button id= "drive_btn" class="btn btn-link" >Drive Files</button></a></li>
  </ul>
</div>
</div>
<div class="col-sm-3 col-xs-12">
 <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn-block" type="button" data-toggle="dropdown">Save File
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a  href="#"><button id="save_btn" class="btn btn-link">Locally</button></a></li>
    <li><a  href="#"><button id= "save_public_btn" class="btn btn-link" data-toggle="modal" data-target="#save_publicModal">Public Folder</button></a></li>
    <li><a href="#"><button id= "save_gist_btn" class="btn btn-link" data-toggle="modal" data-target="#save_gistModal">Create Gist</button></a></li>
    <li><a href="#"><button id= "save_repos_btn" class="btn btn-link" data-toggle="modal" data-target="#save_reposModal">User Repository</button></a></li>
	<li><a href="#"><button id= "save_drive_btn" class="btn btn-link" onclick="doAuth()">Google Drive</button></a></li>
  </ul>
</div>
</div>
 <div class="col-sm-3 col-xs-12">
               	<div class="dropdown">
						  <button class="btn btn-primary dropdown-toggle btn-block" type="button" id="dropdownMenu1" data-toggle="dropdown"  aria-expanded="true">
							Tool
							<span class="caret"></span>
						  </button>
						  <ul id="taggen-button-list" class="dropdown-menu" aria-labelledby="taggen">
								<li><a data-toggle="modal" data-target="#taggen-text" href="#">Text Box</a></li>
								<li><a data-toggle="modal" data-target="#taggen-textarea" href="#">Text Area</a></li>
								<li><a data-toggle="modal" data-target="#taggen-date" href="#">Date</a></li>
								<li><a data-toggle="modal" data-target="#taggen-radio" href="#">Radio Button</a></li>
								<li><a data-toggle="modal" data-target="#taggen-checkbox" href="#">Check Box</a></li>
								<li><a data-toggle="modal" data-target="#taggen-select" href="#">Select</a></li>
								<li><a data-toggle="modal" data-target="#taggen-comment" href="#">Comment</a></li>
								<li><a data-toggle="modal" data-target="#taggen-select" href="#">Link</a></li>
								<li><a data-toggle="modal" data-target="#taggen-html" href="#">HTML</a></li>
								<li><a data-toggle="modal" data-target="#taggen-mark" href="#">Mark</a></li>
								<li><a data-toggle="modal" data-target="#taggen-var" href="#">Variable</a></li>
								<li><a data-toggle="modal" data-target="#taggen-condition" href="#">Conditional Logic</a></li>
								<li><a data-toggle="modal" data-target="#taggen-calculation" href="#">Calculation</a></li>
								
						  </ul>
						</div>
                        <button type="button" id="download_form" class="btn btn-primary" style="display:none" >Export</button>
</div>



</div>
<!-- .rwo btn-group ends-->
 <div class="col-sm-4 col-xs-12" align="center">

 <div class="col-sm-6 col-xs-6">
                
  <button class="btn btn-success btn-block " type="button" id="markup_btn" data-toggle="dropdown">Markup
 </button>

</div>
  <div class="col-sm-6 col-xs-6">
               
  <button class="btn  btn-primary  btn-block" type="button"  id="generate_btn">Form</button>
  

</div>

</div>
<!--.row ends below-->
</div>
				<button id="download_txt_btn" class="btn btn-primary" style="display:none">Download TXT File</button>            
				</div>
				<!-- Mymodal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Archived Files</h4>
							</div>
							<div class="modal-body"><!--http://www.soapnote.org/generator/github/github.php-->
								<iframe id="archived_file_frame" src="github/expgithub.php" width="100%" height="380" frameborder="0" allowtransparency="true"></iframe>  
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
                	<!-- public Modal -->
				<div class="modal fade" id="publicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Public Files</h4>
							</div>
							<div class="modal-body"><!--http://www.soapnote.org/generator/github/github.php-->
								<iframe id="public_file_frame" src="github/public.php" width="100%" height="380" frameborder="0" allowtransparency="true"></iframe>  
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
                	<!-- gist Modal -->
				<div class="modal fade" id="gistModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" id="gistmodal_close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Public Gist File</h4>
							</div>
							<div class="modal-body"><!--http://www.soapnote.org/generator/github/github.php-->
                            <div class="row bg-danger text-danger" align="center" id="err" style="color:red;"></div>
                            <form action="" method="post">
                             <div class="form-group">
    <label for="username">Enter Github Username:</label>
    <input  class="form-control"  type="text" id="username" name="username" placeholder="UserName"/>
  </div>
                                <div class="form-group">
    <label for="filename">Enter Public Gist Filename:</label>
       <div class="input-group">
    
      <input  class="form-control"  type="text" id="filename" name="filename" Placeholder="FileName"/> <div class="input-group-addon">.txt</div>
    </div>
   
  
  </div>
  
                            <button type="button" id="go" class="btn btn-primary">Submit</button>

                           
                             </form>
                            
								<!--<iframe id="gist_file_frame" src="github/gist.php" width="100%" height="380" frameborder="0" allowtransparency="true"></iframe>  -->
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
                  	<!-- gist Modal -->
				<div class="modal fade" id="save_publicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" id="save_publicmodal_close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Save to saopnote-public Repository</h4>
							</div>
							<div class="modal-body"><!--http://www.soapnote.org/generator/github/github.php-->
                            <div class="row bg-danger text-danger" align="center" id="err_save_topublic" ></div>
                            <div class="row bg-success text-success" align="center" id="success_save_topublic" ></div>
                            <form action="" method="post">
                           
   
      <div class="form-group">
    <label for="username_tp">UserName:</label>
    <input  class="form-control" type="text" id="username_tp" name="username" required/>
  </div>
       <div class="form-group">
    <label for="password_tp">Password:</label>
    <input  class="form-control"  type="password" id="password_tp" name="password"  required/>
  </div>
     <div class="form-group">
    <label for="filename_tp">Filename:</label>
       <div class="input-group">
    
      <input  class="form-control"  type="text" id="filename_tp" name="filename_tp"required Placeholder="FileName"/> <div class="input-group-addon">.txt</div>
    </div>
  </div>

                            <button type="button" id="save_topublic" class="btn btn-primary">Save</button>
                             </form>
                            
								<!--<iframe id="gist_file_frame" src="github/gist.php" width="100%" height="380" frameborder="0" allowtransparency="true"></iframe>  -->
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
                  	<!-- gist Modal -->
				<div class="modal fade" id="save_gistModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" id="save_gistmodal_close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Create Gist</h4>
							</div>
							<div class="modal-body"><!--http://www.soapnote.org/generator/github/github.php-->
                            <div class="row text-success" align="center" id="link" ></div>
                             <div class="row text-danger bg-danger" align="center" id='err_save_togist' ></div>
                           
                            <div class="row text-danger bg-danger" align="center" id="err" ></div>
                            
                            <form action="" method="post">
                            
 <div class="form-group">
    <label for="save_gistfilename">Filename:</label>
       <div class="input-group">
    
      <input  class="form-control"  type="text" id="save_gistfilename" name="save_gistfilename" required="required"/> <div class="input-group-addon">.txt</div>
    </div>
  </div>
                            <button type="button" id="save_togist" class="btn btn-primary">save</button>
                             </form>
                            
								<!--<iframe id="gist_file_frame" src="github/gist.php" width="100%" height="380" frameborder="0" allowtransparency="true"></iframe>  -->
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
                  	<!-- gist Modal -->
				<div class="modal fade" id="save_reposModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" id="reposmodal_close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Save to User's Repository</h4>
							</div>
							<div class="modal-body"><!--http://www.soapnote.org/generator/github/github.php-->
                            <div class="row bg-danger text-danger" align="center" id="err_save_torepos" ></div>
                            <div class="row bg-success text-success" align="center" id="success_save_torepos" ></div>
                            <form action="" method="post">
                      
                       
  
      <div class="form-group">
    <label for="username_repos">UserName:</label>
    <input  class="form-control" type="text" id="username_repos" name="username_repos" required/>
  </div>
       <div class="form-group">
    <label for="password_repos">Password:</label>
    <input  class="form-control"  type="password" id="password_repos" name="password_repos" required/>
  </div>
   <div class="form-group">
    <label for="repository_repos">Repository:</label>
    <input  class="form-control" type="text" id="repository_repos" name="repository_repos" placeholder="repository/folder(if exists)" required/>
  </div>
  
     <div class="form-group">
    <label for="filename_repos">Filename:</label>
       <div class="input-group">
    
      <input  class="form-control"  type="text"  id="filename_repos" name="filename_repos" required Placeholder="FileName"/> <div class="input-group-addon">.txt</div>
    </div>
  </div>
                     
                        
                            <button type="button" id="save_torepos" class="btn btn-primary">Save</button>
                             </form>
                            
								<!--<iframe id="gist_file_frame" src="github/gist.php" width="100%" height="380" frameborder="0" allowtransparency="true"></iframe>  -->
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
                
				<div id="form_content" class="panel-body">
					<div class="form-group">
						<label >Form Title:</label>
						<input type="text" class="form-control" id="formTitle" name="formTitle" value="<?php echo $fileName ?>">
					</div>
					<div class="form-group">
					
						<label >Form Content:</label>
						<textarea name="content" id="content" class="form-control" rows=25><?php echo $content ?></textarea>
					</div>
                    
				</div>
                <div style="display:none" id="form_display" class="panel panel-default">
				<div  class="panel-heading">
					Form Display 
				</div>
				<div  class=" panel-body">
					<iframe src="" id="iframeForm" style="width:100%; height:800px"></iframe>
				</div>
			</div>
				<!--<div class="panel-footer" style="text-align:center">
					
					
				</div>
                -->
			</div>
			<!--<div style="display:none" id="form_display" class="panel panel-default">
				<div  class="panel-heading">
					Form Display 
				</div>
				<div  class=" panel-body">
					<iframe src="" id="iframeForm" style="width:100%; height:800px"></iframe>
				</div>
			</div>
            -->
		</div>

		<!-- text box generator -->
		<div id="taggen-text" class="modal fade taggen-panel" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Text Box</h4>
						<p>Displays a small text box for entry of a few words.</p>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Name:</label>
								<input class="form-control" id="taggen-text-name" value="" type="text">
							</div>
							<div class="form-group">
								<label>Memo:</label>
								<input class="form-control" id="taggen-text-memo" value="" type="text">
							</div>
							<div class="form-group">
								<label>Default:</label>
								<input class="form-control" id="taggen-text-default" value="" type="text">
							</div>
							<div class="form-group">
								<label>Size:</label>
								<input class="form-control" id="taggen-text-size" value="" type="number">
							</div>

							<div class="form-group">
								<label>Copy this code and paste it into the form content:</label>
								<textarea class="form-control" id="taggen-text-code" onClick="this.select();" readonly="true">[text]</textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- text area generator -->
		<div id="taggen-textarea" class="modal fade taggen-panel" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Text Area</h4>
						<p>Displays a larger text box for entry of a few words.</p>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Name:</label>
								<input class="form-control" id="taggen-textarea-name" value="" type="text">
							</div>
							<div class="form-group">
								<label>Memo:</label>
								<input class="form-control" id="taggen-textarea-memo" value="" type="text">
							</div>
							<div class="form-group">
								<label>Default:</label>
								<textarea class="form-control" id="taggen-textarea-default" rows="4"></textarea>
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Cols:</label>
									<input class="form-control" id="taggen-textarea-cols" value="" type="number">
								</div>
								<div class="form-group col-sm-6">
									<label>Rows:</label>
									<input class="form-control" id="taggen-textarea-rows" value="" type="number">
								</div>
							</div>
							<div class="form-group">
								<label>Copy this code and paste it into the form content:</label>
								<textarea class="form-control" id="taggen-textarea-code" onClick="this.select();" readonly="true">[textarea]</textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		
		<!-- date generator -->
		<div id="taggen-date" class="modal fade taggen-panel" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Date</h4>
						<p>Displays a box for entering dates. A calendar pops up when you click on it (you can also type in the date).</p>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Name:</label>
								<input class="form-control" id="taggen-date-name" value="" type="text">
							</div>
							<div class="form-group">
								<label>Memo:</label>
								<input class="form-control" id="taggen-date-memo" value="" type="text">
							</div>
							<div class="form-group">
								<label>Format:</label>
								<select class="form-control" id="taggen-date-format">
									<option value="mm/dd/yy"><?php echo date("m/d/Y");?></option>
									<option value="mm-dd-yy"><?php echo date("m-d-Y");?></option>
									<option value="dd/mm/yy"><?php echo date("d/m/Y");?></option>
									<option value="dd-mm-yy"><?php echo date("d-m-Y");?></option>
									<option value="yy/mm/dd"><?php echo date("Y/m/d");?></option>
									<option value="yy-mm-dd"><?php echo date("Y-m-d");?></option>
									<option value="M d, yy"><?php echo date("M j, Y");?></option>
									<option value="d M, yy"><?php echo date("j M, Y");?></option>
									<option value="d MM, yy"><?php echo date("j F, Y");?></option>
									<option value="DD, d MM, yy"><?php echo date("l, j F, Y");?></option>
									<option value="DD, MM d, yy"><?php echo date("l, F j, Y");?></option>
								</select>
							</div>
							<div class="form-group">
								<label>Default:</label>
								<input class="form-control" id="taggen-date-default" value="" type="text">
							</div>
							<div class="form-group">
								<label>Copy this code and paste it into the form content:</label>
								<textarea class="form-control" id="taggen-date-code" onClick="this.select();" readonly="true">[date]</textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		
		<!-- radio button generator -->
		<div id="taggen-radio" class="modal fade taggen-panel" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Radio Button</h4>
						<p>Displays buttons where only one item can be selected.</p>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Name:</label>
								<input class="form-control" id="taggen-radio-name" value="" type="text">
							</div>
							<div class="form-group">
								<label>Value:</label>
								<textarea class="form-control" id="taggen-radio-choices" rows="6"></textarea>
								One option per line.
							</div>
							<div class="form-group">
								<label>Copy this code and paste it into the form content:</label>
								<textarea class="form-control" id="taggen-radio-code" onClick="this.select();" readonly="true"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>


		<!-- check box generator -->
		<div id="taggen-checkbox" class="modal fade taggen-panel" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Check Box</h4>
						<p>Displays boxes where more than one item can be selected.</p>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Name:</label>
								<input class="form-control" id="taggen-checkbox-name" value="" type="text">
							</div>
							<div class="form-group">
								<label>Value:</label>
								<textarea class="form-control" id="taggen-checkbox-choices" rows="6"></textarea>
								One option per line.
							</div>
							<div class="form-group">
								<label>Copy this code and paste it into the form content:</label>
								<textarea class="form-control" id="taggen-checkbox-code" onClick="this.select();" readonly="true"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- select generator -->
		<div id="taggen-select" class="modal fade taggen-panel" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Select</h4>
						<p>Displays a drop down box where only one item can be selected.</p>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Name:</label>
								<input class="form-control" id="taggen-select-name" value="" type="text">
							</div>
							<div class="form-group">
								<label>Value:</label>
								<textarea class="form-control" id="taggen-select-choices" rows="6"></textarea>
								One option per line. Numeric values (for calculations) can be set by using the 'equals sign'. Example: <br>choice A=1<br>choice B=2
							</div>
							<div class="form-group">
								<label>Copy this code and paste it into the form content:</label>
								<textarea class="form-control" id="taggen-select-code" onClick="this.select();" readonly="true"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- comment generator -->
		<div id="taggen-comment" class="modal fade taggen-panel" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Comment</h4>
						<p>Comments do not show up in output but do display in the form.</p>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Memo:</label>
								<textarea class="form-control" id="taggen-comment-memo" rows="6"></textarea>
							</div>
							<div class="form-group">
								<label>Copy this code and paste it into the form content:</label>
								<textarea class="form-control" id="taggen-comment-code" onClick="this.select();" readonly="true"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- link generator -->
		<div id="taggen-link" class="modal fade taggen-panel" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Link</h4>
						<p>Links can take you to other web pages or to locations within the current form.</p>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Memo:</label>
								<input class="form-control" id="taggen-link-memo" value="" type="text">
							</div>
							<div class="form-group">
								<label>URL:</label>
								<input class="form-control" id="taggen-link-url" value="" type="text">
							</div>
							<div class="form-group">
								<label>Copy this code and paste it into the form content:</label>
								<textarea class="form-control" id="taggen-link-code" onClick="this.select();" readonly="true"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- html generator -->
		<div id="taggen-html" class="modal fade taggen-panel" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">HTML</h4>
						<p>If you have some formatted HTML that you'd like in the form, you can sandwich it between a [html] and a [/html]. HTML is used to display links or other formatting. It does not display in the output. Any html may be placed between [html] and [/html].</p>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>HTML code:</label>
								<textarea class="form-control" id="taggen-html-content" rows="6"></textarea>
							</div>
							<div class="form-group">
								<label>Copy this code and paste it into the form content:</label>
								<textarea class="form-control" id="taggen-html-code" onClick="this.select();" readonly="true"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- mark generator -->
		<div id="taggen-mark" class="modal fade taggen-panel" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Mark</h4>
						<p>A mark allows you to jump from one place in a form to another. A link is needed to send the user to a mark.</p>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Memo:</label>
								<input class="form-control" id="taggen-mark-memo" value="" type="text">
							</div>
							<div class="form-group">
								<label>Mark:</label>
								<input class="form-control" id="taggen-mark-mark" value="" type="text">
							</div>
							<div class="form-group">
								<label>Copy this code and paste it into the form content:</label>
								<textarea class="form-control" id="taggen-mark-code" onClick="this.select();" readonly="true"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- var generator -->
		<div id="taggen-var" class="modal fade taggen-panel" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Variable</h4>
						<p>Variables can display named variables from other parts entered above in a form. It displays in the output, not in the form.</p>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Name:</label>
								<input class="form-control" id="taggen-var-name" value="" type="text">
							</div>
							<div class="form-group">
								<label>Copy this code and paste it into the form content:</label>
								<textarea class="form-control" id="taggen-var-code" onClick="this.select();" readonly="true"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- conditional logic generator -->
		<div id="taggen-condition" class="modal fade taggen-panel" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Conditional Logic</h4>
						<p>You can set conditions for display of form elements. <a data-toggle="collapse" data-target="#condition-more" href="javascript:void(0)">See more</a></p>
						<div id="condition-more" class="collapse">
							<p><small>These are operators within an <b>individual comparison</b> isLess isGreater isLessOrEqual isGreaterOrEqual is isNot. These are operators for <b>combining multiple comparisons</b>. && is the "AND" operator, || is the "OR" operator. See example for required syntax.</small></p>
							<p><small>Example 1: Employment type: [radio value="Full Time|Part Time|Unemployed"] [conditional field="job" condition="(job).is('Full Time')||(job).is('Part Time')"]Job title: [text name="job_title"][/conditional]</small></p>
							<p><small>Another good example is <a href="../sample/conditional-comparison/" target="_blank">at this page.</a></small></p>
							<p><small>Please note that with these comparison operators, blank/empty fields would be considered as 0, so (field1).isLess(5) will always be true if "field1" is blank. (Because 0 is less than 5)</small></p>
						</div>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Field:</label>
								<input class="form-control" id="taggen-condition-field" value="" type="text">
							</div>
							<div class="form-group">
								<label>Condition:</label>
								<textarea class="form-control" id="taggen-condition-condition" rows="2"></textarea>
							</div>
							<div class="form-group">
								<label>Content:</label>
								<textarea class="form-control" id="taggen-condition-content" rows="4"></textarea>
							</div>
							<div class="form-group">
								<label>Copy this code and paste it into the form content:</label>
								<textarea class="form-control" id="taggen-condition-code" onClick="this.select();" readonly="true"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	
		<!-- calculation generator -->
		<div id="taggen-calculation" class="modal fade taggen-panel" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Calculation</h4>
						<p>You can perform calculations that manipulate variables. Parameters include <em>value</em>, <em>memo</em>, and <em>show</em>. This is a powerful feature of the site and can be used in two ways. <a data-toggle="collapse" data-target="#calculation-more" href="javascript:void(0)">See more</a></p>
						<div id="calculation-more" class="collapse">
							<h5>Raw Computations</h5>
							<p><small>A sample with some simple computations is <a href="../sample/simple-computations/" target="_blank">here</a>.</small></p>
							<p><small>In the sample above, raw computations such as addition, subtraction, multiplication, and division is performed on numbers gathered with [text] input fields.</small></p>
							<p><small>Example 1:<br>
							This calculator performs simple computations <br>
							[text name="A"] <-- A (enter a number)<br>
							[text name="B"] <-- B (enter a number)<br>
							A + B --> [calc value="score1=(A)+(B)" memo="addition"]<br>
							A - B --> [calc value="score2=(A)-(B)" memo="subtraction"]<br>
							A x B --> [calc value="score3=(A)*(B)" memo="multiplication"]<br>
							A / B --> [calc value="score4=(A)/(B)" memo="division"]<br>
							A raised to the power of B --> [calc value="score5=Math.pow((A),(B))" memo="exponent"]</small></p>

							<p><small>The [calc] field from the sample is shown above. You can see it has a certain format to it.<br>
							<em>value</em> contains the entire computation in double quotes.<br>
							<em>score1</em> is a required name for the computation. In the sample, you see that <em>value</em> is set equal to <em>score1</em>, <em>score2</em>, <em>score3</em>, <em>score4</em>, and <em>score5</em>. A new name is needed for each computation, but it can be more descriptive than <em>score1</em>.
							<em>(A)</em> refers to the name of the first [text] input field.<br>
							<em>(B)</em> refers to the name of the second [text] input field.<br>
							In between <em>(A)</em> and <em>(B)</em> is the operator (+, -, *, and /).<br>
							The result shows up in the result box after Submit is pressed.</small></p>

							<p><small>Here are more sample <a href="../sample/calculation/" target="_blank">calculators</a>.</small></p>
							<br>
							<h5>Interpreted calculations</h5>

							<p><small>A sample with an interpreted computation is <a href="../sample/interpreted-computation/" target="_blank">here</a>.</small></p>
							<p><small>This feature is valuable because it allows you to group ranges of results.</small></p>
							<p><small><em>A + B -&gt; [calc value="score2=(A)+(B);score2&gt;1000?'Sum is greater than 1000':score2&gt;100?'Sum is greater than 100 and less than or equal to 1000':score2&gt;10?'Sum is greater than 10 and less than or equal to 100':score2&gt;0?'Sum is greater than 0 and less than or equal to 10':'sum is 0 or less'" memo="interpretation"]</em><br><br>
							As you can see above, it has most of the same elements as a simple calculation. The interpretation information follows the calculation after a semicolon.<br>
							Since an interpretation is a separate calculation it must have a distinct name (<em>score2</em>).<br>
							The computation follows (<em>(A)+(B)</em>).<br>
							Semicolon separates the computation from the interpretation (<em>;</em>).<br>
							Ranges are then interpreted from highest to lowest, each is separated by a colon (<em>:</em>).<br>
							The highest value is <em>score2&gt;1000?</em>. The output follows this in single quotes. Then a colon.<br>
							The next value is <em>score2&gt;100?</em>. The output follows this in single quotes. Then a colon.<br>
							The next value is <em>score2&gt;10?</em>. The output follows this in single quotes. Then a colon.<br>
							The lowest value is not specifically labeled like the others. The output alone is listed for everything lower than the range above it.<br><br>
							This is definitely best understood by looking at the example <a href="../sample/interpreted-computation/" target="_blank">again it's right here</a>.</small></p>
						</div>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Value:</label>
								<textarea class="form-control" id="taggen-calculation-value" rows="4"></textarea>
							</div>
							<div class="form-group">
								<label>Memo:</label>
								<input class="form-control" id="taggen-calculation-memo" value="" type="text">
							</div>
							<div class="form-group">
								<label>Show in result: <input id="taggen-calculation-show" value="true" type="checkbox" checked="checked"></label>
							</div>
							
							<div class="form-group">
								<label>Copy this code and paste it into the form content:</label>
								<textarea class="form-control" id="taggen-calculation-code" onClick="this.select();" readonly="true"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

	
<style>
.taggen-button {
	float: right;
	position: relative;
	top: -5px;
}
.taggen-panel h4 {
	font-size: 22px;
	margin-bottom: 10px;
}
.taggen-panel h5 {
	font-size: 18px;
	margin-top: 0;
}
</style>
<link rel="stylesheet" href="../lib/jquery-ui.min.css" type="text/css" media="all"/>
<script type="text/javascript" src="../lib/jquery-ui.min.js"></script>
<script src="https://www.google.com/jsapi?key=AIzaSyBwuhiC2DjXzpDzN_Z6pV3BFyAKKhvhWso"></script>


<script src="filepicker.js"></script>
	<script>
				function initPicker() {
			var picker = new FilePicker({
				apiKey: 'AIzaSyDg6e8Qn-R48w0bLVGFs4e4MZmMokoT7tc',
				clientId: '85067314917-s8ier1iv83iob87rlinek3e5771rrq0h',
				buttonEl: document.getElementById('drive_btn'),
				onSelect: function(file) {
					console.log(file);
					document.getElementById('formTitle').value =  file.title;
					downloadFile(file, callback)
				}
			});	
		}
		function callback(content)
		{

			var e = document.getElementById('content');
			e.innerHTML = content;
		}
		function downloadFile(file, callback) {
			if (file.downloadUrl) {
				var accessToken = gapi.auth.getToken().access_token;
				var xhr = new XMLHttpRequest();
				xhr.open('GET', file.downloadUrl);
				xhr.setRequestHeader('Authorization', 'Bearer ' + accessToken);
				xhr.onload = function() {
				callback(xhr.responseText);
				};
				xhr.onerror = function() {
				callback(null);
				};
				xhr.send();
			} 
			else {
				callback(null);
			}
		}
	</script>
	<script src="https://apis.google.com/js/client.js?onload=initPicker"></script>
<script type="text/javascript">
   var clientId = "85067314917-s8ier1iv83iob87rlinek3e5771rrq0h";
    var apiKey = "AIzaSyDg6e8Qn-R48w0bLVGFs4e4MZmMokoT7tc";
    var token;

    function doAuth()
    {
        gapi.auth.authorize({
				client_id: this.clientId + '.apps.googleusercontent.com',
				scope: 'https://www.googleapis.com/auth/drive',
				immediate: false
		}, function(result){
            gapi.auth.getToken();
            insertFile();
        });
    }
function insertFile(fileData, callback1) {
  const boundary = '-------314159265358979323846';
  const delimiter = "\r\n--" + boundary + "\r\n";
  const close_delim = "\r\n--" + boundary + "--";


    var metadata = {
      'title': document.getElementById('formTitle').value,
      'mimeType': 'text/plain'
    };

    var multipartRequestBody =
        delimiter +
        'Content-Type: application/json\r\n\r\n' +
        JSON.stringify(metadata) +
        delimiter +
        'Content-Type: ' + 'text/plain' + '\r\n' +
        'Content-Transfer-Encoding: base64\r\n' +
        '\r\n' +
        btoa(document.getElementById('content').value) +
        close_delim;
         if (!callback1) { callback1 = function(file) { console.log("Update Complete ",file) }; }
    var request = gapi.client.request({
        'path': '/upload/drive/v2/files',
        'method': 'POST',
        'params': {'uploadType': 'multipart'},
        'headers': {
          'Content-Type': 'multipart/mixed; boundary="' + boundary + '"'
        },
        'body': multipartRequestBody,
        callback:callback1});

    request.execute(function(data){
            console.log(data);
			
        });
  }
jQuery(document).ready(function($){
	$('#taggen-date-default').datepicker({dateFormat:"mm/dd/yy"});
	$('#taggen-date-format').change(function() {
		$('#taggen-date-default').datepicker( "option", "dateFormat", $( this ).val() );
	});
	
	$('.taggen-panel input, .taggen-panel textarea, .taggen-panel select').on('change', function() {
		$panel = $(this).parents('.taggen-panel');
		tagid = $panel.attr('id');
		field_name = tagid.split('-').pop();

		name_val = $panel.find('#' + tagid + '-name').val();
		name_val = name_val ? ' name=' + JSON.stringify(name_val) : '';

		memo_val = $panel.find('#' + tagid + '-memo').val();
		memo_val = memo_val ? ' memo=' + JSON.stringify(memo_val) : '';

		default_val = $panel.find('#' + tagid + '-default').val();
		default_val = default_val ? ' default=' + JSON.stringify(default_val) : '';

		size_val = $panel.find('#' + tagid + '-size').val();
		size_val = size_val ? ' size=' + JSON.stringify(size_val) : '';
		
		cols_val = $panel.find('#' + tagid + '-cols').val();
		cols_val = cols_val ? ' cols=' + JSON.stringify(cols_val) : '';		

		rows_val = $panel.find('#' + tagid + '-rows').val();
		rows_val = rows_val ? ' rows=' + JSON.stringify(rows_val) : '';		
		
		choices_val = $panel.find('#' + tagid + '-choices').val();
		choices_val = choices_val ? ' value=' + JSON.stringify(choices_val.replace(/(?:\r\n|\r|\n)/g, '|')) : '';
				
		url_val = $panel.find('#' + tagid + '-url').val();
		url_val = url_val ? ' url=' + JSON.stringify(url_val) : '';		

		mark_val = $panel.find('#' + tagid + '-mark').val();
		mark_val = mark_val ? ' mark=' + JSON.stringify(mark_val) : '';		
		
		content_val = $panel.find('#' + tagid + '-content').val();
		content_val = content_val ? content_val : '';
		
		field_val = $panel.find('#' + tagid + '-field').val();
		field_val = field_val ? ' field=' + JSON.stringify(field_val) : '';

		condition_val = $panel.find('#' + tagid + '-condition').val();
		condition_val = condition_val ? ' condition=' + JSON.stringify(condition_val) : '';

		show_val = $panel.find('#' + tagid + '-show:checked').val();
		show_val = show_val || $panel.find('#' + tagid + '-show').length == 0 ? '' : ' show="false"';

		value_val = $panel.find('#' + tagid + '-value').val();
		value_val = value_val ? ' value=' + JSON.stringify(value_val) : '';

				
		if (field_name == 'html')
			code = '[html]' + content_val + '[/html]';
		else if (field_name == 'condition')
			code = '[conditional' + field_val + condition_val + ']' + content_val + '[/conditional]';
		else
			code = '[' + field_name + name_val + memo_val + default_val + size_val + cols_val + rows_val + choices_val + url_val + mark_val + value_val + show_val + ']';
		
		$panel.find('#' + tagid + '-code').val(code);
	});
	
});
</script>

		<script type="text/javascript">
			$(document).ready(function(){   
					$("#open_btn1").click(function() {
							$.FileDialog({
									 accept: "text/plain",
									 dropheight: 150,
									 multiple: false,
									 readAs : "Text"
							}).on('files.bs.filedialog', function(ev) {
											var files_list = ev.files;
											$('#content').val(files_list[0].content);
											$('#formTitle').val(files_list[0].name.replace('.txt',''));
									
									
									});
					});
			
			
//gist file access function starts here
			
					$("#go").click(function(){
						var username=document.getElementById('username').value;
						var filename=document.getElementById('filename').value+'.txt';
						$.ajax({
									  url: 'https://api.github.com/users/'+username+'/gists',
									  type: 'GET',
									  dataType: 'jsonp',
									  success: function(gistdata) {
										
										var i=0;
										var j=0;
										
											
										if(gistdata.data[i])
											{
												
													while(i<gistdata.data.length)
													{
															 if(gistdata.data[i].files[filename])
										 						{
																			
										
																			var url1=gistdata.data[i].files[filename].raw_url;
																			 $.ajax({
																			 url: url1,
																			 type: 'GET',
																			 dataType: 'text',
																			 success:	function(gistdata1) {
																			 data=gistdata1;
																			
																			document.getElementById('content').innerHTML=data;
																			document.getElementById('gistmodal_close').click();
																			j=j+1;
																			i=gistdata.data.length+3;
																						},
																			 error: function(e1) {
																								
																				 // document.getElementById('info').innerHTML="failed";
																				  // ajax error
																												}
																			})
																		}
															i++;}
												
													if(i==gistdata.data.length)
													document.getElementById('err').innerHTML="FileName is incorrect";
													}
												else
													{
													document.getElementById("err").innerHTML="UserName is incorrect/Server Over Flooded ,Try after sometime";
													
													}
										
													},
													error: function(e2) {
																			console.log(e2+"first ajax failed");
																		  //document.getElementById('info').innerHTML="failed";
																		  // ajax error
																		}
									  
									})
																		
					});
					
			
					$("#download_txt_btn").click(function() { 
				
				
							window.open("<?php echo APP_URL ?>/downloadFile.php?type=txt", "_blank");
					});
			
					$("#download_form").click(function() { 
							window.open("<?php echo APP_URL ?>/downloadFile.php?type=zip", "_blank");
					});
					
					$("#markup_btn").click(function(){
						$("#download_form").hide();
						$("#dropdownMenu1").show();
						$('#form_display').hide();
						$('#form_content').show();
						this.className="btn btn-success btn-block";
						document.getElementById("generate_btn").className="btn btn-primary btn-block";
					
						
						});
					$("#generate_btn").click(function() { 
					$('#form_content').hide();
					$('#form_display').show();
					this.className="btn btn-success btn-block";
				document.getElementById("markup_btn").className="btn btn-primary btn-block";
							$.post('<?php echo APP_URL ?>/ajax.php', 
								{
									act: "generateForm",
									formTitle:$('#formTitle').val(), 
									content: $('#content').val()<?php echo !empty($_GET['admin']) && $_GET['admin']==1?', admin: 1':'';?>
								}, function(result){
									if(result == '') {
											alert('something wrong');
									} else {
											$("#iframeForm").attr('src', result);
											$("#download_form").show();
											$("#dropdownMenu1").hide();
									}
							});
					
					});
			
					$("#save_btn").click(function() { 
							$.post('<?php echo APP_URL ?>/ajax.php', {act: "saveFile", formTitle:$('#formTitle').val(), content: $('#content').val()}, function(result){
									if(result == '') {
											alert('something wrong');
									} else {
											$( "#download_txt_btn" ).trigger( "click" );
									}
							});
							return;
					});
			
					<?php
				if(!empty($content)) {
						echo '$( "#generate_btn" ).trigger( "click" );';
				}
				?>
			});
			
		</script>
        
<script src="js/save_to_repos.js" type="text/javascript"></script>
<script src="js/save_to_gist.js" type="text/javascript"></script>
<script src="js/save_to_public.js" type="text/javascript"></script>
	</div>
</div>
<?php
include('../lib/main-footer.php');
?>

