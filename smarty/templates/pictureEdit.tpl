{include file="headerPictureEdit.tpl"}

      <div id="parent" class="col-md-8 docs-buttons">
       <div id ="topMenuLeft">
          <button type="button" class="btn btn-default" data-method="setDragMode" data-option="move" title="Move">
            
              <span class="fa fa-arrows"></span>
          
          </button>
          <button type="button" class="btn btn-default" data-method="getCroppedCanvas" data-option="crop" title="Crop">
           
              <span class="fa fa-crop"></span>
            </span>
          </button>

          <button type="button" class="btn btn-default" data-method="zoom" data-option="0.1" title="Zoom In">
           
              <span class="fa fa-search-plus"></span>
            </span>
          </button>
          <button type="button" class="btn btn-default" data-method="zoom" data-option="-0.1" title="Zoom Out">
            
              <span class="fa fa-search-minus"></span>
            </span>
          </button>
          <button type="button" class="btn btn-default" data-method="rotate" data-option="-45" title="Rotate Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, -45)">
              <span class="fa fa-rotate-left"></span>
            </span>
          </button>
          <button type="button" class="btn btn-default" data-method="rotate" data-option="45" title="Rotate Right">
           
              <span class="fa fa-rotate-right"></span>
            </span>
          </button>
   

          <button type="button" class="btn btn-default" data-method="crop" title="Crop">
           
              <span class="fa fa-check"></span>
            </span>
          </button>
       
	   
	   
          <button type="button" class="btn btn-default" data-method="reset" title="Reset">
           
              <span class="fa fa-refresh"></span>
          
          </button>
         <button type="button" class="btn btn-default" data-method="clear" title="Clear">
            
              <span class="fa fa-remove"></span>
           
          </button>

		
    </div>
     <div id ="topMenuRight">
	 
		<button type="button" class="btn btn-default"  onclick="location.href='index.php?page=pictureViewer&&picsAscOrDesc=0&&orderPicsBy=upload_date&&picsIndexStart=1'" title="Save"> 
					<span> 
					 
					<span class="fa fa-floppy-o"></span>
					
					</span>
	    </button>
		<button type="button" class="btn btn-default"  onclick="location.href='index.php?page=pictureViewer&&picsAscOrDesc=0&&orderPicsBy=upload_date&&picsIndexStart=1'" title="quit"> 
		<span class="fa fa-cloud"> </span>
	    </button>
		
		
		<button type="button" class="btn btn-default"  onclick="location.href='index.php?page=pictureViewer&&picsAscOrDesc=0&&orderPicsBy=upload_date&&picsIndexStart=1'" title="quit"> 
					<span> 
					 
					<span>quit</span>
					
					</span>
	    </button>
		
		
		
     </div>

          <img id="img" src="{$picture_path}?">
         
   </div>
      <div id="metadata" class="col-md-4">

			
	  	
	
			
	  </div>
        
  


</body>
</html>
