{include file="headerPictureViewer.tpl"}

		<!--<div id="topArea">
			<button id="toFrontPageButton" type="button" class="btn btn-default" aria-label="Left Align" onclick="location.href='index.php'">Front Page
			</button>-->


		<script language="JavaScript" type="text/javascript">
		{literal} //In order to write javascript in smarty

			var picsAscOrDesc = {/literal}{$picsAscDesc}{literal};
			var orderPicsBy = "{/literal}{$orderPicsBy}{literal}";
			var picsIndexStart = {/literal}{$pictureIndex}{literal};
			var amountOfPics = '2'; //Need two pictures to check if the next pic exists

			$(document).ready(function() {
				pictureViewer(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPics);
			});

			function pictureViewer(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPics) {

				$.ajax({
			       type: "POST",
			       url: "getPictureViewerContent.php?picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"&&amountOfPics="+amountOfPics+"",
			       success: function(result){
			            $("#pictureViewer").html(result);
			        }
			    });
			}

			function rotate(rotatePath) {

				$.ajax({
			       type: "POST",
			       url: "getPictureViewerContent.php?picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"&&amountOfPics="+amountOfPics+"&&rotatePath="+rotatePath+"",
			       success: function(result){
			            $("#pictureViewer").html(result);
			        }
			    });
			}

			function deletePic(pictureId, picsIndexStart, noMorePics) {
				
				if(noMorePics) {

					window.location = "index.php"; 
				}

				$.ajax({
			       type: "POST",
			       url: "getPictureViewerContent.php?picsAscOrDesc="+picsAscOrDesc+"&&orderPicsBy="+orderPicsBy+"&&picsIndexStart="+picsIndexStart+"&&amountOfPics="+amountOfPics+"&&deletePic="+pictureId+"",
			       success: function(result){
			            $("#pictureViewer").html(result);
			        }
			    });

			}

			function nextPic() {

				picsIndexStart++;
				pictureViewer(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPics);
			}

			function previousPic() {

				picsIndexStart--;
				pictureViewer(picsAscOrDesc, orderPicsBy, picsIndexStart, amountOfPics);
			}
			
		{/literal}
		</script>

		</div>
	<div class="container" id="pictureViewer"></div>

{include file="footer.tpl"}
