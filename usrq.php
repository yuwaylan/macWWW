<?php
session_start();
if(isset($_SESSION['ud'])&&isset($_SESSION['page'])){

}else{
    // header("Location: /"); 
    
}

?>




<!DOCTYPE html>
<html>

    <head>
        <title>大數據人格分析</title>
        <meta charset="utf-8">
        <script src="js/jquery.min.js">
        </script>
        <link rel=stylesheet type="text/css" href="css/mycss.css">
        <!-- <meta http-equiv="refresh" content=""> -->
    </head>
    <style>
    .question {
        position: absolute;
        top: 22vh;
        left: 10vw;

        width: 80vw;
        height: 40vw;

        /* background-color: #FFfFFF; */
    }


    .footer {
        top: 72vh;
        overflow: hidden;
        height: 30vh;
        background-image: url("./img/b_2.png");
    }


    #question_content {
        margin: 2vh 0;
        opacity: 0.7;
        font-size: 5vw;
    }

    .gender {
        position: absolute;
        top: 50vh;
        left: 28vw;
    }


    .selection {

        margin: 0vh;

        width: 23vw;
        height: 8vw;
        font-size: 4vw;
        opacity: 0.7;
        border-radius: 30px;
        background-color: #ffffff;
    }





    .btns {
        position: absolute;
        /* top: 60vh; */
        height: 10vh;
        width: 100vw;
        margin: 0 100;
    }

    .btn {
        float: none;
        height: 8vw;
        margin-top: 6vh;
        /* margin-left: 0; */
        /* left: 37.5vw; */
    }

    #btn_qrevious {
        word-wrap: break-word;
        margin-top: 0.2vh;
        text-align: center;
        font-size: 5vw;
        color: #FFFFFF;
    }


    #agree {
        background-color: #da8a6f;
    }
    </style>

    <script>
    $(function() {
        count_total_questions = scale_questions.length + situtaion_questions.length;
        $('#total_q').text(count_total_questions);
        update();
        console.log("aa");


    });

    var count_total_questions = 0;
    var score = 0;
    var is_scale = true;
    // var count_current_question = 0;
    var ansers = [];
    var scale_questions = [
        '我不斷地尋找能夠改善生活的新辦法',
        // '今天工作上面對到一個很大的挑戰，雖然工作內容是喜歡的，但主管要求很高，常常做不好被罵，讓你產生了離職的念頭，但你才來這個公司不到半年，此時你會',
        '無論在哪兒，我會是那個對環境帶來正向改變的人',
        '最讓我興奮的事是看到我的想法變成現實',
        '如果看到不喜歡的事，我會想辦法去改變它',
        '不論成功機會有多少，只要我相信一件事，我就會將它實現',
        '即使別人反對， 我也喜歡堅持自己的想法',
        '我善於發現機會',
        '我總是在尋找更好的做事方法',
        '如果我堅信某個想法，我會克服任何困難去實現它',
        '我比其他人更早洞察環境中的好機會'
    ];
    var situtaion_questions = [
        "今天主管找你談話，告訴有一個可以升遷的職缺，但此職缺需頻繁出差，是一個較具挑戰性的工作，但工作內容你不是很熟悉，主管給你三天時間考慮，你覺得",
        "你在工作上發現一個流程的問題，每次都要填相同的表格和重複的資訊，但這個部分表來是由其它單位同仁在負責的，此時你會",
        "你是部門的新員工，兩個月後是公司的尾牙，主管指派你為單位尾牙活動的負責人，當你接到任務後，你會怎麼想",
        "今天工作上面對到一個很大的挑戰，雖然工作內容是喜歡的，但主管要求很高，常常做不好被罵，讓你產生了離職的念頭，但你才來這個公司不到半年，此時你會",
    ];

    var selections_situtaion = {
        0: [
            '這個職缺雖好，但因內容不熟可能不能勝任，傾向等待下一次較適合自己的機會',
            '覺得也許可以試看看，就算失敗也會想試，仔細想三天後再跟主管說願意去',
            '覺得自己的學習能力很快也不怕吃苦，想一天後就跟主管說可以，相信努力可以克服一切因難',
            1,
            2,
            3
        ],
        1: [
            '跟同事說明這樣的情況，請別人來幫忙處理',
            '覺得這樣很沒有效率，但因為是其它單位同仁，所以還是不會說什麼以表尊重',
            '主動去找該單位的同仁提出建議方案，覺得別人不接受也沒關係',
            2,
            1,
            3
        ],
        2: [
            '心裡不是很願意做且有點委屈，覺得主管欺負新人，但會找幾個熟的朋友一起幫忙，還是會完成任務',
            '雖不是很願意做，但會請大家幫忙，一起做就覺得不會很辛苦',
            '雖不是很願意做，但也許這是讓別人看見自己的好機會，所以就覺得是不錯的事',
            1,
            2,
            3
        ],
        3: [
            '先忍耐撐到一年後再說，工作上如常做，但不會給自己太大壓力',
            '先找人聊聊這個部分，看看是不是離職比較好，畢竟主管是很難改變的',
            '雖然主管很機車，但是會有點反骨想去克服這個挑戰，用成果讓主管改觀',
            2,
            1,
            3
        ]
    };

    function anser_question(id) {
        // id = "s_1" "c_1"
        var whitch = id.slice(2);
        var tpye = id.slice(0, 1);
        if (is_scale) {
            score += whitch;
        }
        console.log(whitch);
        ansers.push(whitch);
        set_type(tpye);
        console.log(ansers);
        update();

    };

    function set_type(type) {
        if (ansers.length >= scale_questions.length) {
            is_scale = false;
        }
    }


    function update() {
        $('#current_q').text(ansers.length + 1);
        var questions = (is_scale ? scale_questions : situtaion_questions);
        var count = (is_scale ? ansers.length : ansers.length - situtaion_questions.length);
        // console.log(questions[count]);
        $('#question_content').text(questions[count] + (is_scale ? "" : "..."));
        make_selections();
    };

    function make_selections() {
        if (is_scale) {
            var cont = '<div class="selection"><h2 class="text" id="s_1">10分</h2></div>';
            $('.selections').html("");
            for (var i = 1; i <= 7; i++) {
                $('.selections').append(
                    '<div class="selection"><h2 class="text" onclick="anser_question(this.id)" id="s_' + i + '">' +
                    i +
                    '分</h2></div>');
            }


        } else {

        }
    }

    function previous() {
        if (ansers.length >= 1) {
            ansers.pop();
        } else {
            alert("這是第一題");
        }
        update();
    };
    </script>

    <body>

        <div class="mainbody">
            <div class="header">
                <div class="title">
                    <h2 id="title_content">問題：<a id="current_q"></a>/<a id="total_q"></a></h2>
                </div>
            </div>
            <div class="footer"></div>
            <div class="question">
                <center>
                    <h3 id="question_content"></h3>
                    <div class="selections">
                        <!-- <div class="selection">
                            <h2 class="text" id="s_1">10分</h2>
                        </div> -->
                    </div>
                    <div class="btn" id="agree" onclick="previous()">
                        <h2 class="text" id="btn_qrevious">上一題</h2>
                    </div>
                </center>
            </div>
        </div>
    </body>

</html>