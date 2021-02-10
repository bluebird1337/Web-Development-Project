            $(".button").hover(function(){
                
                $(this).addClass("highlight");
                
                
            },function(){
                
                $(this).removeClass("highlight");
                
            });
            
            $(".button").click(function(){
                
                $(this).toggleClass("active");
                
                $(this).removeClass("highlight");
                
                var panelID = ($(this).attr("id")) + "panel";
                
                $("#" + panelID).toggleClass("hidden");
                
                var num_of_hidden = $('.hidden').length;
                
                $(".panel").width($(window).width() / (4 - num_of_hidden) - 10 );

            });
            
            function update_output(){
                
                $("#outputpanel").contents().find("html").html( '<html><head><style type = "text/css">' + $("#csspanel").val() + '</style></head> <body>' + $("#htmlpanel").val() + '</body> </html>');
                
                document.getElementById("outputpanel").contentWindow.eval($("#javascriptpanel").val());
                
            }
            
            update_output();
            
            $(".panel").height($(window).height() - $("#head-bar-container").height() - 20);
            
            $(".panel").width($(window).width() / 2 - 10 );
            
            
            $('.panel').bind('input propertychange', function(){
               
                update_output();
                
            });