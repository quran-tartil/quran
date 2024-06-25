
// Fonction de recherche 
$(document).ready(function() {
       
    function fetchData(page, searchValue) {

        let url_path = window.location.href;
       

        url_path += "/?page="
        // alert(url_path);
        $.ajax({
            global: true,
            url: url_path + page + '&searchValue=' + searchValue,
            beforeSend: function() { 
                 console.log("start");
           
              $("#table_search").css('background-color', '#eee');
            },
            complete:function(){  
                console.log("stop");
                $("#table_search").css('background-color', 'white');
              
            },
            success: function(data) {
                var newData = $(data);

                $('tbody').html(newData.find('tbody').html());
                $('#card-footer').html(newData.find('#card-footer').html());
                var paginationHtml = newData.find('.pagination').html();
                if (paginationHtml) {
                    $('.pagination').html(paginationHtml);
                } else {
                    $('.pagination').html('');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
                
            }
        });
        console.log(searchValue);
    }

    $('body').on('click', '.pagination a', function(param) {

        param.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        console.log(page);
        var searchValue = $('#table_search').val();

        fetchData(page, searchValue);

    });

    $('body').on('keyup', '#table_search', function() {
        var page = $('#page').val();
        var searchValue = $('#table_search').val();

        fetchData(page, searchValue);
    });

});

function submitForm() {
    document.getElementById("importForm").submit();
}