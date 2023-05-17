$(function(){
	$('[type="submit"]').click(function(){
		var anser = $('#anser');
		if(anser.val() !== ""){
			$(this).prop('disabled',true);//ボタンを無効化する
			$(this).closest('form').submit();//フォームを送信する
		}
	});
});