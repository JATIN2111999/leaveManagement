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
        print(value)
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
                print(messagehai)
            return messagehai

# def User_update(chatid):
#     jhai=0
#     for i in range(len(User_db)):
#         if chatid in User_db[i]:
#             jhai = 1
#             break  
#         else:
#             jhai = 0
#             continue
#     if jhai==0:
#         User_db.append({chatid:{"rollno":"","reason":""}})



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

def handle_updates(updates):
    for update in updates['result']:
        
        try:
            
            chat = update["message"]["chat"]["id"]

            if("photo" in update['message']):
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
                        User_db.append({chat:{'userid':'','days':'','reason':'','otherr':'','image':''}})
                        jhai=0
                    print(User_db)
                    send_message("HI i am korosensei enter details in below format one by one",chat)
                    send_message("rollno:<example>",chat)
                    send_message("reason:<commite work>",chat)

                # elif text =="/done":  
                #     if User_is_in_db(chat):
                #         db.test_insert(**dataupdate)
                #         cleardata()
                #         send_message("its done bro ",chat) 
                #     else:
                #         cleardata()       
                #         send_message("you missed to enter rollno or reason",chat)         
                
                # elif text =="/login":
                #     send_message("ready for login enter userid and password like in the below format\nuser:<userID>\npassword:<pass>",chat)

                elif text =="/done":
                    if value_are_not_empty(chat):
                        temp=get_the_user_dict(chat)
                     
                        del temp["status"]

                        f=db.leave_to_db(**temp)
                            #logout
                        delete_user(chat)
                        
                        send_message("done bro Enjoy",chat)     
                    else:
                        send_message("you missed something",chat)
                    
                elif split_ktext(text)=="userid" and split_vtext(text)!=None:
                    
                    # if User_is_in_db(chat):
                    #     print("chal raha hai ")
                    #     User_is_in_db_put_value(chat,"rollno",split_vtext(text))
                    #     messageformat=messageformatting(chat)
                    #     send_message(messageformat,chat)
                    # else:
                    #     send_message("not a user press /start",chat)
                    User_is_in_db_put_value(chat,"userid",split_vtext(text))
                    messageformat=messageformatting(chat)
                    send_message(messageformat,chat)
                        

                elif split_ktext(text)=="reason" and split_vtext(text)!=None:

                    User_is_in_db_put_value(chat,"reason",split_vtext(text))
                    messageformat=messageformatting(chat)
                    send_message(messageformat,chat)


                elif split_ktext(text)=="otherr" and split_vtext(text)!=None:

                    User_is_in_db_put_value(chat,"otherr",split_vtext(text))
                    messageformat=messageformatting(chat)
                    send_message(messageformat,chat)
                
                elif split_ktext(text)=="days" and split_vtext(text)!=None:

                    User_is_in_db_put_value(chat,"days",split_vtext(text))
                    messageformat=messageformatting(chat)
                    send_message(messageformat,chat)
                

                
        except:
            print("ohh ffff")

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