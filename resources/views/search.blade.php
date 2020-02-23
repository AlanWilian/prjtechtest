@extends('layouts.app', ["current" => "search" ])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Records found</h5>

        <table class="table table-hover table-striped" id="resultsTable">
            <thead>
                <tr>
                    <th>Video</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
       
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" role="button" onClick="newSearching()">Search</a>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
            <form class="form-horizontal" id="formProduto">
                <div class="modal-header">
                    <h5 class="modal-title">Parameters</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nomeProduto" class="control-label">Enter Keyword</label>
                        <div class="input-group">
                            <input type="text" name="txtkeyword" class="form-control" id="keyword_id" placeholder="Keyword" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="precoProduto" class="control-label">Max Results</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="maxResults_id" placeholder="Max Results" min="1" max="50" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="quantidadeProduto" class="control-label">Order</label>
                        <div class="input-group">                      
								<select name="order" class="form-control" required id="order_id">
                                    <option value="" selected="selected">--SELECT ORDER--</option>
                                    <option value="relevance">Relevance</option>
                                    <option value="date">Date</option>
                                    <option value="viewCount  ">ViewCount</option>
									<option value="rating">Rating</option>									
                                    {{-- <option value="title ">Title</option>
                                    <option value="videoCount ">Video Count</option> --}}
                                    
								</select>	
						</div>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
     
     
     
@section('javascript')
<script type="text/javascript">   
    
    function newSearching() {
        $("#resultsTable").load("search #resultsTable");
        $('#keyword_id').val('');
        $('#maxResults_id').val('');
        $('#order_id').val('');
        $('#dlgProdutos').modal('show');
        
    }
    
    function buildGrid(tableLine) {
		var line = [];
		$.each(tableLine,function(index, value){
			line.push( "<tr>" +
            "<td>" + value + "</td>" +            
            "</tr>"	);						
		}); 	
		return line;
    }
       
    function creatSearch() {		
        parameters = { 
            keyword: $("#keyword_id").val(), 
            results: $("#maxResults_id").val(), 
            order: $("#order_id").val()
        };
        $.post("/api/search", parameters, function(data) { 
            var dataReturn = JSON.parse(data);        
            if (dataReturn.erro) {
                 alert(dataReturn.message);
                 return;
            }
            tableLine = buildGrid(dataReturn.message);
            $('#resultsTable>tbody').append(tableLine);           
        });
        
    }    
        
    $("#formProduto").submit( function(event){ 
        event.preventDefault(); 
        creatSearch();            
        $("#dlgProdutos").modal('hide');
    });   

</script>
@endsection
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     