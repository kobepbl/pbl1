<!-- ログアウト -->
<?php
    $_SESSION=[];
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-1000,'/');
    }
    session_destroy();

    setcookie('id','',time()-1000,'/');
    setcookie('name','',time()-1000,'/');

