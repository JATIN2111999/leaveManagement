import pymysql

db=pymysql.connect(host='localhost',
                             user='root',
                             password='',
                             db='todo',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)

cursor=db.cursor()
jatin="kirti"
cursor.execute(f"INSERT INTO todo(data) VALUES ('{jatin}')")

db.commit()
id=1
cursor.execute(f"SELECT * FROM `todo` WHERE {id}=1")

results=cursor.fetchall()
print(results)
for row in results:
    id=row["id"]
    data=row["data"]
    print(id, data)

db.close()


# def jatin(hello,hi,yo=None):
#     hello=hello
#     hi=hi
#     yo=hello+hi
#     print(yo)
# data={"hello":1,"hi":2}
# jatin(**data)


