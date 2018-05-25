jQuery(document).ready(function () {
    jQuery('#ajaxSearchHotels').click(function (e) {
        e.preventDefault();

        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var name = jQuery('#name').val();
        var price1 = jQuery('#price1').val();
        var price2 = jQuery('#price2').val();
        var bedrooms = jQuery('#bedrooms').val();
        var bathrooms = jQuery('#bathrooms').val();
        var storeys = jQuery('#storeys').val();
        var garages = jQuery('#garages').val();

        if (!name && !(price1 && price2) && !bedrooms && !bathrooms && !storeys && !garages) {
            alert('Necessary fill at least one field or low and high price')
        }
        else {
            $('#divLoading').addClass('show');
            jQuery.ajax({
                url: '/hotel/search',
                method: 'post',
                data: {
                    name: name,
                    price1: price1,
                    price2: price2,
                    bedrooms: bedrooms,
                    bathrooms: bathrooms,
                    storeys: storeys,
                    garages: garages
                },
                success: function (result) {
                    if (result.length > 0) {
                        var table_content = '<p style="text-align: center">Your results</p><table class="table-striped" width="100%">';
                        table_content += '<tr><th> Name </th><th> Price </th><th> Bedrooms </th>';
                        table_content += '<th> Bathrooms </th><th> Storeys </th><th> Garages </th></tr>';
                        for (var i = 0; i < result.length; i++) {
                            table_content += '<tr><td>' + escapeHtml(result[i].name) + '</td><td>' + result[i].price + '</td><td>' + result[i].bedrooms + '</td>';
                            table_content += '<td>' + result[i].bathrooms + '</td><td>' + result[i].storeys + '</td><td>' + result[i].garages + '</td></tr>';
                        }
                        table_content += '</table>';
                        $('#result_search').html(table_content);
                    }
                    else {
                        $('#result_search').html('<br> <p style="color: red; font-weight: bold"> Nothing found! </p>');
                    }
                    $('#result_search').show('slow');
                    $('#divLoading').removeClass('show');
                }
            });
        }
    });
});

function escapeHtml(text) {
    if (text) {
        var map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };

        return text.replace(/[&<>"']/g, function (m) {
            return map[m];
        });
    }
    return '';
}
