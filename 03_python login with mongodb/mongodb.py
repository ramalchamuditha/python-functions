import pymongo
from pymongo import MongoClient
import hashlib


user_username = (input("Enter Username :"))
password = (input("Enter Password :"))
h = hashlib.md5(password.encode())
pass1 = str((h.hexdigest()))

Client = MongoClient("localhost" ,27017)
db = Client.mydb
collection = db.Userlogin

for uname in collection.distinct( "userName", {"userName" : user_username} ):
    if uname != user_username:
        print("Invalid Inputs !!!")
        
    else:
        for Pwrod in collection.distinct( "password",{ "userName" : uname } ):
            if pass1 == Pwrod:
                print("Login Success")
            else:
                print("Login Fail")
                
       
         
        
        


    
    
    
       
    
    
