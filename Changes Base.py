host="localhost"
port="3307"
user="root"
password="root"
database="mainbase"
import pymysql

#Подключение к базе-данных
try:
    connection = pymysql.connect(
        host=localhost,
        port=3307,
        user=root,
        password=root,
        database=mainbase,
        cursorclass=pymysql.cursors.DictCursor
    )
    print("[DataBase] Succsfull Connect...")
except Exception as ex:
    print("[DataBase] Connection refused...")
    print("[DataBase]", ex)

def CreateNFT():
    mas = [2222, 1333, 666, 177, 46]
    name = ['Common', 'Rare', 'Epic', 'Legedary', 'Exclusive']
    count = 0
    index = 0

    with connection.cursor() as cursor:
        for i in range(4445):
            count += 1

            try:
                cursor.execute(f"INSERT INTO `base_nft` VALUES ('{i}', '{'LOCK'}', '{name[index]}')")
            except:
                pass
            connection.commit()

            if count == mas[index]:
                print('[Type]', name[index])
                index += 1
                count = 0




    print('Successfully')

CreateNFT()
