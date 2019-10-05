from dbhelper import DBHelper
import time
import urllib
import requests
import json




URL="https://api.telegram.org/bot{}/".format(TOKEN)
User_db=[]
dataupdate={}

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
        if value=="":
            return False
    return True


#get : rollno reson keys and values 

def split_ktext(text):
    ktext=text.split(":")[0].lower().strip()
    return ktext

def split_vtext(text):
    vtext=text.split(":")[1].lower().strip()
    return vtext 

def return_file_link(linkID):
    url=f"https://api.telegram.org/bot{TOKEN}/getFile?file_id={linkID}"

    content=get_json_from_url(url)
    path=content['result']['file_path']
    urljpg=f"https://api.telegram.org/file/bot{TOKEN}/{path}"
    return urljpg



def User_is_in_db(chatid):
    for i in range(len(User_db)):
        if chatid in (User_db[i]):
            return True
    return False

def User_is_in_db_put_value(chatid,valuestocheck,text):
    for i in range(len(User_db)):
        if chatid in (User_db[i]):
            print("working good")
            User_db[i][chatid][valuestocheck]=text
        else:
            continue

def messageformatting(chat):
    messagehai="entered data provided\n"
    for i in range(len(User_db)):
        if chat in (User_db[i]):            
            for key,value in User_db[i][chat].items():
                if key=="image" and value!='':
                    value="uploaded"
                messagehai+=f"{key}:{value}\n"
            messagehai+="if you done with all details \nclick on => /done"
            return messagehai


def messageformattinguserid(chat):
    messagehai="entered data provided for login\n"
    for i in range(len(User_db)):
        if chat in (User_db[i]):            
            for key,value in User_db[i][chat].items():
                if key == 'password' or key=='userid':
                    messagehai+=f"{key}:{value}\n"
            return messagehai


def value_are_not_empty(chat):
    for i in range(len(User_db)):
        if chat in User_db[i]:
            for value in User_db[i][chat].values():
                if value =='':
                    return False
    return True


def get_the_user_dict(chat):
    for i in range(len(User_db)):
        if chat in User_db[i]:
            return User_db[i][chat]

def delete_user(chat):
    for i in range(len(User_db)):
        if chat in User_db[i]:
            del User_db[i]
            break

def get_status(chat):
    for i in range(len(User_db)):
        if chat in User_db[i]:
            if User_db[i][chat]['status']==1:
                return True
            else:
                return False

def get_status_empty(chat):
    for i in range(len(User_db)):
        if chat in User_db[i]:
            if User_db[i][chat]['status']=='':
                return True
            else:
                return False

def putstatus(chat):
    for i in range(len(User_db)):
        if chat in User_db[i]:
            User_db[i][chat]['status']=1

def handle_updates(updates):
    for update in updates['result']:
        
        try:
            
            chat = update["message"]["chat"]["id"]
            #image part
            if( get_status(chat) and "photo" in update['message']):
                if User_is_in_db(chat):
                    text=""
                    pathurl=return_file_link(update['message']['photo'][0]["file_id"])
                    User_is_in_db_put_value(chat,"image",pathurl)
                    messageformat=messageformatting(chat)
                    send_message(messageformat,chat)
                else:
                    send_message("first enter detail",chat)
                
                
            else:
                #text part
                text=update['message']['text']
                if text =="/start":
                    jhai=0
                    for i in range(len(User_db)):
                        if chat in User_db[i]:
                            jhai = 1
                            break  
                        else:
                            jhai = 0
                            continue
                    if jhai==0:
                        User_db.append({chat:{'userid':'','days':'','reason':'','otherr':'','image':'','status':'','password':''}})
                        jhai=0
                    send_message("HEY "+update['message']['from']['first_name'].upper(),chat)
                    send_message("HI i am Korosensei enter details in below format one by one",chat)
                    send_message("enter the below details one by one  \nuserid:<yourUserid> \npassword:<yourpassword>",chat)

                elif get_status_empty(chat) and text=="/login":
                    for i in range(len(User_db)):
                        if chat in User_db[i]:
                            userid_text=User_db[i][chat]['userid']
                            pass_text=User_db[i][chat]['password']
                            f=db.authenticate(userid_text,pass_text)
                            if f=='1':
                                putstatus(chat)
                                send_message("you logged in status:1",chat)
                                send_message(messageformatting(chat),chat)
                            else:
                                send_message('userid/email entered wrong',chat)
                    

                elif text =="/done":
                    if value_are_not_empty(chat):
                        temp=get_the_user_dict(chat)
                     
                        del temp["status"]
                        del temp['password']


                        f=db.leave_to_db(**temp)
                            #logout
                        delete_user(chat)
                        
                        send_message("leave application submitted Enjoy",chat)     
                    else:
                        send_message("you missed something",chat)
                    
                elif get_status_empty(chat)  and split_ktext(text)=="userid" and split_vtext(text)!=None:
                    User_is_in_db_put_value(chat,"userid",split_vtext(text))
                    messageformat=messageformattinguserid(chat)
                    send_message(messageformat,chat)
            
                elif get_status_empty(chat) and  split_ktext(text)=="password" and split_vtext(text)!=None:
                    User_is_in_db_put_value(chat,"password",split_vtext(text))
                    messageformat=messageformattinguserid(chat)
                    messageformat+="\nclick on => /login"
                    send_message(messageformat,chat)
                        

                elif get_status(chat) and split_ktext(text)=="reason" and split_vtext(text)!=None:

                    User_is_in_db_put_value(chat,"reason",split_vtext(text))
                    messageformat=messageformatting(chat)
                    send_message(messageformat,chat)


                elif get_status(chat) and split_ktext(text)=="otherr" and split_vtext(text)!=None:

                    User_is_in_db_put_value(chat,"otherr",split_vtext(text))
                    messageformat=messageformatting(chat)
                    send_message(messageformat,chat)
                
                elif get_status(chat) and split_ktext(text)=="days" and split_vtext(text)!=None:

                    User_is_in_db_put_value(chat,"days",split_vtext(text))
                    messageformat=messageformatting(chat)
                    send_message(messageformat,chat)
                
                else:
                    if User_is_in_db(chat):
                        send_message("just type text in the below format\nuserid:17ce1008",chat)
                    else:
                        send_message("hey there, i don't think u understand click on /start",chat)
                
        except:
            pass

        print(User_db)

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

