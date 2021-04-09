$(function(){
    $('#search_button').on('click', function() {
        $('.seach_err').text('');
        let song_title = $('#search_song').val();

        $.ajax({
            type: 'GET',
            url: '/list/index/' + song_title,
            data: {
                'song_title': song_title,
            },
            dataType: 'json'
        }).done(function(data) {
            $('tbody').empty();
            $.each(data, function(index,value) {
                let song_id = value.song_id;
                let artist_name = value.artist_name;
                let song_title = value.song_title;
                html = `
                <tr class="songData" data-href="/list/${song_id}">
                    <td>${song_id}</td>
                    <td>${artist_name}</td>
                    <td><a href="/list/${song_id}">${song_title}</a></td>
                </tr>
                        `;
                $('tbody').append(html);
            })
        }).fail(function() {
            $('.seach_err').text('タイトルを入力してください。');
        })
    })
});