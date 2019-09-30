from dbhelper import DBHelper
import time
import urllib
import requests
import json




URL="https://api.telegram.org/bot{}/".format(TOKEN)

dataupdate={"rollno":"","reason":""}

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
        if value=="":
            return False
    return True


#get : rollno reson keys and values 

def split_ktext(text):
    ktext=text.split(":")[0].lower()
    return ktext

def split_vtext(text):
    vtext=text.split(":")[1].lower().strip()
    return vtext 
###########################################

def messageformatting(valuesdata):
    messagehai=""
    for key,val in valuesdata.items():
        messagehai+=f"{key}:{val}\n"
    return messagehai

#clear data in dict
def cleardata():
    for key,_ in dataupdate.items():
        dataupdate[key]=""


def return_file_link(linkID):
    url=f"https://api.telegram.org/bot{TOKEN}/getFile?file_id={linkID}"

    content=get_json_from_url(url)
    path=content['result']['file_path']
    urljpg=f"https://api.telegram.org/file/bot{TOKEN}/{path}"
    return urljpg


def handle_updates(updates):
    

    for update in updates['result']:
    
        
        try:
            
            
            chat = update["message"]["chat"]["id"]
            try:

                #image part
                update['message']['photo'][1]["file_id"]
                text=""
                if "photo" in update['message'] and checkdict(dataupdate):
                    print(update['message']['photo'][1]["file_id"])
                    pathurl=return_file_link(update['message']['photo'][1]["file_id"])
                    send_message(pathurl,chat)
                else:
                    send_message("first enter details",chat)


                
            except:
                #text part
                text=update['message']['text']
                if text =="/start":
                    cleardata()              
                    send_message("HI i am korosensei enter details in below format one by one",chat)
                    send_message("rollno:<example>",chat)
                    send_message("reason:<commite work>",chat)

                elif text =="/done":  
                    if checkdict(dataupdate):
                        db.test_insert(**dataupdate)
                        cleardata()
                        send_message("its done bro ",chat) 
                    else:
                        cleardata()       
                        send_message("you missed to enter rollno or reason",chat)         
                
                elif text =="/login":
                    send_message("ready for login enter userid and password like in the below format\nuser:<userID>\npassword:<pass>",chat)

                    
                elif split_ktext(text)=="rollno" and split_vtext(text)!=None:
                    dataupdate["rollno"]=split_vtext(text)
                    messageformat="entered data provided\n"
                    messageformat+=messageformatting(dataupdate)
                    send_message(messageformat,chat)

                elif split_ktext(text)=="reason" and split_vtext(text)!=None:
                    dataupdate["reason"]=split_vtext(text)
                    messageformat="entered data provided\n"
                    messageformat+=messageformatting(dataupdate)
                    messageformat+="\n/done click done :)"
                    send_message(messageformat,chat)


                else:
                    send_message("I don't got U ma student",chat)

            
        except KeyError:
            print("ohhhhhhh f")



                





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