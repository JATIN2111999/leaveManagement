from dbhelper import DBHelper
import time
import urllib
import requests
import json




URL="https://api.telegram.org/bot{}/".format(TOKEN)

dataupdate={"rollno":None,"reason":None,"days":None}

db=DBHelper()

def send_message(text,chat_id,reply_markup=None):
    text=urllib.parse.quote_plus(text)
    url=URL+"sendMessage?text={}&chat_id={}".format(text,chat_id)
    if reply_markup:
        url+= "&reply_markup={}".format(reply_markup)
    get_url(url)

def get_url(url):
    response=requests.get(url)
    content=response.content.decode("utf8")
    return content

def get_json_from_url(url):
    content=get_url(url)
    js=json.loads(content)
    return js

def get_updates(offset=None):
    url = URL + "getUpdates?timeout=100"
    if offset:
        url+="&offset={}".format(offset)
    js = get_json_from_url(url)
    return js

def get_last_update_id(updates):
    update_ids=[]
    for update in updates["result"]:
        update_ids.append(int(update["update_id"]))
    print(update_ids)
    return max(update_ids)

def checkdict(dict_value):
    for value in dict_value.values():
        print(value)
        if value==None:
            return False
    return True


def handle_updates(updates):
    for update in updates['result']:
        try:
            text=update['message']['text']
            chat = update["message"]["chat"]["id"]
            
            if text =="/done":
                if checkdict(dataupdate):
                    db.add_leave(**dataupdate)
                else:
                    for key in dataupdate.keys():
                        dataupdate[key]=None
                send_message("its done bro ",chat)
            elif text =="/start":
                send_message("HI i am korosensei enter your rollno:example and day:dd/mm/yy and reason:",chat)
                
            elif text[:7]=="rollno:" and text[7:]!=None:
                dataupdate["rollno"]=text[7:]
                send_message("enter days",chat)

            elif text[:5]=="days:" and text[5:]!=None:
                dataupdate["days"]=int(text[5:])
                send_message("enter reason",chat)

            elif text[:7]=="reason:" and text[7:]!=None:
                dataupdate["reason"]=text[7:]
                send_message("/done click done :)",chat)
            else:
                send_message("some thing went wrong",chat)
        except KeyError:
            pass


def main():
    last_update_id=None
    while True:
        updates=get_updates(last_update_id)
        if len(updates['result'])>0:
            last_update_id=get_last_update_id(updates)+1
            handle_updates(updates)
        time.sleep(0.5)


if __name__ == "__main__":
    main()