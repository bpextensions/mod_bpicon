
(function ( $ ) {
    
    $.fn.MaterialDesignIconsDrawPreview = function(id, text_search, text_close){
        // Create preview if don't exists already
        var container = $('#MaterialDesignIconsPreview');
            
        // Prepare form field preview
        var drawIcons = function(container){
            var ignore = [];
            
            $.ajax({
               url: 'https://raw.githubusercontent.com/google/material-design-icons/master/iconfont/codepoints',
               async: false,
               success: function(data){
                    var icons = data.match(/(^|\s)[a-zA-Z0-9_]{1,} /g); 
                
                    for(var i=0,ic=icons.length; i<ic; i++){
                        var name = $.trim(icons[i]);

                        var icon = $('<i class="material-icons" data-ico="'+name+'">'+name+'</i>');
                        container.append(icon);
                    }
               }
            });

        };
        
        // Create preview HTML
        var drawIconsPreview = function(){
            if( container.length===0 ) {
                container = $('<div id="MaterialDesignIconsPreview"><div class="toolbar"><div class="input-append pull-left"><input type="text" placeholder="'+text_search+'"/><button class="btn btn-default btn-reset" type="button"><i class="material-icons">close</i></button></div><button class="btn btn-default pull-right">'+text_close+'</button></div><div class="list"></div></div>');
                $('body').append(container);
                var container_list = $('#MaterialDesignIconsPreview .list');
                container.hide();
                
                // Add Close button functionality
                $('#MaterialDesignIconsPreview .btn-default.pull-right').click(function(){
                    $('#MaterialDesignIconsPreview').hide();
                });

                // Add search functionality
                var searchAction = function(){
                    if( $.trim(this.value).length ) {
                        console.log('search:'+this.value);
                        $('#MaterialDesignIconsPreview .list .material-icons').each(function(){
                            $(this).hide(); 
                        });
                        $('#MaterialDesignIconsPreview .list').find('.material-icons[data-ico*="'+this.value+'"]').show();
                    } else {
                        $('#MaterialDesignIconsPreview .list .material-icons').each(function(){
                            $(this).show(); 
                        });
                    }
                    
                };
                $('#MaterialDesignIconsPreview input').keyup(searchAction);
                $('#MaterialDesignIconsPreview input').change(searchAction);
                
                // Reset functionality
                $('#MaterialDesignIconsPreview .btn-reset').click(function(){
                    $('#MaterialDesignIconsPreview input').val('');
                    $('#MaterialDesignIconsPreview input').trigger('change');
                    $("#MaterialDesignIconsPreview input").focus().select();
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
            $('#MaterialDesignIconsPreview .list .material-icons.selected').removeClass('selected');
            
            // Mark selected
            $('#MaterialDesignIconsPreview .list .material-icons[data-ico="'+value+'"]').addClass('selected');

            // Change selected icon on click
            $("#MaterialDesignIconsPreview .material-icons").click(function(){
                
                // Selected icon ID
                var icon = $(this).data('ico');
                
                // Change field value
                $('#'+id).val(icon);
                
                // Change preview
                $('#'+id+'-preview').text(icon);
                
                // Hide window
                $('#MaterialDesignIconsPreview').hide();
                
            });
        };

        drawIconsPreview();
        switchField(id, $('#'+id).val());
	};
 
}( jQuery ));