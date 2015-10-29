var g_formIdCounter=1;
var g_elementIdCounter=1;

var DEFAULT_TAB_DATA = '<form class="elements_form" method="post" action="">'
+
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


' <input id="pageIdHiddenField" type="hidden" name="pageId" value="0" />'+
' <input id="elementIdHiddenField" type="hidden" name="elementId" value="0" />'+

' <input id="submit_button" type="button" name="submit" value="save element"  onclick="form_submit();preview();" />'+
'<input type="hidden" name="update" id="update" value="false">'+
'<input type="hidden" name="update_id" id="update_id" value="0"> '+
'</form>';
$(document).ready(function(){

    bindTabsClick();
    bindOuterTabsClick();
    bindInnerTabsClick();
    setPreAddedFormsId(); 
    init_outerTabs();     
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

    });
}

function bindOuterTabsClick()
{

    $('.add-outer-tab').unbind();
    $('.add-outer-tab').click(function(e) {
        e.preventDefault();
        var id = $(".outer-tabs").children().length; 
        $(this).closest('li').before('<li><a id="0" class="tab_buttons" href="#tab_'+id+'">New Tab</a><span>x</span></li>');         
        $('.outer-tab-content').append('<div id="tab_'+id+'" class="tab-pane" ></div>');

        $('#tab_'+id).append('<div class="container">\
            <ul class="nav nav-tabs">\
            <li class="active"><a class="tab_buttons" href="#tab_'+id+'_1" data-toggle="tab">New Tab</a><span>x</span></li>\
            <li><a href="#" class="add-inner-tab" data-toggle="tab">+ Add Tab</a></li>\
            </ul>\
            <div class="tab-content inner-tab-content">\
            <div id="tab_'+id+'_1" class="tab-pane active" >'+DEFAULT_TAB_DATA+'\
            </div>\
            </div>\
            </div>');
        var formId = 'formId_'+g_formIdCounter;     
        $($('#tab_'+id + ' .elements_form')[0]).attr('id',formId);
        $('#' +formId + ' #pageIdHiddenField').val('0');
        $('#' +formId + ' #elementIdHiddenField').val('0'); 
        $('#' +formId + ' #submit_button').attr('onClick','form_submit(\''+formId+'\')');


        g_formIdCounter++;   

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
        $(this).closest('li').before('<li><a class="tab_buttons" href="#tab_'+outerTabIndex+'_'+id+'">New Tab</a><span>x</span></li>');         
        $('#'+outerTabId+' .inner-tab-content').append('<div id="tab_'+outerTabIndex+'_'+id+'" class="tab-pane" > '+DEFAULT_TAB_DATA+' </div>');

        var formId = 'formId_'+g_formIdCounter;     
        $($('#tab_'+outerTabIndex+'_'+id+' .elements_form')[0]).attr('id',formId);
        $('#' +formId + ' #pageIdHiddenField').val('0');
        $('#' +formId + ' #elementIdHiddenField').val('0');
        $('#' +formId + ' #submit_button').attr('onClick','form_submit(\''+formId+'\')');
        g_formIdCounter++;         
        bindInnerTabsClick();         
    }); 
}

function setPreAddedFormsId()
{
    var allForms = $('.elements_form');
    $.each(allForms,function(index,form)
        {
            var formId = 'formId_'+g_formIdCounter;            
            $(form).attr('id',formId);
            $('#' +formId + ' #pageIdHiddenField').val('0');
            $('#' +formId + ' #elementIdHiddenField').val('0');            
            $('#' +formId + ' #submit_button').attr('onClick','form_submit(\''+formId+'\')');
            g_formIdCounter++;             
    });

}

function init_outerTabs()
{
    for(var i=1; i<g_outerTabsList.length; i++)
        $('.add-outer-tab').click();

    var allForms = $('.elements_form');

    $.each(g_outerTabsList,function(index,tab)
        {
            var allOuterTabs=$('.outer-tabs>li'); 
            $(allOuterTabs[index]).find('a').eq(0).text(tab[1]); 
            $(allOuterTabs[index]).find('a').eq(0).attr('id',tab[0]); 
            $($(allForms[index]).find('#pageIdHiddenField').eq(0)).val(tab[0]);
            $($(allForms[index]).find('#elementIdHiddenField').eq(0)).val(tab[0]); 
            var formId=$(allForms[index]).attr('id');         
            $($(allForms[index]).find('#submit_button').eq(0)).attr('onClick','form_submit(\''+formId+'\')');
    });
    $('a[href="#tab_1"]').click();
    $('a[href="#tab_1_1"]').click();
}

function openPopUp()
{
    $('#vc_Popup').modal({backdrop: 'static',keyboard: false,'show':true});
    $.each(g_outerTabsList,function(index,tab)
        {
            var allOuterTabs=$('.outer-tabs>li'); 
            if($('.outer-tabs >li.active>a').attr('id') ==tab[0])
                $('#pageIdHiddenField_popup').val(g_projectId);
    });
    $('#projectIdHiddenField_popup').val(g_projectId);
}

function nextDropDownChangeHandler()
{
    if($('#next_dropdown option:selected').attr('id')=='goto')
        $('#goto_dropdown').show();
    else
        $('#goto_dropdown').hide();

}

function saveDropDownChangeHandler()
{
    if($('#save_dropdown option:selected').attr('id')=='input')
    {
        $('#addInputFieldsWrapper').show();
        $('#vc_Popup .modal-body').height('400px');
        countTr = $('#addInputFieldsWrapper tbody tr').length;
        $('#elementsCountHiddenField_popup').val(countTr);
    }

    else
    {
        $('#addInputFieldsWrapper').hide();
        $('#vc_Popup .modal-body').height('300px');
        $('#elementsCountHiddenField_popup').val(0);
    }
}

function removeCurrentInputFieldRow(target)
{
    var targetRow=$(target).parent().parent();
    $(targetRow).delay(300).fadeOut(300, function(){
        $(targetRow).remove();
        
        if($('#addInputFieldsWrapper tbody tr').length==0)
            appendNewInputFieldRow(); 
        else
            $('#addInputFieldsWrapper tbody tr:last td:last button:last').css('visibility','visible');
<<<<<<< HEAD


        countTr = $('#addInputFieldsWrapper tbody tr').length;
        $('#elementsCountHiddenField_popup').val(countTr);


=======
            
            
>>>>>>> 1e559549f56ea846bf042bc12f90f262c39e33c3
    });
}
function addNewInputFieldRow()
{
    $('#addInputFieldsWrapper tbody tr:last td:last button:last').css('visibility','hidden');
    appendNewInputFieldRow();                        
}

function appendNewInputFieldRow()
{
    countTr = $('#addInputFieldsWrapper tbody tr').length;
    $('#elementsCountHiddenField_popup').val(countTr);
    countTr++;
<<<<<<< HEAD

=======
    
>>>>>>> 1e559549f56ea846bf042bc12f90f262c39e33c3
    $('#addInputFieldsWrapper tbody').append('<tr class="col-md-12" style="width: 100%;">\
        <td class="col-md-3" >\
        <select class="form-control name="label_'+countTr+'" col-md-12" style="display: inline-block;" >\
        <option id="name_field_opt">Name</option>\
        <option id="age_field_opt">Age</option>\
        <option id="email_field_opt">Email</option>\
        </select>\
        </td>\
        <td class="col-md-2"> <label class="control-label" name="type_'+countTr+'" style="text-align: left; font-weight: normal;" >Type</label></td>\
        <td class="col-md-3">\
        <select class="form-control col-md-12" name="table_'+countTr+'" style="display: inline-block;" >\
        <option id="user_tbl_opt">User</option>\
        <option id="group_tbl_opt">Group</option>\
        <option id="asset_tbl_opt">Asset</option>\
        </select>\
        </td>\
        <td class="col-md-2"> <label class=" control-label" name="field_'+countTr+'" style="text-align: left; font-weight: normal;" >Field</label></td>\
        <td class="col-md-2">\
        <button type="button" class="btn btn-primary" onclick="removeCurrentInputFieldRow(this)">-</button>\
        <button type="button" class="btn btn-primary" onclick="addNewInputFieldRow()">+ </button>\
        </td>\
        </tr>'); 
}
