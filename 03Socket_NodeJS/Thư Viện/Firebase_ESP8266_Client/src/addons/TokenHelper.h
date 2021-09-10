#include <Arduino.h>
#if defined(ESP32)
#include <FirebaseESP32.h>
#elif defined(ESP8266)
#include <FirebaseESP8266.h>
#endif

//This header file includes the functions that provide the token generation process info.

/* The helper function to get the token type string */
String getTokenType(struct token_info_t info)
{
    switch (info.type)
    {
    case token_type_undefined:
        return "undefined";

    case token_type_legacy_token:
        return "legacy token";

    case token_type_id_token:
        return "id token";

    case token_type_custom_token:
        return "custom token";

    case token_type_oauth2_access_token:
        return "OAuth2.0 access token";

    default:
        break;
    }
    return "undefined";
}

/* The helper function to get the token status string */
String getTokenStatus(struct token_info_t info)
{
    switch (info.status)
    {
    case token_status_uninitialized:
        return "uninitialized";

    case token_status_on_initialize:
        return "on initializing\n** NTP time acquiring **\n";

    case token_status_on_signing:

#if defined(ESP32)
        return "on signing";
#elif defined(ESP8266)
        return "on signing\n** wdt reset may be occurred at this stage due to the BearSSL long calculation process **\n";
#endif

    case token_status_on_request:
        return "on request";

    case token_status_on_refresh:
        return "on refreshing";

    case token_status_ready:
        return "ready";

    case token_status_error:
        return "error";

    default:
        break;
    }
    return "uninitialized";
}

/* The helper function to get the token error string */
String getTokenError(struct token_info_t info)
{
    String s = "code: ";
    s += String(info.error.code);
    s += ", message: ";
    s += info.error.message.c_str();
    return s;
}

void tokenStatusCallback(TokenInfo info)
{
    /** fb_esp_auth_token_status enum
     * token_status_uninitialized,
     * token_status_on_initialize,
     * token_status_on_signing,
     * token_status_on_request,
     * token_status_on_refresh,
     * token_status_ready,
     * token_status_error
    */
    if (info.status == token_status_error)
    {
        Serial.printf("Token info: type = %s, status = %s\n", getTokenType(info).c_str(), getTokenStatus(info).c_str());
        Serial.printf("Token error: %s\n", getTokenError(info).c_str());
    }
    else
    {
        Serial.printf("Token info: type = %s, status = %s\n", getTokenType(info).c_str(), getTokenStatus(info).c_str());
    }
}
