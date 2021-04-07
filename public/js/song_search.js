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
            $('.songData').remove();
            $.each(data, function(index,value) {
                let song_id = value.song_id;
                let artist_name = value.artist_name;
                let song_title = value.song_title;
                html = `
                <tr class="songData">
                    <td>${song_id}</td>
                    <td>${artist_name}</td>
                    <td><a href="/list/${song_id}">${song_title}</a></td>
                </tr>
                        `;
                $('.songList_table').append(html);
            })
        }).fail(function() {
            $('.seach_err').text('タイトルを入力してください。');
        })
    })
});