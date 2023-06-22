openssl req -new -newkey rsa:2048 -nodes -keyout localhost:8080.key -out localhost:8080.csr
openssl req -new -x509 -key localhost:8080.key -out localhost:8080.crt
cat localhost:8080.key localhost:8080.crt > localhost:8080.pem4
mitmproxy --certs *=localhost:8080.pem
mitmproxy --certs *.localhost:8080=localhost:8080.pem
