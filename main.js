$(document).ready(function(){
    $('#keyword').on('input', function() {
        var keyword = $(this).val();
        $.ajax({
            url: 'search.php',
            type: 'POST',
            data: { keyword: keyword },
            success: function(data) {
                var products = JSON.parse(data);
                var tableContent = '<tr><th>NO.</th><th>nama</th><th>product</th><th>jenis</th><th>Fitur</th></tr>';
                $.each(products, function(index, product) {
                    tableContent += '<tr>';
                    tableContent += '<td>' + (index + 1) + '</td>';
                    tableContent += '<td>' + product.nama + '</td>';
                    tableContent += '<td>' + product.product + '</td>';
                    tableContent += '<td>' + product.jenis + '</td>';
                    tableContent += '<td class="fitur"><b>';
                    tableContent += '<a style="text-decoration: none; color: red;" href="delete.php?id=' + product.id + '" onclick="return confirm(\'yakin?\');">Hapus</a>';
                    tableContent += '<a style="text-decoration: none; color: green;" href="update.php?id=' + product.id + '">||  Update</a>';
                    tableContent += '</b></td>';
                    tableContent += '</tr>';
                });
                $('#productTable').html(tableContent);
            }
        });
    });
});
