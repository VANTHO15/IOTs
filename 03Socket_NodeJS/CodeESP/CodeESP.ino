#include <SocketIOClient.h>

const char* ssid = "Van Tho 15";
const char* password = "vannhucu15";

// Server Ip
String host = "192.168.1.11";
// Server port
int port = 4000;

// Khởi tạo socket
SocketIOClient socket;

// Kết nối wifi
void setupNetwork() {
    WiFi.begin(ssid, password);
    uint8_t i = 0;
    while (WiFi.status() != WL_CONNECTED && i++ < 20) delay(500);
    if (i == 21) {
        while (1) delay(500);
    }
    
    Serial.println("Wifi connected!");
}
//    socket.emit("Quat", "{\"state\":true}");
// Thay đổi trạng thái đèn theo dữ liệu nhận được
void changeLedState(String data) {
       Serial.println(data);
//    if (data == "[\"led-change\",\"off\"]") {
//        digitalWrite(D5, HIGH);
//        Serial.println("Led off!");
//    } else {
//        digitalWrite(D5, LOW);
//        Serial.println("Led on!");
//    }
}

void setup() {

    pinMode(D5, OUTPUT);
    digitalWrite(D5, 0);
    
    Serial.begin(9600);
    setupNetwork();
    
    // Lắng nghe sự kiện led-change thì sẽ thực hiện hàm changeLedState
    socket.on("Led", changeLedState);
    
    // Kết nối đến server
    socket.connect(host, port);
    Serial.println("Xong");
}

void loop() {
     // Luôn luôn giữ kết nối với server.
    socket.monitor();
}
