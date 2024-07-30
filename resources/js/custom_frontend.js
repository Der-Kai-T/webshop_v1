$('#selectSize').on("change", function(){
    console.log($('#selectSize').find(":selected").text());
   $('#sizeLabel').text($('#selectSize').find(":selected").text());
});
