<?php if(isset($_GET['p'])){$project	=	$_GET['p'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //GET the current project ID to get its respective data from the database
        $select			=		"SELECT PROJECT_ID FROM `CMS`.`projects` WHERE PROJECT_NAME =	'$project'";
        $result				=		$conn->query($select);

        while($row=mysqli_fetch_assoc($result)){
            $ID	=	$row['PROJECT_ID'];//ID contains the current project ID
        }

        //Get the project data against its ID in the database 
        $select			=		"SELECT * FROM `CMS`.`pages` WHERE PROJECT_ID =	$ID";
        $result				=		$conn->query($select);
		
  

		

        $size	= count($page_data);
}
		/*echo '<pre>';
		print_r($page_data);*/

        //print_r($page_data);//$page_data contains all the data of the current page


    
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="bootstrap/css/bootstrap.css"              rel="stylesheet">
    <link href="css/style.css"              rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>   
    <script type="text/javascript"  src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/manage_nested_tab_handler.js"></script>

    <script type="text/javascript">
        <?php echo 'var g_outerTabsList = '.json_encode($page_data).';'; ?>
    </script>

    <script>
        $( document ).ready(function() {

            $("#html_element").change(function(){
                var selected = $('#html_element option:selected').val();
                if(selected	==	'radio'){$("#radio").show('slow');}
                if(selected	==	'checkbox'){$("#checkbox").show('slow');}
                if(selected	==	'select'){$("#select").show('slow');}
                if(selected	==	'list'){$("#list").show('slow');}	
            });

            $( "#div_load" ).change(function() {
                var e						= 		$('#div_load').val();
                $.ajax({ 

                    type: "POST",  
                    url: "load_element.php",  
                    data: {REQUEST: "SEARCH_NAME", ID: e},  
                    success: function(dataString) {    	// alert(dataString); 

                        var json = jQuery.parseJSON(dataString);
                        var HTML	=	json.data.HTML;//alert(HTML);
                        var CSS	=	json.data.CSS; // alert(CSS); 
                        var lableName	=	json.data.NAME;
                        var update_id	=	json.data.ID;
                        var variableName	=	HTML.substring(HTML.indexOf(' name="')+7, HTML.indexOf(' id="')-1);
                        var elementName	=	HTML.substring(HTML.indexOf('</label><')+9, HTML.indexOf(' name="'));
                        if(elementName	!=	'textarea'){
                            elementName	=	HTML.substring(HTML.indexOf('type="')+6, HTML.indexOf(' name="')-1);
                            variableName	=	HTML.substring(HTML.indexOf(' name="')+7, HTML.indexOf(' value="')-1);
                        }
                        $('#var_name').val(variableName);
                        $('#label').val(lableName);
                        if(elementName	==	'textarea')
                            $('#html_element').val('text_area');
                        else
                            $('#html_element').val(elementName);

                        var backgroundColor	=	CSS.substring(CSS.indexOf('background-color')+17, CSS.indexOf('width:')-1);
                        var fontColor	=	CSS.substring(CSS.indexOf(';color:')+7, CSS.indexOf(';position:')-1);
                        var fontSize	=	CSS.substring(CSS.indexOf(';font-size:')+11, CSS.indexOf(';color:'));
                        var height	=	CSS.substring(CSS.indexOf(';height:')+8, CSS.indexOf(';margin-top:')-2);
                        var width	=	CSS.substring(CSS.indexOf(';width:')+7, CSS.indexOf(';height:')-2);
                        var zIndex	=	CSS.substring(CSS.indexOf(';z-index:')+9, CSS.indexOf(';font-size:'));
                        var xPos	=	CSS.substring(CSS.indexOf(';margin-top:')+12, CSS.indexOf(';margin-bottom:')-2);
                        var yPos	=	CSS.substring(CSS.indexOf(';margin-bottom:')+15, CSS.indexOf(';z-index:')-2); 
                        $('#color').val(backgroundColor);
                        $('#font_color').val(fontColor);
                        $('#font_size').val(fontSize);
                        $('#height').val(height);
                        $('#width').val(width); 
                        $('#z_index').val(zIndex);
                        $('#x_position').val(xPos);
                        $('#y_position').val(yPos); 
                        $('#update_id').val(update_id); 
                        $('#update').val('true'); 

                    }  
                });


            });	
        });
        function preview(){
            var var_name = $('#var_name').val();
            var label = $('#label').val();
            var html_element = $('#html_element').val();
            var color = $('#color').val();
            var font_color = $('#font_color').val();
            var font_size = $('#font_size').val();
            var height = $('#height').val();
            var width = $('#width').val();
            var x_position = $('#x_position').val();
            var y_position = $('#y_position').val();

            $.ajax({
                type:'POST', 
                url: 'get_preview.php', 
                data: { 

                    html_element: $('#html_element').val(),
                    font_color: $('#font_color').val(),
                    x_position: $('#x_position').val(),
                    y_position: $('#y_position').val(),
                    font_size: $('#font_size').val(),
                    var_name: $('#var_name').val(),
                    height: $('#height').val(),
                    z_index: $('#z_index').val(),
                    label: $('#label').val(),
                    width: $('#width').val(),
                    color: $('#color').val()
                }, 
                success: function(dataString) {
                    alert(dataString);

                    // var json = jQuery.parseJSON(dataString);

                },
                error: function()
                {
                    alert('err');
                    console.log(arguments);
                }

            });


        }
        function form_submit(targetFormId){
            
           // alert(targetFormId); 
         $.ajax({
						type:'POST', 
						url: 'db_elements.php', 
						data:  $("#"+targetFormId).serialize(), 
						success: function(dataString) {
							 alert(dataString);
							  
							// var json = jQuery.parseJSON(dataString);
							 
							},
							error: function()
							{
								alert('err');
							   console.log(arguments);
							}
							
						});

        }
    </script>

</head>

<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $select_div				=		'SELECT * FROM `CMS`.`divs`';
        $result_div				=		$conn->query($select_div);
        $dropdown=	'';
        while($row=mysqli_fetch_assoc($result_div)){
            $data	 		= 		$row['NAME'];
            $ID				=		$row['HTML_CSS_ID'];
            $dropdown.=		'<option value="'.$ID.'">'.$data.'</option>';
        }
        $select_div             =       'SELECT PAGE_ID,PAGE_TITLE FROM `CMS`.`pages`';
        $result_div             =       $conn->query($select_div);
        $goto_dropdown=  ''; 
        while($row=mysqli_fetch_assoc($result_div)){
            $data           =       $row['PAGE_TITLE'];
            $ID             =       $row['PAGE_ID'];
            if($data !== $_GET['p'])
                $goto_dropdown.=     '<option value="'.$ID.'">'.$data.'</option>';
        }
    ?>
    <div class="container">
        <ul class="nav nav-tabs outer-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a><span>x</span></li>
            <li><a href="#" class="add-outer-tab" data-toggle="tab">+ Add Tab</a></li>
        </ul>
        <div style="    margin-top: -37px; float: right;"> <button type="button" class="btn btn-primary" onClick="openPopUp()" >Save </button> </div>
        <div class="tab-content outer-tab-content">
            <div id="tab_1" class="tab-pane active" >
                <div class="container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1_1" data-toggle="tab">Tab 1.1</a><span>x</span></li>                        
                        <li><a href="#" class="add-inner-tab" data-toggle="tab">+ Add Tab</a></li>
                    </ul>
                    <div class="tab-content inner-tab-content">
                        <div id="tab_1_1" class="tab-pane active" > 
                            <form class="elements_form" method="post" action="">
                                <!--<label>Select DIV:</label>
                                <select name="div_load" id="div_load">
                                <?php echo $dropdown;?>
                                </select>-->


                                <h2>HTML Attributes</h2>
                                <label>Enter variable name:</label>
                                <input type="text" name="var_name" id="var_name"/><br/>

                                <label>Enter Label:</label>
                                <input type="text" name="label" id="label"/><br/>

                                <label>Select HTML Element:</label>
                                <select name="html_element" id="html_element">
                                    <option value="text_area">Text Area</option>
                                    <option value="text">Text</option>
                                    <option value="password">Password</option>
                                    <option value="Submit">Submit</option>
                                    <option value="radio">Radio</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="button">Button</option>
                                    <option value="select">Select</option>
                                    <option value="file_html">File</option>
                                    <option value="hidden">Hidden</option>
                                    <option value="label">Label</option>
                                    <option value="table">Table</option>
                                    <option value="list">List</option>
                                    <option value="form">Form</option>
                                    <option value="image">Image</option>
                                    <option value="fieldset">Filedset</option>
                                    <option value="table_row">Table row</option>
                                    <option value="table_data">Table data</option>
                                    <option value="href">Href</option>
                                </select><br/>
                                <span id="radio" style="display:none;">
                                    <label>Enter Radio button option 1:</label>
                                    <input type="text" name="radio1" />

                                    <label>Enter Radio button option 2:</label>
                                    <input type="text" name="radio2"/>
                                </span>

                                <span id="checkbox" style="display:none;">
                                    <label>Enter checkbox value 1:</label>
                                    <input type="text" name="checkbox1" />

                                    <label>Enter checkbox value 2:</label>
                                    <input type="text" name="checkbox2" />

                                    <label>Enter checkbox value 3:</label>
                                    <input type="text" name="checkbox3" />

                                    <label>Enter checkbox value 4:</label>
                                    <input type="text" name="checkbox4" />

                                    <label>Enter checkbox value 5:</label>
                                    <input type="text" name="checkbox5" />
                                </span>


                                <span id="select" style="display:none;">
                                    <label>Enter dropdown value 1:</label>
                                    <input type="text" name="select1" />

                                    <label>Enter dropdown value 2:</label>
                                    <input type="text" name="select2" />

                                    <label>Enter dropdown value 3:</label>
                                    <input type="text" name="select3" />

                                    <label>Enter dropdown value 4:</label>
                                    <input type="text" name="select4" />

                                    <label>Enter dropdown value 5:</label>
                                    <input type="text" name="select5" />
                                </span>

                                <span id="list" style="display:none;">
                                    <label>Enter list value 1:</label>
                                    <input type="text" name="list1" />

                                    <label>Enter list value 2:</label>
                                    <input type="text" name="list2" />

                                    <label>Enter list value 3:</label>
                                    <input type="text" name="list3" />

                                    <label>Enter list value 4:</label>
                                    <input type="text" name="list4" />

                                    <label>Enter list value 5:</label>
                                    <input type="text" name="list5" />
                                </span>

                                <!--<label>Enter DIV's class and ID Name:</label>
                                <input type="text" name="div_name" /><br/>-->

                                <h2>CSS Attributes</h2>
                                <label>Background Color:</label>
                                <input type="color" name="color" value="#FFFFFF" id="color"/><br/>

                                <label>Font Color:</label>
                                <input type="color" name="font_color" value="#FFFFFF" id="font_color"/><br/>

                                <label>Font Size:</label>
                                <input type="text" name="font_size" id="font_size"/><br/>


                                <!--<label>Position:</label>
                                <input type="text" name="position" />px<br/>-->

                                <label>Height:</label>
                                <input type="text" name="height" id="height"/>px<br/>

                                <label>Width:</label>
                                <input type="text" name="width" id="width"/>px<br/>

                                <label>X-position:</label>
                                <input type="text" name="x_position" id="x_position"/>px<br/>

                                <label>Y-position:</label>
                                <input type="text" name="y_position" id="y_position"/>px<br/>

                                <label>Z-index:</label>
                                <input type="text" name="z_index" id="z_index"/><br/>

                                <input id="pageIdHiddenField" type="hidden" name="pageId" value="0" />
                                <input id="elementIdHiddenField" type="hidden" name="elementId" value="0" />
                                
                                <input id="submit_button" type="button" name="submit" value="save element"  onclick="form_submit();preview();" />
                                <input type="hidden" name="update" id="update" value="false">
                                <input type="hidden" name="update_id" id="update_id" value="0"> 
                            </form>

                        </div>                        
                    </div>
                    <div class="preview" style="border:1px solid #999; width:500px; height:300px;">
                    </div>
                </div>  

            </div>            
        </div>



    </div>





    <div id="vc_Popup" class="modal fade" style="display: none;">
        <div class="modal-dialog" style="width: 650px;">
            <div class="modal-content">
                <div style="background: black; color: gray;" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove white" aria-hidden="true" style="color: white;"></span></button>
                    <h4 class="modal-title">PopUp</h4>
                </div>
                <div class="modal-body" style="height: 200px; max-height: 400px; overflow-y:auto;"> 

                    <div>

                        <div class="col-md-12" style="margin-top: 10px;">
                            <label class=" control-label col-md-6 " style="text-align: left;" >Button Name:</label>
                            <button type="button" class="btn btn-primary col-md-6"  onclick="">Action</button>                          
                        </div>

                        <div class="col-md-12" style="margin-top: 10px;">
                            <label class=" control-label col-md-4" style="text-align: left;" >Next:</label>
                            <select class="form-control col-md-4"  id="next_dropdown" style="width: 33%;" onChange="nextDropDownChangeHandler();" >   
                                <option id="0"  selected="selected">Select one...</option>                            
                                <option id="input">input</option>                            
                                <option id="test">test</option>                            
                                <option id="goto">Goto</option>                            
                            </select>
                            <select class="form-control col-md-4"  id="goto_dropdown" style="width: 33%; display: none;" >
                                <option id="0"  selected="selected">Select one...</option>                            
                                <?php echo $goto_dropdown;?>                         
                            </select>
                        </div>


                        <div class="col-md-12" style="margin-top: 10px;">
                            <label class=" control-label col-md-4" style="text-align: left;" >Save:</label>
                            <select class="form-control col-md-8"  id="save_dropdown" onChange="saveDropDownChangeHandler();" style="display: inline-block; width: 66%;" >   
                                <option id="0"  selected="selected">Select one...</option>                            
                                <option id="input">input</option>                            
                                <option id="test">dummy 1</option>                            
                                <option id="goto">dummy 2</option>                            
                            </select>

                        </div>

                        <div id="addInputFieldsWrapper" class="col-md-12" style="margin-top: 10px; display: none;">

                            <table style="width: 100%;">

                                <thead>
                                    <tr class="col-md-12" style="width: 100%;">
                                        <td class="col-md-3" > <label class=" control-label col-md-12" style="text-align: left;" >Label</label></td>
                                        <td class="col-md-3" > <label class=" control-label col-md-12" style="text-align: left;" >Type</label></td>
                                        <td class="col-md-3" > <label class=" control-label col-md-12" style="text-align: left;" >Table</label></td>
                                        <td class="col-md-3" > <label class=" control-label col-md-12" style="text-align: left;" >Field</label></td>
                                        <td class="col-md-3" > <label class=" control-label col-md-12" style="text-align: left;" ></label></td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="col-md-12" style="width: 100%;">
                                        <td class="col-md-3" >
                                            <select class="form-control col-md-12"  id="save_dropdown" style="display: inline-block;" >   
                                                <option id="name_field_opt">Name</option>                            
                                                <option id="age_field_opt">Age</option>                            
                                                <option id="email_field_opt">Email</option>                                                                        
                                            </select>
                                        </td>
                                        <td class="col-md-2"> <label class=" control-label" style="text-align: left; font-weight: normal;" >Type</label></td>
                                        <td class="col-md-3">
                                            <select class="form-control col-md-12"  id="save_dropdown" style="display: inline-block;" >   

                                                <option id="user_tbl_opt">User</option>                            
                                                <option id="group_tbl_opt">Group</option>                            
                                                <option id="asset_tbl_opt">Asset</option>                                                                        
                                            </select>
                                        </td>
                                        <td class="col-md-2"> <label class=" control-label" style="text-align: left; font-weight: normal;" >Field</label></td>
                                        <td class="col-md-2"> 
                                            <button type="button" class="btn btn-primary" onClick="removeCurrentInputFieldRow(this)">-</button>
                                            <button type="button" class="btn btn-primary" onClick="addNewInputFieldRow()">+ </button>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                          
                    <button type="button" class="btn btn-primary" >OK</button>                          
                </div>
            </div>
        </div>
    </div>
</body>