import pymysql as pq

connection = pq.connect(host="localhost",user="root",passwd="shakib32",database="products")
cursor = connection.cursor()

pro = input('Enter Product Name : ')
pri = (float)(input('Enter Unit Price : '))

inst = "INSERT INTO price_list(product_name,product_price) VALUES (%s,%s)"
val = (pro,pri)
cursor.execute(inst,val)
print('Included product in price list')

input("To Check Product List, press Enter : ")

ret = "SELECT * from price_list;"
cursor.execute(ret)
rw = cursor.fetchall()

for x in rw:
    print(x)
        
    
connection.commit()
connection.close()