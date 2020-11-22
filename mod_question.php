<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Upload questions</title>
    <script language="javascript" type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js">

    </script>
</head>
<?php
$json_string = file_get_contents('question.json');  
$fileData = json_decode($json_string, true); 
$val_json_Q_scale = "";
$val_Q_selection ="";
if(isset($fileData['Q_scale'])){
foreach($fileData['Q_scale'] as $val)
{
    $val_json_Q_scale .=$val.",";
}}
if(isset($fileData['Q_selection'])&& $fileData['C_Q_selection']>1){
    foreach($fileData['Q_selection'] as $val)
    {   
        $val_Q_selection .=$val[0].":";
        foreach($val[1] as $vval){
            $val_Q_selection .=$vval."&";
        }
        $val_Q_selection .=",";
    }
}


?>

<body>
    <style>
    .text {
        width: 500px;
        height: 50;
    }
    </style>
    <!---->
    <a href="index.html"><button>回選單</button></a>
    <center id="main">

        <form method="post" action="handle_encode.php">

            <label>第1題.</label>
            <input type="text" name="q1" id="q1" class="text"><label>click to change Qurstion type :</label>
            <input type="button" name="T_1" id="T_1" onclick="rem_q(this.id)" value="scale">
            <br id="b_1">
            <input type="button" name="a" id="a" onclick="rem_q(this.id)" value="Add 10 Question">


            <br><br><br>
            <input type="submit" name="submit" id="submit" value="Send and encode" onclick="rem_q('s')">
            <input type="text" style="display:none" name="questions" id="questions">
        </form>
    </center>

</body>

</html>

<script language="javascript" type="text/javascript">
var q_count = 1;
var do_fill = 1;
var questions = "";
var json_Q_scale = [];
var json_Q_Ver = <?php if(isset($fileData['Q_Ver']))echo $fileData['Q_Ver'];else echo 0; ?>;
var json_Q_selection = [];
var select_num = 3;
var json_Q_count = <?php if(isset($fileData['C_Quest']))echo $fileData['C_Quest'];else echo 0; ?>; //題目數量
var json_C_Q_selection =
    <?php if(isset($fileData['C_Q_selection']))echo $fileData['C_Q_selection'];else echo 0; ?>; //選擇題數量

function rem_q(id) {
    //console.log(id.charAt(0));
    switch (id.charAt(0)) {
        case 'T':
            var whitch = document.getElementById(id);
            if (whitch.value == "scale") { //Add
                whitch.value = "selection";
                for (var i = select_num; i > 0; i--) {
                    whitch.insertAdjacentHTML('afterend',
                        '<br id="br_' + i +
                        '_q' + id.slice(id.indexOf("_") + 1) + '"><label id=lb_' + i +
                        '_q' + id.slice(id.indexOf("_") + 1) + '>第' + id.slice(id.indexOf("_") + 1) +
                        '題_選項' + i +
                        '.</label><input class="text" type="text" name="s' + i +
                        '_q' + id.slice(id.indexOf("_") + 1) + '" id="s' + i +
                        '_q' + id.slice(id.indexOf("_") + 1) + '"> ');
                }
            } else { //Remove
                whitch.value = "scale";
                for (var i = select_num; i > 0; i--) {
                    var inp = document.getElementById('s' + i + '_q' + id.slice(id.indexOf("_") + 1));
                    var br = document.getElementById('br_' + i + '_q' + id.slice(id.indexOf("_") + 1));
                    var lab = document.getElementById('lb_' + i + '_q' + id.slice(id.indexOf("_") + 1));
                    inp.remove();
                    lab.remove();
                    br.remove();
                }
            }
            console.log(whitch.value);
            break;
        case 'a':
            for (var i = 0; i < 10; i++) {
                var target = document.getElementById('b_' + q_count);
                // console.log(target);
                q_count += 1;
                target.insertAdjacentHTML('afterend',
                    '<br><label>第' + q_count + '題.</label><input class="text" type="text" name="q' + q_count +
                    '" id="q' + q_count +
                    '"><label>click to change Qurstion type :</label> <input type="button" name="T_' + q_count +
                    '" id="T_' + q_count +
                    '" onclick="rem_q(this.id)"value = "scale" > <br id="b_' + q_count + '">');
            }
            break;
        case 's':
            onsubmit();
            break;
    }
};


function onsubmit() {
    for (var i = 1; i <= q_count; i++) {
        console.log(document.getElementById('q' + i).value);
        if (document.getElementById('q' + i).value != '') {
            if (document.getElementById('T_' + i).value == "selection") {
                questions += "B_:" + document.getElementById('q' + i).value + '&&';
                for (var j = 1; j <= select_num; j++) {
                    var selection = document.getElementById('s' + j + '_q' + i).value;
                    if (selection != "") {
                        questions += 's_' + selection + '_&';
                    }
                }
                questions = questions.slice(0, -2);
                questions += ',';

            } else {
                questions += "A_:" + document.getElementById('q' + i).value + ',';
            }
        }
    }
    if (questions.slice(-1) == ",") {
        questions = questions.slice(0, -1);
    }
    document.getElementById('questions').value = questions;
};


function getcontent() {
    var tmp = "<?php echo $val_json_Q_scale;?>";
    json_Q_scale = tmp.slice(0, -1).split(',');
    if (json_C_Q_selection > 1) {
        tmp = "";
        tmp = "<?php echo $val_Q_selection;?>";
        tmp = tmp.slice(0, -1).split(',');
        var ttmp = [];
        var t;
        for (var i = 0; i < tmp.length; i++) {
            ttmp.push(tmp[i].slice(0, -1).split(':'));
        }
        for (var i = 0; i < ttmp.length; i++) {
            t = ttmp[i][1].split('&');
            ttmp[i].pop();
            ttmp[i].push(t);
        }
        json_Q_selection = ttmp;
        console.log(json_Q_selection);
    }

    // $('#main').insertAdjacentHTML('afterbegin', '<h2>Version:' + json_Q_Ver + '</h2>');
    var aaa = document.getElementById('main');
    aaa.insertAdjacentHTML('afterbegin', '<h2>Version:' + json_Q_Ver + '</h2>');
    console.log($('#main'));
    fill_in();
};

function fill_in() {
    /* 先填滿度量題 */
    for (var i = 1; i <= json_Q_scale.length; i++, do_fill += 1) {
        document.getElementById('q' + i).value = json_Q_scale[i - 1];
    }
    /* 填滿選擇題 */
    for (var i = 1; i <= json_Q_selection.length; i++, do_fill++) {
        rem_q('T_' + do_fill);
        document.getElementById('q' + do_fill).value = json_Q_selection[i - 1][0];
        for (var j = 1; j <= json_Q_selection[i - 1][1].length; j++) {
            var inp = document.getElementById('s' + j + '_q' + do_fill);
            inp.value = json_Q_selection[i - 1][1][j - 1];
        }
    }
};







window.onload = function() {
    rem_q('a');
    if (q_count <= json_Q_count) {
        rem_q('a');
    }
    getcontent();
};
</script>