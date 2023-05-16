$(function(){
	$('[type="submit"]').click(function(){
		var comment = $('#comment');
		if(comment.val() !== ""){
			$(this).prop('disabled',true);//ボタンを無効化する
			$(this).closest('form').submit();//フォームを送信する
		}
	});
});