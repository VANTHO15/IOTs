#include <SoftwareSerial.h> //2.5.0
const byte RX = D6;
const byte TX = D5;
SoftwareSerial mySerial = SoftwareSerial(RX, TX);
String inputString = "";
bool stringComplete = false;

int bien = 0;
String ChuoiGuiUno = "";

long last = 0;

String A = "A";
String B = "B";
void setup()
{
  Serial.begin(9600);
  while (!Serial);
  mySerial.begin(9600);
  while (!mySerial);
  Serial.println("Start");

  last = millis();
}

void loop()
{
  Read_Uart();
  if(millis() - last >= 3000)
  {
    Serial.println("Đã send lệnh");
    // lấy dc lệnh từ server => data
    mySerial.println("JK");
    last = millis();
  }
}



void Read_Uart()
{
  while (mySerial.available())// A279B290C315D0E\n
  {
    char inChar = (char)mySerial.read();
    inputString += inChar;
    if (inChar == '\n')
    {
      stringComplete = true;
    }
    if (stringComplete)
    {
      Serial.print("Data nhận Uno = ");
      Serial.println(inputString);
      //=============
       // xử lý và đưa lên server
      //=============
      inputString = "";
      stringComplete = false;
    }
  }
}
