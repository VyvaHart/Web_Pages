import json
import pyodbc

server = 'localhost'
database = 'killervyva'
username = 'killervyva'
password = 'student'
connection_string = f"DRIVER={{ODBC Driver 17 for SQL Server}};SERVER={server};DATABASE={database};UID={username};PWD={password}"
connection = pyodbc.connect(connection_string)

with open('data.json', 'r') as json_file:
    data = json.load(json_file)

cursor = connection.cursor()
for record in data:
    cursor.execute(f"INSERT INTO your_table_name (name1, name2, name3) VALUES (?, ?, ?)",
                   record['name1'], record['name2'], record['name3'])
connection.commit()

cursor.close()
connection.close()