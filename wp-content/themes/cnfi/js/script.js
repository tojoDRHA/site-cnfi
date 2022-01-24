/*debut height*/

        function hauteurEgale(group) {
         tallest = 0;
         group.each(function() {
         thisHeight = jQuery(this).height();
         if(thisHeight > tallest) {
           tallest = thisHeight;
           }
         });
          group.height(tallest);
        }
        hauteurEgale(jQuery(".heightFond"));
        /*fin height*/ 
function shareMenu () {
          
           
             
          
           jQuery(".childright a").click(function(){
              jQuery(".showMask").css("visibility","visible");
           });
           jQuery(".showMask .fermer").click(function(){
              jQuery(".showMask").css("visibility","hidden");
           });
           var win = jQuery(window).width();
           if (win <= 515) {
            jQuery(".prenom").insertAfter(".nom");
           }else
           {
            jQuery(".prenom").insertBefore(".service");
           }
            
            var size = jQuery('.blocParticipe, .blocAbs_hpt').height();
            var scrollPos = jQuery(window).scrollTop();

            if (scrollPos >= size) {
                jQuery('.fondPartage').addClass('visible');
            } else {
                jQuery('.fondPartage').removeClass('visible');
            }
                
}

shareMenu();
jQuery(window).scroll(shareMenu);
function hover(){
       jQuery(".radio span input").each(function(){
                jQuery(this).click(function(){
                    jQuery(this).parent("span").siblings().removeClass("active");
                    if (jQuery(this).parent("span").hasClass("active"))
                     {
                        jQuery(this).parent("span").removeClass("active");
                     }
                    else
                     {
                        jQuery(this).parent("span").addClass("active");
                     }
                });
       });
       /**/
       jQuery("nav li.ssMenu").hover(function(){
                                            jQuery(this).addClass("hover");
                                          }
                              , function(){ 
                                            jQuery(this).removeClass("hover");
       });
   
}

function separation_nombre()
{
   jQuery(".number").each(function(){
    var nbr = jQuery(this).text();
    var nombre = ''+nbr;
    var retour = '';
    var count=0;
    for(var i=nombre.length-1 ; i>=0 ; i--)
    {
      if(count!=0 && count % 3 == 0)
        retour = nombre[i]+' '+retour ;
      else
        retour = nombre[i]+retour ;
      count++;
    }
    jQuery(this).text(retour);
    return retour;
  });
}

function toggleBloc(){
  jQuery(".blocToggle.show .child").show();
  jQuery(".toggleBloc").each(function(){
        jQuery(this).click(function(){
          
		  jQuery(this).parent().addClass("show");
		  //jQuery(this).parent().toggleClass("show");
		  jQuery(".blocToggle.show .child").show();
		  jQuery(this).parent().siblings().removeClass("show")
									 .addClass("hide");
		  jQuery(".blocToggle.hide .child").removeAttr("style");
		  jQuery(this).siblings().slideToggle();
		  jQuery(".blocToggle").removeClass("hide");
      })
 })
}

function compteur(){
 
    jQuery(".listColor").each(function (index) {
        var x   = jQuery(this);
        jQuery("<span class='compt'></span>").prependTo(x);
        var str = index + 1;
        jQuery(this).children(".compt").text(str+" / ");
    });
  
}

function menutab(){
  jQuery(".toggleTab").click(function(){
    jQuery(this).siblings("ul").toggleClass("openTab");
  });
  jQuery(".content ul.nav li").click(function(){
    jQuery(this).parent("ul").toggleClass("openTab");
  });
}

function showBloc(){
  jQuery(".matinale .child").each(function(){
   jQuery(this).children(".bloc").eq(2).addClass("lastShow");
   jQuery(".lastShow").nextAll(".bloc").hide();
   jQuery(this).children(".btBleu").click(function(){
     jQuery(this).siblings(".lastShow").nextAll(".bloc").eq(0).addClass("firstShow").removeAttr("style");
     jQuery(this).siblings(".lastShow").nextAll(".bloc").eq(1).addClass("secondShow").removeAttr("style");
     jQuery(this).siblings(".lastShow").nextAll(".bloc").eq(2).addClass("lastShow").removeAttr("style");
     jQuery(this).siblings(".lastShow").prevAll(".bloc").removeClass("lastShow").slideDown();
   });
 });
}

/*
function showBlocTab(){
  jQuery(".tab-pane.active .colFloat").show();
  jQuery(".tab-pane.active").addClass("activeTab");
  jQuery(".tab-pane").each(function(){
     jQuery(this).children(".responsive").click(function(){
       jQuery(this).siblings(".colFloat").slideToggle();
       
       if(jQuery(this).parent().hasClass("activeTab")){
          jQuery(this).parent().addClass("activeTab");
       }
       else{
          jQuery(this).parent().removeClass("activeTab");
       };
       jQuery(this).parent().siblings().removeClass("activeTab");
       jQuery(".tab-pane:not('.activeTab')").children(".colFloat").slideUp();
      
     });
  });
}
*/

function showBlocTab(){
  
      jQuery(".tab-pane").each(function(){
        var id = jQuery(this).attr("id"),
            val = "#"+id;
         jQuery(this).children(".responsive").click(function(){
         jQuery(this).siblings(".colFloat").slideDown();
            jQuery(this).parent().addClass("active");
            //jQuery(".active .colFloat").slideDown();
            jQuery(".nav-tabs li a").each(function(){
                var classA = jQuery(this).attr("href");
                if(val == classA){
                  jQuery(this).parent("li").addClass("active");
                  jQuery(this).parent("li").siblings().removeClass("active")
                }
            });

            jQuery(this).parent().siblings().removeClass("active");
            jQuery(".tab-pane:not('.active') .colFloat").slideUp();
            jQuery(".tab-pane.active").children(".colFloat").slideDown();
           
          });


      });
  
}
/****** Start ready function **********/

jQuery(document).ready(function(jQuery) {
    hover();
    menutab();
    /**/
        /**/
        var li = jQuery(".vie .wisi .content .legs5 ul li");
        jQuery("<span></span>").prependTo(li);
        /**/
        jQuery('.lstPart ul li').each(function(index){
           jQuery("<span></span>").prependTo(this);
           jQuery(this).children().html(index +1 + "/");
        });
    
  /**/
    var activeBonneRaison = 0;
    jQuery('.pj .wisiPourQui .customNavigation .next').click(function(){
      activeBonneRaison ++;            
        if (activeBonneRaison == jQuery(".owl_5").find(".colChild").length - 2) {
          activeBonneRaison = 0;
        }

      showActiveBonneRaison();
      return false;
    });

  function showActiveBonneRaison() {
    jQuery(".owl_5").find(".colChild").removeClass("activeItem");
    jQuery(".owl_5").find(".colChild").eq(activeBonneRaison).addClass("activeItem");
    jQuery(".mobilierShow").empty();
    jQuery(".owl_5").find(".colChild").eq(activeBonneRaison).find('.commun').clone().appendTo(".mobilierShow");
    return false;
  }

   jQuery(".id_sp").clone().appendTo(".mobilierShow");
   jQuery(".owl_5 .colFloat span").each(function(_index){      
      jQuery(this).click(function(){
        activeBonneRaison = _index;
        showActiveBonneRaison();

      });
   });
 
   jQuery(".clicIci, .cmd, .cmd2").click(function(){
      jQuery(".mask_1, .BlocMask_1").css("display","block");
   });
   jQuery(".valide").click(function(){
       jQuery(".connecte").css("display","block");
       jQuery(".nonConnecte").css("display","none");      
   });
   jQuery(".arrowDate").click(function(){
        jQuery(this).siblings(".date_1").slideToggle();  
        jQuery(this).toggleClass("arrowDate_bas");               
                  
 });
 jQuery("nav li.ssMenu").click(function(){
  jQuery(this).toggleClass("active");
   jQuery(this).children("ul").slideToggle();
   jQuery(".bgSSmenu").slideToggle();
 });

jQuery(".container").click(function(){
  jQuery("nav li.ssMenu").toggleClass("active");
  jQuery("nav li.ssMenu").children("ul").slideUp();
  jQuery(".bgSSmenu").slideUp();
 });

 jQuery(".toggleMenu").click(function(){
   jQuery(".header .child").slideToggle();
   jQuery("body").toggleClass("OpenMenu");
 });

 jQuery(".blocList .lire").click(function(){
   jQuery(this).siblings(".short, .high").slideToggle();
   jQuery(this).parents(".colFloat").toggleClass("openList");
 });

 jQuery(".close").click(function(){
   jQuery(".BlocMask, .mask").hide();
 });

 //checkbox
  jQuery(".checkbox span input").each(function(){
    jQuery(this).click(function(){
       if(jQuery(this).parent().hasClass("active")){jQuery(this).parent().removeClass("active");}
       else{jQuery(this).parent().addClass("active");}
      });
  });
/*start window scrolltop*/
jQuery(window).scroll(function(){
            var scrPos = jQuery("body").position();
                if(jQuery(window).scrollTop() >= scrPos.top+20)
                {
                  jQuery(".scr").addClass("fixed");
                }
                else
                {
                  jQuery(".scr").removeClass("fixed");
                }
        });
/*end window scrolltop*/
  //radio
  jQuery(".radio span input").each(function(){
    jQuery(this).click(function(){
      jQuery(this).parent().addClass("active");
      jQuery(this).parent().siblings(".active").removeClass("active");
      });
  });


 showBloc();
 showBlocTab();
 toggleBloc();
 separation_nombre();
 compteur();

 jQuery(".file").each(function(){
    jQuery(this).change(function(){
      var Valeur = jQuery(this).val();
      jQuery(this).next().val(Valeur);
      });
  });

 
});
/****** End ready function **********/

/****** start resize function **********/
jQuery( window ).resize(function() {
  jQuery(".tab-pane .colFloat").hide();
  jQuery(".tab-pane.active .colFloat").show();
});
/****** End resize function **********/


  