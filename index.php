<html>
    <head>
    <title>2020 Art of Programing</title>
    <!-- 
        --in this page ypu can upload your project
        --i'll handel it for u <3 
    -->
    </head>

    <script>
        function chk(){
            var file_data = document.getElementById("upfile");
            if(file_data.value==""){
                alert("pick a project file")
                return;
            }
            var file_size = file_data.files[0].size;
            if(file_size/1024 > 100){
                alert(file_size/1024);
            }
            else{
                alert("BBBBB");
            }
        }
    </script>

    <body>
        <form action="handle_upload.php" method="post" enctype="multipart/form-data" name="upload">
            <input type='file' id="upfile" name="upfile" class='upfile' accept=".sb3">
            <button type="submit" class='btn' onclick="chk()"> Upload</button>
        </form>
    </body>
  
</html>