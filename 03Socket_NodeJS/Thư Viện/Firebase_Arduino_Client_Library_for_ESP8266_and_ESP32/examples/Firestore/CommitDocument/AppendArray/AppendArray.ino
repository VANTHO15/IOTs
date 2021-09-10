
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

//This example shows how to app the value to array field. This operation required Email/password, custom or OAUth2.0 authentication.

#if defined(ESP32)
#include <WiFi.h>
#elif defined(ESP8266)
#include <ESP8266WiFi.h>
#endif
#include <Firebase_ESP_Client.h>

//Provide the token generation process info.
#include "addons/TokenHelper.h"

/* 1. Define the WiFi credentials */
#define WIFI_SSID "WIFI_AP"
#define WIFI_PASSWORD "WIFI_PASSWORD"

/* 2. Define the API Key */
#define API_KEY "API_KEY"

/* 3. Define the project ID */
#define FIREBASE_PROJECT_ID "PROJECT_ID"

/* 4. Define the user Email and password that alreadey registerd or added in your project */
#define USER_EMAIL "USER_EMAIL"
#define USER_PASSWORD "USER_PASSWORD"

//Define Firebase Data object
FirebaseData fbdo;

FirebaseAuth auth;
FirebaseConfig config;

unsigned long dataMillis = 0;
int count = 0;

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

    /* Assign the api key (required) */
    config.api_key = API_KEY;

    /* Assign the user sign in credentials */
    auth.user.email = USER_EMAIL;
    auth.user.password = USER_PASSWORD;

    /* Assign the callback function for the long running token generation task */
    config.token_status_callback = tokenStatusCallback; //see addons/TokenHelper.h

    Firebase.begin(&config, &auth);
    
    Firebase.reconnectWiFi(true);

}

void loop()
{

    if (Firebase.ready() && (millis() - dataMillis > 60000 || dataMillis == 0))
    {
        dataMillis = millis();
        count++;

        Serial.print("Commit a document (append array)... ");

        //The dyamic array of write object fb_esp_firestore_document_write_t.
        std::vector<struct fb_esp_firestore_document_write_t> writes;

        //A write object that will be written to the document.
        struct fb_esp_firestore_document_write_t transform_write;

        //Set the write object write operation type.
        //fb_esp_firestore_document_write_type_update,
        //fb_esp_firestore_document_write_type_delete,
        //fb_esp_firestore_document_write_type_transform
        transform_write.type = fb_esp_firestore_document_write_type_transform;

        //Set the document path of document to write (transform)
        transform_write.document_transform.transform_document_path = "test_collection/test_document";

        //Set a transformation of a field of the document.
        struct fb_esp_firestore_document_write_field_transforms_t field_transforms;

        //Set field path to write.
        field_transforms.fieldPath = "appended_data";

        //Set the transformation type.
        //fb_esp_firestore_transform_type_set_to_server_value,
        //fb_esp_firestore_transform_type_increment,
        //fb_esp_firestore_transform_type_maaximum,
        //fb_esp_firestore_transform_type_minimum,
        //fb_esp_firestore_transform_type_append_missing_elements,
        //fb_esp_firestore_transform_type_remove_all_from_array
        field_transforms.transform_type = fb_esp_firestore_transform_type_append_missing_elements;

        String content;
        FirebaseJson js;

        String txt = "Hello World! " + String(count);
        js.set("values/[0]/integerValue", String(rand()).c_str());
        js.set("values/[1]/stringValue", txt);

        js.toString(content);

        //Set the transformation content.
        field_transforms.transform_content = content.c_str();

        //Add a field transformation object to a write object.
        transform_write.document_transform.field_transforms.push_back(field_transforms);

        //Add a write object to a write array.
        writes.push_back(transform_write);

        if (Firebase.Firestore.commitDocument(&fbdo, FIREBASE_PROJECT_ID, "" /* databaseId can be (default) or empty */, writes /* dynamic array of fb_esp_firestore_document_write_t */, "" /* transaction */))
            Serial.printf("ok\n%s\n\n", fbdo.payload().c_str());
        else
            Serial.println(fbdo.errorReason());
    }
}
