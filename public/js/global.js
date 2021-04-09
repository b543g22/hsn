$(function(){
    $('.delete').on('click',function(){
        if(window.confirm('削除してもよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    });

    $('.update').on('click',function(){
        if(window.confirm('更新してもよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    });

    $('.cancel').on('click',function(){
        if(window.confirm('登録をキャンセルしてもよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    });
});