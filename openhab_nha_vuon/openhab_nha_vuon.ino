#include <ESP8266WiFi.h>
#include <PubSubClient.h>
#include <NTPtimeESP.h>
NTPtime NTPch("ch.pool.ntp.org");
strDateTime dateTime;
#define ssid "Van Tho 15"
#define password "vannhucu"
#define mqtt_server "192.168.1.13"
#define mqtt_topic_pub_Light_1 "Light_1/state"
#define mqtt_topic_sub_Light_1 "Light_1/command"
#define mqtt_topic_pub_Air "Air/state"
#define mqtt_topic_sub_Air "Air/command"
#define mqtt_topic_pub_fan "fan/state"
#define mqtt_topic_sub_fan "fan/command"
#define mqtt_topic_pub_Door "Door/state"
#define mqtt_topic_sub_Door "Door/command"
#define mqtt_topic_pub_Light_2 "Light_2/state"
#define mqtt_topic_sub_Light_2 "Light_2/command"
#define mqtt_topic_pub_temperature "temperature/state"
#define mqtt_topic_pub_humidity "humidity/state"
#define mqtt_user "vohhzvgq"
#define mqtt_password "Knfs01UxvKuU"
const uint16_t mqtt_port = 1883;
WiFiClient espClient;
PubSubClient client(espClient);
void setup() {
  Serial.begin(115200);
  pinMode(16, OUTPUT);
  pinMode(0, INPUT);
  digitalWrite(16, LOW);
  setup_wifi();
  client.setServer(mqtt_server, mqtt_port);
  client.setCallback(callback);
}

void setup_wifi() {
  delay(10);
  // We start by connecting to a WiFi network
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

void callback(char* topic, byte* payload, unsigned int length)
{
  Serial.print("Message arrived ");
  Serial.print(topic);
  Serial.print("");

  String s = "";
  for (int i = 0; i < length; i++)
  {
    char p = (char)payload[i];
    s = s + p;
  }
  String st = "";
  for ( int j = 0; j < 15; j++)
  {
    char p = char( topic[j]);
    st = st + p;
  }

  if ((s == "ON") && ( st == "Light_1/command"))
  {
    digitalWrite(16, LOW);
    Serial.println(" Turn On LED! " );
  }
  // if MQTT comes a 1, turn on LED on pin D2
  else if ((s == "OFF") && (st == "Light_1/command"))
  {
    digitalWrite(16, HIGH);
    Serial.println(" Turn Off LED! " );
  }
  else Serial.println(" Khong hop le");
  Serial.println();

}
void reconnect() {
  // Loop until we're reconnected
  while (!client.connected()) {
    Serial.print("Attempting MQTT connection...");
    if (client.connect("ESP8266Client", mqtt_user , mqtt_password))
    {
      Serial.println("connected");
      // Once connected, publish an announcement...
      client.publish(mqtt_topic_pub_Light_1, "ESP_reconnected");    //gui len mess
      client.publish(mqtt_topic_pub_Air, "ESP_reconnected");
      client.publish(mqtt_topic_pub_fan, "ESP_reconnected");
      client.publish(mqtt_topic_pub_Door, "ESP_reconnected");
      client.publish(mqtt_topic_pub_Light_2, "ESP_reconnected");
      client.publish(mqtt_topic_pub_temperature, "ESP_reconnected");
      client.publish(mqtt_topic_pub_humidity, "ESP_reconnected");
      // ... and resubscribe
      client.subscribe(mqtt_topic_sub_Light_1);
      client.subscribe(mqtt_topic_sub_Air);
      client.subscribe(mqtt_topic_sub_fan);
      client.subscribe(mqtt_topic_sub_Door);
      client.subscribe(mqtt_topic_sub_Light_2);
    } else {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      // Wait 5 seconds before retrying
      delay(5000);
    }
  }
}
void loop()
{
  // openhab
  if (!client.connected())
  {
    reconnect();
  }
  client.loop();


  // thoi gian thuc
  dateTime = NTPch.getNTPtime(7.0, 0);
  if (dateTime.valid) {
    NTPch.printDateTime(dateTime);
    byte gio = dateTime.hour;      // Gio
    byte phut = dateTime.minute;  // Phut
    byte giay = dateTime.second;  // Giay
    int nam = dateTime.year;       // Nam
    byte thang = dateTime.month;    // Thang
    byte ngay = dateTime.day;        // Ngay
    byte thu = dateTime.dayofWeek;
  }


  //nut bam
  if (digitalRead(0) == 0)
  {
    delay(50);
    while (digitalRead(0) == 0);
    delay(50);
    if (digitalRead(16) == 0)
    {
      digitalWrite(16, 1);
      client.publish(mqtt_topic_pub_Light_1, "OFF");
    }
    else
    {
      digitalWrite(16, 0);
      client.publish(mqtt_topic_pub_Light_1, "ON");
    }
  }
  // gưi nhiet độ , độ ẩm
  client.publish(mqtt_topic_pub_temperature, String(49).c_str(), true);
  client.publish(mqtt_topic_pub_humidity, String(50).c_str(), true);

}
