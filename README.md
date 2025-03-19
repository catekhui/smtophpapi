# **PHP SMS API Integration with SMSto**

## Overview
This repository provides a simple PHP class to send SMS using the SMSto API. Easily integrate SMS functionality into your web or mobile applications with just a few lines of code.

Always refer to the SMSto documentation in the developers section, [https://developers.sms.to/](https://developers.sms.to/). 

This repository will be kept up to date, so you don’t have to worry about outdated files.

## Features
- Send SMS messages via SMSto API
- Supports custom sender IDs (subject to country regulations)
- Automatic phone number formatting and validation
- Error handling for required parameters
- Callback URL support for message status updates

## Installation
1. Clone this repository:
   ```bash
   git clone https://github.com/catekhui/smtophpapi.git
   ```
2. Include the class in your project:
   ```php
   require_once 'Wpccb_sms.php';
   ```

## Requirements

- PHP 7.0 or later
- cURL extension enabled

## **How to Send SMS Using This Class**

```php
//some countries are not allowed to use custom sender ID
// if you are in a country where TFN number is required, that the one will be used as a sender ID
// contact support at support@sms.to to get a TFN number, if it's a requirement in your country
$sms = new Wpccb_sms(array(
    "country_code" => "+1",
    "phone" => "+1(604)123-1234",
    "message" => "This is a test message",
    "sender_id" => "YOUR COMPANY NAME",//keep it super short
    "api_key" => '',
    "callback_url" => "", // optional
));

$send = $sms->send();
print_r($send); // Returns a JSON response
```
Following is example of responses gotten from this class. Please always make sure you print the response method on the browser for a detailed responses. 

### **Successful Response**


```json
{
  "message": "Message is queued for sending! Please check report for update",
  "success": true,
  "message_id": "473590-1741446-80d0-6ff4-xxxxxxx"
}
```

### **Failure Response**

```json
{
  "success": false,
  "message": "Invalid API Key or Token",
  "data": []
}
```

## Registration
To start sending SMS, create an account with SMSto using the link below:
👉 [Create an Account](https://bit.ly/3Dw2iDQ)

## Support
For any support, please use the official SMSto support ticket system:
👉 [Submit a Support Ticket](https://bit.ly/3FwYeDO)

Alternatively, you can reply to this repository's issues section, and I will respond as soon as possible.

## **Important Notes**

- The **Sender ID** can be your company name. Keep it short, as a long Sender ID may cause SMS delivery failures. Always print the **SMS send** object to check the response.
- For users in **Canada, USA,** or **Puerto Rico**, you must use a **custom Sender ID** provided by **SMSTo Support** after submitting the **TFN document**. If you are in one of these countries, please contact **SMSTo Support** before sending SMS messages to configure your account.
  - You can reach them by sending an email to **[support@sms.to](mailto\:support@sms.to)** or by creating a new support ticket at [https://support.sms.to/support/home](https://support.sms.to/support/home).
  - They typically respond within minutes.
- Ensure that the country code includes the **plus sign (****`+`****) followed by the country code**.

## **What is a TFN Document?**

To send SMS messages to recipients in the **USA, Canada,** and **Puerto Rico**, network providers require you to **rent a Toll-Free Number (TFN)** and register it. You must also provide proof of **opt-in consent** from users. If this process is not completed correctly, messages will fail.

Additionally, regulations in these countries require proof of opt-in and opt-out for SMS communication. For example, at the end of every SMS, you can include:

> *"REPLY STOP to stop receiving these messages."*

To comply with these requirements, **SMSTo** will provide you with a **TFN document**. Simply **fill it out and submit it as a PDF**, and your setup will be complete.

📌 If you are in any of the aforementioned countries, please contact **SMSTo Support** to get the **TFN document** and additional information at:\
[https://support.sms.to/support/home](https://support.sms.to/support/home)

## **Send Function Return Type**

The `send()` function returns a **JSON string**.

## **Registration & Support**

- 📌 **Create an SMSTo account** using my referral link: [https://app.sms.to/register?referral=83500a7a-e8dd-4a2a-823e-24b4e7f7f613](https://app.sms.to/register?referral=83500a7a-e8dd-4a2a-823e-24b4e7f7f613)
- 🛠 **Submit Support Tickets:** [https://support.sms.to/support/home](https://support.sms.to/support/home)

## **Support & Donations**

My name is **Cate**, a passionate **lady developer**. If you find this class helpful, please consider supporting its future development by:\
🍵 **Buying me a coffee** via PayPal: **[catekhui130@gmail.com](mailto\:catekhui130@gmail.com)**\
🔗 **Creating an SMSTo account** using my referral link (I will receive a small commission for SMS sent):\
[https://app.sms.to/register?referral=83500a7a-e8dd-4a2a-823e-24b4e7f7f613](https://app.sms.to/register?referral=83500a7a-e8dd-4a2a-823e-24b4e7f7f613)

## License
This project is licensed under the MIT License - see the LICENSE file for details.
