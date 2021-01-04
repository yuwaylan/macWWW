<?php
session_start();
function guid(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}

$uid =guid();
$os = "";
$NowTime=time();
$regtime = date('Y-m-d H:i:s',$NowTime);
$regip = "";

$iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
if(stripos($_SERVER['HTTP_USER_AGENT'],"Android") && stripos($_SERVER['HTTP_USER_AGENT'],"mobile")){
        $Android = true;
}else if(stripos($_SERVER['HTTP_USER_AGENT'],"Android")){
        $Android = false;
        $AndroidTablet = true;
}else{
        $Android = false;
        $AndroidTablet = false;
}
$webOS = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

if( $iPod || $iPhone ){
    $os = "iOS";
}else if($iPad){
    $os = "iOS ipad";
}else if($Android){
    $os = "Android";
}else if($AndroidTablet){
    $os = "Android Tablet";
}else if($webOS){
    $os = "webOS";
}else{
        $os = "we're not a mobile device";
}

if(!empty($_SERVER['HTTP_CLIENT_IP'])){
   $regip = $_SERVER['HTTP_CLIENT_IP'];
}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $regip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
   $regip= $_SERVER['REMOTE_ADDR'];
}
// echo 

$_SESSION['page']=1;



?>


<!DOCTYPE html>
<html>

    <head>
        <title>大數據人格分析</title>
        <meta charset="utf-8">
        <meta property="og:title" content="大數據人格分析" />
        <meta property="og:description" content="大數據人格分析" />
        <meta property="og:site_name"
            content=" 本計劃為「設計積極性人格特質手機軟體測驗及整合大數據分析策略」。計劃目的為設計一款手機APP 測量積極性人格特質。計劃主持人為元智大學管理學院張玉萱教授。聯絡人為助理:余程漢1052056@g.yzu.edu.tw. 經費來源為109學..">
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://www.yzupa2020.url.tw/">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="fb:app_id" content="1290089247998761">
        <meta property="og:image"
            content="https://play-lh.googleusercontent.com/vrPWCxYam2hi9a2WP3xt8SuuwjsOzJ4QU5BPJPc1Iw-1eAeI23-b4Ouf9M57kHccAg=w1034-h726-rw">
        <script src="js/jquery.min.js">
        </script>
        <link rel=stylesheet type="text/css" href="css/mycss.css">
    </head>
    <style>
    /* #title_content {
        margin-top: 1vh;
        text-align: center;
        font-size: 6vw;
    }

    .text {
        padding: 0.6vh 2vh;

    } */
    .footer {
        background-image: url("./img/b_1.png");
    }

    .consent {
        position: absolute;
        top: 22vh;
        left: 6vw;
        height: 50vh;
        width: 88vw;
        margin: 0 100;
        border-radius: 30px;
        background-color: #FFFFFF;
        opacity: 0.5;
        overflow: scroll;
    }

    #consent_content {
        word-wrap: break-word;
        margin-top: 0.3vh;
        text-align: center;
        font-size: 2.5vw;
    }

    .agreement {
        position: absolute;
        top: 74vh;
        left: 6vw;
        height: 10vh;
        width: 88vw;
        margin: 0 100;
        border-radius: 30px;
        background-color: #FFFFFF;
        opacity: 0.5;
        overflow: scroll;
    }

    #agreement_content {
        word-wrap: break-word;
        margin-top: 0.3vh;
        text-align: left;
        font-size: 2.5vw;
    }

    .btns {
        position: absolute;
        top: 84vh;
        left: 6vw;
        height: 10vh;
        width: 88vw;
        margin: 0 100;
        /* border-radius: 30px; */
        /* background-color: #FFFFFF; */
        /* opacity: 0.5; */
    }

    .btn {
        position: relative;
        width: 25vw;
        height: 5vh;
        margin: 5% 10%;
        border-radius: 50px;
        float: left;
        background-repeat: no-repeat;
        background-color: #FFFFFF;
        overflow: hidden;
    }

    #btn_agree_content {
        word-wrap: break-word;
        margin-top: 0.5vh;
        text-align: center;
        font-size: 5vw;
        color: #FFFFFF;
    }

    #btn_notagree_content {
        word-wrap: break-word;
        margin-top: 0.5vh;
        text-align: center;
        font-size: 5vw;
        color: #FFFFFF;
    }

    #notagree {
        margin-left: 12%;
        /* background-image: url("./img/btn_g.png"); */
        background-color: #939395;
    }

    #agree {
        /* background-image: url("./img/btn_r.png"); */
        background-color: #da8a6f;
    }
    </style>

    <script>
    $(function() {
        var ud = "<?php echo $uid?>";
        var os = "<?php echo $os?>";
        var regt = "<?php echo $regtime?>";
        var regip = "<?php echo $regip?>";
        var send = 'hdbif.php?ud=' + ud + '&dn=' + os + '&ri=' + regip +
            '&Ac=Agree' + '&rt=' + regt;


        var no = document.getElementById("notagree");
        no.addEventListener("click", function() {
            alert("將帶你前往其他地方");
            window.location.href = 'https://tw.yahoo.com/';
        });

        function formaction() {
            return send;
        }

        var yes = document.getElementById("agree");
        yes.addEventListener("click", okay());

        var fom = document.getElementById('fom');
        fom.action = send;

        function okay() {

            console.log(send);

        }

    });
    </script>

    <body>
        <div class="mainbody">
            <div class="header">
                <div class="title">
                    <h2 id="title_content">使用研究告知</h2>
                </div>
            </div>
            <div class="footer"></div>
            <div class="consent">
                <h2 class="text" id="consent_content">
                    <p style="text-align: left;">&emsp;&emsp;本計劃為「設計積極性人格特質手機軟體測驗及整合大數據分析策略」。計劃目的為設計一款手機APP
                        測量積極性人格特質。計劃主持人為元智大學管理學院張玉萱教授。聯絡人為助理:余程漢1052056@g.yzu.edu.tw. 經費來源為109學年科技部經費補助。</p>
                    <ul style="text-align: left;">
                        <li>
                            (一): 參與內容: 您將下載一款手機App 測量積極性人格特質，施測時間為5分鐘，您將同意使用臉書(或是IG)帳號註冊使用此軟體
                        </li>
                        <li>
                            (二) 風險，損害補償與保險: 本計劃屬於免審查類研究亦無商業利益，若您不想使用臉書註冊下載，或是在過程對此軟體無興趣，直接退出即可。
                        </li>
                        <li>
                            (三)保密:
                            所有資料將儲存於加密的雲端系統，資料分析將以整體分析結果呈現，只有研究者得以檢視資料。待研究成果正式發表後，資料將於三年內銷毀。您的個人隱私權及資料為保密性質，不會對外公開。
                        </li>
                    </ul>
                    <p style="text-align: left;">&emsp;&emsp;任何問題，歡迎聯絡計劃主持人<br>
                        張玉萱老師: yuyuchang@saturn.yzu.edu.tw, 或是<br>
                        研究助理余程漢同學:1052056@g.yzu.edu.tw</p>
                </h2>
            </div>
            <div class="agreement">
                <h2 class="text" id="agreement_content">
                    &emsp;&emsp;我已仔細閱讀以上資訊並自願參加研究，我有權利在任何時間，任何理由退出研究，若您同意請確認並繼續進行軟體測驗，若不同意，請退出軟體即可。</h2>
            </div>
            <div class="btns">

                <form id="fom" action="" method="POST">
                    <div class="btn" id="notagree" onclick="window.open('','_top').close()">
                        <h2 class="text" id="btn_notagree_content">不同意</h2>
                    </div>
                    <div class="btn" id="agree" onclick="document.forms[0].submit()">
                        <h2 class="text" id="btn_agree_content">我同意</h2>
                    </div>
                </form>
            </div>




        </div>
    </body>

</html>