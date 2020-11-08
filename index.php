<html>
    <head>
    <title>2020 Art of Programing</title>
    <!-- 
        --in this page ypu can upload your project
        --i'll handel it for u <3 
    -->
    </head>

    <style>
        .mainlayout {
            width: vw 100 ;
            height: vh 100;
            text-align: center;
            background-color: teal;
        }
        .inner{
            margin:0px auto;
            text-align: center ;
            width: 80%;
            height: 10%;
            background-color: thistle;
        }
        input{
            margin:0px auto;
        }
    </style>
    
    <script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js">
        function upload(){
            // var file_data = $('#fileloader').prop('file');
            // var form_data = new FormData();  
            // form_data.append('file', file_data);  
            // var maxSize = 100;//100kb
            // var fileSize = (file_data.size/1024).toFixed(2);

            // if(fileSize < maxSize){
            //     $.ajax({
            //         url: 'handle_upload.php',
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //         data: form_data,  
            //         type: 'post',
            //         success: function(data){
            //             $('#ajsxboxdhow').html(data);
            //         }
            //     });
            // }else{
            //     alert('Upload File Should B Smaller Than' + maxSize + 'KB' + " U'r File is "+ fileSize +'KB');
            // }
            alert("AAAAA");
        }
    </script>

    <body>
        <div class="mainlayout" >
            <div class="inner">
                <input type="file" id="fileloader"  name="file" />
                <input class="submit" type="submit" onclick="upload()" value="Upload" />
            </div>
        </div>
    </body>
  
</html>