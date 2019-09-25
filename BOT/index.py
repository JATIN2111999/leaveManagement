import pymysql

db=pymysql.connect(host='localhost',
                             user='root',
                             password='',
                             db='todo',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)

cursor=db.cursor()
# cursor.execute("INSERT INTO todo(data) VALUES ('cloth')")

# db.commit()

cursor.execute("SELECT * FROM `todo` WHERE 1")

results=cursor.fetchall()
print(results)
for row in results:
    id=row["id"]
    data=row["data"]
    print(id, data)

db.close()
