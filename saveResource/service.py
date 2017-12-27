from bottle import Bottle, run, post, request, response
from random import randint
import json, hashlib, datetime, unicodedata, re

def enable_cors(fn):
	def wrapper(*args, **kwargs):
		response.headers['Access-Control-Allow-Origin'] = 'https://varamu.riha.ee'
		response.headers['Access-Control-Allow-Methods'] = 'POST'
		response.headers['Access-Control-Allow-Headers'] = 'Origin, Accept, Content-Type, X-Requested-With, X-CSRF-Token'
		if request.method != 'OPTIONS':
			return fn(*args, **kwargs)
	
	return wrapper

app = Bottle()

@app.route("/save", method=['OPTIONS','POST'])
@enable_cors
def save_xml():
	XMLjson = json.loads(json.dumps(request.json))
	nimetus = XMLjson["name"]
	nimetus = str(unicodedata.normalize('NFKD', nimetus).encode('ascii', 'ignore'))
	nimetus = str(re.sub('[^\w\s-]', '', nimetus).strip().lower())
	nimetus = str(re.sub('[-\s]+', '-', nimetus))
	timestamp = datetime.datetime.now().strftime('%Y.%m.%d.%H:%M:%S')
	hash_object = hashlib.sha256((nimetus+timestamp+str(randint(0, 1000))).encode('utf-8'))
	hex_dig = hash_object.hexdigest()
	timestamp = timestamp[:10]
	nimi = "{0}-{1}-{2}".format(timestamp,nimetus,str(hex_dig))
	file = open(nimi+'.json', 'w+')
	file.write(json.dumps(XMLjson))

app.run(host='varamu.riha.ee', port=443)
