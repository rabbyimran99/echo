from flask import Flask, render_template, request, redirect, url_for, session
import mysql.connector
from werkzeug.security import check_password_hash

app = Flask(__name__)
app.secret_key = 'your_secret_key'

db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="user_db"
)

@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        email = request.form['email']
        password = request.form['password']
        cursor = db.cursor(dictionary=True)
        cursor.execute("SELECT id, password FROM users WHERE email = %s", (email,))
        user = cursor.fetchone()
        if user and check_password_hash(user['password'], password):
            session['user_id'] = user['id']
            return redirect(url_for('welcome'))
        else:
            return "Invalid credentials"
    return render_template('login.html')

@app.route('/welcome')
def welcome():
    if 'user_id' in session:
        return "Welcome!"
    return redirect(url_for('login'))

if __name__ == '__main__':
    app.run(debug=True)

from werkzeug.security import generate_password_hash

hashed_password = generate_password_hash(password)
