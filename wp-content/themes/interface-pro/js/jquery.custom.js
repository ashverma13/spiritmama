/*-----------------------------------------------------------------------------------

 	Custom JS - All front-end jQuery
 
-----------------------------------------------------------------------------------*/
 
jQuery(document).ready(function() {
	
	function portfolio_quicksand() {
		
		// Setting Up Our Variables
		var jQueryfilter;
		var jQuerycontainer;
		var jQuerycontainerClone;
		var jQueryfilterLink;
		var jQueryfilteredItems
		
		// Set Our Filter
		jQueryfilter = jQuery('.gal-filter li.active a').attr('class');
		
		// Set Our Filter Link
		jQueryfilterLink = jQuery('.gal-filter li a');
		
		// Set Our Container
		jQuerycontainer = jQuery('.filterable-grid');
		
		// Clone Our Container
		jQuerycontainerClone = jQuerycontainer.clone();
		
		// Apply our Quicksand to work on a click function
		// for each for the filter li link elements
		jQueryfilterLink.click(function(e) 
		{
			// Remove the active class
			jQuery('.gal-filter li').removeClass('active');
			
			// Split each of the filter elements and override our filter
			jQueryfilter = jQuery(this).attr('class').split(' ');
			
			// Apply the 'active' class to the clicked link
			jQuery(this).parent().addClass('active');
			
			// If 'all' is selected, display all elements
			// else output all items referenced to the data-type
			if (jQueryfilter == 'all') {
				jQueryfilteredItems = jQuerycontainerClone.find('.gal-image'); 
			}
			else {
				jQueryfilteredItems = jQuerycontainerClone.find('.gal-image[data-type~=' + jQueryfilter + ']'); 
			}
			
			// Finally call the Quicksand function
			jQuerycontainer.quicksand(jQueryfilteredItems, 
			{
				// The Duration for animation
				duration: 500000,
				// the easing effect when animation
				easing: 'easeInOutQuad',
				adjustWidth: 'dyanamic',
				maxWidth:	0,
				enhancement: function() {
    	 		//	jQuery('.one-fourth').width(222);
     			}
				// height adjustment becomes dynamic
				////adjustHeight: 'auto',
				//retainExisting: false 
			});
			
			//Initalize our PrettyPhoto Script When Filtered
			jQuerycontainer.quicksand(jQueryfilteredItems, 
				function () { fancybox(); }
			);			
		});
	}
		
	if(jQuery().quicksand) {
		portfolio_quicksand();	
	}
		
	function fancybox() {
		// Apply PrettyPhoto to find the relation with our portfolio item
		jQuery('a.gallery-fancybox').fancybox
			({
				'transitionIn'		: 'none',
				'transitionOut'	: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) 
				{
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
	}
	
	//if(jQuery().prettyPhoto) {
	//	lightbox();
	//}

	
}); // END OF DOCUMENT