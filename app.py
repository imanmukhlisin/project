from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route('/send-whatsapp', methods=['POST'])
def send_whatsapp():
    data = request.get_json()
    if 'items' in data and isinstance(data['items'], list):
        for item in data['items']:
            if 'name' in item and 'price' in item:
                # Proses data di sini
                return jsonify({'status': 'success', 'message': 'Pesan berhasil dikirim!'})
    return jsonify({'status': 'error', 'message': 'Format data tidak sesuai'}), 415

if __name__ == '__main__':
    app.run(debug=True)