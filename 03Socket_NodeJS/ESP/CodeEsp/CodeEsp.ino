#include <ESP8266WiFi.h>
#include <PubSubClient.h>
#include <SoftwareSerial.h>
#include <DNSServer.h>
#include <ESP8266WebServer.h>
#include <WiFiManager.h>

const byte RX = D6;
const byte TX = D5;
SoftwareSerial mySerial =  SoftwareSerial(RX, TX);
char ssid[] = "";
char pass[] = "";
#include <Ticker.h>
Ticker ticker;
uint8_t LED1 = 2;
uint8_t LED2 = 16;
String inputString = "";
boolean stringComplete = false;
const char* mqtt_server = "m13.cloudmqtt.com";

WiFiClient espClient;
PubSubClient client(espClient);
long lastMsg = 0;
String Data = "";
char msg[50];
String DataMQTT = "";
char ChuoiEspSendMQTT[] = "A0B0C0D0E0F0G0H0J";
String ChuoiGhep = "A0B0C0D0E0F0G0H0J";

int trangthai_servo_cuachinh = 0;
int trangthai_led_phongkhach = 0;
int trangthai_quat_phongkhach = 0;
int trangthai_servo_phongngu = 0;
int trangthai_servo_phoido = 0;
int trangthai_servo_garage = 0;

int trangthai_led_cauthang = 0;

int trangthai_led_phongngu = 0;

int trangthai_led_nhavesinh = 0;

int trangthai_led_phongbep = 0;

int pwm_dongco1 = 0;
int pwm_dongco2 = 0;

int trangthai_dongco1 = 0;
int trangthai_dongco2 = 0;

int trangthai_cambienchuyedong = 0;
int trangthai_cambienhongngoai = 0;
int trangthai_cambienanhsang = 0;
int trangthai_buzzer = 0;

int trangthai_cua_garage = 0;

int trangthai_led_garage = 0;

int trangthai_quat_phongngu = 0;

int cambienga = 0;
int nhietdodht = 0;
int doamdht = 0;
float nhietdolm35 = 0;
int cambienanhsang = 0;

int biennhavesinh = 0;
String A = "A";
String B = "B";
String C = "C";
String D = "D";
String E = "E";
String F = "F";
String G = "G";
String H = "H";
String J = "J";
String K = "K";
String L = "L";
String M = "M";
String N = "N";
String R = "R";
String T = "T";
String Y = "Y";
String U = "U";
String I = "I";
int bien = 0;
int dem = 0;
void tick()
{
  //toggle state
  int state = digitalRead(LED1);  // get the current state of GPIO1 pin
  digitalWrite(LED1, !state);     // set pin to the opposite state
}
void configModeCallback (WiFiManager *myWiFiManager)
{
  Serial.println(WiFi.softAPIP());
  //if you used auto generated SSID, print it
  Serial.println(myWiFiManager->getConfigPortalSSID());
  ticker.attach(0.2, tick);
}
void setup()
{

  Serial.begin(9600);
  mySerial.begin(9600);

  pinMode(LED1, OUTPUT);
  pinMode(LED2, OUTPUT);
  digitalWrite(LED2, HIGH);
  //WiFi.disconnect();
  delay(1000);
  WiFi.begin(ssid, pass);
  ticker.attach(0.6, tick);
  WiFiManager wifiManager;
  wifiManager.EC_begin();
  wifiManager.EC_read();
  wifiManager.setAPCallback(configModeCallback);
  wifiManager.autoConnect("Config_WiFi_Esp", "123456789"); // Имя точки досупа Wi-FI и Пароль для настройки WEMOS D1 (ESP8266)
  Serial.println("connected...WI-FI");


  client.setServer(mqtt_server, 10660);
  delay(10);

  client.setCallback(callback);
  delay(10);


  ticker.detach();
  digitalWrite(LED2, LOW);

  digitalWrite(LED1, LOW);

  bien = 1;

}

void callback(char* topic, byte* payload, unsigned int length)
{
  for (int i = 0; i < length; i++)
  {
    lastMsg = millis();
    Data += (char)payload[i];
  }

  Serial.println(Data);
  mySerial.println(Data);
  delay(100);
  Data = "";
}

void reconnect()
{

  while (!client.connected())
  {


    if (client.connect("Wemos_D1", "eloauzoy", "B34RcZi91Zts"))
    {
      Serial.println("Connect MQTT");
      client.subscribe("HTMLSENDHUNG"); // trùng vơi topuc trên app gửi data xuông
      digitalWrite(LED1, LOW);
      bien = 1;
    }
    else
    {
      bien = 0;
      digitalWrite(LED1, HIGH);
      Serial.println("Disconnect MQTT");
    }
  }
}
void loop()
{

  if (!client.connected())
  {
    reconnect();
  }
  client.loop();

  Read_Uart();

}

void Read_Uart()
{
  while (mySerial.available())
  {
    char inChar = (char)mySerial.read();
    inputString += inChar;
    if (inChar == '\n')
    {
      stringComplete = true;
    }
    if (stringComplete)
    {
      dem++;
      Serial.print(dem);
      Serial.print(".Data Mega Send = ");
      Serial.println(inputString);

      int  TimA, TimB, TimC, TimD, TimE , TimF , TimG , TimH , TimJ , TimK , TimL, TimM , TimN, TimR, TimT, TimY , TimU , TimI = -1;
      String ChuoiA, ChuoiB, ChuoiC, ChuoiD, ChuoiE , ChuoiF , ChuoiG , ChuoiH , ChuoiJ , ChuoiK, ChuoiL, ChuoiM, ChuoiN, ChuoiR, ChuoiT, ChuoiY, ChuoiU = "";
      // A[nhietdodht]B[doamdht]C[nhietdolm35]D[cambienga]E[trangthai_servo_cuachinh]F[trangthai_led_phongkhach]G[trangthai_quat_phongkhach]H[trangthai_led_cauthang]
      //J[trangthai_led_phongngu]K[trangthai_quat_phongngu]L[trangthai_servo_phongngu]M[trangthai_led_nhavesinh]
      //N[trangthai_led_phongbep]R[trangthai_servo_phoido]T[trangthai_buzzer]Y[trangthai_led_garage]U[trangthai_cua_garage]I



      TimA = inputString.indexOf("A");
      TimB = inputString.indexOf("B");
      TimC = inputString.indexOf("C");
      TimD = inputString.indexOf("D");
      TimE = inputString.indexOf("E");
      TimF = inputString.indexOf("F");
      TimG = inputString.indexOf("G");
      TimH = inputString.indexOf("H");
      TimJ = inputString.indexOf("J");
      TimK = inputString.indexOf("K");
      TimL = inputString.indexOf("L");
      TimM = inputString.indexOf("M");
      TimN = inputString.indexOf("N");
      TimR = inputString.indexOf("R");
      TimT = inputString.indexOf("T");
      TimY = inputString.indexOf("Y");
      TimU = inputString.indexOf("U");
      TimI = inputString.indexOf("I");

      if (TimA >= 0 && TimF >= 0 && TimY >= 0 )
      {

        // A[nhietdodht]B[doamdht]C[nhietdolm35]D[cambienga]E[trangthai_servo_cuachinh]F[trangthai_led_phongkhach]G[trangthai_quat_phongkhach]H[trangthai_led_cauthang]
        //J[trangthai_led_phongngu]K[trangthai_quat_phongngu]L[trangthai_servo_phongngu]M[trangthai_led_nhavesinh]
        //N[trangthai_led_phongbep]R[trangthai_servo_phoido]T[trangthai_buzzer]Y[trangthai_led_garage]U[trangthai_cua_garage]I

        //nhietdodht
        ChuoiA = inputString.substring(TimA + 1 , TimB);
        nhietdodht = ChuoiA.toInt();
        //doamdht
        ChuoiB = inputString.substring(TimB + 1 , TimC);
        doamdht = ChuoiB.toInt();


        //nhietdolm35
        ChuoiC = inputString.substring(TimC + 1 , TimD);
        nhietdolm35  = ChuoiC.toFloat();

        //cambienga
        ChuoiD = inputString.substring(TimD + 1 , TimE);
        cambienga = ChuoiD.toInt();

        //trangthai_servo_cuachinh
        ChuoiE = inputString.substring(TimE + 1 , TimF);
        trangthai_servo_cuachinh = ChuoiE.toInt();
        
        //trangthai_led_phongkhach
        ChuoiF = inputString.substring(TimF + 1 , TimG);
        trangthai_led_phongkhach = ChuoiF.toInt();
        
        //trangthai_quat_phongkhach
        ChuoiG = inputString.substring(TimG + 1 , TimH);
        trangthai_quat_phongkhach = ChuoiG.toInt();
        
        //trangthai_led_cauthang
        ChuoiH = inputString.substring(TimH + 1 , TimJ);
        trangthai_led_cauthang = ChuoiH.toInt();

        //trangthai_led_phongngu
        ChuoiJ = inputString.substring(TimJ + 1 , TimK);
        trangthai_led_phongngu = ChuoiJ.toInt();

        //trangthai_quat_phongngu
        ChuoiK = inputString.substring(TimK + 1 , TimL);
        trangthai_quat_phongngu  = ChuoiK.toInt();

        //trangthai_servo_phongngu
        ChuoiL = inputString.substring(TimL + 1 , TimM);
        trangthai_servo_phongngu = ChuoiL.toInt();
        

        //trangthai_led_nhavesinh
        ChuoiM = inputString.substring(TimM + 1 , TimN);
        trangthai_led_nhavesinh = ChuoiM.toInt();
        

        //trangthai_led_phongbep
        ChuoiN = inputString.substring(TimN + 1 , TimR);
        trangthai_led_phongbep = ChuoiN.toInt();

        //trangthai_servo_phoido
        ChuoiR = inputString.substring(TimR + 1 , TimT);
        trangthai_servo_phoido = ChuoiR.toInt();

        //trangthai_buzzer
        ChuoiT = inputString.substring(TimT + 1 , TimY);
        trangthai_buzzer = ChuoiT.toInt();
        

        //trangthai_led_garage
        ChuoiY = inputString.substring(TimY + 1 , TimU);
        trangthai_led_garage = ChuoiY.toInt();

        //trangthai_cua_garage
        ChuoiU = inputString.substring(TimU + 1 , TimI);
        trangthai_cua_garage = ChuoiU.toInt();
        



        ChuoiGhep  = A + nhietdodht + B + doamdht + C + nhietdolm35 + D + cambienga + E + trangthai_servo_cuachinh + F + trangthai_led_phongkhach + G + trangthai_quat_phongkhach + H + trangthai_led_cauthang + J + trangthai_led_phongngu + K + trangthai_quat_phongngu + L + trangthai_servo_phongngu + M + trangthai_led_nhavesinh + N + trangthai_led_phongbep + R + trangthai_servo_phoido + T + trangthai_buzzer + Y + trangthai_led_garage + U + trangthai_cua_garage + I;


        for (byte len = 1; len <= ChuoiGhep.length() + 1; len++)
        {
          ChuoiGhep.toCharArray(ChuoiEspSendMQTT, len);
          delay(3);
        }

        client.publish("ESPHUNG", ChuoiEspSendMQTT);



      }




      inputString = "";
      stringComplete = false;
    }
  }
}
