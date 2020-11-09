import os
import base64
from pathlib import Path

file_path = "./up_load/"
file_list = os.listdir(file_path)

DEBUG =False


def _print(printItem):
    if(DEBUG):
        print(printItem)
        

for file in file_list :
    if ".wav" in file or ".svg"in file:
        with open(file_path + file,"rb") as f:
            #### Data procress encode to base64
            file_name = file[:-4]
            file_type = file[-3:]
            _print(file_name +" | "+ file_type)
            base64_data = base64.b64encode(f.read())
            base64_data = base64_data.decode()
            # _print(base64_data)
            
            #### Write to html 
            b64_img_html = file_path + file_name + ".html"
            Path(b64_img_html).touch()
            if file_type == "svg" :
                src = '<img id="'+ file_name +'" src="data:image/svg+xml;base64, '+ base64_data + '"/>'
            else :
                src = '<audio id="' + file_name + ' src="data:audio/wav+xml;base64,'+ base64_data +'" />'
            html = open(b64_img_html, mode='w')
            html.write(src)
            html.close()
            
            
    

