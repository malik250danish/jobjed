/*----------------------------------------------------*/
/*	SHOW PLAN DETAILS ON CLICK
/*----------------------------------------------------*/
$(document).ready(function(){
		 "use strict";
		 
		$('.prices-monthly-plan').on("click",function (){
				$('.prices-plan').removeClass("show-plan");
				$('.plan-details').removeClass("show-plan-details");
				$(this).parent('.prices-plan').toggleClass("show-plan");
        	$(this).parent('.prices-plan').find(".plan-details").toggleClass("show-plan-details");	
		});


	/*----------------------------------------------------*/
	/*	Family Click Details
	/*----------------------------------------------------*/
		$('.tcol').click(function () 
		{	
			var tr=	$(this).find('figcaption').hasClass('hovered');

			$(".tcol figcaption").removeClass('hovered');	
			$(this).find('img').toggleClass('details');	
			$(".tcol").removeClass('disappear');	
			$(this).find('figcaption').toggleClass('hovered');
			$(this).siblings().toggleClass("disappear");
			
			if(tr)
			{
					$(this).find('figcaption').removeClass('hovered');
					$(this).find('img').removeClass('details');
					$(this).siblings().toggleClass("disappear");

					if($(this).hasClass("col2") )
					{
						$(this).removeClass('move-left');
					}
			}

			if($(this).hasClass("col2") )
			{
				  $(this).siblings().addClass("disappear");
					$(this).toggleClass('move-left');
			}
		});
});