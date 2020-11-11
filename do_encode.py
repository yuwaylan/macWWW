import os
import base64
from pathlib import Path
import json 


file_path = "./up_load/"
file_list = os.listdir(file_path)

DEBUG =False


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

class c_block :
    def __init__(self , id):
        self.id = id 
    def opcode(self , opcode) :
        self.opcode = opcode
    def parent_block(self , parent_block):
        self.parent_block = parent_block
    def next_block(self , next_block) :
        self.next_block = next_block
    def method(self , method):
        self.method = method
        
    
    list_parameter = []
    list_contant = []
    list_para = []
    

L_block = []

i = 0


for blocks in json_data['targets'][1]['blocks']:
    _print(blocks)
    L_block.append(c_block(blocks))
    for block_contex in json_data['targets'][1]['blocks'][blocks] :        
        context = str(json_data['targets'][1]['blocks'][blocks][block_contex]) 
        if  context != '\0' and  'None' not in context and '{' not in context :
            _print("  " + block_contex) 
            L_block[i].list_contant.append(block_contex)
            #opcode next shadow ...
            contex_para = str(json_data['targets'][1]['blocks'][blocks][block_contex])
            _print("    " + contex_para)
            L_block[i].list_parameter.append(contex_para)
        elif '{' in context and '{}' not in context :
            for inner_context in json_data['targets'][1]['blocks'][blocks][block_contex] :
                L_block[i].list_contant.append(block_contex)
                _print("  " + block_contex)
                _print("    "  + inner_context)
                # for parameters in json_data['targets'][1]['blocks'][blocks][block_contex][inner_context] :
                #     _print("      " + str(parameters))
                #     if "[" in str(parameters) and "]" in str(parameters) :
                #         for parameter in parameters :
                #             _print("        " + str(parameter))
    # print("\n")
    i += 1 
    
# for i in L_block :
#     print(i.id)
#     for j in i.list_contant :
#         print(j)
#     print('\n')
for j in L_block[0].list_contant :
    print(j)
    print('\n')