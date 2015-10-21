<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="bootstrap/css/bootstrap.css"              rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>   
    <script type="text/javascript"  src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/manage_nested_tab_handler.js"></script>


    <style type="text/css">

        .container{
            margin-top: 10px;
        }

        .nav-tabs > li {
            position:relative;    
        }

        .nav-tabs > li > a {
            display:inline-block;
        }

        .nav-tabs > li > span {
            display:none;
            cursor:pointer;
            position:absolute;
            right: 6px;
            top: 8px;
            color: red;
        }

        .nav-tabs > li:hover > span {
            display: inline-block;
        }        

    </style>


</head>

<body>

    <div class="container">
        <ul class="nav nav-tabs outer-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a><span>x</span></li>
            <li><a href="#" class="add-outer-tab" data-toggle="tab">+ Add Tab</a></li>
        </ul>
        <div class="tab-content outer-tab-content">
            <div id="tab_1" class="tab-pane active" >
                <div class="container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1_1" data-toggle="tab">Tab 1.1</a><span>x</span></li>                        
                        <li><a href="#" class="add-inner-tab" data-toggle="tab">+ Add Tab</a></li>
                    </ul>
                    <div class="tab-content inner-tab-content">
                        <div id="tab_1_1" class="tab-pane active" > <textarea rows="10" style="width: 100%;">This is default data </textarea> 
                        </div>                        
                    </div>
                </div>  

            </div>            
        </div>


        <div style="margin-top: 20px;">
            <button type="button" class="btn btn-primary" onClick="openPopUp()" >click me </button>
        </div>       

    </div>





    <div id="vc_Popup" style="display: none;" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div style="background: black; color: gray;" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove white" aria-hidden="true" style="color: white;"></span></button>
                    <h4 class="modal-title">PopUp</h4>
                </div>
                <div class="modal-body" style="height: 200px;"> 

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
                                <option id="1" >Page 1</option>                            
                                <option id="2" >Page 2</option>                            
                                <option id="3" >Page 3</option>                            
                                <option id="4" >Page 4</option>                            
                            </select>
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


    

