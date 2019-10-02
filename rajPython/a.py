import requests, urllib.request

urlauth="http://localhost/leave/actions/auth.php"
dataauth = {'login':'','userid':'a','password':'123'}
r = requests.post(url = urlauth, data = dataauth)
f=  r.text
print(f[0])
if f[0]=="1":
    print("Success")
else:
    print("Uns")
