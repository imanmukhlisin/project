from flask import Flask, request, jsonify
import pywhatkit as kit

app = Flask(__name__)

@app.route('/send_whatsapp', methods=['GET'])
def send_whatsapp():
    try:
        data = request.get_json()
        items = data['items']
        phone_number = "+6281228264631"  # Ganti dengan nomor WhatsApp Anda
        message = "Pesan otomatis dari PWL Coffee Shop:\n\n"
        for item in items:
            message += f"{item['name']} - Rp. {item['price']}\n"
        message += f"Total: Rp. {sum(item['price'] for item in items)}"
        kit.sendwhatmsg_instantly(phone_number, message)
        return jsonify({'status': 'success', 'message': 'Pesan berhasil dikirim!'})
    except Exception as e:
        return jsonify({'status': 'error', 'message': str(e)})

if __name__ == '__main__':
    app.run(debug=True)