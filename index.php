<?php if(isset($_GET['p'])){$project = $_GET['p'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //GET the current project ID to get its respective data from the database
        $select   =  "SELECT PROJECT_ID FROM `CMS`.`projects` WHERE PROJECT_NAME = '$project'";
        $result    =  $conn->query($select);

        while($row=mysqli_fetch_assoc($result)){
            $ID = $row['PROJECT_ID'];//ID contains the current project ID


            //Get the project data against its ID in the database 
            $select   =  "SELECT * FROM `CMS`.`pages` WHERE PROJECT_ID = $ID";
            $result    =  $conn->query($select);


            $page_data = array();
            $elements = array();
            $counter = 0;
            while($row=mysqli_fetch_assoc($result)){  
                $PAGE_TITLE = $row['PAGE_TITLE'];
                $NEXT_PAGE = $row['NEXT_PAGE'];
                $PROJECT_ID = $row['PROJECT_ID'];
                $PAGE_ID = $row['PAGE_ID'];
                $select_element   =  "SELECT * FROM `CMS`.`html_css` WHERE PAGE_ID = $PAGE_ID";
                $result_select_element    =  $conn->query($select_element);
                $array=NULL;
                while($row_element=mysqli_fetch_assoc($result_select_element)){
                    $array_ele = array(
                        $row_element['ID'],
                        $row_element['NAME'],//label                        
                        $row_element['CSS'],//
                        $row_element['HTML'],
                        $row_element['PAGE_ID'],
                        $row_element['CLASS']
                    );
                    //array_push($elements,$array_ele);
                    $array[$counter] = $array_ele;
                    $counter++;
                    //echo '<pre>';


                }
                array_push($elements,$array);


                $array = array($PAGE_ID,$PAGE_TITLE,$NEXT_PAGE,$PROJECT_ID,$elements);
                array_push($page_data,$array); $counter =0;
                //$counter++;

            }//echo '<pre>';//print_r($elements);

            ////////////////////
            $size = count($page_data);
            //use this page_data to populate the dynamic tabs for pages and elements
			
          /* 
            print_r($page_data);*/
        } 
		//echo '<pre>';
        //print_r($page_data);//$page_data contains all the data of the current page
		$HTML	=	$page_data[0][4][0][0][3];
		$h	=	json_decode($HTML);
		echo $h->{'HTML'};
		 

    }

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
        <?php echo 'var g_projectId = "'.$_GET['p'].'";'; ?>
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
        function popUpFormSubmit(targetFormId){
            alert(targetFormId);
            $.ajax({
                type:'POST', 
                url: 'db_pages.php', 
                data:  $("#"+targetFormId).serialize(), 
                success: function(dataString) {
                    alert(dataString);

                    //var json = jQuery.parseJSON(dataString);
                    //var json1 = jQuery.parseJSON(json.HTML);
                    //$('.preview').append(json1.HTML);
                    //alert(json1.HTML);
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

                    var json = jQuery.parseJSON(dataString);
                    var json1 = jQuery.parseJSON(json.HTML);
                    $('.preview').append(json1.HTML);
                    //alert(json1.HTML);
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
                        <li><a href="#" class="add-inner-tab" data-toggle="tab">+ Add Tab</a></li>
                    </ul>
                    <div class="tab-content inner-tab-content">

                    </div>
                    <div class="preview" style="border:1px solid #999; width:500px; height:300px;">
                    </div>
                </div>  

            </div>            
        </div>



    </div>





    <div id="vc_Popup" class="modal fade" style="display: none;">
        <div class="modal-dialog" style="width: 700px;">
            <div class="modal-content">
                <div style="background: black; color: gray;" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove white" aria-hidden="true" style="color: white;"></span></button>
                    <h4 class="modal-title">PopUp</h4>
                </div>
                <div class="modal-body" style="height: 150px; max-height: 500px; overflow-y:auto;"> 
                    <form class="popup_form" method="post" action="">
                        <div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <label class=" control-label col-md-4 " style="text-align: left;" >Button Name:</label>
                                <button type="button" class="btn btn-primary col-md-8"  onclick="">Action</button>                          
                            </div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <label class=" control-label col-md-4" style="text-align: left;" >Next:</label>
                                <select class="form-control col-md-4"  id="next_dropdown" name="next_dropdown" style="width: 33%;" onChange="nextDropDownChangeHandler();" >   
                                    <option id="0" value="0" selected="selected">Select one...</option>                            
                                    <option id="goto">Goto</option>   
                                    <option id="input">Input</option> 
                                    <option id="search">Search</option>                            
                                </select>
                                <select class="form-control col-md-4"  id="goto_dropdown" name="goto_dropdown" style="width: 33%; display: none;" >
                                    <option id="0"  selected="selected">Select one...</option>                            
                                    <?php echo $goto_dropdown;?>                         
                                </select>
                                <select class="form-control col-md-4"  id="searchTable_dropdown" name="searchTable_dropdown" onChange="searchTableOnChangeHandler();" style="width: 33%; display: none;" >
                                    <option id="0" value="0"  selected="selected">Select one...</option>                            
                                    <option id="t1">Table 1</option>                            
                                    <option id="t2">Table 2</option>                            
                                    <option id="t3">Table 3</option>                            

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
                                                <select class="form-control col-md-12"  name="label_1" style="display: inline-block;" >   
                                                    <option id="name_field_opt">Name</option>                            
                                                    <option id="age_field_opt">Age</option>                            
                                                    <option id="email_field_opt">Email</option>                                                                        
                                                </select>
                                            </td>
                                            <td class="col-md-1"> <label class=" control-label" name="type_1" style="text-align: left; font-weight: normal;" >Type</label></td>
                                            <td class="col-md-3">
                                                <select class="form-control col-md-12" id="table_1" name="table_1" onChange="onTableChange(this);" style="display: inline-block;" >   

                                                    <option id="user_tbl_opt">User</option>                            
                                                    <option id="group_tbl_opt">Group</option>                            
                                                    <option id="asset_tbl_opt">Asset</option>                                                                        
                                                    <option id="addNew_tbl_opt">Add New</option>                                                                        
                                                </select>
                                            </td>
                                            <td class="col-md-3">
<<<<<<< HEAD
                                            
                                                <select class="form-control col-md-12" id="field_1"  name="field_1" onChange="onFieldChange(this);" style="display: inline-block;" >   
                                                    <option id="name_field_opt">Name</option>                            
<option id="age_field_opt">Age</option>                            
                                                    <option id="email_field_opt">Email</option>                                                                        
                                                    <option id="addNew_field_opt">Add New</option>                                                                        
                                                </select>                                                
                                            </td>
                                            <td class="col-md-2"> 
                                                <button type="button" class="btn btn-primary" onClick="removeCurrentInputFieldRow(this)">-</button>
                                                <button type="button" class="btn btn-primary" onClick="addNewInputFieldRow()">+ </button>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>


                            <div id="addSearchFieldsWrapper" class="col-md-12" style="margin-top: 10px; display: none;">

                                <table style="width: 100%;">

                                    <thead>
                                        <tr class="col-md-12" style="width: 100%;">
                                            <td class="col-md-3" > <label class=" control-label col-md-12" style="text-align: left;" >Output Label</label></td>
                                            <td class="col-md-3" > <label class=" control-label col-md-12" style="text-align: left;" >Field</label></td>
                                            <td class="col-md-3" > <label class=" control-label col-md-12" style="text-align: left;" >X</label></td>
                                            <td class="col-md-3" > <label class=" control-label col-md-12" style="text-align: left;" >Y</label></td>
                                            <td class="col-md-3" > <label class=" control-label col-md-12" style="text-align: left;" ></label></td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr class="col-md-12" style="width: 100%;">
                                            <td class="col-md-2"> <label class=" control-label" name="col_1" style="text-align: left; font-weight: normal;" >Column1</label></td>
                                            <td class="col-md-3" >
                                                <select class="form-control col-md-12"  name="col_dropdown_1" style="display: inline-block;" >   
                                                    <option id="name_field_opt">Name</option>                            
                                                    <option id="age_field_opt">Age</option>                            
                                                    <option id="email_field_opt">Email</option>                                                                        
                                                </select>
                                            </td>

                                            <td class="col-md-2"> 
                                                <button type="button" class="btn btn-primary" onClick="removeCurrentSearchFieldRow(this)">-</button>
                                                <button type="button" class="btn btn-primary" onClick="addNewSearchFieldRow()">+ </button>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>


                        </div>
                        <input id="pageIdHiddenField_popup" type="hidden" name="pageId" value="0" />
                        <input id="projectIdHiddenField_popup" type="hidden" name="projectId" value="0" />
                        <input id="elementsCountHiddenField_popup" type="hidden" name="elementCount" value="0" />
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                          
                    <button id="submitButton_popup" type="submit" onClick="popUpFormSubmit();" class="btn btn-primary" >OK</button>                          
                </div>
            </div>
        </div>
    </div>

    <div id="vc_addNewTable" class="modal fade" style="display: none;">
        <div class="modal-dialog" style="width: 500px; margin-top: 60px; ">
            <div class="modal-content">
                <div style="background: black; color: gray;" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove white" aria-hidden="true" style="color: white;"></span></button>
                    <h4 class="modal-title">Add New Table</h4>
                </div>
                <div class="modal-body" style="height: 100px; max-height: 100px; overflow-y:auto;"> 
                    <form class="popup_addNewTableform" method="post" action="">
                        <div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <label class="control-label col-md-6" style="text-align: left;" >Table Name:</label>
                                <input id="tableName_addNewTable" name="tableName_addNewTable" class="col-md-6"  />
                                <input id="projectIdHiddenField_addNewTable" type="hidden" name="projectId" value="0" />
                            </div>


                        </div>

                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                          
                    <button id="submitButton_addNewTable" type="submit" onClick="popUpAddNewTableSubmit();" class="btn btn-primary" >OK</button>                          
                </div>
            </div>
        </div>
    </div>

    <div id="vc_addNewField" class="modal fade" style="display: none;">
        <div class="modal-dialog" style="width: 500px; margin-top: 60px; ">
            <div class="modal-content">
                <div style="background: black; color: gray;" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove white" aria-hidden="true" style="color: white;"></span></button>
                    <h4 class="modal-title">Add New Field</h4>
                </div>
                <div class="modal-body" style="height: 200px; max-height: 200px; overflow-y:auto;"> 
                    <form class="popup_addNewTableform" id="popup_addNewTableform_field" method="post" action="">
                        <div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <label class="control-label col-md-6" style="text-align: left;" >Field Name:</label>
                                <input id="fieldName_addNewField" name="fieldName_addNewField" class="col-md-6"  />

                            </div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <label class=" control-label col-md-6" style="text-align: left;" >Field Type:</label>
                                <select class="form-control col-md-6"  id="fieldType_addNewField" name="fieldType_addNewField" style="display: inline-block; width: 50%;" >   
                                    <option id="0" value="0"  selected="selected">Select one...</option>                            
                                    <option id="intType">Int</option>                            
                                    <option id="varcharType">Varchar</option>                            
                                    <option id="doubleType">Double</option>                            
                                </select>

                            </div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <label class="control-label col-md-6" style="text-align: left;" >Field Length:</label>
                                <input id="fieldLength_addNewField" name="fieldLength_addNewField" class="col-md-6"  />

                            </div>

                            <input id="projectIdHiddenField_addNewField" type="hidden" name="projectId" value="0" />
                        </div>

                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                          
                    <button id="submitButton_addNewField" type="submit" onClick="popUpAddNewFieldSubmit();" class="btn btn-primary" >OK</button>                          
                </div>
            </div>
        </div>
    </div>
</body>