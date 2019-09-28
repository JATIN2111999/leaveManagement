import pymysql
cc=None
ccc=None
mentor=None
mentorco=None
comment=None
hod=None
dep=None
ccst=1
cccst=0
mentorst=0
mentorcost=0
status=None
hodst=0
class DBHelper:
    def __init__(self,dbname="todo"):
        self.dbname=dbname
        self.db=pymysql.connect(host='localhost',
                             user='root',
                             password='',
                             db=dbname,
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)
        self.cursor=self.db.cursor()

    def add_leave(self, rollno=21, reason="die", otherr=None, days=1):
        sqlquery="INSERT INTO appl(rollno, reason, otherr, days, cc, ccc, mentor, mentorco, status, comment, hod, dep, ccst, cccst, mentorst, mentorcost, hodst) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
        self.cursor.execute(sqlquery,())
        self.db.commit()

    def test_insert(self,rollno,reason):
        sqlquerys="INSERT INTO test_table(rollno,reason) VALUES(%s,%s)"
        self.cursor.execute(sqlquerys,(rollno,reason))
        self.db.commit()

            


