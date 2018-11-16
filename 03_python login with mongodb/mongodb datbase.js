use mydb3
db
db.Userlogin.find({"Username" : "Admin"},{ "_id": 0, "UserID": 0, "Username": 0 }):
db.Userlogin.distinct( "password" )
db.Userlogin.find().pretty()

db.Userlogin.insert(
 {  
    "userID" : "2", 
    "userName" : "User", 
    "password" : "448ddd517d3abb70045aea6929f02367"
 }
)