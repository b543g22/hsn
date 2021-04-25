$(function(){
    $('#search_button').on('click', function() {
        $('.seach_err').text('');
        let artist_name = $('#search_artist').val();

        $.ajax({
            type: 'POST',
            url: '/artistList/index',
            data: {
                'artist_name': artist_name,
            },
            dataType: 'json'
        }).done(function(data) {
            $('tbody').empty();
            $.each(data, function(index,value) {
                let artist_id = value.artist_id;
                let artist_name = value.artist_name;
                html = `
                <tr class="artistData" data-href="/artist/${artist_id}">
                <td>${artist_id}</td>
                <td>
                    <a href="/artist/${artist_id}">${artist_name}</a>
                </td>
            </tr>
                        `;
                $('tbody').append(html);
            })
        }).fail(function() {
            $('.seach_err').text('アーティスト名を入力してください。');
        })
    })
});