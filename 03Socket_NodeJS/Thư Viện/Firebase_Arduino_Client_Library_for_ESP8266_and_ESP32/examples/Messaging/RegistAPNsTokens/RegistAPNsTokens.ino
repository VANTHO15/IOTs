/**
 * Created by K. Suwatchai (Mobizt)
 * 
 * Email: k_suwatchai@hotmail.com
 * 
 * Github: https://github.com/mobizt
 * 
 * Copyright (c) 2021 mobizt
 *
*/

//This example shows how to create registration tokens for iOS APNs tokens.

#if defined(ESP32)
#include <WiFi.h>
#elif defined(ESP8266)
#include <ESP8266WiFi.h>
#endif
#include <Firebase_ESP_Client.h>

/* 1. Define the WiFi credentials */
#define WIFI_SSID "WIFI_AP"
#define WIFI_PASSWORD "WIFI_PASSWORD"

/** 2 Define the Firebase project Server Key which must be taken from
 * https://console.firebase.google.com/u/0/project/_/settings/cloudmessaging
 * 
 * The API, Android, iOS, and browser keys are rejected by FCM
 * 
 */
#define FIREBASE_FCM_SERVER_KEY "FIREBASE_PROJECT_CLOUD_MESSAGING_SERVER_KEY"

/* 3. Define the iOS APNs tokens to register */
#define APN_TOKEN_1 "APNs_TOKEN_1"
#define APN_TOKEN_2 "APNs_TOKEN_2"

//Define Firebase Data object
FirebaseData fbdo;

unsigned long lastTime = 0;

int count = 0;

void sendMessage();

void setup()
{

    Serial.begin(115200);

    WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
    Serial.print("Connecting to Wi-Fi");
    while (WiFi.status() != WL_CONNECTED)
    {
        Serial.print(".");
        delay(300);
    }
    Serial.println();
    Serial.print("Connected with IP: ");
    Serial.println(WiFi.localIP());
    Serial.println();

    Serial.printf("Firebase Client v%s\n\n", FIREBASE_CLIENT_VERSION);

    Firebase.FCM.setServerKey(FIREBASE_FCM_SERVER_KEY);

    Firebase.reconnectWiFi(true);

    Serial.print("Subscribe the topic... ");

    int numToken = 2;
    const char *APNs[2];
    APNs[0] = APN_TOKEN_1;
    APNs[1] = APN_TOKEN_1;

    if (Firebase.FCM.regisAPNsTokens(&fbdo, "com.google.FCMTestApp" /* Bundle id of the app */, false /* sandbox */, APNs /* array of APNs tokens */, numToken))
        Serial.printf("ok\n%s\n\n", Firebase.FCM.payload(&fbdo).c_str());
    else
        Serial.println(fbdo.errorReason());
}

void loop()
{
}
