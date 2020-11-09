import os
import base64

from io import BytesIO

def str2base64pic(s:str):
    img = qrcode.make(s)
    buffered = BytesIO()
    img.save(buffered, format="JPEG")
    return base64.b64encode(buffered.getvalue()).decode("utf-8")

