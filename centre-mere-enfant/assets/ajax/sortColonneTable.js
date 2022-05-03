function sortTable(columnName, base_url){
  
  var sort = $("#sort").val();
  $.ajax({
    url: base_url,
    type:'post',
    data:{columnTri:columnName,sort:sort},
    success: function(res9ponse){
      $("#tableTri tr:not(:first)").remove();
      $(response).insertAfter( "#tableTri tr" );
      if(sort == "asc") {
        $("#sort").val("desc");
      }else{
        $("#sort").val("asc");
      }
    }
  });

}

