import weight_object
import detect_object
import cv2
import pymysql as pq

print('Measuring Weight: ')
wt = weight_object.weight()
print("Measured weight : {} gram".format(wt))

input('To detect object, Press Enter: ')
ob = detect_object.detect()
print("Detected Object : ", ob)
#print(type(ob))

# Database Connection  

connection = pq.connect(host="localhost",user="root",passwd="shakib32",database="products")
cursor = connection.cursor()

# Retrive from database 

ret = "SELECT * from price_list;"
cursor.execute(ret)
rw = cursor.fetchall()
pr = -1

for x in rw:
    if x[1] == ob :
        pr = x[2]
        break
        
    
connection.commit()
connection.close()

div = (float)(pr/1000)

total = (float)(div*wt)

print("Unit Price of {} is {}".format(ob,pr))
print(" Total Price : {}".format(total) )



