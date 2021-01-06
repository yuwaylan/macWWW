<?php
session_start();

if(isset($_SESSION['score'])){
    //  header("Location: /feback.php"); 
}
else if(isset($_SESSION['page'])){
    switch ($_SESSION['page']){
        case 1:
            header("Location: /userinfo.php"); 
        break;
        case 2:
            header("Location: /usrdata.php"); 
        break;
        case 3:
             header("Location: /usrq.php"); 
        break;
        case 4:
            // header("Location: /feback.php"); 
        break;
        default:
        break;
    }
}

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
        top: 75vh;
        height: 30vh;
        background-image: url("./img/b_3.png");
    }

    #apple_icon {
        width: 35vw;
        height: 35vw;
        opacity: 1;
        background-repeat: no-repeat;
        background-size: 100%;

    }

    #apple_context {
        font-size: 4vw;
    }

    .consent {
        position: absolute;
        top: 22vh;
        left: 6vw;
        height: 60vh;
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
        font-size: 4vw;
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
    var apple_score = 0;
    var apple_type = 0;
    var apple_type_text = ['金', '紅', '青', ];
    var apple_context = [
        "\n代表人物為前蘋果執行長史蒂夫·賈伯斯<br>擅長洞察機會和改變現狀，是環境中的正能量，發光發熱<br>對於喜歡的事情具有創意，願意付出努力改變事情<br>相信成功是不斷的克服挫折，成果終將被看見<br>是團隊中難得一見的奇才!",
        "代表人物為蘋果執行長提姆庫克<br>對於環境中的機會，擅長先於觀察，謀定而後動<br>不會特別愛出風頭，能夠與團隊中其它中分享榮耀<br>是團隊堅實的前進力量，組織中不可獲缺的人才!",
        "表人物為后翼棄兵女主角貝絲哈蒙（Beth Harmon）<br>對自己的認識常常來自於他人的回饋<br>同時對於環境中的機會，擅長先於觀察，若有貴人相助之後發展極具潛力，<br>可為明日之星但在平淡也能過的很好，是可進可退型人才!"
    ];
    apple_score = parseInt(("<?php if(isset($_SESSION['score']))echo $_SESSION['score'] ;?>" == "" ? 0 :
        "<?php if(isset($_SESSION['score']))echo $_SESSION['score'] ;?>"));
    console.log(apple_score);
    if (apple_score >= 5.6) {
        //金蘋果
        apple_type = 0;
    } else if (apple_score < 5.6 && apple_score >= 4.9) {
        //紅蘋果
        apple_type = 1;
    } else {
        //青蘋果
        apple_type = 2;
    }


    $(function() {

        $('#apple_text').html(apple_type_text[apple_type]);
        $('#apple_context').html(apple_context[apple_type]);
        // $('#apple_icon').style.backgroundImage = url("./img/b_3.png");
        $("#apple_icon").css("background-image", "url('./img/" + apple_type + ".png')");


    });
    </script>

    <body>
        <div class="mainbody">
            <div class="header">
                <div class="title">
                    <h2 id="title_content">測驗結果</h2>
                </div>
            </div>
            <div class="footer"></div>
            <div class="consent">
                <h2 class="text" id="consent_content">
                    <a>你是:</a><br><a id="apple_text"></a><a>蘋果型人才</a>
                </h2>
                <center>
                    <div id="apple_icon"></div>
                </center>
                <h2 id="apple_context" class="text"></h2>
            </div>






        </div>
    </body>

</html>