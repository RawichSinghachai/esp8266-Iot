#include <ArduinoJson.h>


#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>

#include <ESP8266HTTPClient.h>

#include <WiFiClient.h>
ESP8266WiFiMulti WiFiMulti;
String payload ;

#define PIN1 D0
#define PIN2 D1 
#define PIN3 D2 
#define PIN4 D3 
#define PIN5 D4  
  
void setup() {
  pinMode(PIN1, OUTPUT);
  pinMode(PIN2, OUTPUT);
  pinMode(PIN3, OUTPUT);
  pinMode(PIN4, OUTPUT);
  pinMode(PIN5, OUTPUT);
  Serial.begin(115200);
  // Serial.setDebugOutput(true);
  Serial.println();
  Serial.println();
  Serial.println();

  for (uint8_t t = 4; t > 0; t--) {
    Serial.printf("[SETUP] WAIT %d...\n", t);
    Serial.flush();
    delay(1000);
  }

  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("TrueGigatexFiber_aKG", "4gQbbt33");

}

void loop() {
  // wait for WiFi connection
  if ((WiFiMulti.run() == WL_CONNECTED)) {

    WiFiClient client;

    HTTPClient http;

    Serial.print("[HTTP] begin...\n");
    if (http.begin(client, "http://192.168.1.57/Testphp/json.php")) {  // HTTP


      Serial.print("[HTTP] GET...\n");
      // start connection and send HTTP header
      int httpCode = http.GET();

      // httpCode will be negative on error
      if (httpCode > 0) {
        // HTTP header has been send and Server response header has been handled
        Serial.printf("[HTTP] GET... code: %d\n", httpCode);

        // file found at server
        if (httpCode == HTTP_CODE_OK || httpCode == HTTP_CODE_MOVED_PERMANENTLY) {
          payload = http.getString();
          Serial.println(payload);
        }
      } else {
        Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
      }

      http.end();
    } else {
      Serial.printf("[HTTP} Unable to connect\n");
    }
  }
  DynamicJsonDocument doc(1024);
  deserializeJson(doc,payload);
  
  
   String sw1 = doc[0]["switch"];
   String sw2 = doc[1]["switch"];
   String sw3 = doc[2]["switch"];
   String sw4 = doc[3]["switch"];
   String sw5 = doc[4]["switch"];


  if(sw1 == "on"){
    digitalWrite(PIN1, HIGH);
    }if(sw1 == "off"){
    digitalWrite(PIN1, LOW);
     }

     if(sw2 == "on"){
    digitalWrite(PIN2, HIGH);
    }if(sw2 == "off"){
    digitalWrite(PIN2, LOW);
     }

     if(sw3 == "on"){
    digitalWrite(PIN3, HIGH);
    }if(sw3 == "off"){
    digitalWrite(PIN3, LOW);
     }
//active LOW
     if(sw4 == "on"){
    digitalWrite(PIN4, LOW);
    }if(sw4 == "off"){
    digitalWrite(PIN4, HIGH);
     }
//active LOW   
     if(sw5 == "on"){
    digitalWrite(PIN5, LOW);
    }if(sw5 == "off"){
    digitalWrite(PIN5, HIGH);
     }


  delay(1000);

}
