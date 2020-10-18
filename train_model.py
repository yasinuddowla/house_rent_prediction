#!C:/Python/Python37/python.exe
import cgitb
cgitb.enable()
print("Content-Type: text/html")
print()
import os
os.environ['HOME'] = 'C:/Python'
from sklearn.ensemble import RandomForestRegressor
from sklearn.model_selection import train_test_split
import pandas as pd
import numpy as np
import pickle


data = pd.read_csv("data/Bikroy_Ad_Data_Dhaka_Numreric.csv")
data.isnull().values.any()
y = data['prices']
X = data.drop('prices',axis=1)

X_train,X_test,y_train,y_test=train_test_split(X,y,test_size=0.2)

from sklearn.metrics import mean_squared_error

randomForest = RandomForestRegressor(n_estimators=20, random_state=0)
randomForest_model = randomForest.fit(X_train, y_train)

filename = 'model/finalized_model.sav'
pickle.dump(randomForest_model, open(filename, 'wb'))

y_pred = randomForest_model.predict(X_test)
def mean_absolute_percentage_error(y_true, y_pred): 
    y_true, y_pred = np.array(y_true), np.array(y_pred)
    return np.mean(np.abs((y_true - y_pred) / y_true)) * 100

from sklearn import metrics

print("Model Saved<br><br>")
print('Mean Absolute Error:', metrics.mean_absolute_error(y_test, y_pred),'<br>')
print('Mean Absolute Percentage Error:', mean_absolute_percentage_error(y_test, y_pred),'<br>')
print('Mean Squared Error:', metrics.mean_squared_error(y_test, y_pred),'<br>')
print('Root Mean Squared Error:', np.sqrt(metrics.mean_squared_error(y_test, y_pred)),'<br>')
print('R2 Score:', metrics.r2_score(y_test, y_pred),'<br>')

