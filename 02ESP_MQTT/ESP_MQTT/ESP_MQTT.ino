#include <ESP8266WiFi.h>
#include <PubSubClient.h>

const char* mqtt_server = "ngoinhaiot.com";
const char* mqtt_user = "Vantho15";
const char* mqtt_pass = "581CF3DDFB134F57";
int mqtt_port = 1111; // esp kết nối mqtt => TCP
String topicsub = "Vantho15/led"; // nhận dữ liệu
String topicpub = "Vantho15/NhietDo"; // gửi dữ liệu

WiFiClient espClient;
PubSubClient client(espClient);

const char* ssid = "Van Tho 15";
const char* pass = "vannhucu15";

String Data = "";
String ChuoiSendMQTT = "";
String nhietdo = "99";
String led = "OFF";
long last = 0;

void ConnectMqttBroker();
void callback(char* topic, byte* payload, unsigned int length);
void reconnect();
void SendDataMQTT( String nhietdo ,  String led );

void setup()
{
  Serial.begin(9600);
  while (!Serial);
  WiFi.mode(WIFI_STA);
  pinMode(D5, OUTPUT);
  WiFi.disconnect();
  WiFi.begin(ssid, pass);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  Serial.println();
  Serial.println("Connect wifi");
  ConnectMqttBroker();
  Serial.println("Start ESP");
  last = millis();

}
void loop()
{
  if (!client.connected())
  {
    reconnect();
  }
  client.loop();

  if (millis() - last >= 3000)
  {
    SendDataMQTT(String(nhietdo), String(led));
    last = millis();
  }
}
void callback(char* topic, byte* payload, unsigned int length)  // nhận dữ liệu
{
  Serial.print("Message arrived [");
  Serial.print(topic);
  Serial.print("] ");
  String s = "";
  for (int i = 0; i < length; i++)
  {
    char p = (char)payload[i];
    s = s + p;
  }
  if (s == "ON")
  {
    digitalWrite(D5, 1);
    Serial.println(" Turn On LED! " );
  }
  else if (s == "OFF")
  {
    digitalWrite(D5, 0);
    Serial.println(" Turn Off LED! " );
  }
  Serial.println(s);
}
void ConnectMqttBroker()
{
  client.setServer(mqtt_server, mqtt_port); // set esp client kết nối MQTT broker
  delay(10);
  client.setCallback(callback); // => đọc dữ liệu mqtt broker
  delay(10);
}

void reconnect()
{
  while (!client.connected())
  {
    String clientId = "ESP8266Client123"; // tùy mình
    if (client.connect(clientId.c_str(), mqtt_user, mqtt_pass))
    {
      Serial.println("Connected MQTT ngoinhaiot.com");
      client.subscribe(topicsub.c_str());
    }
    else
    {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println("try again in 5 seconds");
      delay(5000);
    }
  }
}
void SendDataMQTT( String nhietdo ,  String led ) // gửi data
{
  ChuoiSendMQTT = "";
  ChuoiSendMQTT = "{\"nhietdo\":\"" + String(nhietdo) + "\"," +
                  "\"led\":\"" + String(led) + "\"}";

  Serial.print("ChuoiSendMQTT:");
  Serial.println(ChuoiSendMQTT);
  client.publish(topicpub.c_str(), ChuoiSendMQTT.c_str());
}
