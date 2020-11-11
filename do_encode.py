import os
import base64
from pathlib import Path
import json 


file_path = "./up_load/"
file_list = os.listdir(file_path)

DEBUG =True


def _print(printItem):
    if(DEBUG):
        print(printItem)
        

for file in file_list :
    file_name = file[:file.index('.')]
    file_type = file[file.index('.'):]
    _print(file_name +" | "+ file_type)
    if ".wav" in file_type or ".svg" in file_type:
        with open(file_path + file,"rb") as f:
            #### Data procress encode to base64  
            base64_data = base64.b64encode(f.read())
            base64_data = base64_data.decode()
            # _print(base64_data)
            
            #### Write to html 
            b64_img_html = file_path + file_name + ".html"
            Path(b64_img_html).touch()
            if "svg" in file_type :
                src = '<img id="'+ file_name +'" src="data:image/svg+xml;base64, '+ base64_data + '"/>'
            else :
                src = '<audio id="' + file_name + ' src="data:audio/wav+xml;base64,'+ base64_data +'" />'
            html = open(b64_img_html, mode='w')
            html.write(src)
            html.close()
    elif ".json" in file_type :
        ### Read json
        proj_json = file_path + file
        input_file = open (proj_json)
        json_data = json.load(input_file)
        # _print(json_data)

opcode = ""        
parent_block = ""
next_block = ""
input_parameter = {
    "method" : ""
    
}


block = {
    "id" : "",
    "opcode" : opcode ,
    "parent" : parent_block ,
    "next" : next_block ,
    "input" : input_parameter
}

        
for blocks in json_data['targets'][1]['blocks']:
    print(blocks)
    for block_contex in json_data['targets'][1]['blocks'][blocks] :
        context = str(json_data['targets'][1]['blocks'][blocks][block_contex]) 
        if  context != '\0' and  'None' not in context and '{' not in context :
            print("  " + block_contex)
            print("    " + str(json_data['targets'][1]['blocks'][blocks][block_contex]))
        elif '{' in context and '{}' not in context :
            for inner_context in json_data['targets'][1]['blocks'][blocks][block_contex] :
                print("  " + block_contex)
                print("    "  + inner_context)
                for parameters in json_data['targets'][1]['blocks'][blocks][block_contex][inner_context] :
                    print("      " + str(parameters))
                    if "[" in str(parameters) and "]" in str(parameters) :
                        for parameter in parameters :
                            print("        " + str(parameter))
    print("\n")
    

