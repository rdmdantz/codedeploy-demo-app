
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
            <div id="tab_'+id+'_1" class="tab-pane active" >Tab '+id+'.1 Details\
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
        $('#'+outerTabId+' .inner-tab-content').append('<div id="tab_'+outerTabIndex+'_'+id+'" class="tab-pane" >Tab '+outerTabIndex+'.'+id+' Details</div>');
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



