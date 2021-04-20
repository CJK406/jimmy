$(".three_hover_div").hover(
    function(){
            $(".three_hover_div").removeClass("hover_event");
            $("#home_section_3").removeClass("background1");
            $("#home_section_3").removeClass("background2");
            $("#home_section_3").removeClass("background3");

            $(this).addClass("hover_event");
            var index = $(this).attr('id');
            if(index=="1"){
                $("#home_section_3").addClass("background1");
            }
            if(index=="2"){
                $("#home_section_3").addClass("background2");
            }
            if(index=="3"){
                $("#home_section_3").addClass("background3");
            }
    },
    function(){
        $(".three_hover_div").removeClass("hover_event");
        $("#home_section_3").removeClass("background1");
        $("#home_section_3").removeClass("background2");
        $("#home_section_3").removeClass("background3");
    },
);