#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <Ticker.h>
#include <time.h>

#define PIN_LED 16
#define PIN_BUTTON 0

#define LED_ON() digitalWrite(PIN_LED, HIGH)
#define LED_OFF() digitalWrite(PIN_LED, LOW)
#define LED_TOGGLE() digitalWrite(PIN_LED, digitalRead(PIN_LED) ^ 0x01)

Ticker ticker;

long last = 0;
int bien = 0;

bool longPress()
{
  static int lastPress = 0;
  if (millis() - lastPress > 3000 && digitalRead(PIN_BUTTON) == 0) {
    return true;
  } else if (digitalRead(PIN_BUTTON) == 1) {
    lastPress = millis();
  }
  return false;
}

void tick()
{
  //toggle state
  int state = digitalRead(PIN_LED);  // get the current state of GPIO1 pin
  digitalWrite(PIN_LED, !state);     // set pin to the opposite state
}

bool in_smartconfig = false;
void enter_smartconfig()
{
  if (in_smartconfig == false) 
  {
    in_smartconfig = true;
    ticker.attach(0.1, tick);
    WiFi.beginSmartConfig();
  }
}

void exit_smart()
{
  ticker.detach();
  LED_ON();
  in_smartconfig = false;
}

void setup() 
{
  Serial.begin(9600);
  
  WiFi.disconnect();
  Serial.setDebugOutput(true); // đưa về chế độ config wifi
  
  pinMode(PIN_LED, OUTPUT);
  pinMode(PIN_BUTTON, INPUT);
  ticker.attach(1, tick);
  Serial.println();
  Serial.println("Setup done");
  last =  millis();
}

void loop() 
{
  if (longPress())
  {
    enter_smartconfig();
    Serial.println("Enter smartconfig");
  }
  if (WiFi.status() == WL_CONNECTED && in_smartconfig && WiFi.smartConfigDone())
  {
    exit_smart();
    Serial.println("Connected, Exit smartconfig");
    Serial.print("ESP MAC Address:  ");
    Serial.println(WiFi.macAddress());
    Serial.print("ESP IP address: ");
    Serial.println(WiFi.localIP());
  }

  if (WiFi.status() == WL_CONNECTED)
  {
    if (millis() - last >= 1000)
    {
      bien++;
      Serial.print("Thực hiện lệnh: ");
      Serial.println(bien);
      last =  millis();
    }
  }
}
