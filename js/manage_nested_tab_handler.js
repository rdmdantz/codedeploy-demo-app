var DEFAULT_TAB_DATA = '<form method="post" action="">'
                                +'<label>Select DIV:</label>'+
                                '<select name="div_load" id="div_load">'+
                                   ' <?php echo $dropdown;?>'+
                               ' </select>'+


                               ' <h2>HTML Attributes</h2>'+
                               ' <label>Enter variable name:</label>'+
                                '<input type="text" name="var_name" id="var_name"/><br/>'+

                                '<label>Enter Label:</label>'+
                                '<input type="text" name="label" id="label"/><br/>'+

                                '<label>Select HTML Element:</label>'+
                                '<select name="html_element" id="html_element">'+
                                    '<option value="text_area">Text Area</option>'+
                                    '<option value="text">Text</option>'+
                                    '<option value="password">Password</option>'+
                                    '<option value="Submit">Submit</option>'+
                                    '<option value="radio">Radio</option>'+
                                   '<option value="checkbox">Checkbox</option>'+
                                    '<option value="button">Button</option>'+
                                   ' <option value="select">Select</option>'+
                                   ' <option value="file_html">File</option>'+
                                   ' <option value="hidden">Hidden</option>'+
                                   ' <option value="label">Label</option>'+
                                   ' <option value="table">Table</option>'+
                                   ' <option value="list">List</option>'+
                                   ' <option value="form">Form</option>'+
                                   ' <option value="image">Image</option>'+
                                   ' <option value="fieldset">Filedset</option>'+
                                   ' <option value="table_row">Table row</option>'+
                                   ' <option value="table_data">Table data</option>'+
                                   ' <option value="href">Href</option>'+
                                '</select><br/>'+
                               ' <span id="radio" style="display:none;">'+
                                   ' <label>Enter Radio button option 1:</label>'+
                                   ' <input type="text" name="radio1" />'+

                                   ' <label>Enter Radio button option 2:</label>'+
                                    '<input type="text" name="radio2"/>'+
                               ' </span>'+

                               ' <span id="checkbox" style="display:none;">'+
                                    '<label>Enter checkbox value 1:</label>'+
                                   ' <input type="text" name="checkbox1" />'+

                                   ' <label>Enter checkbox value 2:</label>'+
                                   ' <input type="text" name="checkbox2" />'+

                                    '<label>Enter checkbox value 3:</label>'+
                                    '<input type="text" name="checkbox3" />'+

                                    '<label>Enter checkbox value 4:</label>'+
                                    '<input type="text" name="checkbox4" />'+

                                   ' <label>Enter checkbox value 5:</label>'+
                                    '<input type="text" name="checkbox5" />'+
                               ' </span>'+


                               ' <span id="select" style="display:none;">'+
                                   ' <label>Enter dropdown value 1:</label>'+
                                   '<input type="text" name="select1" />'+

                                   ' <label>Enter dropdown value 2:</label>'+
                                   ' <input type="text" name="select2" />'+

                                   ' <label>Enter dropdown value 3:</label>'+
                                   ' <input type="text" name="select3" />'+

                                  '  <label>Enter dropdown value 4:</label>'+
                                   ' <input type="text" name="select4" />'+

                                  '  <label>Enter dropdown value 5:</label>'+
                                   ' <input type="text" name="select5" />'+
                               ' </span>'+

                               ' <span id="list" style="display:none;">'+
                                   ' <label>Enter list value 1:</label>'+
                                   ' <input type="text" name="list1" />'+

                                    '<label>Enter list value 2:</label>'+
                                   ' <input type="text" name="list2" />'+

                                    '<label>Enter list value 3:</label>'+
                                   ' <input type="text" name="list3" />'+

                                   ' <label>Enter list value 4:</label>'+
                                    '<input type="text" name="list4" />'+

                                    '<label>Enter list value 5:</label>'+
                                   ' <input type="text" name="list5" />'+
                                '</span>'+

                               

                                '<h2>CSS Attributes</h2>'+
                               ' <label>Background Color:</label>'+
                                '<input type="color" name="color" value="#FFFFFF" id="color"/><br/>'+

                               ' <label>Font Color:</label>'+
                                '<input type="color" name="font_color" value="#FFFFFF" id="font_color"/><br/>'+

                               ' <label>Font Size:</label>'+
                                '<input type="text" name="font_size" id="font_size"/><br/>'+


                           

                                '<label>Height:</label>'+
                                '<input type="text" name="height" id="height"/>px<br/>'+

                                '<label>Width:</label>'+
                               ' <input type="text" name="width" id="width"/>px<br/>'+

                                '<label>X-position:</label>'+
                                '<input type="text" name="x_position" id="x_position"/>px<br/>'+

                                '<label>Y-position:</label>'+
                                '<input type="text" name="y_position" id="y_position"/>px<br/>'+

                               ' <label>Z-index:</label>'+
                                '<input type="text" name="z_index" id="z_index"/><br/>'+


                               ' <input type="submit" name="submit" value="save element" />'+
                                '<input type="hidden" name="update" id="update" value="false">'+
                                '<input type="hidden" name="update_id" id="update_id" value="0"> '+
                            '</form>';
$(document).ready(function(){

    bindTabsClick();
    bindOuterTabsClick();
    bindInnerTabsClick();  

});

function bindTabsClick()
{
    $(".nav-tabs a").unbind();
    $(".nav-tabs span").unbind();
    $(".nav-tabs").on("click", "a", function(e){
        e.preventDefault();
        $(this).tab('show');
    })
    .on("click", "span", function () {
        var anchor = $(this).siblings('a');
        $(anchor.attr('href')).remove();
        $(this).parent().remove();
        // $(".nav-tabs li").children('a').first().click();
    });
}

function bindOuterTabsClick()
{

    $('.add-outer-tab').unbind();
    $('.add-outer-tab').click(function(e) {
        e.preventDefault();
        var id = $(".outer-tabs").children().length; 
        $(this).closest('li').before('<li><a href="#tab_'+id+'">New Tab</a><span>x</span></li>');         
        $('.outer-tab-content').append('<div id="tab_'+id+'" class="tab-pane" ></div>');

        $('#tab_'+id).append('<div class="container">\
            <ul class="nav nav-tabs">\
            <li class="active"><a href="#tab_'+id+'_1" data-toggle="tab">New Tab</a><span>x</span></li>\
            <li><a href="#" class="add-inner-tab" data-toggle="tab">+ Add Tab</a></li>\
            </ul>\
            <div class="tab-content inner-tab-content">\
            <div id="tab_'+id+'_1" class="tab-pane active" >'+DEFAULT_TAB_DATA+'\
            </div>\
            </div>\
            </div>');

        bindTabsClick();
        bindOuterTabsClick();
        bindInnerTabsClick();

    });
}

function bindInnerTabsClick()
{
    $('.add-inner-tab').unbind();
    $('.add-inner-tab').click(function(e) {
        e.preventDefault();
        var outerTabId=$(e.target).parent().parent().parent().parent().attr('id');


        var outerTabIndex=$(e.target).parent().parent().parent().parent().index();
        outerTabIndex++;

        var id = $('#'+outerTabId+' .nav-tabs').children().length; 
        $(this).closest('li').before('<li><a href="#tab_'+outerTabIndex+'_'+id+'">New Tab</a><span>x</span></li>');         
        $('#'+outerTabId+' .inner-tab-content').append('<div id="tab_'+outerTabIndex+'_'+id+'" class="tab-pane" > '+DEFAULT_TAB_DATA+' </div>');
        bindInnerTabsClick(); 
    }); 
}

function openPopUp()
{

    $('#vc_Popup').modal({backdrop: 'static',keyboard: false,'show':true});

}

function nextDropDownChangeHandler()
{
    if($('#next_dropdown option:selected').attr('id')=='goto')
        $('#goto_dropdown').show();
    else
        $('#goto_dropdown').hide();

}



