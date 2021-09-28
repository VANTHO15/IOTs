#!/usr/bin/env bash
# requires: Nodejs/NPM, PowerShell
# Permission to run PS scripts (for this session only):
 Set-ExecutionPolicy -ExecutionPolicy Bypass -Scope Process

# exit if cmdlet gives error
$ErrorActionPreference = "Stop"

# Check to see if root CA file exists, download if not
If (!(Test-Path ".\root-CA.crt")) {
    "`nDownloading AWS IoT Root CA certificate from AWS..."
    Invoke-WebRequest -Uri https://www.amazontrust.com/repository/AmazonRootCA1.pem -OutFile root-CA.crt
}

# install AWS Device SDK for NodeJS if not already installed
node -e "require('aws-iot-device-sdk')"
If (!($?)) {
    "`nInstalling AWS SDK..."
    npm install aws-iot-device-sdk
}

"`nRunning pub/sub sample application..."
node .\node_modules\aws-iot-device-sdk\examples\device-example.js --host-name a35cho9o6i7esh-ats.iot.us-east-1.amazonaws.com --private-key .\THIETBIDONHIPTIM.private.key --client-certificate .\THIETBIDONHIPTIM.cert.pem --ca-certificate .\root-CA.crt --client-id=sdk-nodejs-d4bd8421-3305-4d4e-b770-82190bb9fd9e
