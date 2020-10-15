#!C:/Python/Python37/python.exe
import cgitb
cgitb.enable()
print("Content-Type: application/json")
print("Access-Control-Allow-Origin: *")
print()

import os
os.environ['HOME'] = 'C:/Python'
import pickle

import pandas as pd
import json
import cgi
form = cgi.FieldStorage()
fd_area =  form.getvalue('area')
fd_size =  form.getvalue('size')
fd_bed =  form.getvalue('bed')
fd_bath =  form.getvalue('bath')
test_data = pd.DataFrame({'area': [fd_area],'sizes': [fd_size], 'beds': [fd_bed], 'baths': [fd_bath]})
randomForest_model = pickle.load(open('model/finalized_model.sav', 'rb'))
y_pred = randomForest_model.predict(test_data)
response = {'predicted': round(y_pred[0])}
print(json.dumps(response))
