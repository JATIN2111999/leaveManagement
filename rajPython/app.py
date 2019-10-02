import requests, urllib.request

urlleave="http://localhost/leave/actions/leave.php"
dataleave = {'leave':'','bot':'','reason':'Medical','otherr':'HII','userid':'a','days':'3','url':'http://www.foodtest.ru/images/big_img/sausage_3.jpg'}
r = requests.post(url = urlleave, data = dataleave)
f=  r.text
print(f[0])
if f[0]=='1':
    print("Success")
else:
    print("Unsuccess")

