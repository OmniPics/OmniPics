{include file="header.tpl"}

<div id="topArea">



    <div id="searcharea">

     <form id="submit" class="col-md-4" action="backend/bulkUpload.php" method="post" enctype="multipart/form-data">
    <span class="btn btn-default btn-file">
        <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> Upload
        <input type="file" id="input" name="myPic[]" multiple="multiple">
    </span>
    </form>

        <div id="search" class="input-group">
            <input type="text" class="form-control" placeholder="Søk" onkeyup="showResult(this.value)" onblur="hideResult()">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
	    </span>
        </div>
        <div class="media">
            <div class="media-left">
                <div id="livesearch">

                </div> <!-- updated by javascript -->
            </div>
        </div>
    </div>


</div>

<div class="container">

    <ul class="nav nav-tabs">
        <li role="presentation" id="dato" onclick="sortBy('upload_date')"><a role="button">Dato</a></li>
        <li role="presentation" id="navn" onclick="sortBy('filename')"><a role="button">Navn</a></li>
        <li role="presentation" id="sted" onclick="sortBy('place')"><a role="button">Sted</a></li>
        <button id="trash" type="button" class="btn btn-default"
                onclick="deletePicsFromDB()">
            <span class="glyphicon glyphicon-trash"></span>
        </button>
        <button id="sort" type="button" class="btn btn-default" onclick="toggleAscDesc()">
            <span class="glyphicon glyphicon-sort"></span>
        </button>
    </ul>

    <div id="pictures"></div>
    
    <!--<div id="loadmoreajaxloader" style="height: 50px; width: 50px; display: none;"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></center></div>-->
   
    <div id="loadmoreajaxloader" style="display:none;"><center><img src="endlessScrolling/ajax-loader.gif" /></center></div>
    

</div>

{include file="footer.tpl"}