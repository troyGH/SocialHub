$(document).ready(function(){

$(".testnav").addClass("ui-menu ui-widget ui-widget-content ui-corner-all");
$(".testnav li").addClass("ui-menu-item");
$(".sub-menu").hide();


$(".clk").click(function(){
	
	var menu = "#nav";
	var position = {my: "left top", at: "left bottom+8"};
	$(menu).menu({
    position: position,
    blur: function() {
        $(this).menu("option", "position", position);
    },
    focus: function(e, ui) {
        if ($(menu).get(0) !== $(ui).get(0).item.parent().get(0)) {
            $(this).menu("option", "position", {my: "left top", at: "left top"});
        }
    }
});



});

}); // End of document function