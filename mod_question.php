<!DOCTYPE html>
<html>

<head>
    <title>Upload questions</title>
</head>

<body>
    <style>
    .text {
        width: 500px;
        height: 50;
    }
    </style>
    <!---->
    <center>
    <form method="post" action="handle_encode.php">

        <label>1.</label>
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
var questions = "";
var select_num = 3;


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
                } /**!!!!!!!!!!!  Label not yet removed!!!!!!!!!!!!     !!!!!!!!!!!!!!!!!!!!!!!!!!! */
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
                    '" id="q' + q_count + '"> <input type="button" name="T_' + q_count + '" id="T_' + q_count +
                    '" onclick="rem_q(this.id)"value = "scale" > <br id="b_' + q_count + '">');
            }
            break;
        case 's':
            onsubmit();
            break;
    }
}


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
}
</script>