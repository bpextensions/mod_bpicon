/*!
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights},  All rights reserved.
 * @license     ${license.name}; see ${license.url}
 * @author      ${author.name}
 */
(function ( $ ) {
    
    $.fn.FontAwesomeDrawPreview = function(id, version, text_search, text_close){
        // Create preview if don't exists already
        var container = $('#FontAwesomePreview');
            
        // Prepare form field preview
        var drawIcons = function(container){
            var ignore = [];
            
            $.ajax({
               url: 'https://maxcdn.bootstrapcdn.com/font-awesome/'+version+'/css/font-awesome.min.css',
               async: false,
               success: function(data){
                    var icons = data.match(/\.fa\-[a-z0-9\-]{1,}/g); 
                
                    for(var i=0,ic=icons.length; i<ic; i++){
                        icons[i] = icons[i].substring(4);
                        var name = icons[i];

                        // If icon is not in ignore list create it
                        if( ignore.indexOf(name)<0 && i>33 ) {
                            var icon = $('<i class="fa fa-'+name+'" data-fa="'+name+'"></i>');
                            container.append(icon);
                        }
                    }
               }
            });

        };
        
        // Create preview HTML
        var drawIconsPreview = function(){
            if( container.length===0 ) {
                container = $('<div id="FontAwesomePreview"><div class="toolbar"><div class="input-append pull-left"><input type="text" placeholder="'+text_search+'"/><button class="btn btn-default btn-reset" type="button"><i class="fa fa-close"></i></button></div><button class="btn btn-default pull-right">'+text_close+'</button></div><div class="list"></div></div>');
                $('body').append(container);
                var container_list = $('#FontAwesomePreview .list');
                container.hide();
                
                // Add Close button functionality
                $('#FontAwesomePreview .btn-default.pull-right').click(function(){
                    $('#FontAwesomePreview').hide();
                });

                // Add search functionality
                var searchAction = function(){
                    if( $.trim(this.value).length ) {
                        console.log('search:'+this.value);
                        $('#FontAwesomePreview .list .fa').each(function(){
                            $(this).hide(); 
                        });
                        $('#FontAwesomePreview .list').find('.fa[data-fa*="'+this.value+'"]').show();
                    } else {
                        $('#FontAwesomePreview .list .fa').each(function(){
                            $(this).show(); 
                        });
                    }
                    
                };
                $('#FontAwesomePreview input').keyup(searchAction);
                $('#FontAwesomePreview input').change(searchAction);
                
                // Reset functionality
                $('#FontAwesomePreview .btn-reset').click(function(){
                    $('#FontAwesomePreview input').val('');
                    $('#FontAwesomePreview input').trigger('change');
                    $("#FontAwesomePreview input").focus().select();
                });
                
                // Draw icons inside container
                drawIcons(container_list);
            }
        };
        
        // Switch preview window to work with selected field
        var switchField = function(id, value){
            
            // Show window
            container.show();
            
            // Scroll to search box
            container.animate({scrollTop:0},'fast');
            container.find('.list,.toolbar').animate({scrollTop:0},'fast');
            
            // Unmark selected icon
            $('#FontAwesomePreview .list .fa.selected').removeClass('selected');
            
            // Mark selected
            $('#FontAwesomePreview .list .fa.fa-'+value).addClass('selected');

            // Change selected icon on click
            $("#FontAwesomePreview .fa").click(function(){
                
                // Selected icon ID
                var icon = $(this).data('fa');
                
                // Change field value
                $('#'+id).val(icon);
                
                // Change preview
                $('#'+id+'-preview').attr('class','fa fa-'+icon);
                
                // Hide window
                $('#FontAwesomePreview').hide();
                
            });
        };

        drawIconsPreview();
        switchField(id, $('#'+id).val());
	};
 
}( jQuery ));