import requests, urllib.request


class DBHelper:
    def __init__(self):
        self.urlleave="http://localhost/leaveManagement/leave/actions/leave.php"
        self.urlauth="http://localhost/leaveManagement/leave/actions/auth.php"

    def authenticate(self,userid,password,login=''):
        dataauth = {'login':login,'userid':userid,'password':password}
        r = requests.post(url = self.urlauth, data = dataauth)
        f=r.text[0]
        return(f)
    
    def leave_to_db(self,reason,otherr,userid,days,image):
        dataleave = {'leave':'','bot':'', 'reason':reason,'otherr':otherr,'userid':userid,'days':days,'url':image}
        r=requests.post(url=self.urlleave,data=dataleave)
        f=r.text[0]
        return(f)

    

            


