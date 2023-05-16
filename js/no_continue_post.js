$(function(){
	$('[type="submit"]').click(function(){
		var title = $('#title');
		var sentence = $('#sentence');
		if(title.val() !== "" && sentence.val() !== ""){
			$(this).prop('disabled',true);//ボタンを無効化する
			$(this).closest('form').submit();//フォームを送信する
		}
	});
});