#ifdef ESP32
  #include <WiFi.h>
  #include <HTTPClient.h>
  #include <Arduino.h>
#else
  #include <ESP8266WiFi.h>
  #include <ESP8266HTTPClient.h>
  #include <WiFiClient.h>
#endif


#include "DHT.h"
#define DHTPIN D3 
//#define DHTPIN 27 
#define DHTTYPE DHT22
DHT dht(DHTPIN, DHTTYPE);
/* Set these to your desired credentials. */
const char *ssid = "TrueGigatexFiber_aKG";  //ENTER YOUR WIFI SETTINGS
const char *password = "4gQbbt33";

//Web/Server address to read/write from 
const char *host = "http://esp8266-test.atwebpages.com/esp_send_data.php";   //https://circuits4you.com website or IP address of server

//=======================================================================
//                    Power on setup
//=======================================================================

void setup() {
  dht.begin();
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());

  

  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
}

//=======================================================================
//                    Main Program Loop
//=======================================================================
void loop() {
    int t = dht.readTemperature();
    int h = dht.readHumidity();
     if (isnan(h) || isnan(t)) {
    Serial.println(F("Failed to read from DHT sensor!"));
    return;}
    //Serial.print(F("Temperature:"));
    //Serial.print(t);
    //Serial.print(F("Humidity:"));
    //Serial.print(h);

    
  HTTPClient http;    //Declare object of class HTTPClient
  WiFiClient client;

  //Post Data
  String postData = "?temp="+String(t)+"&hum="+ String(h);
  //String postData = "?temp=999&hum=500";
 String Link = "http://esp8266-test.atwebpages.com/esp_send_data.php" + postData;
  
  http.begin(client,Link);              //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

  int httpCode = http.POST(Link);   //Send the request
  
  Serial.print("httpRequestData: ");
   Serial.println(postData);
   
  if (httpCode>0) {
      Serial.print("HTTP Response code: ");
      Serial.print(httpCode);
    }
    else {
      Serial.println("Error code: ");
      Serial.println(httpCode);
    }

  http.end();  //Close connection
  
  delay(5000);  //Post Data at every 5 seconds
}
