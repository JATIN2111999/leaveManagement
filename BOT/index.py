# import pymysql

# db=pymysql.connect(host='localhost',
#                              user='root',
#                              password='',
#                              db='todo',
#                              charset='utf8mb4',
#                              cursorclass=pymysql.cursors.DictCursor)

# cursor=db.cursor()
# jatin="kirti"
# cursor.execute(f"INSERT INTO todo(data) VALUES ('{jatin}')")

# db.commit()
# id=1
# cursor.execute(f"SELECT * FROM `todo` WHERE {id}=1")

# results=cursor.fetchall()
# print(results)
# for row in results:
#     id=row["id"]
#     data=row["data"]
#     print(id, data)

# db.close()


# def jatin(hello,hi,yo=None):
#     hello=hello
#     hi=hi
#     yo=hello+hi
#     print(yo)
# data={"hello":1,"hi":2}
# jatin(**data)

id1=1
id2=2
datastore=[]

jatin={id1:{"rollno":131309}}
kirti={id2:{"rollno":131309,"reason":"dsasadnsannsad"}}

datastore.append(jatin)
datastore.append(kirti)


for i in range(len(datastore)):
    if id1 in (datastore[i]):
        datastore[i][id1]["rollno"]="17ce1008"
    else:
        pass

print(datastore)

# validation
val=[{1: {'rollno': '17ce1008', 'reason': 'dsasadnsannsad'}}, {2: {'rollno': 131309, 'reason': 'dsannsad'}}]
noval=[{1: {'rollno': '17ce1008'}}, {2: {'rollno': 131309, 'reason': 'dsasadnsannsad'}}]

id1=1

for i in range(len(val)):
    if id1 in (val[i]):
        try:
            print(val[i][id1]["rollno"],val[i][id1]["reason"])
        except:
            print("soething not entered")
            continue

#print value


for i in range(len(val)):
    if id1 in (val[i]):
        print(val[i][id1],"jatin")
        


data=[{813472815: {'rollno': '86855',"reason":"adjb"}}, {408266692: {'rollno': '86855',"reason":"adjb"}}, {906306697: {'rollno': '',"reason":""}}]
# j=0
chat=813472815
# for i in range(len(data)):
#     if chat in data[i]:
#         print("user hai")
#         j=1
#         break
#     else:
#         j=0
#         continue
# if j==0:
#     data.append({chat:{}})


# print(data)
        

for i in range(len(data)):
    if chat in (data[i]):
        for key,value in data[i][chat].items():
            print(key,value)

for i in range(len(data)):
    if chat in (data[i]):
        print("True")
    else:
        print("False")