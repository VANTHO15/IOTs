
#include <WiFi.h>
#include <HTTPClient.h>
#include <WiFiClientSecure.h>
#include <Arduino_JSON.h>
const char* ssid = "Solartech L3";
const char* password = "Solartech2730";
String serverName = "http://test.minhthuc.xyz/model/mcu.php";
String apiKeyValue = "tPmAT5Ab3j7F8";
unsigned long lastTime = 0;
unsigned long timerDelay = 100;

void setup() {
  Serial.begin(115200);
  pinMode(2, OUTPUT);
  digitalWrite(2,HIGH);
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
}
void loop() {
  //Send an HTTP POST request every 10 minutes
  if ((millis() - lastTime) > timerDelay) {
    //Check WiFi connection status
    if(WiFi.status()== WL_CONNECTED){
      WiFiClient client;
      HTTPClient http;
      String serverPath = serverName + "?api_key=tPmAT5Ab3j7F8";
      // Your Domain name with URL path or IP address with path
      http.begin(client, serverPath.c_str());

      // Specify content-type header
      http.addHeader("Content-Type", "application/x-www-form-urlencoded");
      // Send HTTP POST request
      int httpResponseCode = http.GET();

      if (httpResponseCode>0) {
        String res = http.getString();
        String key  = "";
        String tag = "";
        int batdau = 0;
        
        JSONVar myObject = JSON.parse(res);
        Serial.println(res);
        if( (int)myObject["t1"] == 1)
        {
          digitalWrite(2, HIGH);
        }
        else if ( (int) myObject["t1"] == 0)
        {
          digitalWrite(2, LOW);
        }
      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
      }
      // Free resources
      http.end();
    }
    else {
      Serial.println("WiFi Disconnected");
    }
    lastTime = millis();
  }
}
