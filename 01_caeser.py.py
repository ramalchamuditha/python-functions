def encrypt(string):
 
  msg = ''
  for char in string: 
    if char == ' ':
      msg = msg + char
    elif  char.isupper():
      msg = msg + chr((ord(char) + 3 - 65) % 26 + 65)
    else:
      msg = msg + chr((ord(char) + 3 - 97) % 26 + 97)
  
  return msg
 
text = input("enter messege: ")
print("encrypted messege: ", encrypt(text))

